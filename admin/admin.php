<?php include('header.php'); 

################### Main_Category Row ########################
require_once('../class_lib/main_category_class.php');
$main_categ_obj= new Main_Category;
$main_categ_quantity=$main_categ_obj->main_category_view()->num_rows;

################### Sub_Category Row ########################
require_once('../class_lib/sub_category_class.php');
$sub_categ_obj= new Sub_Category;
$sub_categ_quantity=$sub_categ_obj->sub_categ_view()->num_rows;


################### Number of Products ########################
require_once('../class_lib/user_product_class.php');
$product_obj= new User_Product;
$product_quantity=$product_obj->all_product_view()->num_rows;


################### Number of Order ########################
require_once('../class_lib/checkout_class.php');
$order_obj= new CHECKOUT;
$order=$order_obj->checkout_num_invoice_id()->num_rows;


?>
<style>
	#dashboard button{
		height:100px;
		margin-bottom:25px;
	}
</style>
<!-- ================ Content Part ======================== -->

		<div class="col-md-9 col-sm-8" id="dashboard">
			<h1 class="text-center"><?php echo 'It is a Dashboard of '.$_SESSION['adm_action'];?></h1>
			<div class="row">
				<div class="col-sm-4">
					<button type="button" class="btn btn-primary btn-lg btn-block">
					Main Category <span class="badge">
						<?php if($main_categ_quantity >0){ echo $main_categ_quantity; }else { echo '0';} ?></span>
					</button>
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-primary btn-lg btn-block">
					Sub Category <span class="badge">
					<?php if($sub_categ_quantity >0){ echo $sub_categ_quantity; }else { echo '0';} ?></span>
					</button>
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-primary btn-lg btn-block">
					Products <span class="badge">
					<?php if($product_quantity >0){ echo $product_quantity; }else { echo '0';} ?></span>
					</button>
				</div>
				<div class="col-sm-4">
					<a href="order.php">
					<button type="button" class="btn btn-primary btn-lg btn-block">
					Order <span class="badge">
					<?php if($order >0){ echo $order; }else { echo '0';} ?></span>
					</button>
					</a>
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-primary btn-lg btn-block">
					Delivery <span class="badge">4</span>
					</button>
				</div>
				<div class="col-sm-4">
					<button type="button" class="btn btn-primary btn-lg btn-block">
					Customer <span class="badge">4</span>
					</button>
				</div>
			</div>
		</div>


<!-- ================ Content Part ======================== -->

