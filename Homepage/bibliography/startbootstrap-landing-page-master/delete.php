
<?php 
// include "config_s.php";
$con = mysqli_connect("localhost", "root", "", "project_test");
  // $q2 = "update search s, author a 
  // set s.b_name = ''
  // where a.data_time = s.date_create"; 
  // mysqli_query($con,$q2);

  $id = $_POST['id'];
  $query = "delete from author where id=$id";
  mysqli_query($con,$query);
  

