<?php
	include'header.php';
	//require'header.php';
	$prod_id=$_REQUEST['p_code'];
	
#############	Add to Cart Insert #############
if(isset($_GET['addtocart_submit'])){
	///print_r($_GET);
	require_once('class_lib/addtocart_class.php');
	$addtocart_obj= new addTOcart;
	$addtocart_obj->addtocart_insert($_GET);
	
	
}
?>
<style>
	#single_product{
		margin-bottom:50px;
	}
	#single_product .prod_title{
		background-color: #caf7ca;
		padding: 10px;
	}
	#single_product .prod_title h3{
		margin-top:5px;
	}
</style>
<?php
if(isset($prod_id)){
	require_once('class_lib/user_product_class.php');
	$single_product_obj= new User_Product;
	$single_product=$single_product_obj->product_single_view($prod_id);
	
	if($single_product->num_rows ==1){
		$prod_details=$single_product->fetch_assoc();
		
		$prod_code=$prod_details['prod_code'];
		$prod_name=$prod_details['prod_name'];
		$prod_price=$prod_details['prod_price'];
		$prod_img=$prod_details['prod_img'];
		$prod_desc=$prod_details['prod_desc'];
		
		$prod_main_categ=$prod_details['main_categ_name'];
		$prod_sub_categ=$prod_details['sub_categ_name'];
		
		
	}else{
		echo '<div class="alert alert-warning text-center">Their have no Product at yet..</div>';
	}
	
}else{
	header('Location:product.php');
}
	
?>

<!-- +++++++++++++++++ breadcrumb +++++++++++++++++++ -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			<?php echo $prod_main_categ; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			<?php echo $prod_sub_categ; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $prod_name; ?>
		</span>
	</div>
	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?php echo $prod_img; ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo $prod_img; ?>" alt="<?php echo $prod_name; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $prod_name; ?> Detail
				</h4>

				<span class="m-text17">
					<?php echo $prod_price; ?> /- tk
				</span>

				<p class="s-text8 p-t-10">
					Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<option>Size S</option>
								<option>Size M</option>
								<option>Size L</option>
								<option>Size XL</option>
							</select>
						</div>
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div>
					</div>
		<!-- ++++++++++++++++ Add to Cart start form ++++++++++++++++++++++ -->
				 <form>
					<input name="invoice_id" value="<?php echo session_id(); ?>" class="sr-only">
					<input name="p_code" value="<?php echo $prod_code; ?>" class="sr-only">
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<!-- product quantity -->
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="prod_quantity" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class=" size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button type="submit" name="addtocart_submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
				 </form>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Product Code: <?php echo $prod_code; ?></span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $prod_desc; ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- ================= Footer Part ======================= -->
<?php
	include('footer.php');
?>