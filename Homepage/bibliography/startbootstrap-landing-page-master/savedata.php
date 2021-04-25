<?php 

// include "config_s.php";

// $con = mysqli_connect("localhost", "root", "", "userdb1"); 

$connect = new PDO("mysql:host=localhost;dbname=userdb1", "root", "");



    if(isset($_POST["name"])){

        $name = implode(", ", $_POST["name"]);

        $data = array(	
            // ':selectTypeOfSource' =>  "journal_aticle",
            ':name'		          =>  $name,
            ':title'              =>  $_POST["title"],
            ':journal_name'       =>  $_POST["journal_name"],
            ':periodical_name'    =>  $_POST["periodical_name"],
            ':dayP'               =>  $_POST["dayP"],
            ':monthP'             =>  $_POST["monthP"],
            ':yearP'              =>  $_POST["yearP"],
            ':page_start'         =>  $_POST["page_start"],
            ':page_end'           =>  $_POST["page_end"],
            ':volume'             =>  $_POST["volume"],
            ':issue'              =>  $_POST["issue"],
            ':url'                =>  $_POST["url"],
            ':doi'                =>  $_POST["doi"],
            ':whereCreate'        =>  "Bibliography"
        );
        print_r($data);

        // $query = "
        // INSERT INTO author_test 
        // (name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi, whereCreate) 
        // VALUES (:name, :title, :journal_name, :periodical_name, :dayP, :monthP, :yearP, :page_start, :page_end, :volume, :issue, :url, :doi, :whereCreate)
        // ";

        // $statement = $connect->prepare($query);

        // if($statement->execute($data))
        // {
        //     echo '
        //         Data Successfully Inserted
        //     ';
        // }
    }
    

// $number = count($_POST["name"]);  
// if($number > 0)  
// {  
//      for($i=0; $i<$number; $i++)  
//      {  $name = implode(", ", $_POST["name"]);
//           if(trim($_POST["name"][$i] != ''))  
//           {    //$name = implode(", ", $_POST["name"]);
//                $sql = "INSERT INTO author(name) VALUES('".mysqli_real_escape_string($con, $name[$i])."')";  
//                mysqli_query($con, $sql);  
//           }  
//      }  
//      echo "Data Inserted";  
// }  
// else  
// {  
//      echo "Please Enter Name";  
// }  

// $name = $_POST['name'];
// $title = $_POST['title'];
// $journal_name = $_POST['journal_name'];
// $periodical_name = $_POST['periodical_name'];
// $city = $_POST['city'];
// $dayP = $_POST['dayP'];
// $monthP = $_POST['monthP'];
// $yearP = $_POST['yearP'];
// $pages = $_POST['pages'];
// $editor =  $_POST['editor'];
// $publisher =  $_POST['publisher'];
// $edition =  $_POST['edition'];
// $volume =  $_POST['volume'];
// $issue =  $_POST['issue'];
// $short_title =  $_POST['short_title'];
// $standard_num =  $_POST['standard_num'];
// $comment =  $_POST['comment'];
// $medium =  $_POST['medium'];
// $dayACC =  $_POST['dayACC'];
// $monthACC =  $_POST['monthACC'];
// $yearACC =  $_POST['yearACC'];
// $url =  $_POST['url'];
// $doi =  $_POST['doi'];
// $id_count = $_POST['id_count'];


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
//  $sql= mysqli_query($con,"INSERT INTO author(name,title,journal_name,periodical_name,city,dayP,monthP,yearP,pages,editor,publisher,edition,volume,issue,short_title,standard_num,comment,medium,dayACC,monthACC,yearACC,url,doi)  VALUES('".$name."','".$title."','".$journal_name."','".$periodical_name."','".$city."','".$dayP."','".$monthP."','".$yearP."','".$pages."','".$editor."','".$publisher."','".$edition."','".$volume."','".$issue."','".$short_title."','".$standard_num."','".$comment."','".$medium."','".$dayACC."','".$monthACC."','".$yearACC."','".$url."','".$doi."')");
     // }
?>   