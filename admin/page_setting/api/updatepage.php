<?php

    include '../../config.php'; 

    $pageId = $_POST["pageId"]; 
    
     $description=addslashes($_POST["description"]);
       $qry = null ;
      
     if($pageId != $qry){
          
          $qry = $con->query("UPDATE `tbl_pages` SET `description`='$description' WHERE `pageId` = '$pageId'");
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
