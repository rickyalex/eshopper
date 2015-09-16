<?php
$rs = $mysqli->query("SELECT * FROM items WHERE id='$id'") or die(mysql_error());
$row = $rs->fetch_array(MYSQLI_ASSOC);
?>

<div class="col-sm-3">
    <div class="product-image-wrapper">
		<div class="single-products">
	       	<div class="productinfo text-center">
                <h2>Description</h2>
				<p><?php echo $row['description']; ?></p>
                <br />
			</div>
		</div>
    </div>
</div>