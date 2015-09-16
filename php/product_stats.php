<?php

$rs = $mysqli->query("UPDATE items SET views=(views+1) where id='$id'") or die(mysql_error());

?>