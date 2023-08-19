<?php
    
    include 'config.php';
    
    $json = file_get_contents('php://input'); 	
	$obj = json_decode($json,true);
	
	 
    $uId =$obj['userId'];
    
    $resultdata =$con->query("select * from `tbl_user` where `userId` = $uId");
 
    // if($resultdata > 0){
    while($row = mysqli_fetch_array($resultdata)){
          echo json_encode(array("status"=>'200',"message"=>'data found',"data"=>$row));
    }
//    }
//     else{
//         echo json_encode(array("status"=>'404',"message"=>'User Not Vaild',"data"=>$dataArr));
//     }   
    
?>