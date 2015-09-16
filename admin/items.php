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
		
    $xcrud = Xcrud::get_instance();
    $xcrud->table('items');
    $xcrud->table_name('Item List');
    $xcrud->columns('brand,description,color,size,category,gender,price,img,active,flag_featured,date_created');
    $xcrud->fields('brand,description,color,size,category,gender,price,active,flag_featured,img');
    $xcrud->column_tooltip('img','Recommended size is 268x249');
    //$xcrud->change_type('img','image');
    $xcrud->change_type('img', 'image', false, array(
        'path' => '../uploads',
        'thumbs' => array(array(
                'height' => 249,
                'width' => 268,
                'crop' => true,
                'marker' => '_th'))));
    $xcrud->change_type('price', 'price', '', array('prefix'=>'Rp. '));
    
    //$xcrud->validation_required('brand');
    $xcrud->validation_required('description');
    $xcrud->validation_required('category');
    $xcrud->validation_required('price');
    $xcrud->validation_required('img');
    
    $xcrud->pass_var('sku', randomNumber(12),'create');
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
