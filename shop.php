<?php 
    error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
    include('inc/commons.php');
    include('inc/functions.php');
    include('inc/header.php');
    
    /* set GET values */
    $category = isset($_GET['cat']) ? $_GET['cat'] : '';
    $search = isset($_GET['s']) ? $_GET['s'] : '';
    //die($category);
    
    /* return page not found if no parameter is set */
    if($category==''&&$search==''){
        header('Location: 404.php');
        die();
    }
?>
	<section>
		<div class="container detail">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php include('php/display_category_sidebar.php'); ?>
						</div><!--/category-productsr-->
					
						<div class="brands_products"><!--brands_products-->
						</div><!--/brands_products-->
						
						
					</div>
				</div>
				<div class="col-sm-9 padding-right">
                    <?php include_once('php/display_search_items.php'); ?>
				</div>
			</div>
            <div class="row">
                <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
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
	</section>
	
<?php
include ('inc/footer.php'); 
?>	
</body>
</html>