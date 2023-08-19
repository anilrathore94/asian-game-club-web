<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	$userId = $obj['userId'];
    $amount = $obj['amount'];
   
       $resultdatasender = $con->query("select * from `tbl_user` where `userId`='$userId'");
    $userWallet = 0; 
    while ($row = mysqli_fetch_array($resultdatasender)) {
        $userWallet = $row['wallet']; 
    }
    
	
	if($userId != "" && $amount != ""  ){
 if($userWallet >= $amount){	  
        
           $sql = $con->query("INSERT INTO `tbl_withdrawal`(`userId`, `amount`,`status`, `createAt`) VALUES ('$userId','$amount','Pending',now())");
         	
         	$lastwithdrawalId=0;
        	$resultdataBId =$con->query("select * from `tbl_withdrawal` where `userId`='$userId' and  `amount`='$amount'"); 
            while($row = mysqli_fetch_array($resultdataBId)){
                 $lastwithdrawalId=$row['withdrawalId'];
            }
            
        	if($sql != "" ){ 
        	    $sql = $con->query("INSERT INTO `tbl_payment`(`userId`, `amount`, `type_CR_DR`, `category`, `transcationId`, `razorpayId`,`rId`, `createAt`) VALUES
        	    ('$userId','$amount','DR','Withdrawal','','','$lastwithdrawalId',now())");
        	    $myCurrentBalance=$userWallet - $amount;
        	    $sql = $con->query("UPDATE `tbl_user` SET `wallet`='$myCurrentBalance' WHERE `userId`='$userId'");
        	
             $result['status']="200";
             $result['message']="Send Successfully";
            }
            else{
                 $result['status']="400";
             $result['message']="Something Went Wrong";
            }
 } else{
             $result['status']="401";
             $result['message']="You Have not sufficient balance";
    }
        
    }else{
        $result['status']="200";
             $result['message']="Please Fill All Details";
    }
    echo json_encode($result);
?>