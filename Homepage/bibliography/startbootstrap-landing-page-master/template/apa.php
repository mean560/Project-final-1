<?php 
      include ("../startbootstrap-landing-page-master/env/config.php");

      $user_id = $_SESSION['user_id'];
      $username = $_SESSION['username'];
        // include 'config_s.php';
        $all = $_POST['all'];
        echo $all;

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
          //จัดการชื่อ
          $answer = explode(" ",$name);
          //print apa
          echo $answer[1].", ".$answer[0][0].". (".$yearP."). ".$title.". ".$journal_name.", ".$volume."(".$issue."), ".$page_start."-".$page_end.". ".$url."<br/>";

        }
?>