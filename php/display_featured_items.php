<?php
/* retrieve new items */
$array = getNewItems();
$x=0;
while($x < count($array)) {
   $bits = explode('.',$array[$x]['img']);
?>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
				    		<a href="produk/<?php echo urlencode($array[$x]['name']); ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
							<h2><?php echo PREFIX_PRICE.number_format($array[$x]['price']); ?></h2>
							<p><?php echo $array[$x]['name']; ?></p>
						</div>
                        <?php if($array[$x]['date_created']>=date('Y-m-d h:i:s',strtotime("-1 months"))) { ?><img src="images/home/new.png" class="new" alt="" /><?php } ?>
					</div>
                </div>
			</div>
   <?php
            $x++;
        }
?>
