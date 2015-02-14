<?php

	include_once "settings.php";
    
	$connection = mysql_connect($dbsetting["host"], $dbsetting["user"], $dbsetting["pass"])
		or die("Error connection");
		
	mysql_select_db("Users", $connection);

?>