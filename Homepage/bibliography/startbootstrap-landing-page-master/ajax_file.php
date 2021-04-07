<?php
include "config_s.php";

$userid = 0;
;
if(isset($_POST['userid'])){
   $userid = mysqli_real_escape_string($con,$_POST['userid']);
}
$sql = "select * from author where id=".$userid;
$result = mysqli_query($con,$sql);

$response = "<table border='0' width='70%'>";
while( $row = mysqli_fetch_array($result) ){ 
 $id = $row['id'];
 $name = $row['name'];
 $title = $row['title'];
 $journal = $row['journal_name'];
//  $city = $row['city'];
 $year = $row['yearP'];
 
 $response .= "<tr>";
 $response .= "<td>AUTHOR : </td><td>".$name."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>TITLE : </td><td>".$title."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>JOURNAL : </td><td>".$journal."</td>";
 $response .= "</tr>";

//  $response .= "<tr>";
//  $response .= "<td>City : </td><td>".$city."</td>";
//  $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>YEAR : </td><td>".$year."</td>"; 
 $response .= "</tr>";

}
$response .= "</table>";

echo $response;


exit;
