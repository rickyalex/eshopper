<?php
	include('../inc/commons.php');
    include('../inc/functions.php');
    include(BASE_URL.'xcrud/xcrud.php');
    
    require_once("userCake/models/config.php");
    if(!securePage($_SERVER['PHP_SELF'])){die();}
    elseif(isUserLoggedIn()){    
    	if (!function_exists('xcrud_get_instance'))
    	{
    		function xcrud_get_instance($name = true)
    		{
    			return Xcrud::get_instance($name);
    		}
    	}
	
        $xcrud = Xcrud::get_instance();
        $xcrud->table('items');
        $xcrud->order_by('id','desc');
        $xcrud->table_name('Item List');
        $xcrud->columns('id,name,description,brand,color,size,category,gender,img,price,active,rating,flag_featured,flag_bestseller,date_created');
        $xcrud->fields('name,description,brand,color,size,category,gender,price,active,rating,flag_featured,flag_bestseller,img');
        $xcrud->column_tooltip('img','Recommended size is 268x249');
        $xcrud->label('flag_featured','Flag New Item');
        $xcrud->change_type('rating','select','',array('values'=>array('0','1','2','3','4','5')));
        $xcrud->change_type('img', 'image', false, array(
            'path' => '../uploads',
            'thumbs' => array(array(
                    'height' => 249,
                    'width' => 268,
                    'crop' => true,
                    'marker' => '_th'))));
        $xcrud->change_type('price', 'price', '', array('prefix'=>'Rp. '));
        
        //$xcrud->set_attr('sku',array('readOnly'=>'True','id'=>'sku'));
        
        //$xcrud->validation_required('sku');
        $xcrud->validation_required('name');
        $xcrud->validation_required('description');
        $xcrud->validation_required('category');
        $xcrud->validation_required('price');
        $xcrud->validation_required('img');
        
        //$xcrud->before_insert('update_sku');
        
        $xcrud->pass_var('sku', randomNumber(12),'create');
        $xcrud->pass_var('date_created', Date('Y-m-d h:i:s'),'create');
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
