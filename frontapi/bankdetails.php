<?php include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	$id= $obj['userId']; 
 
	
	if($id != "" ){ 
        $resultdata = $con->query("select * from `tbl_user_bank` where `userId`='$id'");
     
    $data = array();
    while ($row = mysqli_fetch_array($resultdata)) {
        //$data[] = $row; 
        $result['status']="200";
     $result['message']="Data Found";
     $result['data']=$row;
    }
     
	}else{
	    $result['status']="202";
     $result['message']="Please Fill All Details";
	}	 
    echo json_encode($result);
?>