<?php
	$db = mysqli_connect("localhost","root","","attendance");
		if(mysqli_connect_errno())
		{
			die("Error Occured" . mysqli_connect_error() . "(". mysqli_connect_errno() .")");
		}
?>