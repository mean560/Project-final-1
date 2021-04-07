<?php
//session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "project_test";

$con = mysqli_connect($host, $user, $password, $dbname, "3306");

$name = '';
$title =  '';
$journal_name =  '';
$periodical_name =  '';
$city =  '';
$dayP =  '';
$monthP =  '';
$yearP =  '';
$pages =  '';
$editor =  '';
$publisher =  '';
$edition =  '';
$volume =  '';
$issue =  '';
$short_title =  '';
$standard_num =  '';
$comment =  '';
$medium =  '';
$dayACC =  '';
$monthACC =  '';
$yearACC =  '';
$url =  '';
$doi =  '';
// $update = false;
// $title = '';
// $content = '';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 