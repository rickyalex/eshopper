<?php
/* retrieve category bar based on limit */
$array = getCategoryBar();
$x=0;
while($x < count($array)) {
?>
            <li <?php if($x==0) {?>class="active"<?php }?>><a href="#<?php echo strtolower($array[$x]['category']); ?>" data-toggle="tab"><?php echo $array[$x]['category']; ?></a></li>
            
<?php
    $x++;
} 
?>            		
