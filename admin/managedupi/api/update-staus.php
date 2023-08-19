<?php 
 include './../../config.php';

    $userId = $_POST['id'];
    $status = $_POST['status'];
    echo $userId;die;
    $qry = $con->query("UPDATE `tbl_users` SET `status`='$status' WHERE userId = $userId");
    echo $qry;
    $res->success = false;
    if($insert > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Update';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'failed';
    }
    echo json_encode($rsp);
?>