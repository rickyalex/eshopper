<?php
    error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('inc/db.php');
    include('inc/functions.php');
    include('inc/commons.php');
    include('inc/listresi_header.php');
?>
	 
	 <div id="resi-page" class="container">
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
                        <div class="col-sm-6">
                            <form id="searchResi" action="#" class="form-inline">
    							<span>
    								<select id="tgl" name="tgl" class="small">
                                        <?php
                                            for($x=1;$x<=31;$x++){
                                        ?>
                                            <option value="<?php echo $x; ?>" <?php if(Date('d')==$x) echo "selected"; ?>><?php echo $x; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <select id="bln" name="bln">
                                        <?php
                                            for($x=1;$x<=12;$x++){
                                                switch($x){
                                                    case 1:
                                                        $mon = "JANUARI";
                                                        break;
                                                    case 2:
                                                        $mon = "FEBRUARI";
                                                        break;
                                                    case 3:
                                                        $mon = "MARET";
                                                        break;
                                                    case 4:
                                                        $mon = "APRIL";
                                                        break;
                                                    case 5:
                                                        $mon = "MEI";
                                                        break;
                                                    case 6:
                                                        $mon = "JUNI";
                                                        break;
                                                    case 7:
                                                        $mon = "JULI";
                                                        break;
                                                    case 8:
                                                        $mon = "AGUSTUS";
                                                        break;
                                                    case 9:
                                                        $mon = "SEPTEMBER";
                                                        break;
                                                    case 10:
                                                        $mon = "OKTOBER";
                                                        break;
                                                    case 11:
                                                        $mon = "NOVEMBER";
                                                        break;
                                                    case 12:
                                                        $mon = "DESEMBER";
                                                        break;
                                                }
                                        ?>
                                            <option value="<?php echo $x; ?>" <?php if(Date('m')==$x) echo "selected"; ?>><?php echo $mon; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <select id="thn" name="thn" class="small">
                                        <option value="<?php echo Date('Y'); ?>"><?php echo Date('Y'); ?></option>
                                    </select>
    							</span>
    							<button type="submit" >Submit</button>
                            </form><!--end form-->
                        </div><!--end col-->
                    </div><!--end list resi-->
				</div><!--end col-->			 		
			</div><!--end row-->
			<div class="row">    		
	    		<div class="col-sm-12">
					<p id="list_resi">
                            
                    </p> 
				</div><!--end col-->
			</div> <!--end row-->	  	  
    	</div><!--bg-->	
    </div><!--/#resi page-->
	
	<?php
include ('inc/footer.php'); 
?>
<script>
        $(document).ready(function () {
            
            $('#searchResi').submit(function(event){
                event.preventDefault();
                var tgl = $('select[name=tgl]').val();
                var bln = $('select[name=bln]').val();
                var thn = $('select[name=thn]').val();
                $.ajax({
                    method: "POST",
                    data: {tgl:tgl,bln:bln,thn:thn},
                    url: "php/search_resi.php"
                }).done(function(result) {
                    $('#list_resi').html(result);
                });
                
            });
        });
    </script>
</body>
</html>