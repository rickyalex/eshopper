<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/commons.php');
	require_once("userCake/models/config.php");
	if (!securePage($_SERVER['PHP_SELF'])){die();}
	require_once("userCake/models/header.php");
	
	echo "
	<body>
	<div id='wrapper'>
	<div id='top'><div id='logo'></div></div>
	<div id='content'>
	<h1>UserCake</h1>
	<h2>2.00</h2>
	<div id='left-nav'>";
	include("left-nav.php");

	echo "
	</div>
	<div id='main'>

	<p>
	CONTENT OF YOUR FIRST PAGE
	</p>

	</div>
	<div id='bottom'></div>
	</div>
	</body>
	</html>";
?>
