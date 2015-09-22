<?php
/* retrieve featured items */
$array = getTestimoniImages();
$x=0;
while($x < count($array)) {
   $y=0;
?>
<div class="item <?php if($x==0){ ?> active <?php } ?>">
    <?php 
        while($y < count($array)){
            $bits = explode('.',$array[$y]['img']);
    ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
				    		<a data-lightbox="<?php echo $array[$y]['id']; ?>" data-title="<?php echo $array[$y]['id']; ?>" href="uploads/<?php echo $bits[0].'.'.$bits[1]; ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
                            
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