<?php

/* retrieve category bar based on limit */
$array = getCategoryBar();       
$x=0;
while($x < count($array)) {
    //$category = getItemCategory($array[$x]['id']);    
?>
    <div class="tab-pane fade <?php if($x==0){ ?>active<?php } ?> in" id="<?php echo strtolower($array[$x]['category']); ?>" >
    <?php
        /* category content default limit is 4 */
        $items = getSearchItems("category",$array[$x]['category'],null,null);        
        //$rs = $mysqli->query("SELECT * FROM items where category='".$array[$x]['category']."' and active='1' order by date_created desc limit 4") or die(mysql_error());
        //echo "SELECT * FROM items where category='".$array[$x]['category']."' and active='1' order by date_created desc limit 4";
        $i=0;
        $limit = 8;
        
         /* set max loop value */
        if($limit<count($items)) $max = $limit;
        else $max = count($items);
        
        while($i < $max)
        {
            $bits = explode('.',$items[$i]['img']);
            
?>
    <div class="col-sm-3">
        <div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<a href="produk/<?php echo urlencode($items[$i]['name']); ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="<?php echo $items[$i]['name']; ?>" /></a>
					<h2><?php echo PREFIX_PRICE.number_format($items[$i]['price']); ?></h2>
                    <p><?php echo $items[$i]['name']; ?></p>
				</div>						
			</div>
		</div>
	</div>
<?php
            $i++;
        }
?>
    </div>
<?php
    $x++;
}
?>
