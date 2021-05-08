<?php

// $username = 'root';
// $password = '';
// $connection = new PDO( 'mysql:host=localhost;dbname=project_test', $username, $password );

?>

<?php
	$conn = mysqli_connect("localhost", "root", "", "project_test");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>