<?php
/* retrieve Item Description */
$result = getProductDetailsbyName($name);
$x=0;
?>

<div class="col-sm-12">
    <div class="product-image-wrapper">
		<div class="single-products">
	       	<div class="productinfo">
                <h2>Description</h2>
				<p><?php echo $result[$x]['description']; ?></p>
				<p>Size : <?php echo $result[$x]['size']; ?></p>
				<p>Warna : <?php echo $result[$x]['color']; ?></p>
			</div>
		</div>
    </div>
</div>