<?php include('header.php'); 

?>
<style>
	#order_chart .alert{
		margin-bottom:5px;
		padding:7px;
	}
	#order_chart table{
		margin-bottom:0px;
	}
	#order_chart table tr td{
		vertical-align:middle;
	}
</style>
<!-- ================ Content Part ======================== -->
		<div class="col-md-9 col-sm-8" id="order_chart">
			<h1 class="text-center"> My Cart</h1>
<?php
require_once('../class_lib/checkout_class.php');
$order_obj= new CHECKOUT;
$order=$order_obj->checkout_user_view();

while($order_data=$order->fetch_assoc()){
		$c_name= $order_data['u_name'];
		$c_email= $order_data['u_email'];
		$c_invoice_id= $order_data['invoice_id'];
	?>
			<div class="row" style="border:1px solid black; margin-bottom:25px;">
				<div class="alert alert-info">
					<span><?php echo $c_name; ?> // <?php echo $c_email; ?></span>
					<span class="pull-right">Invoice ID: <?php echo $c_invoice_id; ?></span>
				</div>
				<table class="table table-striped">
					<tr>
						<th>Sl.</th>
						<th>P Code</th>
						<th>Image</th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
		<?php
			####################### Order Product View
			$order_product=$order_obj->checkout_admin_view($c_invoice_id);
			$x=1;
			$sub_total=0;
			while($p_data=$order_product->fetch_assoc()){
				//echo '<pre>';
				//print_r($p_data);
				$p_code=$p_data['product_code'];
				$p_img=$p_data['prod_img'];
				$p_name=$p_data['prod_name'];
				$p_price=$p_data['prod_price'];
				$p_quantity=$p_data['product_quantity'];
				
				$p_discount=$p_data['product_discount'];
				$p_s_charge=$p_data['service_charge'];
				$p_method=$p_data['payment_method'];
				$p_d_contact=$p_data['delivery_c_number'];
				$p_d_address=$p_data['delivery_address'];
				$p_bkash_snumber=$p_data['payment_s_number'];
				$p_bkash_tid=$p_data['payment_tid'];
				
				?>
					<tr>
						<td><?php echo $x++; ?></td>
						<td><?php echo $p_code; ?></td>
						<td><img src="../<?php echo $p_img; ?>" alt="<?php echo $p_name; ?>" style="height:50px;"></td>
						<td><a href="../single_product.php?p_code=<?php echo $p_code; ?>" target="_blank"><?php echo $p_name; ?></a></td>
						<td><?php echo $p_price; ?></td>
						<td><?php echo $p_quantity; ?></td>
						<td><?php echo $total=($p_quantity * $p_price); ?></td>
					</tr>
				<?php
				$sub_total=$sub_total+ $total;
			}// order_product while
		?>
					<tr>
						<td colspan="3" rowspan="3" style="background-color:#d1fbd1;">
							<b>Payment Method:</b> <?php echo $p_method; ?><br>
							<b>Delivery Contact:</b> <?php echo $p_d_contact; ?><br>
							<b>Delivery Address:</b> <?php echo $p_d_address; ?><br>
							<b>Bkash Sender Number:</b> <?php echo $p_bkash_snumber; ?><br>
							<b>Bkash TID:</b> <?php echo $p_bkash_tid; ?><br>
						
						</td>
						<td colspan="2" class="text-right">Sub Total:</td>
						<td colspan="2"><?php echo $sub_total; ?>/-bdt</td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">
							Discount:<br>
							Service Charge:
						</td>
						<td colspan="2">
							<?php echo $p_discount; ?>% <br>
							<?php echo $p_s_charge; ?>/-bdt
						</td>
					</tr>
					<tr>
						<td colspan="2" class="text-right">Grand Total:</td>
						<td colspan="2"><?php echo $grandtotal=$sub_total-(($p_discount/100)* $sub_total)+$p_s_charge; ?>/-</td>
					</tr>
				</table>
			</div>
			
	<?php
}// invoice While
?>

		</div>
	

<!-- ================ Content Part ======================== -->



<?php include('footer.php'); ?>