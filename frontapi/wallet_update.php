<?php include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	$id= $obj['id']; 
	$wallet_amount = $obj['wallet_amount']; 
    $razorpayId= $obj['razorpayId']; 
	
	if($id != "" ){ 
        $resultdata = $con->query("select * from `tbl_user` where `userId`='$id'");
    $wallet = 0;
    $data = array();
    while ($row = mysqli_fetch_array($resultdata)) {
        $wallet = $row['wallet']; 
    }
    $wallet=$wallet+$wallet_amount; 
        $sql = $con->query("INSERT INTO `tbl_payment`(`userId`, `amount`, `type_CR_DR`, `category`, `transcationId`, `razorpayId`, `createAt`) VALUES ('$id','$wallet_amount','CR','Recharge','','$razorpayId',now())");
        	
        	$sql = $con->query("UPDATE `tbl_user` SET `wallet`='$wallet' WHERE `userId`='$id'");
        	
        	if($sql != "" ){ 
                	 $result['status']="200";
             $result['message']="Update Successfully";
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