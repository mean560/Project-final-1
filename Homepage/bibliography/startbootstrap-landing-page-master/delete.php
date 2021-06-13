
<?php 
// include "config_s.php";
$con = mysqli_connect("localhost", "root", "", "project_test");

  $id = $_POST['id'];
  $query = "delete from author where id=$id";
  mysqli_query($con,$query);