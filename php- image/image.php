<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
$host='localhost';
$username='root';
$password='';
$db='login_db';

$conn=new mysqli($host,$username,$password,$db);

if($conn->connect_error){
  die ("connection fialed :" .$conn->connect_error);
}
else{
  echo "connected successfully </br>";
}

$selectSql="select * from images where id=1";
$result=$conn->query($selectSql);
if($result -> num_rows>0){
 $img= $result->fetch_assoc();
 print_r($img);
 
echo "<img src='$img[url]' >";
   // echo "id ". $img['id'] . "image  " . $img['imgName'] . " URL ". $img['url'];
}
else{
  echo "no records";
}

$conn->close();
?>
</body>
</html>