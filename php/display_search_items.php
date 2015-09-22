<?php
/* define mode & content */
if($category!='') {
    $mode="category";
    $content=$category;   
}
else{
    $mode="search";
    $content=$search;   
}
    
/* get searched items */
$array = getSearchItems($mode,$content,null);


/* if no results found */
if(count($array)<=0){
?>
<div>
    <div class="col-sm-3">
        <div class="product-image-wrapper">
    		<div class="single-products">
    	       	<div class="productinfo text-center">
    				<p><?php echo "No Results"; ?></p>
    			</div>
    		</div>
        </div>
    </div>
</div>
<?php        
}
else{
    /* get page request parameter */
    $limit = 12;
    
    if($page==1) $x=0;
    elseif($page>1) $x = $limit*($page-1);
    
    $y = $limit*$page;
     
    if($y<count($array)) $max = $y;
    else $max = count($array);
    
    while($x < $max) {
	   $bits=explode('.',$array[$x]['img']);
?>
<div>
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
</div>
<?php
        $x++;
    }
    $x=0;
?>
<div style="clear: both;"></div>
<ul id="pagination" class="pagination-sm">
    
</ul>
<?php
}
?>
								