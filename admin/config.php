<?php 
header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept,Access-Control-Request-Method,Authorization,Cache-Control");

 $offset='+5:30';
$con=mysqli_connect("localhost","Asiangameclub","Asiangameclub@123!","Asiangameclub");
$con->query("SET time_zone='".$offset."';");
  
$baseimage="http://192.168.1.32/chain-api";

//define( 'API_ACCESS_KEY', 'AAAAzvZT-DY:APA91bH86uEX0nmW3DKrcVVfSpJ2FQ94iKyEddaDvrziiK8EaFy0D-pqGx4U9vdXulYVmdGnXbk1stfkeUQe_U2BqwJHo6zntx_OwyDNDENJsylZEtPM7lFLD9jTbgbH90NIb3EJGd2N' );
 if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
} 
//echo "Connected successfully";   


 
// echo "Connected successfully";    
?>