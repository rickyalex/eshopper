<?php 
    error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
    
    $name = $_GET['name'];
    
    include('inc/commons.php');
    include('inc/functions.php');
    include('inc/productdetails_header.php');
    include('php/product_stats.php');
?>
	<section>
		<div class="container detail">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php include('php/display_category_sidebar.php'); ?>
						</div><!--/category-products-->
						                      
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-4">
							<div class="view-product">
                                <?php 
                                    include('php/display_product_details.php');  
                                ?>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="product-information"><!--/product-information-->
                                <?php if($array[$x]['date_created']>=date('Y-m-d h:i:s',strtotime("-1 months"))) { ?><img src="images/product-details/new.jpg" class="newarrival" alt="" /><?php } ?>
								<h2><?php echo $array[$x]['name']; ?></h2>
								<p>SKU: <?php echo $array[$x]['sku']; ?></p>
                                <p>Category: <?php echo $array[$x]['category']; ?></p>
								<div id="raty"></div><br />
								<span>
									<span><?php echo PREFIX_PRICE.number_format($array[$x]['price']); ?></span>
								</span>
                                
                                <div class="social-container">
                                    <?php include('php/display_social_contact.php'); ?>
                                </div>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li ><a href="#others" data-toggle="tab">Other Products</a></li>
							</ul>
						</div>
						<div class="tab-content">
                            <div class="tab-pane fade active in" id="details" >
								<?php include('php/display_product_description.php'); ?>
							</div>
							<div class="tab-pane fade in" id="others" >
								<?php include('php/display_other_items.php'); ?>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
				</div>
			</div>
            <div class="row">
                <div class="best_seller"><!--best_seller-->
                    <h2 class="title text-center">Best Seller</h2>
                    <div id="best-seller-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php include('php/display_recommended_items_index.php'); ?>
                        </div>
                        <a class="left best-seller-control" href="#best-seller-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right best-seller-control" href="#best-seller-carousel" data-slide="next">
							 <i class="fa fa-angle-right"></i>
                        </a>			
                    </div>
                </div><!--/best_seller-->
            </div>
		</div>
	</section>
	
<?php
include ('inc/footer.php'); 
?>
<script>
    var id = <?php echo $id; ?>;
    $('#raty').raty({
      score: <?php echo getItemRating($id); ?>,
      click: function(score, evt) {
        $.ajax({
            method: "POST",
            data: {score:score,id:id},
            url: "php/set_item_rating.php"
        }).done(function(result) {
            alert("Terima kasih. Anda sudah memberi rating "+result+" pada item ini");
        });
      }
    });    
</script>
</body>
</html>
