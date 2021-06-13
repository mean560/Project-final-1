<?php
// require  ("env/config.php");
// C:\xampp\htdocs\Project-final-1\Homepage\bibliography\startbootstrap-landing-page-master\env\config.php
include ("../startbootstrap-landing-page-master/env/config.php");

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$conn = mysqli_connect("localhost", "root", "", "project_test");


$id = $_POST['hidden_id'];
$b_name =implode(", ", $_POST["name"]);
$b_title = mysqli_real_escape_string($con,$_POST["titleB"]);
$b_journal_name = mysqli_real_escape_string($con,$_POST['journal_nameB']);
$b_periodical_name = mysqli_real_escape_string($con,$_POST['periodical_nameB']);
$b_dayP = mysqli_real_escape_string($con,$_POST['dayPB']);
$b_monthP = mysqli_real_escape_string($con,$_POST['monthPB']);
$b_yearP = mysqli_real_escape_string($con,$_POST['yearPB']);
$b_page_start = mysqli_real_escape_string($con,$_POST['page_startB']);
$b_page_end = mysqli_real_escape_string($con,$_POST['page_endB']);
$b_volume = mysqli_real_escape_string($con,$_POST['volumeB']);
$b_issue = mysqli_real_escape_string($con,$_POST['issueB']);
$b_url = mysqli_real_escape_string($con,$_POST['urlB']);
$b_doi = mysqli_real_escape_string($con,$_POST['doiB']);


// $q="insert into author_test(user_id, name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi)
// values('$user_id', '$b_name', '$b_title', '$b_journal_name', '$b_periodical_name', '$b_dayP', '$b_monthP', '$b_yearP', '$b_page_start', '$b_page_end', '$b_volume', '$b_issue', '$b_url', '$b_doi')";
// // mysqli_query($con, $q) or die( mysqli_error($con))
// if(mysqli_query($conn, $q)){
//     echo "Data Inserted";
// } else {
//     echo "error";
//     echo "die( mysqli_error($con))";
// }

if($id != '') {
    $q = "update author_test set name='$b_name', title='$b_title', journal_name='$b_journal_name', periodical_name='$b_periodical_name',
    dayP='$b_dayP', monthP='$b_monthP', yearP='$b_yearP', page_start='$b_page_start', page_end='$b_page_end', volume='$b_volume', 
    issue='$b_issue', url='$b_url', doi='$b_doi' where id='$id' ";

    $q2 = "update author set name='$b_name', title='$b_title', journal_name='$b_journal_name', periodical_name='$b_periodical_name',
    dayP='$b_dayP', monthP='$b_monthP', yearP='$b_yearP', page_start='$b_page_start', page_end='$b_page_end', volume='$b_volume', 
    issue='$b_issue', url='$b_url', doi='$b_doi' where id='$id' ";

} else {
    $q = "insert into author_test(user_id, name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi)
    values('$user_id', '$b_name', '$b_title', '$b_journal_name', '$b_periodical_name', '$b_dayP', '$b_monthP', '$b_yearP', '$b_page_start', '$b_page_end', 
    '$b_volume', '$b_issue', '$b_url', '$b_doi')";

    $q2 = "insert into author(user_id, name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi, whereCreate)
    values('$user_id', '$b_name', '$b_title', '$b_journal_name', '$b_periodical_name', '$b_dayP', '$b_monthP', '$b_yearP', '$b_page_start', '$b_page_end', 
    '$b_volume', '$b_issue', '$b_url', '$b_doi', 'Bibliography')";
}
if(mysqli_query($conn, $q)&&mysqli_query($conn, $q2)){
    echo "complete";
} else {
    echo "error";
    echo "die( mysqli_error($con))";
}




?>