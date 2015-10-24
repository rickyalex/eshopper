<?php ?>
<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="companyinfoholder">
                        <div class="companyinfo">
                            <img src="images/nicholfashion_logo.png"/>
                            <p>Toko online atau online shop wanita terbaru yang mengikuti tren terkini. Kami menyediakan berbagai produk fashion wanita yang murah, berkualitas dan terpercaya</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <div class="social-footer">
<?php include('php/display_social_footer.php'); ?>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2">
                    <div class="col-sm-12">
                        <div class="serviceinfo">
                            <h2>Pembayaran Melalui</h2>
                            <img src="images/bank.jpg" width="120">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2">
                    <div class="col-sm-12">
                        <div class="serviceinfo">
                            <h2>Jasa Pengiriman</h2>
                            <img src="images/pengiriman.jpg" width="120">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2">
                    <div class="serviceinfo">
                        <h2>Jadilah Teman Kami</h2>	
                        <div class="col-sm-12">
                            <span class="social_button"><a href="https://web.facebook.com/NicholFashion-439115726292392/"><img src="images/facebook.png"></a></span>
                            <div class="clearfix"></div>
                            <span class="social_button"><a href="https://twitter.com/NicholFashion"><img src="images/twitter.png"></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>		

</footer><!--/Footer-->


<script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');</script>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script> 
<script src="js/main.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/jquery.mockjax.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/raty-2.7.0/vendor/jquery.js"></script>
<script src="js/raty-2.7.0/lib/jquery.raty.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>
<script>
    function submitSearch() {
        $.ajax({
            type: "post",
            url: "php/submitSearch.php",
            data: {"s": jQuery("#searchBox").val()},
            dataType: "text",
            success: function (data) {
                //alert(data);
                window.location.replace(data);
            }
        });
    }

    $(document).keyup(function (e) {
        e.preventDefault();
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            submitSearch();
        }
    });
    
</script>
<script>
    $('.slider-horizontal').css('width', '100%');
</script>        
<script>$.fn.raty.defaults.path = 'js/raty-2.7.0/lib/images';</script>
