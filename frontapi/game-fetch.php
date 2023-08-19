<?php
    
    include 'config.php';
    
        $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	

     
    $resultdata = $con->query("select * from `tbl_game_category` ");
    $dataArr=array(); 
    while($row = mysqli_fetch_array($resultdata)){
        $dataArr[]=$row;
    }
 
    if(count($dataArr) > 0){
        echo json_encode(array("status"=>'200',"message"=>'data found',"data"=>$dataArr));
    }
    else{
        echo json_encode(array("status"=>'404',"message"=>'data not found',"data"=>$dataArr));
    }   
    
?>