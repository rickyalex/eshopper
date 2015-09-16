<?php
	$mysqli = new mysqli("localhost", "root", "phpmyadmin777", "fashion") or die(mysql_error()); 
	
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	//Adds one to the counter 
    $rs = $mysqli->query("SELECT count(*) as count FROM counter") or die(mysql_error());
    if($row = $rs->fetch_array(MYSQLI_ASSOC)) $mysqli->query("UPDATE counter SET counter = counter + 1");
    else $mysqli->query("INSERT INTO counter(counter) VALUES ('1')");
?>
