<?php
    $x=0;
    $result = $mysqli->query("select * from slider");
	while($row = $result->fetch_array()){
?>
	<div class="item <?php if($x==0)echo "active"; ?>">
	    <div class="slider_content">
            <?php /*<div class="desc">
                <h1><span><?php echo "".$row[1]; ?></span></h1>
    			<p><?php echo "".$row[2]; ?></p>
    			<button type="button" class="btn btn-default get">Get it now</button>
            </div>*/ ?>
            <img src="<?php echo "uploads/".$row[3]; ?>" class="slider_img img-responsive" alt="" />
		</div>
	</div>
<?php $x++;} ?>