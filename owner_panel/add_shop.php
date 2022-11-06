<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Add Shop -->
 <?php
   $user_name = $_SESSION['user_name'];
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['submit']))
   {

         $name                   = $_POST['name'];
         $email                  = $_POST['email'];
         $phone                  = $_POST['phone'];
         $address                = $_POST['address'];
         $shop_no                = $_POST['shop_no'];
         $shop_name              = $_POST['shop_name'];
         $shop_type              = $_POST['shop_type'];
         $shop_address           = $_POST['shop_address'];
         $shop_address_details   = $_POST['shop_address_details'];
         $about_shop             = $_POST['about_shop'];
         $shop_available         = $_POST['shop_available'];
         $bkash_merchant_number  = $_POST['bkash_merchant_number'];
         $nagad_merchant_number  = $_POST['nagad_merchant_number'];
         $added_by               = $user_name;
         $shop_verification_code = rand(100000, 999999);

         $tmp        = md5(time());
         $shop_image = $_FILES["shop_image"]["name"];
         $dst        = "./shop_images/".$tmp.$shop_image;
         $dst_db     = "shop_images/".$tmp.$shop_image;
         move_uploaded_file($_FILES["shop_image"]["tmp_name"],$dst);

         $sql = "INSERT INTO tb_shop(name,email,phone,address,shop_no,shop_name,shop_type,shop_address,shop_address_details,about_shop,shop_available,shop_image,bkash_merchant_number,nagad_merchant_number,shop_verification_code,added_by,entry_time)values('$name','$email','$phone','$address','$shop_no','$shop_name','$shop_type','$shop_address','$shop_address_details','$about_shop','$shop_available','$dst_db','$bkash_merchant_number','$nagad_merchant_number','$shop_verification_code','$added_by','$current_datetime')";
         $insert_row = $db->insert($sql);

         if($insert_row)
         {
           ?>

           <script type="text/javascript">
             window.alert("Shop details added successfully.");
             window.location='manage_shop.php';
           </script>

          <?php
         }
         else 
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong! Data not added.</div><br />';
           echo $msg;
           return false;
         }
   }


  ?>




