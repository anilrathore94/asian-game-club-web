<?php

include "./../../config.php";

$id = $_POST["id"];
$refelUrl = $_POST["refelUrl"];
$appUrl = $_POST["appUrl"];
$razorpayKey = $_POST["razorpayKey"];
$appVersion = $_POST["appVersion"];
$supportNumber = $_POST["supportNumber"];
$email = $_POST["email"];
$maintenance = $_POST["maintenance"];


$qry = null;

if ($id != null) {
    $qry = $con->query(
       
    "UPDATE `tbl_app_setting` SET `refelUrl`='$refelUrl',`appUrl`='$appUrl',`razorpayKey`='$razorpayKey',`appVersion`='$appVersion',`supportNumber`='$supportNumber',`email`='$email',`maintenance`='$maintenance' WHERE `id` = '$id'"
    );
    if ($qry > 0) {
        $rsp["status"] = "200";
        $rsp["message"] = "Successfully Added";
    } else {
        $rsp["status"] = "204";
        $rsp["message"] = "failed";
    }
} else {
    echo "error";
}

echo json_encode($rsp);
?>
