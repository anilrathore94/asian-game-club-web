<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	$userId = $obj['userId'];
    //$bankHolderName = $obj['bankHolderName'];
    //$bankName = $obj['bankName'];
    //$IFSC = $obj['IFSC'];
    //$bankAccountNo = $obj['bankAccountNo'];
    $mobileNo = $obj['mobileNo'];
    $emailID = $obj['emailID'];
    $actualName = $obj['actualName'];
    $UPIId = $obj['UPIId'];
    $tuserId = 0;
	
	if($userId != ""  && $mobileNo != "" && $emailID != "" && $actualName != "" && $UPIId != "" ){
	  
	  
	  $resultdata = $con->query("select * from `tbl_user_bank` where `userId`='$userId'");
    
    $data = array();
    while ($row = mysqli_fetch_array($resultdata)) {
        $tuserId = $row['userId'];
        $data = $row;
    }
    
    if($tuserId == $userId ){
        
        $sql = $con->query ("UPDATE `tbl_user_bank` SET `userId`='$userId',`mobileNo`='$mobileNo',`emailID`='$emailID',`actualName`='$actualName',`UPIId`='$UPIId',`isdefault`='$isdefault',`upiisdefault`='$upiisdefault',`createAt`=now() WHERE `userId` = '$userId' ");
        	
        	if($sql != "" ){ 
                	 $result['status']="200";
             $result['message']="Update Send Successfully";
            }
            else{
                 $result['status']="400";
             $result['message']="Something Went Wrong";
            }
        
    }
        
    else{
	  
        
$sql = $con->query("INSERT INTO `tbl_user_bank`(`userId`,  `mobileNo`, `emailID`, `actualName`, `UPIId`, `createAt`) VALUES ('$userId','$bankHolderName','$bankName','$IFSC','$bankAccountNo','$mobileNo','$emailID','$actualName','$UPIId',now())");
        	
        	if($sql != "" ){ 
                	 $result['status']="200";
             $result['message']="Insert Send Successfully";
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