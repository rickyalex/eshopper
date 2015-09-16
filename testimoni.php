<?php
    error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
    include('inc/commons.php');
    include('inc/header.php');
?>

	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">
                    <div class="list_testimoni">
                        <h1 class="title text-left"><b>Testimoni</b></h1>
                        <div class="col-sm-6">
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
    </div><!--/#contact-page-->
	
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