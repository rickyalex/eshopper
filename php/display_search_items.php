<?php
/* define mode & content */
if($category!='') {
    $mode="category";
    $content=$category; 
    
    if($price!='') $content2=$price;
    else $content2=null;
}
elseif($price!='')  {
    $mode="price";
    $content=$price;   
}
elseif($search!=''){
    $mode="search";
    $content=$search; 
}
else{
    /* unknown mode & content */
    $mode = '';
    $content = '';
}
    
/* get searched items */
$array = getSearchItems($mode,$content,$content2,null);


/* if no results found */
if(count($array)<=0){
?>
<div>
    <div class="col-xs-3 col-sm-3 col-md-3">
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
</div>
<?php
        $x++;
    }
    $x=0;
?>
<div style="clear: both;"></div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <ul id="pagination" class="pagination-sm">
    
    </ul>
</div>
<?php
}
?>
								
