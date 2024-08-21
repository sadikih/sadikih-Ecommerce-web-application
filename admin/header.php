<?php 
ob_start();
session_start(); 

	if(!isset($_SESSION['adm_ase'])){
		header('Location:index.php');
	}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Md. Sharif Ullah Sarkar">
    <meta name="description" content="Portfolio Site">
    <meta name="keywords" content="HTML5, CSS3, JavaScript, Jquery, Ajax, Web Design, Resposive Web Design, Bootstrap, Raw PHP, OOP PHP, Wordpress, WooCommerce, Laravel, Low Cost Web Design and development">
	
	<!-- company Icon -->
	<link href="../images/icon/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="../images/icon/favicon.ico" rel="icon">
	<link rel="icon" href="../images/icon/icon.png" type="image/png">
	
    <title>Sadiki</title>

    <!-- font awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header id="headpart">
		<div class="container hidden-xs">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 complogo">
					<img class="img-responsive" src="../images/sharif.png" style="height:60px;" alt="company icon">
				</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-8 text-right pull-right" style="margin-top: 15px;">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Log out <span class="glyphicon glyphicon-log-out"></span></button>


				</div>
				<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 compname pull-left" >
					<h2 style="margin-top:8px; margin-bottom:5px;"><?php if(isset($_SESSION['adm_name'])){ echo $_SESSION['adm_name'];} ?></h2>
				</div>
			</div>
		</div>
	</header>
<!-- ================== Sign Out modal ============================= -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="alert alert-success modal-content">
      <h4 class="text-center">Do You Want to Sign Out?</h4>
	  <div class="text-center">
		<a role="button" href="?a_logout=logout" class="btn btn-danger">Yes</a>
		<a role="button" data-dismiss="modal" class="btn btn-warning">No</a>
	  </div>
    </div>
  </div>
</div>

<?php
	if(isset($_REQUEST['a_logout']) && $_REQUEST['a_logout']=='logout'){
		//echo $_REQUEST['a_logout'];
		require_once('../class_lib/admin_access_class.php');
		$a_login_ojb=new adminLogin;
		$a_login_ojb->admin_logout();
	}
	
?>

<!-- =============== Nav Area ==================== -->
<div class="container-fluid" style="padding-bottom:30px;">
	<div class="row">
		<div class="col-md-3 col-sm-4">
			<ul class="nav nav-pills nav-stacked">
			  <li class="<?php if(basename($_SERVER['PHP_SELF'])=='admin.php'){ echo'active';} ?>">
				<a href="admin.php">Dash Board</a>
			  </li>
			  <li class="<?php if(basename($_SERVER['PHP_SELF'])=='category.php'){ echo'active';} ?>">
				<a href="category.php">Add Catagory</a>
			  </li>
			  <li class="<?php if(basename($_SERVER['PHP_SELF'])=='product.php'){ echo'active';} ?>">
				<a href="product.php">Add Product</a>
			  </li>
			  <li class="<?php if(basename($_SERVER['PHP_SELF'])=='order.php'){ echo'active';} ?>">
				<a href="order.php">Order</a>
			  </li>
			  <li class="<?php if(basename($_SERVER['PHP_SELF'])=='all_product.php'){ echo'active';} ?>">
				<a href="all_product.php">All Products</a>
			  </li>
			  <li class="<?php if(basename($_SERVER['PHP_SELF'])=='add_admin.php'){ echo'active';}?>  
						 <?php if($_SESSION['adm_action']=='admin'){echo 'disabled';}?>">
				<a href="add_admin.php">Add Admin</a>
			  </li>
			</ul>
		</div>


		
		
		
		
		
		
		
		
		
