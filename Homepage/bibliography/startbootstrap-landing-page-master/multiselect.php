<?php
  error_reporting(0);
require 'config_s.php';?>
<?php
if(isset($_POST['show_button'])) {
  if(count($_POST['ids']) > 0) {
    $all = implode(",", $_POST['ids']);
     print_r ($all); echo"<br/>";
    $sql = mysqli_query($con, "select * from author where id in ($all)");
    while($row = mysqli_fetch_array($sql)){
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
      //apa template
      if(sizeof($answer)==2){
        echo $answer[1]." ";
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
    // if($sql){
    //   echo "<script>alert('ได้ด้วยโว้ย');</script>";
    // } else {
    //   echo "<script>alert('มันต้องผิดสักที่');</script>";
    // }
  } else {
    echo "ยังไม่ได้เลือกสักช่องเลยนะ!!";
  }
}
?>