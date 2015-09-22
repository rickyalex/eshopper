<?php
/* retrieve featured items */
$array = getFeaturedItems();
$x=0;
while($x < count($array)) {
   $y=0;
?>
<div class="item <?php if($x==0){ ?> active <?php } ?>">
    <?php 
        while($y < 4){
            $bits = explode('.',$array[$x]['img']);
    ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
				    		<a href="product-details.php?id=<?php echo $array[$x]['id']; ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
							<h2><?php echo PREFIX_PRICE.number_format($array[$x]['price']); ?></h2>
							<p><?php echo $array[$x]['name']; ?></p>
						</div>
                        <?php if($array[$x]['date_created']>=date('Y-m-d h:i:s',strtotime("-1 months"))) { ?><img src="images/home/new.png" class="new" alt="" /><?php } ?>
					</div>
                </div>
			</div>
   <?php
            $y++;
            $x++;
        } 
   ?>
</div>
<?php
    }
?>