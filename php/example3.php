<?php

// indexed array
$courses=array("programming","FoC","Database");

array_push($courses,"website design & dev");
echo $courses[1];
echo "</br>". count($courses) ." items in the array";
$itemsNum=count($courses);
echo "</br>";
print_r($courses);


echo "<ul>";
echo "Courses ";
for($i=0; $i<$itemsNum;$i++){
  echo "<li>".  $courses[$i] ."</li>";
}
echo "</ul>";

echo "<ul>";
echo "Courses ";
foreach($courses as $course){
  echo "<li>".  $course ."</li>";
}
echo "</ul>";

// 
# Associative arrays

$grades=array("Saif"=>90, "Dania"=> 95, "Omar"=>97);

$grade2=array("Saja"=>98);

$grades=array_merge($grades,$grade2);

foreach ($grades as $grade){
  echo "</br> ". $grade;
}

$sum=0;
echo "<table border=1 cellspacing=0>";
echo "<tr> <td> student </td> <td>  grade </td> </tr>";
foreach ($grades as $student=>$grade){
  echo "<tr> <td>". $student."</td> <td> ". $grade ." </td> </tr>";
  $sum+=$grade;
}
$avg=$sum/count($grades);
echo "<tr> <td> Average </td> <td> ". $avg ." </td> </tr>";
echo "</table>";


?>