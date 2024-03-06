<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	$con=mysqli_connect("localhost","root","root","college-mg-system");
	if(!$con)
	{
		echo "Connection is not Successfully";
	}
?>