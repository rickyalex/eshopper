<?php
/* retrieve other items */
$array = getOtherItemsbyName($name);

$x=0;
/* loop through the array */
while($x < count($array)) {
   $bits=explode('.',$array[$x]['img']);
?>

<div class="col-xs-6 col-sm-6 col-md-3">
    <div class="product-image-wrapper">
		<div class="single-products">
	       	<div class="productinfo text-center">
		      	<a href="produk/<?php echo urlencode($array[$x]['name']); ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="<?php echo $array[$x]['name']; ?>" /></a>
				<p><?php echo $array[$x]['name']; ?></p>
			</div>
		</div>
    </div>
</div>
<?php
    $x++;
}
?>
								
