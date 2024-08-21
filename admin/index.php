<?php
session_start();

if(isset($_POST['a_submit']) && !empty($_POST['a_email']) && !empty($_POST['a_pwd'])){
	
	require_once('../class_lib/admin_access_class.php');
	$a_login_ojb=new adminLogin;
	$a_login_ojb->admin_login($_POST);
}else{
	if(isset($_POST['a_submit'])){
		echo '<div class="alert alert-danger text-center"> Please Enter Email and Password..</div>';
		header('refresh:2; url=index.php');
	}
}
	
	///print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <div class="row">
	<div class="col-sm-offset-4 col-sm-4 col-xs-12">
		  <h2 class="alert alert-info text-center">Admin Login</h2>
		  <form method="post">
			<div class="form-group">
			  <label for="email">Email:</label>
			  <input type="email" class="form-control" id="email" placeholder="Enter email" name="a_email" 
			  value="<?php if(isset($_COOKIE['a_email'])){echo $_COOKIE['a_email'];} ?>">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="a_pwd"
			 value="<?php if(isset($_COOKIE['a_pass'])){echo $_COOKIE['a_pass'];} ?>">
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" name="a_remember" <?php if(isset($_COOKIE['a_email'])){echo 'checked';} ?>> Remember me</label>
			</div>
			<button type="submit" class="btn btn-info" name="a_submit">Submit</button>
		  </form>
	</div>
  </div>
</div>

<!--  ========================== Script Files ============================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
