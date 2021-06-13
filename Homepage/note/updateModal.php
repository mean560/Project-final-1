<?php
	include "../env/config.php";

    $conn = mysqli_connect("localhost", "root", "", "project_test");



	// if(isset($_POST['submitSave'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $b_name = mysqli_real_escape_string($conn,$_POST["b_name"]);
        // $b_name = mysqli_real_escape_string($conn,implode($_POST["b_name"]));
        // $b_name = implode(", ", $_POST['b_name']);
        $b_title = mysqli_real_escape_string($conn,$_POST['b_title']);
        $b_journal_name = mysqli_real_escape_string($conn,$_POST['b_journal_name']);
        $b_periodical_name = mysqli_real_escape_string($conn,$_POST['b_periodical_name']);
        $b_dayP = mysqli_real_escape_string($conn,$_POST['b_dayP']);
        $b_monthP = mysqli_real_escape_string($conn,$_POST['b_monthP']);
        $b_yearP = mysqli_real_escape_string($conn,$_POST['b_yearP']);
        $b_page_start = mysqli_real_escape_string($conn,$_POST['b_page_start']);
        $b_page_end = mysqli_real_escape_string($conn,$_POST['b_page_end']);
        $b_volume = mysqli_real_escape_string($conn,$_POST['b_volume']);
        $b_issue = mysqli_real_escape_string($conn,$_POST['b_issue']);
        $b_url = mysqli_real_escape_string($conn,$_POST['b_url']);
        $b_doi = mysqli_real_escape_string($conn,$_POST['b_doi']);

        date_default_timezone_set('Asia/Bangkok');
        $date_create = date("Y-m-d H:i:s");
        
        
        if($id != '') {
            $q = "update search set b_name='$b_name', b_title='$b_title', b_journal_name='$b_journal_name', b_periodical_name='$b_periodical_name',
            b_dayP='$b_dayP', b_monthP='$b_monthP', b_yearP='$b_yearP', b_page_start='$b_page_start', b_page_end='$b_page_end', b_volume='$b_volume', 
            b_issue='$b_issue', b_url='$b_url', b_doi='$b_doi' where id='$id' ";

            $q2 = "update author a, search s 
            set a.name = s.b_name, a.title = s.b_title, a.journal_name = s.b_journal_name, a.periodical_name = s.b_periodical_name,
            a.dayP = s.b_dayP, a.monthP = s.b_monthP, a.yearP = s.b_yearP, a.page_start = s.b_page_start, a.page_end = s.b_page_end,
            a.volume = s.b_volume, a.issue = s.b_issue, a.url = s.b_url, a.doi = s.b_doi
            where a.data_time = s.date_create"; 
        }
        if(mysqli_query($conn, $q)&&mysqli_query($conn, $q2)){
            echo "complete";
        } else {
            echo "error";
            echo "die( mysqli_error($conn))";
        }



?>