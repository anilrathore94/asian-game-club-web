<?php include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	$id= $obj['id']; 
	$name = $obj['name']; 
 
	
	if($name != "" && $id != "" ){ 
        
        	$sql = $con->query("UPDATE `tbl_user` SET `name`='$name' WHERE `userId`='$id'");
        	
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