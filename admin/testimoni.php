<?php
	include('../inc/commons.php');
    include(BASE_URL.'xcrud/xcrud.php');
        
	if (!function_exists('xcrud_get_instance'))
	{
		function xcrud_get_instance($name = true)
		{
			return Xcrud::get_instance($name);
		}
	}
		
    $xcrud = Xcrud::get_instance();
    $xcrud->table('testimoni');
    $xcrud->table_name('List Testimoni');
    //$xcrud->column_tooltip('img','Recommended size is 720x252');
    //$xcrud->columns('date_created',true);
    $xcrud->fields('nama,kota,comment');
    $xcrud->validation_required('nama');
    $xcrud->validation_required('kota');
    $xcrud->validation_required('comment');
    
    $xcrud->pass_var('date_created', Date('Y-m-d h:i:s'),'create');
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
						echo $xcrud->render();
					?>
					</div>
				</div>
			</section>
		</section>
	</section>
	<?php require_once('../inc/inc_footer.php'); ?>	 
     
    </body>
</html>