<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	$senderUserId = $obj['senderUserId'];
    $amount = $obj['amount'];
    $receiverPhone = $obj['receiverPhone'];
    
	$resultdata = $con->query("select * from `tbl_user` where `phoneNumber`='$receiverPhone'");
    $receiverUserId = 0;
     
    while ($row = mysqli_fetch_array($resultdata)) {
        $receiverUserId = $row['userId']; 
    }
  
     
     $resultdatasender = $con->query("select * from `tbl_user` where `userId`='$senderUserId'");
    $senderUserWallet = 0; 
    while ($row = mysqli_fetch_array($resultdatasender)) {
        $senderUserWallet = $row['wallet']; 
    }
    
    
	if($senderUserId != "" && $amount != "" ){
	  if($senderUserWallet >= $amount){
       if($receiverUserId > 0){  
            $sql = $con->query("INSERT INTO `tbl_payment`(`userId`, `amount`, `type_CR_DR`, `category`, `transcationId`, `razorpayId`, `createAt`) VALUES ('$senderUserId','$amount','DR','Fund','','',now())");
        
              $sql = $con->query("INSERT INTO `tbl_fund_transfer`(`senderUserId`, `amount`, `receiverUserId`, `createAt`) VALUES ('$senderUserId','$amount','$receiverUserId',now())");
        	   
        	if($sql != "" ){ 
                	 $result['status']="200";
                     $result['message']="Send Successfully";
            }
            else{
                 $result['status']="400";
                 $result['message']="Something Went Wrong";
            }
        
        }else{
                 $result['status']="404";
                 $result['message']="Phone Number not register";
        }
	 } else{
             $result['status']="401";
             $result['message']="You Have not sufficient balance";
    }
   }else{
             $result['status']="202";
             $result['message']="Please Fill All Details";
    }
    echo json_encode($result);
?>