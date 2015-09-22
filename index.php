<?php 
    error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
    include('inc/functions.php');
    include('inc/commons.php');
    include('inc/header.php');
?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
				
						<div class="carousel-inner">
							<?php include('php/display_slider.php'); ?>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="product-categories">
                                <span>
                                    <p>ATASAN</p>
                                </span>
    				    		<a href="shop.php?cat=atasan"><img src="images/tops.png" alt="" /></a>
    						</div>
    					</div>
                    </div>
    			</div>
                <div class="col-sm-2">
                    <div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="product-categories">
                                <span>
                                    <p>ROK</p>
                                </span>
    				    		<a href="shop.php?cat=rok"><img src="images/skirt.png" alt="" /></a>
    						</div>
    					</div>
                    </div>
    			</div>
                <div class="col-sm-2">
                    <div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="product-categories">
                                <span>
                                    <p>CELANA</p>
                                </span>
    				    		<a href="shop.php?cat=celana"><img src="images/celana.png" alt="" /></a>
    						</div>
    					</div>
                    </div>
    			</div>
                <div class="col-sm-2">
                    <div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="product-categories">
                                <span>
                                    <p>BLAZER</p>
                                </span>
    				    		<a href="shop.php?cat=blazer"><img src="images/blazer.png" alt="" /></a>
    						</div>
    					</div>
                    </div>
    			</div>
                <div class="col-sm-2">
                    <div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="product-categories">
                                <span>
                                    <p>CARDIGAN</p>
                                </span>
    				    		<a href="shop.php?cat=cardigan"><img src="images/cardigan.png" alt="" /></a>
    						</div>
    					</div>
                    </div>
    			</div>
                <div class="col-sm-2">
                    <div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="product-categories">
                                <span>
                                    <p>DRESS</p>
                                </span>
    				    		<a href="shop.php?cat=dress"><img src="images/dress.png" alt="" /></a>
    						</div>
    					</div>
                    </div>
    			</div>
            </div>
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">New Items</h2>
						<div id="featured-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php include('php/display_featured_items.php'); ?>
							</div>
							 <a class="left featured-item-control" href="#featured-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right featured-item-control" href="#featured-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>				
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
                                <?php include_once('php/display_category_bar.php'); ?>
                            </ul>
						</div>
						<div class="tab-content">
							<?php include_once('php/display_category_content.php'); ?>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Best Seller</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php include('php/display_recommended_items_index.php'); ?>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php
include ('inc/footer.php'); 
?>
</body>
</html>
