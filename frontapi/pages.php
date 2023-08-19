<?php

    include 'config.php';

    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	 $pageName = $obj['pageName'];

   $resultdata = $con->query("select * from `tbl_pages` where `title`='$pageName'");
    
    $data = array();
    while ($row = mysqli_fetch_array($resultdata)) { 
        $data[] = $row;
    }
    

    echo json_encode(array("status"=>'200',"message"=>'data found',"data"=>$data));
?>