<?php include('header.php'); 

?>

<!-- ================ Content Part ======================== -->
		<div class="col-md-9 col-sm-8">
<?php
################## product insert 
if(isset($_POST['prod_submit'])){
	if(!empty($_POST['prod_category']) && !empty($_FILES['prod_img']['name']) && !empty($_POST['prod_name']) && !empty($_POST['prod_price']) && !empty($_POST['prod_avail'])){
		require_once('../class_lib/product_class.php');
		$product_obj= new All_Product;
		$product_obj->product_insert($_POST);
	}else{
		echo '<div class="alert alert-danger text-center"> Please fill all fields for product Inserting</div>';
	}
}
################## Product Serial Id #############
require_once('../class_lib/product_class.php');
$product_id_obj= new All_Product;
$product_id=$product_id_obj->prod_serial_id();
//echo $product_id;
?>			
			<div class="col-sm-offset-2 col-sm-8 col-xs-12">
				  <h2 class="alert alert-warning text-center">Add Product</h2>
			<!-- ============== Form Insert =================== -->
				  <form method="post" enctype="multipart/form-data">
						<input class="sr-only" id="product_sl" value="<?php echo $product_id; ?>">
					<div class="form-group">
						<label for="prod_category">Choose Product Category:</label>
						<select name="prod_category" class="form-control" id="prod_category">
						  <option value="" >-- Product Category Name --</option>
<?php
require_once('../class_lib/main_category_class.php');
$main_categ_obj=new Main_Category;
$main_categ_view=$main_categ_obj->main_category_view();
		while($main_categ_data=$main_categ_view->fetch_assoc()){
				$main_categ_name= $main_categ_data['main_categ_name'];
				$main_categ_id= $main_categ_data['sl_id'];
			?>
			<option style="background-color:lightgray;" disabled>
				<?php echo $main_categ_name; ?>
			</option>
			<?php
			##################### View Sub_Category
				require_once('../class_lib/sub_category_class.php');
				$sub_categ_obj=new Sub_Category;
				$sub_categ_view=$sub_categ_obj->sub_categ_view_main($main_categ_id);
					while($sub_categ_data=$sub_categ_view->fetch_assoc()){
					$sub_categ_name= $sub_categ_data['sub_categ_name'];
					$sub_categ_id= $sub_categ_data['sl_id'];
				?>
				<option value="<?php echo $main_categ_id.'_'.$sub_categ_id; ?>" >
					<?php echo $sub_categ_name.' of '.$main_categ_name; ?>
				</option>
				<?php
				}	//sub while
		}// main while

?>
						</select>
					</div>
					<div class="form-group product_code">
					  <label for="prod_code">Product Code:</label>
					  <p id="showproduct_code" style="color:red; font-weight:600; padding-left:10px; cursor:pointer;"></p>
					  <input type="text" name="prod_code" class="form-control sr-only" id="prod_code" placeholder="Enter Product Code" >
					</div>
					<div class="form-group">
					  <label for="prod_name">Product Name:</label>
					  <input type="text" name="prod_name" class="form-control" id="prod_name" placeholder="Enter Product Name" >
					</div>
					<div class="form-group">
					  <label for="prod_price">Product Price:</label>
					  <input type="text" name="prod_price" class="form-control" id="prod_price" placeholder="Enter Product Price" >
					</div>
					<div class="form-group">
					  <label for="prod_desc">Product Description:</label>
					  <textarea  name="prod_desc" class="form-control" id="prod_desc" placeholder="Enter Product Description" ></textarea>
					</div>
					<div class="form-group">
					  <label for="prod_avail">Product Availability:</label>
					  <input type="text" name="prod_avail" class="form-control" id="prod_avail" placeholder="Enter Product Availability" >
					</div>
					<div class="form-group">
						<label for="prod_img">Product Image</label>
						<input type="file" id="prod_img" name="prod_img">
					 </div>
					<button type="submit" class="btn btn-success" name="prod_submit">Submit</button>
				  </form>
			</div>
			
		</div>
	

<!-- ================ Content Part ======================== -->


<script>
$(document).ready(function(){
	$('.product_code').hide();
	$(document).on('change','#prod_category', function(){
		var product_sl = $('#product_sl').val();
		var product_code = $(this).find('option:selected').html();
		//alert(product_code);
		var today = new Date(); var dd = today.getDate(); var mm = today.getMonth()+1; var yyyy = today.getFullYear(); if(dd<10){dd = '0'+dd;} if(mm<10){mm = '0'+mm;} today = mm + yyyy + dd;var part = product_code.trim().split(" of "); var x,i; var text=''; if(part[1].search(" ")>0){ var main= part[1].split(" "); for(x=0; x < main.length; x++){text += main[x][0];}}else{text+=part[1][0];} if(part[0].search('-')>0){ var sub= part[0].split("-"); for(x=0; x < sub.length; x++){ if(sub[x].search(' ')>0){ var subsub= sub[x].split(" "); for(i=0; i < subsub.length; i++){text += subsub[i][0];}}else{text += sub[x][0];}}}else {if(part[0].search(' ')>0){ var sub= part[0].split(" "); for(x=0; x < sub.length; x++){ text += sub[x][0]; }}else{text+=part[0][0];}}
	
//////// Make the final Product Code ///////
var itemcode =text+today+product_sl;
$('.product_code').show();
$('#showproduct_code').html(itemcode.toUpperCase());
$('#prod_code').val(itemcode.toUpperCase());
	});
})
</script>


