 <!-- ================== Footer Part Start ====================== -->
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45" style="background-color:gray">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 style="color:white" class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p style="color:white" class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, Koinange lane,CTRL building
					</p>

					
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 style="color:white" class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 style="color:white" class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 style="color:white" class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a style="color:white" href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					<p style="color:white">Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5 form-control" type="text" name="email" placeholder="@gmail.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 bg bg-primary" >
							Subscribe Here
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15" >
			

			
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>
	
<!-- =================== User login ============== -->
<?php include('signin.php'); ?>

	
<!-- =================== User sign up ============== -->
<?php include('signup.php'); ?>

	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>


	<script src="js/main.js"></script>

</body>
</html>

<?php
	ob_flush();
	ob_clean();
 ?>