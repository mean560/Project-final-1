
<?php 
include "config_s.php";

  $id = $_POST['id'];
  $query = "delete from author_test where id=$id";
  mysqli_query($con,$query);