<?php 

// include '../env/config.php';

// include('db.php');
// include('function.php');
// if(isset($_POST["operation"]))
// {
// 	if($_POST["operation"] == "Add")
// 	{
// 		$image = '';
// 		if($_FILES["user_image"]["name"] != '')
// 		{
// 			$image = upload_image();
// 		}

// 		$name = implode(", ", $_POST["name"]);
		
// 		$statement = $connection->prepare("
// 			INSERT INTO author_test_note (name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi) 
// 			VALUES (:name, :title, :journal_name, :periodical_name, :dayP, :monthP, :yearP, :page_start, :page_end, :volume, :issue, :url, :doi)
// 		");
// 		$result = $statement->execute(
// 			array(
// 				':name'				=>	$name,
// 				':title'			=>	$_POST["title"],
// 				':journal_name'		=> $_POST["journal_name"],
// 				':periodical_name'	=> $_POST["periodical_name"],
// 				':dayP'				=> $_POST["dayP"],
// 				':monthP'			=> $_POST["monthP"],
// 				':yearP'			=> $_POST["yearP"],
// 				':page_start'		=> $_POST["page_start"],
// 				':page_end'			=> $_POST["page_end"],
// 				':volume'			=> $_POST["volume"],
// 				':issue'			=> $_POST["issue"],
// 				':url'				=> $_POST["url"],
// 				':doi'				=> $_POST["doi"],
//                 // ':user_id'          => $_POST["id"]
// 				// ':image'			=>	$image
// 			)
// 		);
// 		if(!empty($result))
// 		{
// 			echo 'Data Inserted';
// 		}
// 	}
// 	if($_POST["operation"] == "Edit")
// 	{
// 		$image = '';
// 		if($_FILES["user_image"]["name"] != '')
// 		{
// 			$image = upload_image();
// 		}
// 		else
// 		{
// 			$image = $_POST["hidden_user_image"];
// 		}
		
// 		$name = implode(", ", $_POST["name"]);
// 		// $user_id = $_POST["user_id"];
// 		$statement = $connection->prepare(
// 			"UPDATE author_test_note
// 			SET name = :name, title = :title, journal_name = :journal_name, periodical_name = :periodical_name, dayP = :dayP , monthP = :monthP, yearP = :yearP, page_start = :page_start, page_end = :page_end, volume = :volume, issue = :issue, url = :url, doi = :doi WHERE id = :id "
// 		);
// 		$result = $statement->execute(
// 			array(
// 				':name'				=> $name,
// 				':title'			=> $_POST["title"],
// 				':journal_name'		=> $_POST["journal_name"],
// 				':periodical_name'	=> $_POST["periodical_name"],
// 				':dayP'				=> $_POST["dayP"],
// 				':monthP'			=> $_POST["monthP"],
// 				':yearP'			=> $_POST["yearP"],
// 				':page_start'		=> $_POST["page_start"],
// 				':page_end'			=> $_POST["page_end"],
// 				':volume'			=> $_POST["volume"],
// 				':issue'			=> $_POST["issue"],
// 				':url'				=> $_POST["url"],
// 				':doi'				=> $_POST["doi"],
// 				// ':image'			=> $image,
// 				':id'				=> $_POST["id"]			
// 			)
// 		);
// 		// echo $result;
// 		if(!empty($result))
// 		{
// 			echo 'Data Updated';
// 		} 
// 	}
// }



include '../env/config.php';

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

 $sql= mysqli_query($con,"INSERT INTO author_test_note(name,title,journal_name,periodical_name,city,dayP,monthP,yearP,pages,editor,publisher,edition,volume,issue,short_title,standard_num,comment,medium,dayACC,monthACC,yearACC,url,doi)  VALUES('".$name."','".$title."','".$journal_name."','".$periodical_name."','".$city."','".$dayP."','".$monthP."','".$yearP."','".$pages."','".$editor."','".$publisher."','".$edition."','".$volume."','".$issue."','".$short_title."','".$standard_num."','".$comment."','".$medium."','".$dayACC."','".$monthACC."','".$yearACC."','".$url."','".$doi."')");


?>

   