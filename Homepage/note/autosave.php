<?php
include "../env/config.php";
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
// $hid_id = $_POST['hid_id'];
isset($_POST['title']) ? $title = $_POST['title'] : $title = '';
isset($_POST['description']) ? $description = $_POST['description'] : $description = '';
isset($_POST['file_name']) ? $file_name = $_POST['file_name'] : $file_name = '';
isset($_POST['file_directory']) ? $file_directory = $_POST['file_directory'] : $file_directory = '';
isset($_POST['url']) ? $url = $_POST['url'] : $url = '';
isset($_POST['keyword']) ? $keyword = $_POST['keyword'] : $keyword = '';
// $b_name = mysqli_real_escape_string($con,$_POST['name']);
// $b_title = mysqli_real_escape_string($con,$_POST['titleB']);
// $b_journal_name = mysqli_real_escape_string($con,$_POST['journal_name']);
// $b_periodical_name = mysqli_real_escape_string($con,$_POST['periodical_name']);
// $b_dayP = mysqli_real_escape_string($con,$_POST['dayP']);
// $b_monthP = mysqli_real_escape_string($con,$_POST['monthP']);
// $b_yearP = mysqli_real_escape_string($con,$_POST['yearP']);
// $b_page_start = mysqli_real_escape_string($con,$_POST['page_start']);
// $b_page_end = mysqli_real_escape_string($con,$_POST['page_end']);
// $b_volume = mysqli_real_escape_string($con,$_POST['volume']);
// $b_issue = mysqli_real_escape_string($con,$_POST['issue']);
// $b_url = mysqli_real_escape_string($con,$_POST['urlB']);
// $b_doi = mysqli_real_escape_string($con,$_POST['doi']);
date_default_timezone_set('Asia/Bangkok');
$date_create = date("Y-m-d H:i:s");
$last_update = date("Y-m-d H:i:s");


$ext = strtolower(substr(strrchr($file_name, '.'), 1));
$newfilename = $user_id . $username . time() . "." . $ext;


$sql = "INSERT INTO search (title, description, file_name, file_directory,user_id,date_create, url, last_update, keyword)
        VALUES('$title', '$description', '$newfilename', '$file_directory','$user_id','$date_create','$url','$last_update','$keyword')";

$q2 = "insert into author(data_time, user_id, whereCreate)
        values('$date_create', '$user_id', 'Note')";

$query = mysqli_query($con, $sql);
$query2 = mysqli_query($con, $q2);


echo $sql;
echo $query2;


