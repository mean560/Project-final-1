<?php 
        include 'config_s.php';

        $query = "select * from author";
        $result = mysqli_query($con,$query);
        // $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
          $id = $row['id'];
          $name = $row['name'];
          $title = $row['title'];
          $yearP = $row['yearP'];
          $journal_name = $row['journal_name'];
          $volume = $row['volume'];
          $pages = $row['pages'];
          $url = $row['url'];
          $issue = $row['issue'];

          //จัดการชื่อ
          $answer = explode(" ",$name);
          // echo $answer[0][0];
          // echo $answer[1];
          
          //print apa
          echo $answer[1].", ".$answer[0][0].". (".$yearP."). ".$title.". ".$journal_name.", ".$volume."(".$issue."), ".$pages.". ".$url."<br/>";

        }
?>