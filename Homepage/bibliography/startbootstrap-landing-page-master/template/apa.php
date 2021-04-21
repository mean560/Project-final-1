<?php 
        // include 'config_s.php';
        $con = mysqli_connect("localhost", "root", "", "userdb1"); 

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

          //จัดการชื่อ
          $answer = explode(" ",$name);
          // echo $answer[0][0];
          // echo $answer[1];

          // $answer = explode(" ",$name);
          // $answer2 = str_replace(",","",$answer);
          // echo $answer2[0]."_".$answer2[1]."<br/>";
          // echo $answer2[2]."_".$answer2[3]."<br/>";
          
          //print apa
          echo $answer[1].", ".$answer[0][0].". (".$yearP."). ".$title.". ".$journal_name.", ".$volume."(".$issue."), ".$page_start."-".$page_end.". ".$url."<br/>";

        }
?>