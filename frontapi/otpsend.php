<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true); 
 	$phoneNumber = $obj['phoneNumber'];  
	
	
	if($phoneNumber != "" ){
	         $resultdata = $con->query("select * from `tbl_user` where `phoneNumber`='$phoneNumber' ");
            $userId = 0; 
            $isactive="1";
            while ($row = mysqli_fetch_array($resultdata)) { 
                 $userId = $row['userId'];
                 $isactive = $row['isActive'];
            }
            if($isactive == "1"){
                 
                     $result['status']="200";
                     $result['message']="Otp send successfully";
                     $result['data']="123456";
                    
            } 
             else{
               $result['status']="401";
                $result['message']="Sorry your mobile number is blocked";
             }
	}
         else{
               $result['status']="202";
             $result['message']="Please Phone Number ";
    }
    echo json_encode($result);
?>

