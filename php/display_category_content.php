<?php

$rs = $mysqli->query("SELECT distinct category FROM items where active='1' order by date_created desc limit 6") or die(mysql_error());
$i=0;
$array=array();
while($row = $rs->fetch_array(MYSQLI_ASSOC))
{
	$array[$i]['category'] = $row['category'];
	$i++;
}
        
$x=0;
while($x < count($array)) {
    
?>
    <div class="tab-pane fade <?php if($x==0){ ?>active<?php } ?> in" id="<?php echo strtolower($array[$x]['category']); ?>" >
    <?php
        $rs = $mysqli->query("SELECT * FROM items where category='".$array[$x]['category']."' and active='1' order by date_created desc limit 4") or die(mysql_error());
        //echo "SELECT * FROM items where category='".$array[$x]['category']."' and active='1' order by date_created desc limit 4";
        $i=0;
        $items=array();
        while($row = $rs->fetch_array(MYSQLI_ASSOC))
        {
        	$items[$i]['id'] = $row['id'];
			$items[$i]['description'] = $row['description'];
			$items[$i]['brand'] = $row['brand'];
			$items[$i]['price'] = $row['price'];
			$items[$i]['category'] = $row['category'];
			$items[$i]['active'] = $row['active'];
			$items[$i]['img'] = $row['img'];
			$items[$i]['flag_featured'] = $row['flag_featured'];
            $items[$i]['date_created'] = $row['date_created'];
            
?>
    <div class="col-sm-3">
        <div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<a href="product-details.php?id=<?php echo $items[$i]['id']; ?>"><img src="uploads/<?php echo explode('.',$items[$i]['img'])[0].'_th.'.explode('.',$items[$i]['img'])[1]; ?>" alt="" /></a>
					<p><?php echo $items[$i]['description']; ?></p>
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