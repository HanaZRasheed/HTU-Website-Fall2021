<?php

session_start();

// database connection 
include("connection.php");
include("functions.php");


$user_data=checkLogin($conn);
if(!isset($_SESSION['username'])){
header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php echo "<h2> Hello ".$user_data['username'] . "</h2>" ?>
  <a href="logout.php"> Logout </a>
</body>
</html>