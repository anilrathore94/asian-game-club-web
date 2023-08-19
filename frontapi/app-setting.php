<?php
    
    include 'config.php';
    
        $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	

     
    $resultdata = $con->query("select * from `tbl_app_setting`    ");
    $dataArr=array(); 
    while($row = mysqli_fetch_array($resultdata)){
     
        echo json_encode(array("status"=>'200',"message"=>'data found',"data"=>$row));
    
    }
 
    
    
?>