<?php 
	$server_username = "root";
	$server_password = "";
	$server_host = "localhost";
	$database = "dangky";
	$conn =mysqli_connect($server_host,$server_username,$server_password,$database) or die("Not connection database");
	mysqli_query($conn,"SET NAMES'UTF8'");
?>