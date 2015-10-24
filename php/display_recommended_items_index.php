<?php
/* retrieve best seller items */
$array = getRecommendedItemsIndex();

$x=0;
/* loop through the array */
while($x < count($array)) {
    $bits = explode('.',$array[$x]['img']);
?>
    <div class="col-xs-4 col-sm-4 col-md-2">
        <div class="product-image-wrapper">
    		<div class="single-products">
    			<div class="productinfo text-center">
    				<a href="produk/<?php echo urlencode($array[$x]['name']); ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
    				<h2><?php echo PREFIX_PRICE.number_format($array[$x]['price']); ?></h2>
                    <p><?php echo $array[$x]['name']; ?></p>
    			</div>
    		</div>
        </div>
    </div>
    <?php
            $x++;
        }
?>
