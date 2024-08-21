<?php include('header.php'); ?>

<!-- ================ Content Part ======================== -->
		<div class="col-md-9 col-sm-8">
<?php
############### Main Category Name Insert ################
if(isset($_POST['add_mcsubmit']) && !empty($_POST['add_mcname'])){
	//print_r($_POST);
	
	require_once('../class_lib/main_category_class.php');
	$main_categ_obj=new Main_Category;
	$main_categ_obj->main_category_insert($_POST);
	
}else{
	
	if(isset($_POST['add_mcsubmit'])){
		echo '<div class="alert alert-danger text-center"> Please Enter Main Category Name..</div>';
	
	}
}
?>		  <!-- ============== Main Category Table ================= -->
		  <div class="row" style="margin-bottom:25px;">
			<div class="col-sm-offset-2 col-sm-8 col-xs-12">
				  <h2 class="alert alert-info text-center">Add Main Category</h2>
				  <form method="post">
					<div class="form-group">
					  <label for="name">Main Category Name:</label>
					  <input type="text" name="add_mcname" class="form-control" id="name" placeholder="Enter Main Category Name" >
					</div>
					<button type="submit" class="btn btn-info" name="add_mcsubmit">Submit</button>
				  </form>
			</div>
		  </div>
		  
		  <!-- ============== Sub Category Table ================= -->
		  <div class="row">
<?php
require_once('../class_lib/main_category_class.php');
$main_categ_obj=new Main_Category;
$main_categ_view=$main_categ_obj->main_category_view();
?>
<?php

#########################################################
############### Sub Category Name Insert ################
if(isset($_POST['add_scsubmit'])){

	if(!empty($_POST['s_main_category']) && !empty($_POST['add_scname'])){
		//print_r($_POST);	
		require_once('../class_lib/sub_category_class.php');
		$sub_categ_obj=new Sub_Category;
		$sub_categ_obj->sub_category_insert($_POST);
	}else{
		echo '<div class="alert alert-danger text-center"> Please filled Sub Category / Choose Main Category Name..</div>';
	}
	
}
?>

			<div class="col-sm-offset-2 col-sm-8 col-xs-12">
				  <h2 class="alert alert-warning text-center">Add Sub Category</h2>
				  <form method="post">
					<div class="form-group">
						<label for="s_main_category">Choose Main Category:</label>
						<select name="s_main_category" class="form-control" id="s_main_category">
						  <option value="" >-- Main Category Name --</option>
						  <?php
								while($main_categ_data=$main_categ_view->fetch_assoc()){
										$main_categ_name= $main_categ_data['main_categ_name'];
										$main_categ_id= $main_categ_data['sl_id'];
									?>
									<option value="<?php echo $main_categ_id; ?>" >
										<?php echo $main_categ_name; ?>
									</option>
									<?php
									
								}// main while
								
						  ?>
						</select>
					</div>
					<div class="form-group">
					  <label for="s_name">Sub Category Name:</label>
					  <input type="text" name="add_scname" class="form-control" id="s_name" placeholder="Enter Sub Category Name" >
					</div>
					<button type="submit" class="btn btn-success" name="add_scsubmit">Submit</button>
				  </form>
			</div>
			
		  </div>
		  
		</div>
	

<!-- ================ Content Part ======================== -->

