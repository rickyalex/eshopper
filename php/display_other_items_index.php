<?php
$rs = $mysqli->query("SELECT * FROM items where active='1' and category='".$array[$i]['category']."' order by date_created desc limit 8") or die(mysql_error());
		$i=0;
		$array=array();
		while($row = $rs->fetch_array(MYSQLI_ASSOC))
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
			$i++;
		}
	$x=0;
	while($x < count($array)) {
?>

<div class="col-xs-6 col-sm-6 col-md-3">
    <div class="product-image-wrapper">
		<div class="single-products">
	       	<div class="productinfo text-center">
		      	<a href="product-details.php?name=<?php echo urlize($array[$x]['name']); ?>"><img src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="<?php echo $array[$x]['name']; ?>" /></a>
				<p><?php echo $array[$x]['description']; ?></p>
			</div>
		</div>
    </div>
</div>
<?php
        $x++;
    }
?>
								