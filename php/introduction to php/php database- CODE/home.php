<?php
/*if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
 echo "<h1> welcome ". $username;
  echo "password ". $password ."</h1>";
 
}
*/
// echo "welcome" . $_GET['username'];
// . $_GET['username'];

session_start();
if (isset($_SESSION['username'])) {
    echo "<h1> welcome " . $_SESSION['username'] . "</h1>";
}
else{
  header("location:login.php");
}
print_r($_SESSION);
?>