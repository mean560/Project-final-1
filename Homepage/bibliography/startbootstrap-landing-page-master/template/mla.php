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
          $journal_name = $row['journal_name'];
          $volume = $row['volume'];
          $issue = $row['issue'];
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
          echo $answer[1].", ".$answer[0].". "."<span>\"$title.\"<span>"."<i> $journal_name</i>,";
          echo " vol. ".$volume.", no. ".$issue.", ".$yearP.", pp. ".$page_start."-".$page_end.", ".$url."<br/>";

        }
?>