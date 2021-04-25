<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM author_test ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR title LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY name DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	// $sub_array[] = "";
	// $sub_array[] = $image;
	$sub_array[] = $row["name"];
	$sub_array[] = $row["title"];
	$sub_array[] = $row["journal_name"];
	// $sub_array[] = $row["dayP"];
	// $sub_array[] = $row["monthP"];
	$sub_array[] = $row["yearP"];
	// $sub_array[] = $row["page_start"];
	// $sub_array[] = $row["page_end"];
	// $sub_array[] = $row["volume"];
	// $sub_array[] = $row["issue"];
	// $sub_array[] = $row["yearP"];
	// $sub_array[] = $row["dayP"];
	if($row["url"]!=""){
		$sub_array[] = $row["url"];
	} else {
		$sub_array[] = $row["doi"];
	}
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning update"><i class="bi bi-pencil-square"></i></button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger delete"><i class="bi bi-trash"></i></button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>