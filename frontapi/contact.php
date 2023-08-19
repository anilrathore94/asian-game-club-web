<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	$username = $obj['username'];
    $email = $obj['email'];
    $subject = $obj['subject'];
    $description = $obj['description'];
    $phone = $obj['phone'];
	
	if($username != "" && $email != "" && $phone != "" && $subject != "" ){
	  
        
        	$sql = $con->query("INSERT INTO `contact`(`username`, `email`, `subject`, `description`, `phone`) VALUES ('$username','$email','$subject','$description','$phone')");
        	
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