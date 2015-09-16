<?php
include('../inc/db.php');

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$kota = isset($_POST['kota']) ? $_POST['kota'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$date = Date('Y-m-d h:i:s');

$stmt = $mysqli->prepare("INSERT INTO testimoni(nama,kota,email,comment,date_created) VALUES(?,?,?,?,?)");

/* bind parameters for markers */
$stmt->bind_param('sssss', $nama, $kota, $email, $comment, $date);

/* execute query */
$stmt->execute();

return true;
//die("nama: ".$nama."kota: ".$kota."email: ".$email."comment: ".$comment);

?>