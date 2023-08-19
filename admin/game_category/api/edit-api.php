<?php

include "./../../config.php";

$id = $_POST["id"];
$name = $_POST["name"];
$time = $_POST["time"];
$price = $_POST["price"];
$returnAmount = $_POST["returnAmount"];


$qry = null;

if ($id != null) {
    $qry = $con->query(
       
    "UPDATE `tbl_game_category` SET `name`='$name',`price`='$price',`time`='$time',`returnAmount`='$returnAmount' WHERE `id` = '$id'"
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
