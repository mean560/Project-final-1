<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM author_test 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["name"] 			= $row["name"];
		$output["title"] 			= $row["title"];
		$output["journal_name"] 	= $row["journal_name"];
		$output["periodical_name"]  = $row["periodical_name"];
		$output["dayP"] 			= $row["dayP"];
		$output["monthP"] 			= $row["monthP"];
		$output["yearP"] 			= $row["yearP"];
		$output["page_start"] 		= $row["page_start"];
		$output["page_end"] 		= $row["page_end"];
		$output["volume"]			= $row["volume"];
		$output["issue"] 			= $row["issue"];
		$output["url"] 				= $row["url"];
		$output["doi"] 				= $row["doi"];
		// if($row["url"]!=""){
		// 	$output["source"] = $row["url"];
		// } else {
		// 	$output["source"] = $row["doi"];
		// }
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>