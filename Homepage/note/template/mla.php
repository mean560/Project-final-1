<?php 
// $user_id = $_SESSION['user_id'];

        // include 'config_s.php';
        $con = mysqli_connect("localhost", "root", "", "project_test"); 
        $query = "select * from author_test_note";
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
          // echo $answer[0][0];
          // echo $answer[1];

          // $answer = explode(" ",$name);
          // $answer2 = str_replace(",","",$answer);
          // echo $answer2[0]."_".$answer2[1]."<br/>";
          // echo $answer2[2]."_".$answer2[3]."<br/>";
          
          //print apa
          if(sizeof($answer)==2){
            echo $answer[1].", ";
            echo $answer[0].". ";
            echo "<span>\"$title.\"<span>";
            echo "<i> $journal_name, </i> ";
            if($volume != ""){
              echo "vol. ".$volume.", ";
            } else {
              echo "";
            }
            if($issue != ""){
              echo "no. ".$issue.", ";
            } else {
              echo "";
            }
            if ($yearP != ""){
              echo $yearP.", ";
            } else {
              echo "";
            }
            if ($page_start != "" && $page_end != ""){
              echo "p. ".$page_start."-".$page_end.", ";
            } else if($monthP == ""){
              echo "p. ".$page_start.", ";
            }
            else {
              echo "";
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
            echo "<i> $journal_name, </i> ";
            if($volume != ""){
              echo "vol. ".$volume.", ";
            } else {
              echo "";
            }
            if($issue != ""){
              echo "no. ".$issue.", ";
            } else {
              echo "";
            }
            if ($yearP != ""){
              echo $yearP.", ";
            } else {
              echo "";
            }
            if ($page_start != "" && $page_end != ""){
              echo "p. ".$page_start."-".$page_end.", ";
            } else if($monthP == ""){
              echo "p. ".$page_start.", ";
            }
            else {
              echo "";
            }
            if($url != ""){
              echo $url;
            } else {
              echo "https://doi.org/".$doi;
            } 
            echo "<br/>";
          } else if(sizeof($answer)==6){
            echo $answer[1]." ";
            echo $answer[0].", et al. ";
            echo "<span>\"$title.\"<span>";
            echo "<i> $journal_name, </i> ";
            if($volume != ""){
              echo "vol. ".$volume.", ";
            } else {
              echo "";
            }
            if($issue != ""){
              echo "no. ".$issue.", ";
            } else {
              echo "";
            }
            if ($yearP != ""){
              echo $yearP.", ";
            } else {
              echo "";
            }
            if ($page_start != "" && $page_end != ""){
              echo "p. ".$page_start."-".$page_end.", ";
            } else if($monthP == ""){
              echo "p. ".$page_start.", ";
            }
            else {
              echo "";
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