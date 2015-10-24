<?php
/* retrieve product details */
$array = getProductDetailsbyName($name);
$x=0;

$bits = explode('.',$array[$x]['img']);
?>
<img src="uploads/<?php echo $bits[0].'_th.'.$bits[1]; ?>" alt="<?php echo $array[$x]['name']; ?>" />
<h3><a data-lightbox="<?php echo $array[$x]['name']; ?>" data-title="<?php echo $array[$x]['name']; ?>" href="uploads/<?php echo $bits[0].'.'.$bits[1]; ?>">ZOOM</a></h3>
