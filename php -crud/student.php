<?php
// these are needed for db connection
$host='localhost';
$username='root';
$password='';
// establish database connection
$conn=new mysqli($host,$username,$password,'db1');
if($conn->connect_error){
  die ("connection fialed :" .$conn->connect_error);
}
else{
 // echo "connected successfully </br>";
}
// these are needed to fill the input fields when edit is pressed
$id=0;
$sid='';
$studentName='';
$major=' '; 
$gpa=' ';
$update=false;


// this is to add new record 
if(isset($_POST['add'])){
$studentID=$_POST['studentID'];
$studentName=$_POST['studentName'];
$studentMajor=$_POST['major'];
$gpa=$_POST['gpa'];

 $query="INSERT INTO students( `sid`, `name`, `major`, `gpa`) VALUES ('$studentID','$studentName','$studentMajor','$gpa')";
 if ($conn->query($query) === TRUE) {
  echo '<script>alert("Student Added")</script>';
  echo '<script>window.location="student.php"</script>';
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}
}


if(isset($_GET['action'])){
  if($_GET['action']=='edit'){
    $id=$_GET['id'];
  //  echo "edit" . $id;
    $sql = "SELECT * FROM students where id='$id'";
    $result = $conn->query($sql);
    // this is need to change the save button to update
    $update=true;

if ($result->num_rows== 1) {
  $row = $result->fetch_assoc();
  
  // we store the retrieved values from the database to show them in input tags below
  $id=$row["id"];
  $sid=$row["sid"];
  $studentName=$row["name"];
  $major=$row["major"]; 
  $gpa=$row["gpa"];
  // echo $row["id"] ." ". $sid. " " .$studentName." " .$major." ". $gpa;
  
} else {
  echo "0 results";
}
  }

  // this to delete a record
  if($_GET['action']=='delete'){
    $id=$_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";

      if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Student Removed")</script>';
    echo '<script>window.location="student.php"</script>';
} else {
       echo "Error deleting record: " . $conn->error;
}
    //echo "delete" .$id;
  }
}

if(isset($_POST['edit'])){
  $recordId=$_POST['id'];
  $newSID=$_POST['studentID'];
  $newName=$_POST['studentName'];
  $newMajor=$_POST['major'];
  $newGPA=$_POST['gpa'];

  $sql = "UPDATE students set sid=$newSID, name='$newName', major='$newMajor', gpa=$newGPA WHERE id=$recordId";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
<table class="table table-border">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student No</th>
      <th scope="col">Name</th>
      <th scope="col">Major</th>
      <th scope="col">GPA</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $selectSql="select * from students";
  $result=$conn->query($selectSql);
  if($result -> num_rows>0){
    while ($row=$result->fetch_assoc()){
     echo "<tr> "?>
     <?php echo "<th scope='row'>" . $row['id'] ."</th> <td>".$row['sid']. "</td>".
      "<td>". $row['name'] ." </td> <td>" .$row ['major']. "</td> <td> ".$row ['gpa']. "</td>";
      ?>
      <td> <a class="btn btn-success" href="student.php?action=edit&id=<?php echo $row['id']; ?>"> edit  </a></td>
      <td> <a class="btn btn-danger" href="student.php?action=delete&id=<?php echo $row['id']; ?>"> delete  </a></td>   
    <?php echo "</tr>";
    } 
  }
  else{
    echo "no records";
  }
?>   
  </tbody>
</table>


<div class="container">
  <h2>New student</h2>
  <form class="form-inline" action="" method="post">
    <div class="form-group">
    <!-- hidden to store the id since we are using post method now-->  
    <input type="hidden" value="<?php echo $id;?>" name="id">
      <label for="text">student No.:</label>
      <input type="text" class="form-control" id="studentID" placeholder="Enter Student number " name="studentID"
       value="<?php echo $sid ?>">
    </div>
    <br/>
    
    <div class="form-group">
      <label for="text">student Name:</label>
      <input type="text" class="form-control" id="studentName" placeholder="Enter Student Name " name="studentName"
      value="<?php echo $studentName ?>" >
    </div>
    <br/>
    <div class="form-group">
      <label for="text">student Major:</label>
      <input type="text" class="form-control" id="major" placeholder="Enter Student Major " name="major" 
      value="<?php echo $major?>">
    </div>
    
    <br/>
    <div class="form-group">
      <label for="text">student GPA:</label>
      <input type="text" class="form-control" id="gpa" placeholder="Enter Student GPA " name="gpa" value="<?php echo $gpa?>" >
    </div>
   
    <br/>
    <?php
    if($update==true){
      echo  '<button  name="edit" type="submit" class="btn btn-primary">edit </button>';
    }
    else{
      echo  '<button  name="add" type="submit" class="btn btn-primary"> Add</button>';
    }
    ?>
  </form>
</div>
  </div>
</body>
</html>

