<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "oak";
	$database = "db_materials";
	$conn     = mysqli_connect($hostname, $username, $password, $database);

	if(!$conn){
		echo "database no connect!";
	}
 ?>