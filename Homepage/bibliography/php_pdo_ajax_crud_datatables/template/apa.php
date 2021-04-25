<?php 
        // include 'config_s.php';
        $con = mysqli_connect("localhost", "root", "", "project_test"); 
        $query = "select * from author_test";
        $result = mysqli_query($con,$query);
        // $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
          $id = $row['id'];
          $name = $row['name'];
          $title = $row['title'];
          $yearP = $row['yearP'];
          $journal_name = $row['journal_name'];
          $volume = $row['volume'];
          // $page = $row['pages'];
          $page_start = $row['page_start'];
          $page_end = $row['page_end'];
          $url = $row['url'];
          $issue = $row['issue'];
          $doi = $row['doi'];

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
            echo $answer[0][0].". ";
            echo "(".$yearP."). ";
            echo $title.". ";
            echo "<i>$journal_name</i>".", ";
            if($volume != "") {
              echo $volume;
            } else {
              echo "";
            }
            if($issue!=""){
              echo "(".$issue."), ";
            } else {
              echo ", ";
            }
            if($page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else {
              echo $page_start.". ";
            }
            if($url != ""){
              echo $url;
            } else {
              echo "https://doi.org/".$doi;
            } 
            echo "<br/>";

          } else if (sizeof($answer)==4){
            echo $answer[1]." ";
            echo $answer[0][0]."., & ";
            echo $answer[3].", ";
            echo $answer[2][0].". ";
            echo "(".$yearP."). ";
            echo $title.". ";
            echo "<i>$journal_name</i>".", ";
            if($volume != "") {
              echo $volume;
            } else {
              echo "";
            }
            if($issue!=""){
              echo "(".$issue."), ";
            } else {
              echo ", ";
            }
            if($page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else {
              echo $page_start.". ";
            }            
            if($url != ""){
              echo $url;
            } else {
              echo "https://doi.org/".$doi;
            }
            echo "<br/>";

          } else if (sizeof($answer)==6){
            echo $answer[1]." ";
            echo $answer[0][0]."., ";
            echo $answer[3]." ";
            echo $answer[2][0]."., & ";
            echo $answer[5].", ";
            echo $answer[4][0].". ";
            echo "(".$yearP."). ";
            echo $title.". ";
            echo "<i>$journal_name</i>".", ";
            if($volume != "") {
              echo $volume;
            } else {
              echo "";
            }
            if($issue != ""){
              echo "(".$issue."), ";
            } else {
              echo ", ";
            }
            if($page_end != ""){
              echo $page_start."-".$page_end.". ";
            } else {
              echo $page_start.". ";
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