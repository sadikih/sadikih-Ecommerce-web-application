<style>
#payment ul li{
	width:50%;
	background-color: deepskyblue;
	padding:10px;
}
#payment ul li a{
	color:white;
	font-weight:bold;
}
#payment ul li.active{
	background-color: black;
}
</style>

<!-- =================== User login ============== -->
<div class="modal fade" tabindex="-1" id="payment"role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding:25px 20px">
		<h2 class="alert alert-info text-center">Payment Process</h2>
		<div>
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home Delivery</a></li>
			<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bkash Payment</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<form method="post">
					<input class="sr-only" name="p_discount" value="<?php echo $discount; ?>">
					<input class="sr-only" name="p_service" value="<?php echo $s_charge; ?>">
					<div class="form-group">
					  <label for="p_address">Delivery Address:</label>
					  <textarea type="text" class="form-control" id="p_address" placeholder="Enter Your Delivery Address..." name="delivery_address"></textarea>
					</div>
					<div class="form-group">
					  <label for="p_contact">Delivery Contact:</label>
					  <input type="text" class="form-control" id="p_contact" placeholder="Enter your Delivery Contact Number" name="delivery_c_number">
					</div>
					<button type="submit" class="btn btn-info" name="homedelivery" value="homedelivery">Submit</button>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane" id="profile">
				<form method="post">
					<input class="sr-only" name="p_discount" value="<?php echo $discount; ?>">
					<input class="sr-only" name="p_service" value="<?php echo $s_charge; ?>">
					<div class="form-group">
					  <label for="p_address">Delivery Address:</label>
					  <textarea type="text" class="form-control" id="p_address" placeholder="Enter Your Delivery Address..." name="delivery_address"></textarea>
					</div>
					<div class="form-group">
					  <label for="p_contact">Delivery Contact:</label>
					  <input type="text" class="form-control" id="p_contact" placeholder="Enter your Delivery Contact Number" name="delivery_c_number">
					</div>
					<div class="form-group">
					  <label for="p_pnumber">Payment Sender Number:</label>
					  <input type="text" class="form-control" id="p_pnumber" placeholder="Enter your Bkash Sending Number" name="payment_s_number">
					</div>
					<div class="form-group">
					  <label for="p_tid">Payment Transaction ID Number:</label>
					  <input type="text" class="form-control" id="p_tid" placeholder="Enter your Bkash Transaction ID Number" name="payment_tid">
					</div>
					<button type="submit" class="btn btn-info" name="bkash_payment" value="bkash_payment">Submit</button>
				</form>
			</div>
		  </div>

		</div>

    </div>
  </div>
</div>
