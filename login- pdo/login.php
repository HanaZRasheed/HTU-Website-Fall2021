<?php
session_start();
$message="";
require("connect.php");
if(isset($_POST['login'])){
    $sql="SELECT * from login where username=:username and password=:password";
    $statement=$pdo->prepare($sql);
    $username=$_POST['username'];
    $password=$_POST['password'];
    #echo $username;
    #echo $password;
    $statement->bindParam(":username",$username, PDO::PARAM_STR);
    $statement->bindParam(":password",$password, PDO::PARAM_INT);
    $statement->execute();
    $count= $statement->rowCount();
    if($count>0){
        $_SESSION['username']=$_POST['username'];
        header("location:home.php");
    }else{
        $message="Invalid user name or password";
    }
    echo $message;
    $pdo=null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="POST">
  <div class="login-container"> 
  <h2>Login Here</h2>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"  required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  required> 
    <button  id="login-btn" type="submit" name="login">Login</button>
    
    <a  class="reg-link" href="register.php" > Register Here </a>
  </div>
</form>
</body>
</html>