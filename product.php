<?php
	include'header.php';
?>
<style>
.wrap-pic-w img {
    width: auto;
    height: 200px;
}
</style>
<!-- ==================== Content Part ============================= -->
<!-- ++++++++++++++ Title Page ++++++++++++++++ -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/bot.jpg);">
		<h2 class="l-text2 t-center">
			CLOTHLINE
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Collection from 2021
		</p>
	</section>
	
<!-- ++++++++++++++ All Product Page ++++++++++++++++ -->	
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
	<!-- ======== sidebar start ============== -->
	<?php include('sidebar.php');?>
	
	<!-- ======== Product View start ============== -->
				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>

<!-- +++++++++++++++++++++++ Product View Start++++++++++++++++++++++++++++++++ -->
					<div class="row">
<?php
#############	Add to Cart Insert #############
if(isset($_GET['addtocart_submit'])){
	///print_r($_GET);
	require_once('class_lib/addtocart_class.php');
	$addtocart_obj= new addTOcart;
	$addtocart_obj->addtocart_insert($_GET);
	
	
}

######################################################################
####################### Product View #################################
require_once('class_lib/user_product_class.php');
$products_obj=new User_Product;
$products=$products_obj->all_product_view();

if($products->num_rows >0){
########################################################################
	while($prod_details=$products->fetch_assoc()){
	///print_r($prod_details);
	$prod_code=$prod_details['prod_code'];
	$prod_name=$prod_details['prod_name'];
	$prod_price=$prod_details['prod_price'];
	$prod_img=$prod_details['prod_img'];
	
	?>
						<!-- product thumbnail -->
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50 text-center">
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?php echo $prod_img; ?>" alt="<?php echo $prod_name; ?>">

									<div class="block2-overlay trans-0-4">
										<a  class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<form>
											
												<input name="invoice_id" value="<?php echo session_id(); ?>" class="sr-only">
												<input name="p_code" value="<?php echo $prod_code; ?>" class="sr-only">
												<input name="prod_quantity" value="1" class="sr-only">
											<button  type="submit" name="addtocart_submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
											</form>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="single_product.php?p_code=<?php echo $prod_code; ?>" target="_blank" class="block2-name dis-block s-text3 p-b-5">
										<b><?php echo $prod_name; ?></b>
									</a>

									<span class="block2-price m-text6 p-r-5">
										<?php echo $prod_price; ?> /- tk
									</span>
								</div>
							</div>
						</div>
	<?php
	
	}/// while
}else{
	echo'<div class="alert alert-success text-center"> OOPs!!! Their have no product at yet...</div>';
}
?>
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<!-- ================= Footer Part ======================= -->
<?php
	include('footer.php');
?>