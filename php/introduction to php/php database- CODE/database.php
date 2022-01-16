<?php
// 1- establish connection 
$host='localhost';
$username='root';
$password='';

$conn=new mysqli($host,$username,$password,'db1');

if($conn->connect_error){
  die ("connection fialed :" .$conn->connect_error);
}
else{
  echo "connected successfully";
}
// 2- create database 
/*
$dbSql="create database db1";

if($conn->query($dbSql)===TRUE){
  echo "Database created successfully";
}
else{
  echo "Error in database creation " . $conn->error;
}
*/

// 3- create table
/*
$tableSql="create table users (id int AUTO_INCREMENT PRIMARY KEY, username varchar(30) not null, password varchar(30) not null) ";

if($conn->query($tableSql)===TRUE){
  echo "users table is created successfully";
}
else{
  echo "Error in creating table ". $conn->error;
}
*/

// Insert data to a table
/*
$insertSql="insert into users (username,password) values ('admin','123')";
if($conn->query($insertSql)=== true){
  echo "new record is insterted successfully";
}
else{
  echo "Error in inserting data ". $conn->error;
}
*/

$selectSql="select * from users";
$result=$conn->query($selectSql);
if($result -> num_rows>0){
  while ($row=$result->fetch_assoc()){
    echo "id ". $row['id'] . "username " . $row['username'] . "password ". $row['password'];
  }
}
else{
  echo "no records";
}

$updateSql="update users set password='1234' where username='admin'";
if($conn->query($updateSql)===True){
  echo "record is updated successfully";
}
else{
  echo "error in updating record ". $conn->error;
}

$deleteSql="delete from users where id='1'";
if($conn->query($deleteSql)===true){
  echo "record is deleted successfully";
}
else{
  echo "record is deleted successfully" . $conn->error;
}
$conn->close();
?>