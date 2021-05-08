<?php

if (!isset($_SESSION)) {
    session_start();
}

$host = "localhost";
$user = "root";
$password = "";
$dbname = "project_test";

$con = mysqli_connect($host, $user, $password, $dbname);
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];


$id = 0;
$update = false;
$title = '';
$description = '';
$file_name = '';
$file_directory = '';
$url = '';
$keyword = '';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// $query = "SELECT * FROM search WHERE title LIKE '%$inText%'  AND user_id = {$_SESSION['user_id']} ";
if (isset($_POST['query'])) {
    $inText = $_POST['query'];
    $query = "SELECT * FROM search WHERE user_id = {$_SESSION['user_id']} AND (title LIKE '%$inText%' OR keyword LIKE '%$inText%' OR description LIKE '%$inText%') ";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<a href=../note/note.php?edit=" . $row['id'] . " class='list-group-item list-group-item-action border-1'>" . $row['title'] . "</a>";
        }
    } else {
        echo "<p class='list-group-item border-1'>No Result</p>";
    }
}

// if (isset($_POST['search'])) {
//     $inText = $_POST['search'];
//     $query = "SELECT * FROM search WHERE title LIKE '%$inText%' AND type='search' ";
//     $result = $con->query($query);
//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             echo "<a target='_blank' href=" . $row['url'] . " class='list-group-item list-group-item-action border-1'>" . $row['title'] . "</a>";
//             // echo "<a target='_blank' href='#' class='list-group-item list-group-item-action border-1'>" . $row['title'] . "</a>";
//         }
//     } else {
//         echo "<p class='list-group-item border-1'>No Result</p>";
//     }
// }

if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];
    // $query = "DELETE FROM search WHERE id=$id";
    // $query_run = mysqli_query($con,$query);
    $result = $con->query("DELETE FROM search WHERE id=$id") or die($mysqli->error());
    echo $id;
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $con->query("SELECT * FROM search WHERE id=$id") or die($mysqli->error());
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $title = $row['title'];
        $description = $row['description'];
        $file_name  = $row['file_name'];
        $file_directory = $row['file_directory'];
        $url = $row['url'];
        $keyword = $row['keyword'];
    }
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
   
    $file_directory = $_POST['file_directory'];
    $url = $_POST['url'];
    $keyword = $_POST['keyword'];
    date_default_timezone_set('Asia/Bangkok');
    $last_update = date("Y-m-d H:i:s");


    $sql = "UPDATE search SET title='$title', description='$description', file_directory='$file_directory', url='$url',last_update='$last_update' , keyword='$keyword' WHERE id='$id'";
    $query = mysqli_query($con, $sql);
     echo $sql;
     echo $file_name;
    
}

// if (isset($_POST['submitSave'])) {
//     $id              = $_POST['id'];
//     $name            = implode(", ", $_POST['b_name']);
//     // $name            = $_POST['name'];
//     $title           = $_POST['b_title'];
//     $journal_name    = $_POST['b_journal_name'];
//     $periodical_name = $_POST['b_periodical_name'];
//     $dayP            = $_POST['b_dayP'];
//     $monthP          = $_POST['b_monthP'];
//     $yearP           = $_POST['b_yearP'];
//     $page_start      = $_POST['b_page_start'];
//     $page_end        = $_POST['b_page_end'];
//     $volume          = $_POST['b_volume'];
//     $issue           = $_POST['b_issue'];
//     $url             = $_POST['b_url'];
//     $doi             = $_POST['b_doi'];

//     $sql = "UPDATE search SET b_name = '$name', b_title = '$title', b_journal_name = '$journal_name', 
//     b_periodical_name = '$periodical_name', b_dayP = '$dayP', b_monthP = '$monthP', 
//     b_yearP = '$yearP', b_page_start = '$page_start', b_page_end = '$page_end', 
//     b_volume = '$volume', b_issue = '$issue', b_url = '$url',  b_doi = '$doi' WHERE id = '$id'";
//     $query = mysqli_query($con, $sql);

// }
