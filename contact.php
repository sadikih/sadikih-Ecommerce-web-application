<?php
	include'header.php';
	
?>
<!-- ================== Content Part Start ====================== -->


	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/bot.jpg);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
				
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3653.2651703335414!2d90.42442786435761!3d23.702222846533314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9ba1dbd60b7%3A0xc2d9a16ec3dc867b!2sGandaria%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1524723765283" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
		<!-- ============= Contact Form =============== -->
				<div class="col-md-6 p-b-30">
<?php
if(isset($_GET['email_submit'])){
	if(!empty($_GET['phone-number']) && !empty($_GET['email']) && !empty($_GET['message'])){
		require_once('class_lib/email_class.php');
		$email_obj= new EMAIL;
		$email_obj->contact_email($_GET);
	}else{
		echo '<div class="alert alert-warning text-center">Please complete all fields..</div>';
		header('refresh:3; url=contact.php');
	}
}
?>
					<form class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Phone Number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button name="email_submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>



<!-- ================== Content Part End ====================== -->

<!-- ================= Footer Part ======================= -->
<?php
	include('footer.php');
?>