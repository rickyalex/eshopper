<?php
	include('../inc/commons.php');
    include('../inc/functions.php');
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
        $xcrud = Xcrud::get_instance();
        $xcrud->table('testimoni');
        $xcrud->table_name('List Testimoni');
        //$xcrud->column_tooltip('img','Recommended size is 720x252');
        $xcrud->columns('date_created',true);
        $xcrud->fields('nama,kota,comment');
        $xcrud->validation_required('nama');
        $xcrud->validation_required('kota');
        $xcrud->validation_required('comment');
        
        $xcrud->pass_var('date_created', Date('Y-m-d h:i:s'),'create');
        
        //-------------------------------------------------------------
        
        $xcrud2 = Xcrud::get_instance();
        $xcrud2->table('testimoni_images');
        $xcrud2->table_name('Testimoni Images');
        //$xcrud->column_tooltip('img','Recommended size is 720x252');
        $xcrud2->columns('date_created',true);
        $xcrud2->fields('img,active');
        $xcrud2->change_type('img', 'image', false, array(
            'path' => '../uploads',
            'thumbs' => array(array(
                    'height' => 249,
                    'width' => 268,
                    'crop' => true,
                    'marker' => '_th'))));
        $xcrud2->validation_required('img');
        
        $xcrud2->pass_var('date_created', Date('Y-m-d h:i:s'),'create');

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
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#images" data-toggle="tab">Testimoni Images</a></li>
                        <li><a href="#testimoni" data-toggle="tab">Testimoni Customer</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="images">
                            <div class="col-lg-12">
                                <?php
            						echo $xcrud2->render();
            					?>
                            </div>
                        </div>
                        <div class="tab-pane" id="testimoni">
                           <div class="col-lg-12">
                                <?php
            						echo $xcrud->render();
            					?>
                            </div>
                        </div>
                    </div>
				</div>
			</section>
		</section>
	</section>
	<?php require_once('../inc/inc_footer.php'); ?>	 
     
    </body>
</html>
