<?php

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
  $username=$_POST['username'];
  $password=$_POST['password'];

  // echo $username . "   ". $password; 
  if(!empty($username) && !empty($password)){
    $query="insert into users (username, password) values ('$username','$password')";

    if($conn->query($query)===TRUE){
      header("location:login.php");
      echo "new record is inserted successfully";
      die;
    }
    else{
      "Error " .$conn->error;
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registeration </title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
<form action="" method="POST">
  <div class="reg-container"> 
  <h2>Register Here</h2>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"  required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  required> 
    <button type="submit" name="login">Register </button>
    
    <a  class="reg-link" href="login.php" > Login Here </a>
  </div>
</form>
  
</body>
</html>