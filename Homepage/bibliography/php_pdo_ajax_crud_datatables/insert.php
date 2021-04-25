<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}

		$name = implode(", ", $_POST["name"]);
		
		$statement = $connection->prepare("
			INSERT INTO author_test (name, title, journal_name, periodical_name, dayP, monthP, yearP, page_start, page_end, volume, issue, url, doi, image) 
			VALUES (:name, :title, :journal_name, :periodical_name, :dayP, :monthP, :yearP, :page_start, :page_end, :volume, :issue, :url, :doi, :image)
		");
		$result = $statement->execute(
			array(
				':name'				=>	$name,
				':title'			=>	$_POST["title"],
				':journal_name'		=> $_POST["journal_name"],
				':periodical_name'	=> $_POST["periodical_name"],
				':dayP'				=> $_POST["dayP"],
				':monthP'			=> $_POST["monthP"],
				':yearP'			=> $_POST["yearP"],
				':page_start'		=> $_POST["page_start"],
				':page_end'			=> $_POST["page_end"],
				':volume'			=> $_POST["volume"],
				':issue'			=> $_POST["issue"],
				':url'				=> $_POST["url"],
				':doi'				=> $_POST["doi"],
				':image'			=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		
		$name = implode(", ", $_POST["name"]);
		// $user_id = $_POST["user_id"];
		$statement = $connection->prepare(
			"UPDATE author_test 
			SET name = :name, title = :title, journal_name = :journal_name, periodical_name = :periodical_name, dayP = :dayP , monthP = :monthP, yearP = :yearP, page_start = :page_start, page_end = :page_end, volume = :volume, issue = :issue, url = :url, doi = :doi, image = :image WHERE id = :id "
		);
		$result = $statement->execute(
			array(
				':name'				=> $name,
				':title'			=> $_POST["title"],
				':journal_name'		=> $_POST["journal_name"],
				':periodical_name'	=> $_POST["periodical_name"],
				':dayP'				=> $_POST["dayP"],
				':monthP'			=> $_POST["monthP"],
				':yearP'			=> $_POST["yearP"],
				':page_start'		=> $_POST["page_start"],
				':page_end'			=> $_POST["page_end"],
				':volume'			=> $_POST["volume"],
				':issue'			=> $_POST["issue"],
				':url'				=> $_POST["url"],
				':doi'				=> $_POST["doi"],
				':image'			=> $image,
				':id'				=> $_POST["user_id"]			
			)
		);
		// echo $result;
		if(!empty($result))
		{
			echo 'Data Updated';
		} 
	}
}

?>