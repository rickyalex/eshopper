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
            <li <?php if($x==0) {?>class="active"<?php }?>><a href="#<?php echo strtolower($array[$x]['category']); ?>" data-toggle="tab"><?php echo $array[$x]['category']; ?></a></li>
            
<?php
    $x++;
    } 
?>            		
