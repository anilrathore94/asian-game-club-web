<?php

include "config.php";

$period = date("ymdhms");
$price = 0;
$returnAmount = 0;
$time = 0;
$category = "";
$number = rand(0, 9);
$result = "";

if ($number == 1 || $number == 3 || $number == 7 || $number == 9) {
    $result = "Green";
} elseif ($number == 2 || $number == 4 || $number == 6 || $number == 8) {
    $result = "Red";
} elseif ($number == 0) {
    $result = "Lucky Red";
} elseif ($number == 5) {
    $result = "Lucky Green";
}

$resultdata = $con->query(
    "select * from `tbl_game_category` where `name`='Gold'"
);
while ($row = mysqli_fetch_array($resultdata)) {
    $price = $row["price"];
    $returnAmount = $row["returnAmount"];
    $time = $row["time"];
    $category = $row["name"];
}

$currentTIme = time();

$paymentsql = $con->query("INSERT INTO `tbl_number`(`period`, `price`, `time`, `category`, `number`, `result`, `state`, `returnAmount`,`tickTime`, `createAt`, `updateAt`) VALUES
                              	('$period','$price','$time','$category','$number','$result','','$returnAmount','$currentTIme',now(),now())");

$startTime = $currentTIme - $time * 60;
$endTime = $currentTIme;
$resultdataBId = $con->query(
    "select * from `tbl_bid` where `bidNumber`='$number' and `category`='$category' and `tickTime` BETWEEN $startTime AND $endTime");
while ($row = mysqli_fetch_array($resultdataBId)) {
    $winnerUserId = 0;
    $bidamount = 0;
    $bidId = 0;

    $winnerUserId = $row["userId"];
    $bidamount = $row["amount"];
    $bidId = $row["id"];

    $wallet = 0;
    $resultdata = $con->query(
        "select * from `tbl_user` where `userId`='$winnerUserId'"
    );
    while ($row = mysqli_fetch_array($resultdata)) {
        $wallet = $row["wallet"];
    }

    $currentWinAmount = $bidamount * $returnAmount;
    $winningAmount = $currentWinAmount + $wallet;

    $sql = $con->query(
        "UPDATE `tbl_user` SET `wallet`='$winningAmount' WHERE `userId`='$winnerUserId'"
    );

    $paymentsql = $con->query("INSERT INTO `tbl_payment`(`userId`, `amount`, `type_CR_DR`, `category`, `transcationId`, `razorpayId`, `rId`,`createAt`) VALUES
            	('$winnerUserId','$currentWinAmount','CR','Winning Amount','','','$bidId',now())");
}

if ($paymentsql != "") {
    $result["status"] = "200";
    $result["message"] = "Result Successfully";
} else {
    $result["status"] = "400";
    $result["message"] = "Something Went Wrong";
}

echo json_encode($result);
?>
