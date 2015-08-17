<?php

$rs = $mysqli->query("SELECT * FROM items where id='$id'") or die(mysql_error());
$i=0;
$array=array();
if($row = $rs->fetch_array(MYSQLI_ASSOC))
{
			$array[$i]['id'] = $row['id'];
			$array[$i]['description'] = $row['description'];
			$array[$i]['brand'] = $row['brand'];
			$array[$i]['price'] = $row['price'];
			$array[$i]['category'] = $row['category'];
			$array[$i]['active'] = $row['active'];
			$array[$i]['img'] = $row['img'];
			$array[$i]['flag_featured'] = $row['flag_featured'];
            $array[$i]['date_created'] = $row['date_created'];
}
else header('404.php')
?>