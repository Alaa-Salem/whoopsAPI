<?php

require_once "dbConnection.php";

if($_SERVER['REQUEST_METHOD']="POST"){
    $data = json_decode((file_get_contents("php://input")));
    $question = $data->question;
    $user_id = $data->user_id;


    $query = "INSERT INTO `QUESTIONS` (`question` , `user_id`) VALUES ('$question' , $user_id)";
    $runQuery = mysqli_query($conn, $query);

    if($runQuery){
        echo json_encode(["msg"=>'Add Successfully']);

    }else{
        echo json_encode(["msg"=>'Failed to Add']);

    }
    



}else{
    http_response_code(404);
}




?>
