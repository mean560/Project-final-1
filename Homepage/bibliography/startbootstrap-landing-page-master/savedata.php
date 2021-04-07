<?php 

include "config_s.php";

$name = $_POST['name'];
$title = $_POST['title'];
$journal_name = $_POST['journal_name'];
$periodical_name = $_POST['periodical_name'];
$city = $_POST['city'];
$dayP = $_POST['dayP'];
$monthP = $_POST['monthP'];
$yearP = $_POST['yearP'];
$pages = $_POST['pages'];
$editor =  $_POST['editor'];
$publisher =  $_POST['publisher'];
$edition =  $_POST['edition'];
$volume =  $_POST['volume'];
$issue =  $_POST['issue'];
$short_title =  $_POST['short_title'];
$standard_num =  $_POST['standard_num'];
$comment =  $_POST['comment'];
$medium =  $_POST['medium'];
$dayACC =  $_POST['dayACC'];
$monthACC =  $_POST['monthACC'];
$yearACC =  $_POST['yearACC'];
$url =  $_POST['url'];
$doi =  $_POST['doi'];
$id_count = $_POST['id_count'];


// $stmt = $con->prepare("INSERT INTO `author1`(`title`, `journal_name`, `periodical_name`, `city`, `dayP`, `monthP`, `yearP`, `pages`)
//                         VALUES (?, ?, ?, ?, ?, ?, ?, ?)"); echo $con-> error;die;
// $stmt->bind_param("ssssssss", $title, $journal_name, $periodical_name, $city, $dayP, $monthP, $yearP, $pages);
// $stmt->execute();
// $stmt->close();


// if($_POST['id_count'] != '')  
//       {  
//            $query = "  
//            UPDATE author   
//            SET name='$name',   
//            title='$title',   
//            journal_name='$journal_name',   
//            yearACC = '$yearACC',   
//            WHERE id='".$_POST['id_count']."'";  
           
//       }  
//       else  
//       {  
 $sql= mysqli_query($con,"INSERT INTO author(name,title,journal_name,periodical_name,city,dayP,monthP,yearP,pages,editor,publisher,edition,volume,issue,short_title,standard_num,comment,medium,dayACC,monthACC,yearACC,url,doi)  VALUES('".$name."','".$title."','".$journal_name."','".$periodical_name."','".$city."','".$dayP."','".$monthP."','".$yearP."','".$pages."','".$editor."','".$publisher."','".$edition."','".$volume."','".$issue."','".$short_title."','".$standard_num."','".$comment."','".$medium."','".$dayACC."','".$monthACC."','".$yearACC."','".$url."','".$doi."')");
     // }
?>   