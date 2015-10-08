<?php
include('../inc/functions.php');
/* get posted item id */
$score = $_POST['score'];
$id = $_POST['id'];

$result = setItemRating($score,$id);

echo $result;
?>