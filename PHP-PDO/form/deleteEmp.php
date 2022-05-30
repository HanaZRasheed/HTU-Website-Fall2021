<?php
require 'connect.php';
$sql="DELETE FROM employee WHERE id=:id";
$id=$_GET['id'];
$statement=$pdo->prepare($sql);
$statement->bindParam(":id",$id, PDO::PARAM_INT);
$statement->execute();
$pdo=null;

echo "employee with id $id is deleted";
?>