<?php
include('../inc/functions.php');
/* get posted item id */

$id = $_POST['id'];

$score = getItemRating($id);

echo $score;
?>