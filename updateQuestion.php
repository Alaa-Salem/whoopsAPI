<?php

require_once "dbConnection.php";

if($_SERVER['REQUEST_METHOD']="PUT"){
    $URI = $_SERVER['REQUEST_URI'];
    $uriArray = explode("/" , $URI );
    $id = end($uriArray);


    $data = json_decode((file_get_contents("php://input")));
    $question = $data->question;

    $query = "UPDATE `QUESTIONS` SET `question`='$question' WHERE id=$id "  ;

    $runQuery = mysqli_query($conn, $query);


    if($runQuery){
        echo json_encode(["msg"=>'Updated Successfully']);

    }else{
        echo json_encode(["msg"=>'Failed to Update']);

    }




    

}else{
    http_response_code(404);
}



?>