<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	//$clientId = $obj['clientId'];
 	$name = $obj['name'];
 	$phoneNumber = $obj['phoneNumber'];
 	$wallet = $obj['wallet'];
 
 	$referalCode = $obj['referalCode'];
	//$securePassword = md5($password); 
    $mycouponcode = rand(1, 1000000); 
    $clientId=uniqid();
	
	
	if($phoneNumber != "" ){
	    $resultdata =$con->query("select * from `tbl_user` where `phoneNumber`='$phoneNumber'");
        $userId=0;
    
        while($row = mysqli_fetch_array($resultdata)){
             $userId=$row['userId'];
        }
        if($userId > 0)
        { 
             $result['status']="202";
             $result['message']="! Phone Number Already Register";
        
        }else{
        
        	$sql = $con->query("INSERT INTO `tbl_user`(`clientId`, `name`, `phoneNumber`, `wallet`, `mycouponcode`, `refcouponcode`, `createAt`) VALUES ('$clientId','$name','$phoneNumber','$wallet','$mycouponcode','$referalCode',now())");
        	
        	if($sql != "" ){ 
                	 $result['status']="200";
             $result['message']="Registration Successfully";
            }
            else{
                 $result['status']="400";
             $result['message']="Something Went Wrong";
            }
        }
    }else{
        $result['status']="200";
             $result['message']="Please Fill All Details";
    }
    echo json_encode($result);
?>