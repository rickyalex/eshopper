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
    $page = isset($_GET['p']) ? $_GET['p'] : '1';
    
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
					

						
                        <div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="150000" data-slider-step="10000" data-slider-value="[50000,100000]" id="sl2" ><br />
								 <b>Rp. 0</b> <b class="pull-right">Rp. 150.000</b><br />
                                 <button type="submit" onclick="alert($('#sl2').val());" >Submit</button>
							</div>
                            
						</div><!--/price-range-->
						
					</div>
				</div>
				<div class="col-sm-9 padding-right">
                    <?php include_once('php/display_search_items.php'); ?>
				</div>
			</div>
            <div class="row">
                <div class="new_items"><!--recommended_items-->
						<h2 class="title text-center">Best Seller</h2>
						
						<div id="new-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php include('php/display_recommended_items_index.php'); ?>
							</div>
							 <a class="left new-item-control" href="#new-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right new-item-control" href="#new-item-carousel" data-slide="next">
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
<script>
    <?php 
        $array = getSearchItems($mode,$content,null);
        $itemCount = count($array);
        $pageCount = $itemCount/$limit;
        $mod = $itemCount%$limit;        
        if($pageCount>0){
            if($mod>0) $pageCount++;
        } 
        else $pageCount = 0;                        
        if($category!=''){ ?>
            var category = '<?php echo $category; ?>';
            var url = "?".concat("cat=",category);
    <?php }
        elseif($search!=''){ ?>
            var s = '<?php echo $search; ?>';
            var url = "?".concat("s=",s);
    <?php } ?>
    $('#pagination').twbsPagination({
        totalPages: <?php echo (int) $pageCount; ?>,
        href: url.concat("&p={{number}}")
    });
</script>
</body>
</html>
