<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	$userId = $obj['userId'];
    $amount = $obj['amount'];
    $type_CR_DR = $obj['type_CR_DR'];
    $category = $obj['category'];
    $transcationId = $obj['transcationId'];
    $razorpayId = $obj['razorpayId'];
	 
	if($userId != "" && $amount != "" && $type_CR_DR != "" && $category != "" && $transcationId != "" && $razorpayId != "" ){
	  
        
$sql = $con->query("INSERT INTO `tbl_payment`(`userId`, `amount`, `type_CR_DR`, `category`, `transcationId`, `razorpayId`, `createAt`) VALUES ('$userId','$amount','$type_CR_DR','$category','$transcationId','$razorpayId',now())");
        	
        	if($sql != "" ){ 
                	 $result['status']="200";
             $result['message']="Send Successfully";
            }
            else{
                 $result['status']="400";
             $result['message']="Something Went Wrong";
            }
        
    }else{
        $result['status']="200";
             $result['message']="Please Fill All Details";
    }
    echo json_encode($result);
?>