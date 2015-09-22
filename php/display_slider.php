<?php
    /* retrieve slider images */
    $result = getAllSlider();
    $x=0;
	while($x < count($result)){
?>
	<div class="item <?php if($x==0)echo "active"; ?>">
	    <div class="slider_content">
            <?php /*<div class="desc">
                <h1><span><?php echo "".$row[1]; ?></span></h1>
    			<p><?php echo "".$row[2]; ?></p>
    			<button type="button" class="btn btn-default get">Get it now</button>
            </div>*/ ?>
            <img src="<?php echo "uploads/".$result[$x]["img"]; ?>" class="slider_img img-responsive" alt="" />
		</div>
	</div>
<?php $x++;} ?>