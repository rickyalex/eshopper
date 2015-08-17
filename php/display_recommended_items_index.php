<?php

$rs = $mysqli->query("SELECT * FROM items order by date_created desc limit 12") or die(mysql_error());
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
	   $y=0;
?>
<div class="item <?php if($x==0){ ?> active <?php } ?>">
    <?php while($y < 3){ ?>
    <div class="col-sm-3">
        <div class="product-image-wrapper">
    		<div class="single-products">
    			<div class="productinfo text-center">
    				<a href="product-details.php?id=<?php echo $array[$y]['id']; ?>"><img src="uploads/<?php echo explode('.',$array[$y]['img'])[0].'_th.'.explode('.',$array[$y]['img'])[1]; ?>" alt="" /></a>
    				<p><?php echo $array[$y]['description']; ?></p>
    			</div>
    		</div>
        </div>
    </div>
    <?php
            $y++;
        } 
    ?>
</div>
<?php
        $x++;
    }
?>