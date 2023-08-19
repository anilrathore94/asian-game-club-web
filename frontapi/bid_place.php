<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	$userId = $obj['userId'];
 	$amount = $obj['amount'];
 	$number = $obj['number'];
 	$category = $obj['category'];
 	$wallet = 0;
    $currentTIme=time();
    
	if($amount != "" && $number){
	    $resultdata =$con->query("select * from `tbl_user` where `userId`='$userId'"); 
        while($row = mysqli_fetch_array($resultdata)){
             $wallet=$row['wallet'];
        }
        
        if($wallet >= $amount) {
             $newWalletAmount=$wallet - $amount ; 
        	$bidsql = $con->query("INSERT INTO `tbl_bid`(`userId`, `bidNumber`, `amount`, `tickTime`,`category`,`createAt`,`updateAt`) VALUES 
        	('$userId','$number','$amount','$currentTIme','$category',now(),now())");
        	
        	$lastBidId=0;
        	$resultdataBId =$con->query("select * from `tbl_bid` where `userId`='$userId' and `bidNumber`='$number' and `amount`='$amount'"); 
            while($row = mysqli_fetch_array($resultdataBId)){
                 $lastBidId=$row['id'];
            }
        
        
        	$paymentsql = $con->query("INSERT INTO `tbl_payment`(`userId`, `amount`, `type_CR_DR`, `category`, `transcationId`, `razorpayId`, `rId`,`createAt`) VALUES
        	('$userId','$amount','DR','Bid Place','','','$lastBidId',now())");
        	
        	$sql = $con->query("UPDATE `tbl_user` SET `wallet`='$newWalletAmount' WHERE `userId`='$userId'");
        	
        	
        	
        	if($sql != "" ){ 
                	 $result['status']="200";
             $result['message']="Bid Place Successfully";
            }
            else{
                 $result['status']="400";
                 $result['message']="Something Went Wrong";
            }
        }
	
    else{
              $result['status']="203";
             $result['message']="Your Wallet amount not sufficient";
    }
	}
    else{
        $result['status']="202";
             $result['message']="Please Fill Amount and number Details";
    }
    echo json_encode($result);
?>