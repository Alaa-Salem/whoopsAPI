<?php

require_once "dbConnection.php";

if($_SERVER['REQUEST_METHOD']="GET"){
    $URI = $_SERVER['REQUEST_URI'];
    $uriArray = explode("/" , $URI );
    $term = end($uriArray);



    $query = "SELECT `ques_id` as 'id' , `question`,`answer`,  `username` , `created_at` FROM `users` JOIN `questions` JOIN `answers` ON users.id=questions.user_id AND users.id=answers.user_id WHERE `question` LIKE '%$term%' ";


    $runQuery = mysqli_query($conn , $query);


    if(mysqli_num_rows($runQuery)>0){
        $searchResult = mysqli_fetch_all($runQuery , MYSQLI_ASSOC);
        $jsonData = json_encode($searchResult);
        print_r($jsonData);

    }else{
        echo json_encode(["msg"=>'Not Found']);
    }


}else{
    http_response_code(404);
}




?>


