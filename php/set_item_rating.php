<?php
include('../inc/functions.php');
/* get posted item id */
$score = $_POST['score'];

$score = setItemRating($score);

die();
?>