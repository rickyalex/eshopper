<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	include('../inc/commons.php');
    include(BASE_URL.'xcrud/xcrud.php');
        
	if (!function_exists('xcrud_get_instance'))
	{
		function xcrud_get_instance($name = true)
		{
			return Xcrud::get_instance($name);
		}
	}
	
    require_once("userCake/models/config.php");
    if(!securePage($_SERVER['PHP_SELF'])){die();}
    elseif(isUserLoggedIn()){
       $db = Xcrud_db::get_instance('fashion');
	
    	$exec = $db->query("SELECT counter from counter");
    	$res = $db->result();
    	$counter = $res[0]['counter'];
    	
    	$exec = $db->query("SELECT count(*) as items from items");
    	$res = $db->result();
    	$items = $res[0]['items'];
    	
    	$exec = $db->query("SELECT count(*) as count_category from (select distinct category from items group by category) as tbl1");
    	$res = $db->result();
    	$category = $res[0]['count_category'];
    	
    	$exec = $db->query("SELECT count(*) as new from (select * from items where date_created+INTERVAL 1 WEEK > NOW()) as tbl1");
    	$res = $db->result();
    	$new = $res[0]['new']; 
    }	
	
    
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		
        <title>Administrator Page</title>
		<?php require_once('../inc/inc_header.php'); ?>
		
		<section id="main-content">
			<section class="wrapper">
				<div class="row mt">
					<div class="col-lg-12">
					<?php
						echo "Welcome, Administrator";
					?>
					</div>
				</div>
				<div class="row mt">
					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-aqua">
						<div class="inner">
						  <h3><?php echo $counter; ?></h3>
						  <p>Page Hits</p>
						</div>
						<div class="icon">
						  <i class="ion ion-bag"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
				</div>
				<div class="row mt">
					<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-yellow">
					<div class="inner">
					  <h3><?php echo $items; ?></h3>
					  <p>Items</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-red">
					<div class="inner">
					  <h3><?php echo $category; ?></h3>
					  <p>Unique Categories</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				<div class="col-lg-2 col-xs-6">
				  <!-- small box -->
				  <div class="small-box bg-purple">
					<div class="inner">
					  <h3><?php echo $new; ?></h3>
					  <p>New Items This Week</p>
					</div>
					<div class="icon">
					  <i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  </div>
				</div>
				</div>
			</section>
		</section>
	</section>
	<?php require_once('../inc/inc_footer.php'); ?>	 
     
    </body>
</html>
