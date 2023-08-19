<?php 
include './../../config.php';

$aboutId = $_GET['id'];

   $sql = $con->query("DELETE FROM `plan` WHERE `planId`=$aboutId"); 
    if($sql > 0)

    { 

        $rsp['status'] = "200";

        $rsp['message']='Successfully Deleted';
        header('Location: ./../index.php');
    }

    else{

        $rsp['status']='204';

        $rsp['message']='Some Thing Went Wrong';

    }
    echo json_encode($rsp);
?>