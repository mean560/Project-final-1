<?php

      include ("../startbootstrap-landing-page-master/env/config.php");

      $user_id = $_SESSION['user_id'];
      $username = $_SESSION['username'];
        // include 'config_s.php';
        // $all = $_POST['id'];
        // echo $all;
        $con = mysqli_connect("localhost", "root", "", "project_test"); 
        $query = "select * from author where user_id = {$_SESSION['user_id']}";
        $result = mysqli_query($con,$query);
        // $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
          $id = $row['id'];
          $name = $row['name'];
          $title = $row['title'];
          $yearP = $row['yearP'];
          $journal_name = $row['journal_name'];
          $volume = $row['volume'];
          $page_start = $row['page_start'];
          $page_end = $row['page_end'];
          $url = $row['url'];
          $issue = $row['issue'];
          $doi = $row['doi'];

          //จัดการชื่อ
          $answer = explode(" ",$name);
          //print apa
          if(sizeof($answer)==2){
            echo $answer[1]." ";
            echo $answer[0][0].". ";
            if($yearP!=" "){
              echo "(".$yearP."). ";
            } else {
              echo "";
            }
            echo $title.". ";
            echo "<i>$journal_name</i>"."";
            if($volume != "") {
              echo ", ".$volume;
            } else {
              echo "";
            }
            if($issue!=""){
              echo "(".$issue."), ";
            } else {
              echo "";
            }
            if($page_start !="" && $page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else if($page_start !="" && $page_end == "") {
              echo $page_start.". ";
            } else{
              echo "";
            }
            if($url != "" && $doi ==""){
              echo $url;
            } else if ($url == "" && $doi !=""){
              echo "https://doi.org/".$doi;
            } else{
              echo "";
            }
            echo "<br/>";

          } else if (sizeof($answer)==4){
            echo $answer[1]." ";
            echo $answer[0][0]."., & ";
            echo $answer[3].", ";
            echo $answer[2][0].". ";
            if($yearP!=""){
              echo "(".$yearP."). ";
            } else {
              echo "";
            }            echo $title.". ";
            echo "<i>$journal_name</i>"."";
            if($volume != "") {
              echo ", ".$volume;
            } else {
              echo "";
            }
            if($issue!=""){
              echo "(".$issue."), ";
            } else {
              echo "";
            }
            if($page_start !="" && $page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else if($page_start !="" && $page_end == "") {
              echo $page_start.". ";
            } else{
              echo "";
            }
            if($url != "" && $doi ==""){
              echo $url;
            } else if ($url == "" && $doi !=""){
              echo "https://doi.org/".$doi;
            } else{
              echo "";
            }
            echo "<br/>";

          } else if (sizeof($answer)==6){
            echo $answer[1]." ";
            echo $answer[0][0]."., ";
            echo $answer[3]." ";
            echo $answer[2][0]."., & ";
            echo $answer[5].", ";
            echo $answer[4][0].". ";
            // echo "(".$yearP."). ";
            if($yearP!=""){
              echo "(".$yearP."). ";
            } else {
              echo "";
            }
            echo $title.". ";
            echo "<i>$journal_name</i>"."";
            if($volume != "") {
              echo ", " . $volume;
            } else {
              echo "";
            }
            if($issue != ""){
              echo "(".$issue."), ";
            } else {
              echo "";
            }
            if($page_start !="" && $page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else if($page_start !="" && $page_end == "") {
              echo $page_start.". ";
            } else{
              echo "";
            }
            if($url != "" && $doi ==""){
              echo $url;
            } else if ($url == "" && $doi !=""){
              echo "https://doi.org/".$doi;
            } else{
              echo "";
            }
            echo "<br/>";

          }
          echo "<br/>";

        }
        
?>