<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Art Of Hair | Add Shop</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">

	<!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/nav_logo_2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/nav_logo_2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/nav_logo_2.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/nav_logo_2.png" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/nav_logo_2.png">

  <!-- Fontawsome (Version-4.7.0)-->
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="wrapper">

    <!-- Top Nav Section (Section-1) -->
		<div class="main-header">

			<div class="logo-header">
				<a href="index.php" class="logo">
					<img src="icon/nav_logo_2.png" class="d-inline py-0 my-0" alt=""> <h5 class="d-inline" style="color: black; font-family: fantasy;">Art Of Hair</h5><b style="color: black;">.</b>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>

			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"><span ><?php echo $_SESSION['user_name']; ?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
									<a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="fa fa-cog fa-fw"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" onclick="return confirm('Sure to logout?')" href="logout_owner.php"><i class="fa fa-power-off fa-fw"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>

			</div>
			<!-- Top Nav Section End (Section-1) -->




			<!-- Sidebar Nav Section (Section-2) -->
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">

					<div class="user">
						
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['user_name']; ?>
									<span class="user-level">Shop Owner</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Account Setting</span>
										</a>
									</li>
									<li>
										<a onclick="return confirm('Sure to logout?')" href="logout_owner.php">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<ul class="nav">
						<li class="nav-item">
							<a href="index.php">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="add_shop.php">
								<i class="la la-plus"></i>
								<p>Add Shop</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="manage_shop.php">
								<i class="la la-keyboard-o"></i>
								<p>Manage Shop</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="shop_list.php">
								<i class="la la-plus"></i>
								<p>Add Services</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#pending work...">
								<i class="la la-keyboard-o"></i>
								<p>Manage Review</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="shop_payment_history.php">
								<i class="la la-history"></i>
								<p>Shop Payment History</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="customer_bookings.php">
								<i class="la la-arrow-down"></i>
								<p>Customer Bookings</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="customer_booking_payment_history.php">
								<i class="la la-history"></i>
								<p>Booking Payment History</p>
							</a>
						</li>
						<li class="nav-item">
							<a onclick="return confirm('Sure to logout?')" href="logout_owner.php">
								<i class="la la-sign-out"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>

				</div>
			</div>
			<!-- Sidebar Nav Section End (Section-2) -->


			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Add Shop</h4>
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Shop Details</div>
									</div>
									<div class="card-body">

										<form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                      <div class="form-row">
                        <div class="form-group col-lg-6">
    											<label for="email">Your Name *</label>
    											<input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
    										</div>
    										<div class="form-group col-lg-6">
    											<label for="password">Email *</label>
    											<input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
    										</div>
                      </div>

  										<div class="form-row">
                        <div class="form-group col-lg-6">
    											<label for="phone">Phone *</label>
    											<input type="number" id="phone" class="form-control" name="phone" placeholder="Your Phone Number" required>
    										</div>
    										<div class="form-group col-lg-6">
    											<label for="address">Address *</label>
                          <textarea name="address" rows="3" class="form-control" name="address" required></textarea>
    										</div>
                      </div>

  										<div class="form-row">
                        <div class="form-group col-lg-6">
    											<label for="shop_no">Shop No *</label>
    											<input type="text" class="form-control" id="shop_no" name="shop_no" placeholder="Enter Shop No." required>
    										</div>
                        <div class="form-group col-lg-6">
    											<label for="shop_name">Shop Name *</label>
    											<input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter Shop Name" required>
    										</div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-6">
  												<label for="shop_type">Shop Type *</label>
  												<select class="form-control" id="shop_type" name="shop_type" required>
  													<option selected>Choose...</option>
  													<option>Haircut</option>
						                            <option>Hair Care</option>
						                            <option>Haircut & Hair Care</option>
						                            <option>Facial</option>
						                            <option>Haircut, Hair Care and Facial</option>
  												</select>
  											</div>
                        <div class="form-group col-lg-6">
  												<label for="shop_address">Shop Address *</label>
  												<select class="form-control" id="shop_address" name="shop_address" required>
  													<option selected>Choose...</option>
  													<option>Agrabad</option>
                                                    <option>JEC</option>
                                                    <option>2 No Gate</option>
                                                    <option>Muradpur</option>
                                                    <option>Boddarhat</option>
                                                    <option>Chawkbazar</option>
                                                    <option>Zamal Khan</option>
                                                    <option>Lalkhan Bazar</option>
                                                    <option>Halisahar</option>
                                                    <option>Karnafuli</option>
                                                    <option>Kotwali</option>
                                                    <option>Khulshi</option>
                                                    <option>Panchlaish</option>
                                                    <option>Pahartali</option>
                                                    <option>Bakalia</option>
                                                    <option>Bayejid</option>
                                                    <option>Anowara</option>
                                                    <option>Chandanaish</option>
                                                    <option>Patiya</option>
                                                    <option>Fatikchhari</option>
                                                    <option>Banskhali</option>
                                                    <option>Boalkhali</option>
                                                    <option>Mirsharai</option>
                                                    <option>Raozan</option>
                                                    <option>Rangunia</option>
                                                    <option>Lohagara</option>
                                                    <option>Sandwip</option>
                                                    <option>Satkania</option>
                                                    <option>Sitakunda</option>
                                                    <option>Hatazari</option>
  												</select>
  											</div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-6">
    											<label for="shop_address_details">Shop Address Details *</label>
    											<textarea rows="3" class="form-control" id="shop_address_details" name="shop_address_details" placeholder="Enter Shop Address Details" required></textarea>
    										</div>
                        <div class="form-group col-lg-6">
    											<label for="about_shop">About Shop *</label>
                          <textarea rows="3" class="form-control" id="about_shop" name="about_shop" placeholder="About Shop" required></textarea>
    										</div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-lg-6">
    											<label for="shop_available">Shop Opening Hour *</label>
    											<input type="text" class="form-control" id="shop_available" name="shop_available" placeholder="Enter Like (Sat - Wed, 10 AM - 8 PM)" required>
    										</div>
                        <div class="form-group col-lg-6">
    											<label for="shop_image">Shop Image *</label>
    											<input type="file" class="form-control" id="shop_image" name="shop_image" required>
    										</div>
                      </div>

  						<div class="form-row">
	                        <div class="form-group col-lg-6">
	    											<label for="bkash_merchant_number">Bkash Merchant Number *</label>
	    											<input type="text" class="form-control" id="bkash_merchant_" name="bkash_merchant_number" placeholder="Enter Bkash Merchant Number" required>
	    										</div>
	                        <div class="form-group col-lg-6">
	    											<label for="nagad_merchant_number">Nagad Merchant Number *</label>
	    											<input type="text" class="form-control" id="nagad_merchant_number" name="nagad_merchant_number" placeholder="Enter Nagad Merchant Number" required>
	    										</div>
                        </div>


                      <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success" value="Add Shop">
                      </div>

                    </form>

									</div>
								</div>
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>

</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
</html>
