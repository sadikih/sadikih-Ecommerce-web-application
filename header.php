<?php
	ob_start();
	session_start();
	$invoice_id=session_id();
	if(isset($invoice_id)){
		require_once('class_lib/addtocart_class.php');
		$addtocart_obj= new addTOcart;
		$addtocart_data=$addtocart_obj->addtocart_view($invoice_id);
		$addtocart_table=$addtocart_obj->addtocart_view($invoice_id);
	}
	
############################## user lgoin ##################
if(isset($_POST['u_submit'])){
	if(!empty($_POST['u_email']) && !empty($_POST['u_pwd'])){
		require_once('class_lib/user_access_class.php');
		$member_signin_obj= new User_Access;
		$member_signin_obj->user_login($_POST);
	
	}else{
			echo $member_msg='<div class="alert alert-warning text-center" style="padding:5px;">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								Your Email / Password is invalid</div>';
		}
}
############################## Member Registration ##################
if(isset($_POST['m_submit'])){
	if(!empty($_POST['m_pwd']) && $_POST['m_pwd'] == $_POST['m_cpwd']){
		if(!empty($_POST['m_name']) && !empty($_POST['m_email']) && !empty($_POST['m_phone']) && !empty($_POST['m_address']) && !empty($_POST['m_pwd'])){
			require_once('class_lib/user_access_class.php');
			$member_reg_obj= new User_Access;
			$member_msg=$member_reg_obj->member_insert($_POST);
			echo $member_msg;
		}else{
			echo $member_msg='<div class="alert alert-warning text-center" style="padding:5px;">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								Please fill-up all fields...</div>';
		}
	}else{
			echo $member_msg='<div class="alert alert-warning text-center" style="padding:5px;">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								Password is Empty / does not matched..</div>';
		}
	
}
?>

<!-- ================== Header Part Start ====================== -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		<?php 
			if(basename($_SERVER['PHP_SELF'])=='index.php'){
				echo 'Home';
			}else if(basename($_SERVER['PHP_SELF'])=='about.php'){
				echo 'About-Us';
			}else if(basename($_SERVER['PHP_SELF'])=='contact.php'){
				echo 'Contact-Us';
			}else{
				echo 'Add Title';
			}
		?>
	
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
.header-icons i.header-icon1{
	font-size:30px;
}
</style>
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header" <?php if(isset($member_msg)){echo 'style="position:inherit;"';} ?>>
			<div class="topbar">
				


				<div class="topbar-child2">
					<span class="topbar-email">
						<a href=""role="button" data-toggle="modal" class="" data-target="#signup_user">sign up/</a>  <a href="" role="button" class="" data-toggle="modal" data-target="#login_user">Log-In</a>
					</span>

					
				</div>
			</div>

			<div class="wrap_header" style="background-color:#31BAFD">
				<!-- Logo -->
				<a href="index.php" class="logo">
					
					<h2 style="color:white;font-size:35px">serdywear.com</h2>
				</a>

				<!-- Menu -->
				<div class="wrap_menu" >
					<nav class="menu">
						<ul class="main_menu" >
							<li class="<?php if(basename($_SERVER['PHP_SELF'])=='index.php'){
				echo 'active';} ?>">
								<a style="color:white" href="index.php">Home</a>
							</li>
							
							<li class="<?php if(basename($_SERVER['PHP_SELF'])=='product.php'){
				echo 'active';} ?> ">
								<a style="color:white" href="product.php">Shop Now</a>
							</li>

							<li>
								<a style="color:white" href="cart.php">Features</a>
							</li>
							
							<li class="<?php if(basename($_SERVER['PHP_SELF'])=='about.php'){
				echo 'active';} ?>">
								<a style="color:white" href="about.php">About Us</a>
							</li>

							<li class="<?php if(basename($_SERVER['PHP_SELF'])=='contact.php'){
				echo 'active';} ?>">
								<a style="color:white" href="contact.php">Contact Us</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons"><!-- ======================= Login Icon ============== -->
				<?php 
					if(isset($_SESSION['usr_id'])){
						echo '<a class="header-wrapicon1 dis-block" role="button"  href="user/user.php" target="_blank">
								<i class="fa fa-smile-o  header-icon1" style="color:green"></i>
							 </a>';
					}else{
						echo '<a class="header-wrapicon1 dis-block" role="button"  data-toggle="modal" data-target="#login_user">
						<i class="fa fa-address-book header-icon1"></i>
						</a>';
					}
				?>
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php if(isset($invoice_id)){ echo $addtocart_data->num_rows;}else{echo 0;} ?></span>

			<!-- +++++++++++++++ Header cart notification ++++++++++++++++++ -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
<?php
$total=0;
if($addtocart_data->num_rows > 0){
	while($addtocart_prod= $addtocart_data->fetch_assoc()){
		///print_r($addtocart_prod);
		$addtocart_invoice_id= $addtocart_prod['addtocart_invoice_id'];
		$addtocart_prod_id= $addtocart_prod['addtocart_prod_id'];
		$addtocart_prod_name= $addtocart_prod['addtocart_prod_name'];
		$addtocart_prod_img= $addtocart_prod['addtocart_prod_img'];
		$addtocart_prod_quantity= $addtocart_prod['addtocart_prod_quantity'];
		$addtocart_prod_price= $addtocart_prod['addtocart_prod_price'];
		?>
							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="<?php echo $addtocart_prod_img; ?>" alt="<?php echo $addtocart_prod_name; ?>">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										<?php echo $addtocart_prod_name; ?>
									</a>

									<span class="header-cart-item-info">
										<?php 
										echo $addtocart_prod_quantity.'X'.$addtocart_prod_price; 
										/// total value
										$total=$total+($addtocart_prod_quantity * $addtocart_prod_price);
										?>
									</span>
								</div>
							</li>
	
		<?php
		
	}
	
}else{
	echo '<li class="header-cart-item"> You did not select any product at yet..</li>';
}

?>
							</ul>

							<div class="header-cart-total">
								Total: <?php echo $total;?> /-tk
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x 19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x 39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x 17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: 75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								sad@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>KSH</option>
									<option>USD</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.php">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>
					
					<li class="item-menu-mobile">
						<a href="about.php">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.php">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
<!-- ================== Header Part End ====================== -->