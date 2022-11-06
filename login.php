<?php
  session_start();
  include "include/Config.php";
  include "include/Database.php";
 ?>

 <!--User login section (USE BINARY KEYWORD FOR CASE SENSETIVE LOGIN INFORMATION)-->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
  if(isset($_POST['submit']))
  {
      $user_name = $_POST['user_name'];
      $password  = $_POST['password'];

      $sql = "SELECT * FROM tb_user WHERE BINARY user_name = '$user_name' AND BINARY password = '$password' LIMIT 1";

      $result = $db->link->query($sql) or die($this->link->error.__LINE__);

      if($result->num_rows != 0)
      {
      	while($getData = $result->fetch_assoc())
     	{
       		$user_type = $getData['user_type'];
     	}

     	if($user_type == "Admin")
     	{
     		$_SESSION['user_name'] = $user_name;
     		header('location:admin_panel/index.php');
     	}
     	else if($user_type == "Shop Owner")
     	{
     		$_SESSION['user_name'] = $user_name;
     		header('location:owner_panel/index.php');
     	}
     	else if($user_type == "Customer")
     	{
     		$_SESSION['user_name'] = $user_name;
     		header('location:customer_panel/index.php');
     	}

      }
      else
      {
        $msg = '<div class="alert alert-danger alert-dismissable w-50 m-auto" id="flash-msg"><strong>Error!</strong> Incorrect Username or Password.</div><br />';
      }
  }
  ?>




<!DOCTYPE html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<title>Art Of Hair | Login</title>

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Favicon -->
	    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/nav_logo_2.png">
	    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/nav_logo_2.png">
	    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/nav_logo_2.png">
	    <link rel="manifest" href="assets/images/icons/site.html">
	    <link rel="mask-icon" href="assets/images/icons/nav_logo_2.png" color="#666666">
	    <link rel="shortcut icon" href="assets/images/icons/nav_logo_2.png">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="login_registration_assets/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="login_registration_assets/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="login_registration_assets/assets/vendor/modernizr/modernizr.js"></script>

		<!-- Fontawsome -->
    	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">

				<?php echo $msg; ?>

				<a href="index.php" class="logo ml-4 my-0 btn pull-left">
                    <h3 class="mt-0 mb-0 py-0 pl-3" style="font-family: fantasy; color: black;"><img src="icon/nav_logo_2.png" class="d-inline py-0 my-0" alt=""> Art of Hair<b>.</b></h3>
                </a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="user_name" type="text" class="form-control input-lg" required />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="pages-recover-password.html" class="pull-right">Forgot Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" required/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<input type="submit" name="submit" class="btn btn-primary" value="Sign In" />
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							

							<p class="text-center">Don't have an account? <a href="registration.php">Sign Up Now!</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright <?php echo date("Y"); ?>. All rights reserved to <a href="index.php">Art Of Hair</a>.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="login_registration_assets/assets/vendor/jquery/jquery.js"></script>
		<script src="login_registration_assets/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="login_registration_assets/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="login_registration_assets/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="login_registration_assets/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="login_registration_assets/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="login_registration_assets/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="login_registration_assets/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="login_registration_assets/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="login_registration_assets/assets/javascripts/theme.init.js"></script>

	</body><img src="http://www.ten28.com/fref.jpg">
</html>