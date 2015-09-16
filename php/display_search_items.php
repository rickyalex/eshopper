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
$array = getSearchItems($mode,$content);

$x=0;
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
    while($x < count($array)) {
	   $bits=explode('.',$array[$x]['img']);
?>
<div>
    <div class="col-sm-3">
        <div class="product-image-wrapper">
    		<div class="single-products">
    	       	<div class="productinfo text-center">
    		      	<a href="product-details.php?id=<?php echo $array[$x]['id']; ?>"><img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="" /></a>
    				<p><?php echo $array[$x]['description']; ?></p>
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
<ul class="pagination">
    <li class="active"><a href="">1</a></li>
	<li><a href="">2</a></li>
	<li><a href="">3</a></li>
	<li><a href="">&raquo;</a></li>
</ul>
<?php
}
?>
								