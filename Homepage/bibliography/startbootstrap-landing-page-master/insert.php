<?php
$con = mysqli_connect("localhost", "root", "", "userdb1");
$id = $_POST['hidden_id'];
$b_name =implode(", ", $_POST["name"]);
$b_title = mysqli_real_escape_string($con,$_POST["titleB"]);
$b_journal_name = mysqli_real_escape_string($con,$_POST['journal_nameB']);
$b_periodical_name = $_POST['periodical_nameB'];
$b_dayP = $_POST['dayPB'];
$b_monthP = $_POST['monthPB'];
$b_yearP = $_POST['yearP'];
$b_page_start = $_POST['page_startB'];
$b_page_end = $_POST['page_endB'];
$b_volume =$_POST['volumeB'];
$b_issue = $_POST['issueB'];
$b_url = $_POST['urlB'];
$b_doi = $_POST['doiB'];
// $q="insert into author_test(name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi)
// values('$b_name', '$b_title', '$b_journal_name', '$b_periodical_name', '$b_dayP', '$b_monthP', '$b_yearP', '$b_page_start', '$b_page_end', '$b_volume', '$b_issue', '$b_url', '$b_doi')";
// mysqli_query($con, $q) or die( mysqli_error($con))
// if(mysqli_query($con, $q)){
//     echo "Data Inserted";
// } else {
//     echo "error";
//     // echo "die( mysqli_error($con))";
// }
if($id != '') {
    $q = "update author_test set name='$b_name', title='$b_title', journal_name='$b_journal_name', periodical_name='$b_periodical_name',
    dayP='$b_dayP', monthP='$b_monthP', yearP='$b_yearP', page_start='$b_page_start', page_end='$b_page_end', volume='$b_volume', 
    issue='$b_issue', url='$b_url', doi='$b_doi' where id='$id' ";
} else {
    $q = "insert into author_test(name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi)
    values('$b_name', '$b_title', '$b_journal_name', '$b_periodical_name', '$b_dayP', '$b_monthP', '$b_yearP', '$b_page_start', '$b_page_end', 
    '$b_volume', '$b_issue', '$b_url', '$b_doi')";
}
if(mysqli_query($con, $q)){
    echo "complete";
} else {
    echo "error";
    // echo "die( mysqli_error($con))";
}




?>