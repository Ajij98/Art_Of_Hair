<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";

 ?>

<!--User registration section-->
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
  $db = new Database();
  $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
  date_default_timezone_set('Asia/Dhaka');

  if(isset($_POST['submit']))
  {
    if(checkEmail())
    {
      if(checkUsername())
      {
        if(matchPassword())
        {
          $name      = $_POST['name'];
          $email     = $_POST['email'];
          $phone     = $_POST['phone'];
          $address   = $_POST['address'];
          $user_name = $_POST['user_name'];
          $password  = $_POST['password'];
          $user_type = $_POST['user_type'];

          $sql = "INSERT INTO          tb_user(name,email,phone,address,user_name,password,user_type,entry_time)values('$name','$email','$phone','$address','$user_name','$password','$user_type','$current_datetime')";
          $insert_row = $db->insert($sql);

          if($insert_row)
          {
            ?>

           <script type="text/javascript">
             window.alert("Registration successfull.");
             window.location='registration.php';
           </script>

           <?php

          }
          else {
            $msg = '<div class="alert alert-danger w-50 m-auto"><strong>Error!</strong> Something went wrong!</div><br />';
          }
        }
      }
    }
  }
  function checkEmail()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE email='".$_POST['email']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! Email already exist.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function checkUsername()
  {
    $db     = new Database();
    $sql    = "SELECT * FROM tb_user WHERE user_name='".$_POST['user_name']."'";
    $result = $db->link->query($sql) or die($this->link->error.__LINE__);
    if($result->num_rows > 0)
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! Username already exist.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
    }
  }
  function matchPassword(){
    if($_POST['password'] !== $_POST['confirm_password'])
    {
        ?>
           <script type="text/javascript">
             window.alert("Warning! Password and Confirm password should match.");
           </script>
        <?php
      return false;
    }
    else
    {
      return true;
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

		<title>Art Of Hair | Registration</title>

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
				<a href="index.php" class="logo ml-4 my-0 btn pull-left">
                    <h3 class="mt-0 mb-0 py-0 pl-3" style="font-family: fantasy; color: black;"><img src="icon/nav_logo_2.png" class="d-inline py-0 my-0" alt=""> Art of Hair<b>.</b></h3>
                </a>
			
				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div class="panel-body">
						<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group mb-lg">
								<label>Name *</label>
								<input name="name" type="text" class="form-control input-md" required />
							</div>

							<div class="form-group mb-lg">
								<label>Email *</label>
								<input name="email" type="email" class="form-control input-md" required/>
							</div>

							<div class="form-group mb-lg">
								<label>Phone *</label>
								<input name="phone" type="number" class="form-control input-md" required/>
							</div>

							<div class="form-group mb-lg">
								<label>Address *</label> 
								<textarea name="address" rows="3" class="form-control input-md" required></textarea>
							</div>

							<div class="form-group mb-lg">
								<label>User Name *</label>
								<input name="user_name" type="text" class="form-control input-md" required/>
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Password *</label>
										<input name="password" type="password" class="form-control input-md" required/>
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Confirm Password *</label>
										<input name="confirm_password" type="password" class="form-control input-md" required/>
									</div>
								</div>
							</div>

							<div class="form-group mb-lg">
  								<label>User Type *</label>
  								<select class="form-control input-md" id="user_type" name="user_type" required>
  									<option selected>Choose...</option>
  									<option>Shop Owner</option>
  									<option>Customer</option>
  								</select>
  							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox" required/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<input type="submit" name="submit" class="btn btn-primary" value="Sign Up" />
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							

							<p class="text-center">Already have an account? <a href="login.php">Sign In Here!</a>

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

	</body>
</html>