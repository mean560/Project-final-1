<?php
include "../env/config.php";
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
// isset($_POST['title']) ? $title = $_POST['title'] : $title = '';
// isset($_POST['description']) ? $description = $_POST['description'] : $description = '';
isset($_POST['file_name']) ? $file_name = $_POST['file_name'] : $file_name = '';
isset($_POST['file_directory']) ? $file_directory = $_POST['file_directory'] : $file_directory = null;
// isset($_POST['url']) ? $url = $_POST['url'] : $url = '';
// isset($_POST['keyword']) ? $keyword = $_POST['keyword'] : $keyword = '';
// $file_directory = $_POST['file_directory'];

// date_default_timezone_set('Asia/Bangkok');
// $date_create = date("Y-m-d H:i:s");
// $last_update = date("Y-m-d H:i:s");


$ext = strtolower(substr(strrchr($file_name, '.'), 1));
$newfilename = $user_id . $username . time() . "." . $ext;


$sql = "INSERT INTO tmp (file_name, file_directory) VALUES('$newfilename', '$file_directory')";
$query = mysqli_query($con, $sql);
$sql ="DELETE FROM tmp WHERE file_directory = '' OR file_directory IS NULL";
$query = mysqli_query($con, $sql);

echo $sql;

?>