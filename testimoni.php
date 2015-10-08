<?php
    error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
    include('inc/functions.php');
    include('inc/commons.php');
    include('inc/header.php');
?>

	 
	 <div id="testimoni-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-3">
                    <div class="left-sidebar">
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
                                <div class="panel-heading">
                            		<h4 class="panel-title"><a href="#chat" data-toggle="tab">Chat Capture</a></h4>
                                    <h4 class="panel-title"><a href="#web" data-toggle="tab">Web Testimoni</a></h4>
                            	</div>
                            </div>
						</div><!--/category-productsr-->
					
						<div class="brands_products"><!--brands_products-->
						</div><!--/brands_products-->
						
						
					</div>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="chat" >
                            <h1 class="title text-left"><b>Chat Capture</b></h1>
                            <div class="col-sm-12">
                                <?php include('php/display_testimoni_images.php'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id="web" >                        
                            <div class="col-sm-12">
                                <h1 class="title text-left"><b>Web Testimoni</b></h1>                            
                                <form id="testimoni" action="#">
        							<span>
        								<input type="text" id="nama" name="nama" placeholder="Nama Kamu"/>
        								<input type="text" id="kota" name="kota" placeholder="Kota Asal"/>
                                        <input type="email" id="email" name="email" placeholder="Email"/>
        							</span>
        							<textarea id="comment" name="comment" ></textarea>
        							<button type="submit" >Submit</button>
                                </form>
                            </div>
                            <p>
                                <?php include('php/display_list_testimoni.php')?>
                            </p> 
                        </div>
                    </div>
                </div>			 		
			</div>    	  
    	</div>	
    </div><!--/#testimoni-page-->
	
	<?php
include ('inc/footer.php'); 
?>
<script>
        $(document).ready(function () {
            
            $('#testimoni').submit(function(event){
                event.preventDefault();
                var nama = $('#nama').val();
                var kota = $('#kota').val();
                var email = $('#email').val();
                var comment = $('#comment').val();
                $.ajax({
                    method: "POST",
                    data: {nama:nama,kota:kota,email:email,comment:comment},
                    url: "php/submit_testimoni.php"
                }).done(function(result) {
                    //alert(result);
                    alert("Terima kasih banyak atas waktumu untuk mengisi testimoni :)");
                });
                
            });
        });
    </script>
</body>
</html>