<?php
/* retrieve featured items */
$array = getTestimoniImages();

$x=0;
$y=0;
$limit = 8;
/* count carousel pages */
$page=count($array)/$limit;
/* if page has decimal result, round it up */
if((count($array)%$limit)>0) $page++;
while($x < round($page)) { 
?>
<div class="item <?php if($x==0){ ?> active <?php } ?>">
    <?php 
        /* set bot and top vales */
        if($x==0) $bot=0;
        elseif($x>0) $bot = $limit*$x;
        
        $top = $limit*($x+1);
         /* set max loop value */
        if($top<count($array)) $max = $top;
        else $max = count($array);
        while($y < $max){
            $bits = explode('.',$array[$y]['img']);
    ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
				    		<a data-lightbox="<?php echo $array[$y]['id']; ?>" href="uploads/<?php echo $bits[0].'.'.$bits[1]; ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
                            
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