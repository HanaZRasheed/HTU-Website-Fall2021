<?php
require 'connect.php';
$sql="DELETE FROM employee WHERE job_title=:job";

$statement=$pdo->prepare($sql);
$new_title="Developer";
$statement->bindParam(":job",$new_title, PDO::PARAM_STR);
$statement->execute();
$pdo=null;
?>

