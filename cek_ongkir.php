<?php
    error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
    include('inc/commons.php');
    include('inc/cekongkir_header.php');
?>
	 
	<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">
                <div class="col-sm-12">
                    <div class="cek_ongkir">
                        <iframe src="http://www.auroraku.com/util.ongkir.php" width="100%" height="175" frameborder="0" scrolling="no"></iframe>
                        <h1>Note :</h1>
                        <ol>    
                            <li>Ongkir dihitung per 1 kg</li>
                            <li>Pengiriman akan menggunakan jasa pengiriman JNE </li>
                            <li>Pengiriman dilakukan dari Jakarta, kami tidak memiliki showroom, hanya melakukan penjualan secara online</li>
                            <li>Untuk COD hanya bisa dilakukan di sekitar daerah Binus</li>
                        </ol>
                    </div>	
                    
                </div>		 		
			</div>    	  
    	</div>	
    </div><!--/#contact-page-->
	
	<?php
include ('inc/footer.php'); 
?>
    <script>
      $(document).ready(function() {
        if ($(window).width() <= 480) {
            $('.cek_ongkir iframe').css({ 'height':'172px'});
        }
      });
    </script>
</body>
</html>