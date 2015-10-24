<?php
/* retrieve all categories */
$array = getAllCategory();
$x=0;

/* loop through the array */
while($x < count($array)) {
?>
<div class="panel panel-default">
    <div class="panel-heading">
		<h4 class="panel-title"><a href="pakaian/category/<?php echo strtolower($array[$x]['category']); ?>"><?php echo $array[$x]['category']; ?></a></h4>
	</div>
</div>
<?php
        $x++;
    }
?>
