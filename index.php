<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('inc/db.php');
include('inc/functions.php');
include('inc/commons.php');
include('inc/index_header.php');
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
            <div class="category_links">
                <div class="col-sm-2">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="product-categories">
                                <span>
                                    <p>ATASAN</p>
                                </span>
                                <a href="pakaian/category/atasan"><img src="images/tops.png" alt="" /></a>
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
                                <a href="pakaian/category/rok"><img src="images/skirt.png" alt="" /></a>
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
                                <a href="pakaian/category/celana"><img src="images/celana.png" alt="" /></a>
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
                                <a href="pakaian/category/blazer"><img src="images/blazer.png" alt="" /></a>
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
                                <a href="pakaian/category/cardigan"><img src="images/cardigan.png" alt="" /></a>
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
                                <a href="pakaian/category/dress"><img src="images/dress.png" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12 padding-right">
                <div class="new_items"><!--new_items-->
                    <h2 class="title text-center"><img src="images/new_items.png" alt="" width="180px"></h2>
                    
                            <?php include('php/display_featured_items.php'); ?>
                        				
                </div><!--new_items-->

                <div class="best_seller"><!--best_seller-->
                    <h2 class="title text-center"><img src="images/best_seller.png" alt="" width="180px"></h2>
                            <?php include('php/display_recommended_items_index.php'); ?>			
                    </div>
                </div><!--/best_seller-->

                



            </div>
        </div>
    </div>
</section>

<?php
include ('inc/footer.php');
?>
</body>
</html>
