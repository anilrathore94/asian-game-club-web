<?php
    
    include 'config.php';
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    $toDate = $obj['toDate'];
    $fromDate = $obj['fromDate'];
    $type= $obj['type'];
    $id= $obj['userid'];
    $resultdata=null;
    if($type == "All"){
        $resultdata = $con->query("select * from `tbl_payment` where `userId`='$id'  ");
    }else{
        $resultdata = $con->query("select * from `tbl_payment` where `category`='$type' and `userId`='$id' ");
    }
    
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