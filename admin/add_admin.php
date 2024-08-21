<?php include('header.php'); ?>
<?php 
	if($_SESSION['adm_action']=='admin'){
			header('Location: admin.php');
		}
?>
<!-- ================ Content Part ======================== -->
		<div class="col-md-9 col-sm-8">
<?php
############### Add Admin Insert ################
if(isset($_POST['add_asubmit']) && !empty($_POST['add_arole']) && !empty($_POST['add_aname']) && !empty($_POST['add_aemail']) && !empty($_POST['add_apwd']) ){
	//print_r($_POST);
	
	require_once('../class_lib/add_admin_class.php');
	$add_admin_obj=new Add_Admin;
	$add_admin_obj->admin_insert($_POST);
	
}else{
	
	if(isset($_POST['add_asubmit'])){
		echo '<div class="alert alert-danger text-center"> Please Enter All filleds to make a new Admin..</div>';
	
	}
}
?>
			<div class="col-sm-offset-2 col-sm-8 col-xs-12">
				  <h2 class="alert alert-info text-center">Add Admin</h2>
				  <form method="post">
					<div class="form-group">
						<label for="admin_role">Admin Role:</label>
						<select name="add_arole" class="form-control" id="admin_role">
						  <option value="" >-- Choose Admin Role --</option>
						  <?php
								$admin_role=array('root_admin'=>'Root Admin','admin'=>'Admin','operator'=>'Operator');
								
								foreach($admin_role as $admin_rolev=>$admin_rolen){
									echo '<option value="'.$admin_rolev.'">'.$admin_rolen.'</option>';
								}
						  ?>
						</select>
					</div>
					<div class="form-group">
					  <label for="name">Admin Name:</label>
					  <input type="text" class="form-control" id="name" placeholder="Enter Admin Name" name="add_aname">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="email" class="form-control" id="email" placeholder="Enter email" name="add_aemail">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="add_apwd">
					</div>
					<button type="submit" class="btn btn-info" name="add_asubmit">Submit</button>
				  </form>
			</div>
		</div>
	

<!-- ================ Content Part ======================== -->
