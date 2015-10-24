<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('inc/db.php');
include('inc/commons.php');
include('inc/functions.php');
include('inc/pakaian_header.php');

/* set GET values */
$bits = explode("/",$_SERVER['REQUEST_URI']);
//$methodURI = isset($bits[3]) ? $bits[3] : ''; //local
//$valueURI = isset($bits[4]) ? $bits[4] : ''; //local
//
//$methodURI2 = isset($bits[5]) ? $bits[5] : ''; //local
//$valueURI2 = isset($bits[6]) ? $bits[6] : ''; //local

$methodURI = isset($bits[2]) ? $bits[2] : ''; //production
$valueURI = isset($bits[3]) ? $bits[3] : ''; //production

$methodURI2 = isset($bits[4]) ? $bits[4] : ''; //production
$valueURI2 = isset($bits[5]) ? $bits[5] : ''; //production

$category = isset($_GET['cat']) ? $_GET['cat'] : '';
$search = isset($_GET['s']) ? $_GET['s'] : '';
$page = isset($_GET['p']) ? $_GET['p'] : '1';

//echo $valueURI;

if($methodURI=='category') {
    if($_GET['cat']=='all') $category = 'all';
    else $category = $valueURI;
}
elseif($_GET['cat']=='all') $category = 'all';
else $category = '';

if($methodURI=='search') $search = $valueURI; 
else $search = '';

if($methodURI=='price') $price = $valueURI; 
elseif($methodURI2=='price') $price = $valueURI2;  
else $price = '';


//die($_SERVER['REQUEST_URI']);

/* return page not found if no parameter is set */
if ($category == '' && $search == '' && $price == '') {
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
                            <button type="submit" onclick="searchByPriceRange();" >Submit</button>
                        </div>

                    </div><!--/price-range-->

                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <?php include_once('php/display_search_items.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="best_seller"><!--recommended_items-->
                <h2 class="title text-center"><img src="images/best_seller.png" alt="" width="180px"></h2>

                        <?php include('php/display_recommended_items_index.php'); ?>

            </div><!--/recommended_items-->
        </div>
    </div>
</section>

<?php
include ('inc/footer.php');
?>	
<script>
<?php
$array = getSearchItems($mode, $content, null, null);
$itemCount = count($array);
$pageCount = $itemCount / $limit;
$mod = $itemCount % $limit;
if ($pageCount > 0) {
    if ($mod > 0)
        $pageCount++;
} else
    $pageCount = 0;
if ($category != '') {
    ?>
        var category = '<?php echo $category; ?>';
        var url = "pakaian".concat("/category/", category);
<?php } elseif ($price != '') {
    ?>
        var price = '<?php echo $price; ?>';
        var url = "pakaian".concat("/price/", price);
<?php } else {
    ?>
        var s = '<?php echo $search; ?>';
        var url = "pakaian".concat("/search/", s);
<?php } ?>
    $('#pagination').twbsPagination({
        totalPages: <?php echo (int) $pageCount; ?>,
        href: url.concat("/{{number}}")
    });
    
    function searchByPriceRange(){
        //alert($('.tooltip-inner').html());
        var price_range = ($('.tooltip-inner').html()).replace(':','_');
        price_range = price_range.replace(/\s+/g, "");
        //var pathname = window.location.pathname;
        <?php if($methodURI=="category"){ ?>
        var value = "<?php echo $valueURI; ?>";
        var uri_segment = "pakaian/category/"+value;
        <?php } else { ?>
        var uri_segment = "pakaian";
        <?php }?>
        var url = uri_segment.concat("/price/",price_range);
        window.location.href = url;
        die();
    }
    
    $(document).ready(function(){
       //var price = $('.tooltip-inner').text();
    <?php if ($price != '') { ?>
           var price = '<?php echo $price; ?>';
           var preformatted_price = price.replace('_',' : ');
           //alert(formatted_price);
           $('.tooltip-inner').html(preformatted_price);
           
           formatted_price = (preformatted_price.replace(/\s+/g, "")).split(':');
           var max = $('#sl2').attr('data-slider-max');
           var min = $('#sl2').attr('data-slider-min');
           var step = $('#sl2').attr('data-slider-step');
           
           
           var counts = max/step;
           var perc = 100/counts;
           
           var begin = formatted_price[0];
           var end = formatted_price[1];
           var arr_range = '['.concat(begin,',',end,']');
           var txt_range = begin.concat(':',end);
           
           //alert(end);
           
           if(begin!=0) var left = perc * (begin/10000);
           else var left = 0;
           
           var gap = max-end;
           var gap_counts = gap/step;
           var width = 100-(perc * gap_counts);
           //alert(left);
           
           $('#sl2').attr('data-slider-value',arr_range);
           $('.tooltip-inner').text(preformatted_price);
           $('.slider-handle round left-round').css({'left':left+"%"});
           $('.slider-handle round').css({'left':width+"%"});
           
           $('.slider-selection').css({'left':left+"%"});
           $('.slider-selection').css({'width':(width-left)+"%"});
           
    <?php } ?>
       
    });
</script>
</body>
</html>
