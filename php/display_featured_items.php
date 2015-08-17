<?php

$rs = $mysqli->query("SELECT * FROM items where active='1' and flag_featured='1' order by date_created desc limit 6") or die(mysql_error());
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
            <div class="col-sm-4">
                <div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
				    		<a href="product-details.php?id=<?php echo $array[$x]['id']; ?>"><img src="uploads/<?php echo explode('.',$array[$x]['img'])[0].'_th.'.explode('.',$array[$x]['img'])[1]; ?>" alt="" /></a>
							<h2><?php echo PREFIX_PRICE.$array[$x]['price']; ?></h2>
							<p><?php echo $array[$x]['description']; ?></p>
						</div>
                        <?php if($array[$x]['date_created']>=date('Y-m-d h:i:s',strtotime("-1 months"))) { ?><img src="images/home/new.png" class="new" alt="" /><?php } ?>
					</div>
                </div>
			</div>
<?php
    $x++;
    }
?>