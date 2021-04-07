<?php  
 //fetch.php  
 include "config_s.php";


 if(isset($_POST["id_count"]))  
 {  
      $query = "SELECT * FROM author WHERE id = '".$_POST["id_count"]."'";  
      $result = mysqli_query($con, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>