<?php
	$host="localhost:3306";
	$username="root";
	$password="";
	$db="demo";
	$conn= mysqli_connect($host,$username,$password,$db);
	if (!$conn) {
		die("".mysqli_connect_error());
	}
?>
