<?php
include('../bibliography/php_pdo_ajax_crud_datatables/db.php');
include('../bibliography/php_pdo_ajax_crud_datatables/function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM search 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["name"] 			= $row["a_name"];
		$output["title"] 			= $row["a_title"];
		$output["journal_name"] 	= $row["a_journal_name"];
		$output["periodical_name"]  = $row["a_periodical_name"];
		$output["dayP"] 			= $row["a_dayP"];
		$output["monthP"] 			= $row["a_monthP"];
		$output["yearP"] 			= $row["a_yearP"];
		$output["page_start"] 		= $row["a_page_start"];
		$output["page_end"] 		= $row["a_page_end"];
		$output["volume"]			= $row["a_volume"];
		$output["issue"] 			= $row["a_issue"];
		$output["url"] 				= $row["a_url"];
		$output["doi"] 				= $row["a_doi"];
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