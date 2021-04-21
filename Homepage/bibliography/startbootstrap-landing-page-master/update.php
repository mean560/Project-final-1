<?php

$connection = new PDO( 'mysql:host=localhost;dbname=userdb1', 'root', '' );

// include('function.php');
if(isset($_POST["author_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM author_test 
		WHERE id = '".$_POST["author_id"]."' 
		LIMIT 1"

	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
        // foreach($a as count($row["name"])){
        //     $output["name"] = $row["name"];
        // }
		$output["name"] = $row["name"];
        // $output["title"] = count($row["name"]);

        // fill($row["name"]);
		// $output["last_name"] = $row["last_name"];

	}
	echo json_encode($output);
}


// include "config_s.php";

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


	
// $edit = mysqli_query($con,"update author set name='$name' where id=2");
	


?>