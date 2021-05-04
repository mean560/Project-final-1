 
  <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "project_test");  
 if(isset($_POST["author_id"]))  
 {  
      $query = "SELECT * FROM search WHERE id = '".$_POST["author_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>