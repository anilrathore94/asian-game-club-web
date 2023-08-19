<?php
    
    include 'config.php';
    
    $json = file_get_contents('php://input'); 	
 	$obj = json_decode($json,true);
	
	$userid = $obj['userid'];
    
    $resultdata = $con->query("select payment.*, myplan.* from `myplan` left join payment on payment.planId = myplan.planId  where myplan.userid='$userid'");
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