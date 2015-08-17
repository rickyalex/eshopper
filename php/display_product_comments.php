<?php

$rs = $mysqli->query("SELECT * FROM comments where product_id='$id' order by date_created desc limit 6") or die(mysql_error());
		$i=0;
		$array=array();
		while($row = $rs->fetch_array(MYSQLI_ASSOC))
		{
			$array[$i]['id'] = $row['id'];
			$array[$i]['product_id'] = $row['product_id'];
			$array[$i]['name'] = $row['name'];
			$array[$i]['email'] = $row['email'];
			$array[$i]['comment'] = $row['comment'];
			$array[$i]['rating'] = $row['rating'];
            $array[$i]['date_created'] = $row['date_created'];
			$i++;
		}
	$x=0;
	while($x < count($array)) {

?>

<ul>
    <li><a href=""><i class="fa fa-user"></i><?php echo $array[$i]['name']; ?></a></li>
	<li><a href=""><i class="fa fa-clock-o"></i><?php echo $array[$i]['date_created']; ?></a></li>
    <li><a href=""><i class="fa fa-calendar-o"></i><?php echo $array[$i]['date_created']; ?></a></li>
</ul>
<p><?php echo $array[$i]['comment']; ?></p>

<?php 
        }
    $x++;
?>