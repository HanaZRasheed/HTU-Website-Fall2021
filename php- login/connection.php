<?php
$host="localhost";
$dbUser="root";
$dbPassword="";
$db="login_db";

$conn=mysqli_connect($host,$dbUser,$dbPassword,$db);

if($conn->connect_error){
  die("connection failed " . $conn->connect_error);
}
else{
  // echo "connected successfully";
}




?>