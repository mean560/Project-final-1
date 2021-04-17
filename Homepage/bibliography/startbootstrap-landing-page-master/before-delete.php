
<?php 
include "config_s.php";

$id = 0;
if(isset($_POST['id'])){
   $id = mysqli_real_escape_string($con,$_POST['id']);
}
if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($con,"SELECT * FROM author WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record

    // $sql = "INSERT INTO tash SELECT * FROM author WHERE id=".$id;
    // mysqli_query($con, $sql);

    $query = "DELETE FROM author WHERE id=".$id;
    mysqli_query($con,$query);
    echo 1;
    exit;
  }else{
    echo 0;
    exit;
  }
}

echo 0;
exit;