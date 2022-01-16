<?php

function checkLogin($conn){
  if(isset($_SESSION['username'])){
    $username= $_SESSION['username'];
    $query="select * from users where username = '$username'";
   // $result=$conn->query($query);
   $result= mysqli_query($conn,$query);
   if($result->num_rows>0){
     $user_data= mysqli_fetch_assoc($result);

     return $user_data;
   }
   
       header("location:login.php");
       die();
  }
}

?>