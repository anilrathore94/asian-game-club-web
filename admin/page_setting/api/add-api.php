<?php

    include './../../config.php';

    
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sellingprice = $_POST['sellingprice'];
    $count = $_POST['count'];
     
     
    if($type != null){



    $insert = $con->query("INSERT INTO `plan`(`type`, `title`, `description`, `price`, `sellingprice`, `count`)
     VALUES ('$type','$title','$description','$price','$sellingprice','$count')");
    // echo $insert;
    
 
    if($insert > 0){ 
        $rsp['status'] = "200";
        $rsp['message'] = 'Successfully Added';
        
    }
    else{
        $rsp['status'] = '204';
        $rsp['message'] = 'failed';
         
    }
    
    }else{
        echo "error";
    }
       
echo json_encode($rsp); 


?>