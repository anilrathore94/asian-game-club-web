<?php
include 'config.php';
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$phoneNumber = $obj['phoneNumber'];
$clientId = uniqid();
if ($phoneNumber == "") {
    $result['status'] = "202";
    $result['message'] = "Please enter Phone Number ";
} else {
    $resultdata = $con->query("select * from `tbl_user` where `phoneNumber`='$phoneNumber'");
    $userId = 0;
    $data = array();
    while ($row = mysqli_fetch_array($resultdata)) {
        $userId = $row['userId'];
        $data = $row;
    }
    if ($userId > 0) {
        $result['status'] = "200";
        $result['message'] = "Login successfully";
        $result['data'] = $data;
    } else {
        $sql = $con->query("INSERT INTO `tbl_user`(`clientId`,  `phoneNumber`,`isActive`,`createAt`) VALUES ('$clientId', '$phoneNumber','1',Now())");
        if ($sql != "") {
            $resultdata = $con->query("select * from `tbl_user` where `phoneNumber`='$phoneNumber'");
            $userId = 0;
            $data = array();
            while ($row = mysqli_fetch_array($resultdata)) {
                $userId = $row['userId'];
                $data = $row;
            }
            if ($userId > 0) {
                $result['status'] = "200";
                $result['message'] = "Registeration successfully";
                $result['data'] = $data;
            } else {
                $result['status'] = "400";
                $result['message'] = "Something Went Wrong";
            }
        }
    }
}
    echo json_encode($result);
?>

