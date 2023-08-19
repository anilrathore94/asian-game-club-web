<?php

    include "./../../config.php";

    $planId = $_POST["planId"]; 
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sellingprice = $_POST['sellingprice'];
    $count = $_POST['count'];
     
       $qry =null;
      
if($planId != null){


          
          
          $qry = $con->query("UPDATE `plan` SET `type`='$type',`title`='$title',`description`='$description',`price`='$price',`sellingprice`='$sellingprice',`count`='$count' WHERE `planId` = '$planId'");
                if($qry > 0){ 
        $rsp["status"] = "200";
        $rsp["message"] = "Successfully Added";
    }
    else{
        $rsp["status"] = "204";
        $rsp["message"] = "failed";
    }
    }else{
        
     echo "error";   
    }
        
   



    
      echo json_encode($rsp);
?>
