<?php 
        // include 'config_s.php';
        include ("../startbootstrap-landing-page-master/env/config.php");

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
        $con = mysqli_connect("localhost", "root", "", "project_test"); 
        $query = "select * from author where user_id = {$_SESSION['user_id']}";
        $result = mysqli_query($con,$query);
        // $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
          $id = $row['id'];
          $name = $row['name'];
          $title = $row['title'];
          $journal_name = $row['journal_name'];
          $volume = $row['volume'];
          $issue = $row['issue'];
          $monthP = $row['monthP'];
          $yearP = $row['yearP'];
          // $page = $row['pages'];
          $page_start = $row['page_start'];
          $page_end = $row['page_end'];
          $url = $row['url'];
          $doi = $row['doi'];
          //จัดการชื่อ
          $answer = explode(" ",$name);

          
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