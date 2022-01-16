<?php

session_start();
// to connect with the database
include ("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD']=='POST'){
  $username=$_POST['username'];
  $password=$_POST['password'];

//   echo $username . "   ". $password;
if(!empty($username) && !empty($password)){

  // sql command
  $query="select username,password from users where username= '$username'";
  // execute and store result
  $result= mysqli_query($conn,$query);

  // check if there is a result
  if($result->num_rows>0){
    $user_data=mysqli_fetch_assoc($result);
    if($user_data['password']=== $password){
      // print_r($user_data);
    $_SESSION['username']=$user_data['username'];
     header("location: index.php");
     die;
    }
    else{
        echo "invalid username or password - incorrect password ";
    }
  }
  else{
    echo "invalid username or password- incorrect username and password";
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
  <title>Document</title>
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
    
    <a  class="reg-link" href="signup.php" > Register Here </a>
  </div>
</form>
</body>
</html>