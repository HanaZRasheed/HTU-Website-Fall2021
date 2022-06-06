<?php
session_start();
if(!isset($_SESSION['username']))
header("location:login.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Home</title>
    <style>
       .logout{
    color: #2da1c1;
    text-decoration: none;
    float: right;
    margin-right:10px;
        }
    </style>
</head>
<body>

<div class="alert alert-success">
Logged in successfully <?php echo $_SESSION['username'];?> 
</div>
   
    <a class="logout" href="logout.php"> logout here </a>
</body>
</html>