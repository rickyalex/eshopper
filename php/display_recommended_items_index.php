<?php
/* retrieve best seller items */
$array = getRecommendedItemsIndex();

$x=0;
/* loop through the array */
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