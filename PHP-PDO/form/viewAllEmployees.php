<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
</head>
<body>
<?php
require 'connect.php';
$sql="SELECT * FROM employee";
$statement=$pdo->prepare($sql);
$statement->execute();
echo "<table>";
echo "<tr>";
echo "<th> Name </th>";
echo "<th> Job </th>";
echo "<th> Department </th>";
echo "</tr>";
$data=$statement->fetchAll();
foreach($data as $row){
    echo "<tr> <td>" .$row['name']. '</td> <td> '. $row['job_title'] .' </td> <td>'. $row['department'] . '</td> <td>'; 
    echo "<td> <a href=viewEmp.php?id=".$row['id']."> edit </a> </td>" ;
    echo "<td> <a href=deleteEmp.php?id=".$row['id']."> delete </a> </td>";
    echo "</tr>";
}
echo "</table>";
$pdo=null;
?>
    
</body>
</html>