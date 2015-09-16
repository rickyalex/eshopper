<?php

$rs = $mysqli->query("SELECT * FROM items where active='1' and flag_featured='1' order by date_created desc limit 8") or die(mysql_error());
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
    <?php 
        while($y < 3){
            $bits = explode('.',$array[$y]['img']);
    ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
				    		<a href="product-details.php?id=<?php echo $array[$y]['id']; ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
							<h2><?php echo PREFIX_PRICE.$array[$y]['price']; ?></h2>
							<p><?php echo $array[$y]['description']; ?></p>
						</div>
                        <?php if($array[$y]['date_created']>=date('Y-m-d h:i:s',strtotime("-1 months"))) { ?><img src="images/home/new.png" class="new" alt="" /><?php } ?>
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