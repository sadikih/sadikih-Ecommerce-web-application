<?php
	include'header.php';
?>

<!-- ==================== Content Part ============================= -->
<!-- ++++++++++++++ Title Page ++++++++++++++++ -->

	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/bot.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>
	
<!-- ++++++++++++++++++++ Cart ++++++++++++++++ -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
 
<?php
	if(isset($_POST['homedelivery']) && isset($_SESSION['usr_id'])){
		if(!empty($_POST['delivery_address']) && !empty($_POST['delivery_c_number'])){
			require_once('class_lib/checkout_class.php');
			$checkout_obj= new CHECKOUT;
			$checkout_obj->checkout_insert($_POST);
		}else{
			echo '<div class="alert alert-warning text-center">Please fill your Delivery Address and Contact Number...</div>';
		}
	}

	if(isset($_POST['bkash_payment']) && isset($_SESSION['usr_id'])){
		if(!empty($_POST['delivery_address']) && !empty($_POST['delivery_c_number']) && !empty($_POST['payment_s_number']) && !empty($_POST['payment_tid'])){
			require_once('class_lib/checkout_class.php');
			$checkout_obj= new CHECKOUT;
			$checkout_obj->checkout_insert($_POST);
		}else{
			echo '<div class="alert alert-warning text-center">Please fill your Delivery Address and Contact Number...</div>';
		}
	}
?>
<?php
$total=0;
$subtotal=0;
if($addtocart_table->num_rows > 0){
	while($addtocart_prod= $addtocart_table->fetch_assoc()){
		///print_r($addtocart_prod);
		$addtocart_invoice_id= $addtocart_prod['addtocart_invoice_id'];
		$addtocart_prod_id= $addtocart_prod['addtocart_prod_id'];
		$addtocart_prod_name= $addtocart_prod['addtocart_prod_name'];
		$addtocart_prod_img= $addtocart_prod['addtocart_prod_img'];
		$addtocart_prod_quantity= $addtocart_prod['addtocart_prod_quantity'];
		$addtocart_prod_price= $addtocart_prod['addtocart_prod_price'];
		?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo $addtocart_prod_img; ?>" alt="<?php echo $addtocart_prod_name; ?>">
								</div>
							</td>
							<td class="column-2"><?php echo $addtocart_prod_name; ?></td>
							<td class="column-3"><?php echo $addtocart_prod_price; ?>/-tk</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?php echo $addtocart_prod_quantity; ?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5"><?php echo ($addtocart_prod_price * $addtocart_prod_quantity ); ?>/-tk</td>
						</tr>
		<?php
		$subtotal=$subtotal+ ($addtocart_prod_price * $addtocart_prod_quantity );
	}/// while
	
}else{
	echo '<tr class="alert alert-success table-row text-center">
			<td colspan="5">OOPs!!! You did not cart any product at yet....</td>
		</tr>';
	echo '<tr class="alert alert-info table-row text-center">
			<td colspan="5"><a href="product.php">Continue your Cart....</a></td>
		</tr>';
	header('refresh:30; url=product.php');
}

?>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!-- Subtotal  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo $subtotal; ?>/-tk
					</span>
				</div>
				<!-- Discount -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Discount:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo $discount=10; ?>%
					</span>
				</div>

				<!-- Service Charge -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Service Charge:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo $s_charge=150; ?>/-tk
					</span>
				</div>
				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo $grandtotal=$subtotal-(($discount/100)* $subtotal)+$s_charge; ?>/-tk
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="button"  data-toggle="modal" data-target="#<?php if(isset($_SESSION['usr_id'])){echo 'payment';}else { echo 'login_user';}?>" <?php if(isset($_SESSION['usr_id'])){echo 'style="background-color:green;"';} ?>>
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
	</section>

<!-- ================= Payment Modal ======================= -->
<?php include('payment.php');?>	
<!-- ================= Footer Part ======================= -->
<?php
	include('footer.php');
?>