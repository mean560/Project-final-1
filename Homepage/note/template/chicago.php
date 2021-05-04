<?php 
// $user_id = $_SESSION['user_id'];

        // include 'config_s.php';
        $con = mysqli_connect("localhost", "root", "", "project_test"); 
        $query = "select * from search where id = $id";
        $result = mysqli_query($con,$query);
        // $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
          $id = $row['id'];
          $name = $row['b_name'];
          $title = $row['b_title'];
          $journal_name = $row['b_journal_name'];
          $volume = $row['b_volume'];
          $issue = $row['b_issue'];
          $monthP = $row['b_monthP'];
          $yearP = $row['b_yearP'];
          // $page = $row['pages'];
          $page_start = $row['b_page_start'];
          $page_end = $row['b_page_end'];
          $url = $row['b_url'];
          $doi = $row['b_doi'];
          //จัดการชื่อ
          $answer = explode(" ",$name);
          // echo $answer[0][0];
          // echo $answer[1];

          // $answer = explode(" ",$name);
          // $answer2 = str_replace(",","",$answer);
          // echo $answer2[0]."_".$answer2[1]."<br/>";
          // echo $answer2[2]."_".$answer2[3]."<br/>";
          
          if(sizeof($answer)==2){
            echo $answer[1].", ";
            echo $answer[0].". ";
            echo "<span>\"$title.\"<span>";
            echo "<i> $journal_name </i>";
            if($volume != "") {
              echo $volume.", ";
            } else {
              echo "";
            }
            if($issue!=""){
              echo "no. ".$issue." ";
            } else {
              echo ", ";
            }
            echo "(".$yearP."): ";
            if($page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else {
              echo $page_start.", ";
            } 
            if($url != ""){
              echo $url;
            } else {
              echo "https://doi.org/".$doi;
            }
            echo "<br/>";
          }
          else if(sizeof($answer)==4){
            echo $answer[1]." ";
            echo $answer[0].", and ";
            echo $answer[3]." ";
            echo $answer[2][0].". ";
            echo "<span>\"$title.\"<span>";
            echo "<i> $journal_name </i>";
            if($volume != "") {
              echo $volume.", ";
            } else {
              echo "";
            }
            if($issue!=""){
              echo "no. ".$issue." ";
            } else {
              echo ", ";
            }
            echo "(".$yearP."): ";
            if($page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else {
              echo $page_start.", ";
            } 
            if($url != ""){
              echo $url;
            } else {
              echo "https://doi.org/".$doi;
            }
            echo "<br/>";
          }
          else if(sizeof($answer)==6){
            echo $answer[1]." ";
            echo $answer[0].", ";
            echo $answer[3]." ";
            echo $answer[2][0].", and ";
            echo $answer[5].", ";
            echo $answer[4][0].". ";
            echo "<span>\"$title.\"<span>";
            echo "<i> $journal_name </i>";
            if($volume != "") {
              echo $volume.", ";
            } else {
              echo "";
            }
            if($issue!=""){
              echo "no. ".$issue." ";
            } else {
              echo ", ";
            }
            echo "(".$yearP."): ";
            if($page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else {
              echo $page_start.", ";
            } 
            if($url != ""){
              echo $url;
            } else {
              echo "https://doi.org/".$doi;
            }
            echo "<br/>";
          }
          echo "<br/>";

        }
?>