<?php
require 'connect.php';
$sql="INSERT INTO employee(name,job_title,department) values (:name,:job,:department)";

$statement=$pdo->prepare($sql);
$name='Ibrahim';
$job_title='Developer';
$department='Data Science';
$statement->bindParam(":name",$name,PDO::PARAM_STR);
$statement->bindParam(":job",$job_title,PDO::PARAM_STR);
$statement->bindParam(":department",$department,PDO::PARAM_STR);
$statement->execute();
$pdo=null;
?>

