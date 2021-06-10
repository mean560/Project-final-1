<?php
	include "../env/config.php";

    $conn = mysqli_connect("localhost", "root", "", "project_test");



	if(isset($_POST['submitSave'])){
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        // $s_name = mysqli_real_escape_string($con,$_POST["name"]);
        $b_name = mysqli_real_escape_string($conn, implode(", ", $_POST['b_name']));
        $b_title = mysqli_real_escape_string($conn,$_POST['b_title']);
        $b_journal_name = mysqli_real_escape_string($conn,$_POST['b_journal_name']);
        $b_periodical_name = mysqli_real_escape_string($conn,$_POST['b_periodical_name']);
        $b_dayP = mysqli_real_escape_string($conn,$_POST['b_dayP']);
        $b_monthP = mysqli_real_escape_string($conn,$_POST['b_monthP']);
        $b_yearP = mysqli_real_escape_string($conn,$_POST['b_yearPB']);
        $b_page_start = mysqli_real_escape_string($conn,$_POST['b_page_start']);
        $b_page_end = mysqli_real_escape_string($conn,$_POST['b_page_end']);
        $b_volume = mysqli_real_escape_string($conn,$_POST['b_volume']);
        $b_issue = mysqli_real_escape_string($conn,$_POST['b_issue']);
        $b_url = mysqli_real_escape_string($conn,$_POST['b_url']);
        $b_doi = mysqli_real_escape_string($conn,$_POST['b_doi']);

        
        if($id != '') {
            $q = "update search set b_name='$b_name', b_title='$b_title', b_journal_name='$b_journal_name', b_periodical_name='$b_periodical_name',
            b_dayP='$b_dayP', b_monthP='$b_monthP', b_yearP='$b_yearP', b_page_start='$b_page_start', b_page_end='$b_page_end', b_volume='$b_volume', 
            b_issue='$b_issue', b_url='$b_url', b_doi='$b_doi' where id='$id' ";
        }
        if(mysqli_query($conn, $q)){
            echo "complete";
        } else {
            echo "error";
            echo "die( mysqli_error($conn))";
        }
        // echo "5555555";
		// $author_id       = $_POST['author_id'];
		// $name            = $_POST['name'];
		// $title           = $_POST['title'];
		// $journal_name    = $_POST['journal_name'];
        // $periodical_name = $_POST['periodical_name'];
        // $dayP            = $_POST['dayP'];
        // $monthP          = $_POST['monthP'];
        // $yearP           = $_POST['yearP'];
        // $page_start      = $_POST['page_start'];
        // $page_end        = $_POST['page_end'];
        // $volume          = $_POST['volume'];
        // $issue           = $_POST['issue'];
        // $url             = $_POST['url'];
        // $doi             = $_POST['doi'];
		
		// mysqli_query($conn, "UPDATE search SET b_name = '$name', b_title = '$title', b_journal_name = '$journal_name', 
        //  b_periodical_name = '$periodical_name', b_dayP = '$dayP', b_monthP = '$monthP', 
        //  b_yearP = '$yearP', b_page_start = '$page_start', b_page_end = '$page_end', 
        //  b_volume = '$volume', b_issue = '$issue', b_url = '$url',  b_doi = '$doi' WHERE id = '$id' ");

	} else {
        echo "die(mysqli_error($conn))";
    }
?>