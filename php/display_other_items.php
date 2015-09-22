<?php
/* retrieve other items */
$array = getOtherItems($id);

$x=0;
/* loop through the array */
while($x < count($array)) {
   $bits=explode('.',$array[$x]['img']);
?>

<div class="col-sm-3">
    <div class="product-image-wrapper">
		<div class="single-products">
	       	<div class="productinfo text-center">
		      	<a href="product-details.php?id=<?php echo $array[$x]['id']; ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
				<p><?php echo $array[$x]['name']; ?></p>
			</div>
		</div>
    </div>
</div>
<?php
    $x++;
}
?>
								