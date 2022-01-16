<?php
session_start();
if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  if ($username==='admin' && $password='123') {
      $_SESSION['username']=$username;
      $_SESSION['password']=$password;
      header("location:home.php");
      exit();
  }
  else{
    echo "invalid username or password";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<form method="post" >
  <div class="container"> 
  <h2>Login Here</h2>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"  required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  required> 
    <button type="submit" name="login">Login</button>
  </div>
</form>
</body>
</html>