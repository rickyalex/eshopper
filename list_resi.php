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
                    <?php /*<div class="cek-resi">
                        <span>
                            <p>Cek Nomor Resi Kamu</p>
                        </span>
                        <form method="get" action="http://www.cekresi.com" target="_BLANK">
                        <input type="text" placeholder="Masukkan no resi..." name="noresi" />
                        <input class="button-resi" type="submit" value="GO" />
                        <br />
                        </form>
                    </div>*/ ?>
                    <div class="list_resi">
                        <h1 class="title text-left"><b>List Resi</b></h1>
                        <p>
                            <?php include('php/display_list_resi.php')?>
                            
                        </p> 
                    </div>
				</div>			 		
			</div>    	  
    	</div>	
    </div><!--/#contact-page-->
	
	<?php
include ('inc/footer.php'); 
?>
</body>
</html>