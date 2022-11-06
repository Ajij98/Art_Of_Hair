<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>

 <!-- Select shop details -->
 <?php
   //$user_name = $_SESSION['user_name'];
 	if(isset($_GET['shop_id']))
   	{

       $shop_id = $_GET['shop_id'];

	   $db   = new Database();
	   $sql  = "SELECT * FROM tb_shop WHERE shop_id = $shop_id";
	   $read = $db->select($sql);

	   while($getData = $read->fetch_assoc())
       {

	       $name                 = $getData['name'];
	       $phone                = $getData['phone'];
	       $shop_id              = $getData['shop_id'];
	       $shop_no              = $getData['shop_no'];
	       $shop_name            = $getData['shop_name'];
	       $shop_type            = $getData['shop_type'];
	       $shop_address         = $getData['shop_address'];
	       $shop_address_details = $getData['shop_address_details'];
	       $entry_time           = $getData['entry_time'];
	       $shop_verify_status   = $getData['shop_verify_status'];
	       $shop_verification_code = $getData['shop_verification_code'];
	       $shop_image           = $getData['shop_image'];

        }

	}
  ?>





<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Art Of Hair | Shop Details</title>
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
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span ><?php echo $_SESSION['user_name']; ?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
									<a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="fa fa-cog fa-fw"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" onclick="return confirm('Sure to logout?')" href="logout_admin.php"><i class="fa fa-power-off fa-fw"></i> Logout</a>
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
						<div class="photo">
							<img src="assets/img/profile.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['user_name']; ?>
									<span class="user-level">Administrator</span>
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
										<a onclick="return confirm('Sure to logout?')" href="logout_admin.php">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<ul class="nav">
						<li class="nav-item active">
							<a href="index.php">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="add_area.php">
								<i class="la la-plus"></i>
								<p>Add Area</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="manage_area.php">
								<i class="la la-keyboard-o"></i>
								<p>Manage Area</p>
							</a>
						</li>
						<li class="nav-item active">
							<a href="manage_shop.php">
								<i class="la la-keyboard-o"></i>
								<p>Manage Shop</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="shop_payment_history.php">
								<i class="la la-history"></i>
								<p>Shop Payment History</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="shop_owner.php">
								<i class="la la-user"></i>
								<p>Shop Owner</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="customer.php">
								<i class="la la-user"></i>
								<p>Customer</p>
							</a>
						</li>
						<li class="nav-item">
							<a onclick="return confirm('Sure to logout?')" href="logout_admin.php">
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
						<h4 class="page-title">Shop Details</h4>
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title d-inline">Shop Details</div>
									</div>
									<div class="card-body">

					                    <div class="row mb-4 pb-4">
					                    	<div class="col-lg-6">
					                    		<p class="text-success font-weight-bold">Shop Id: <?php echo "Shop Id-".$shop_id; ?></p>
					                    		<p>Shop No: <?php echo $shop_no; ?></p>
							                    <p>Shop Name: <?php echo $shop_name; ?></p>
							                    <p>Shop Code: <?php echo $shop_verification_code; ?></p>
							                    <p>Shop Type: <?php echo $shop_type; ?></p>
							                    <p>Shop Address: <?php echo $shop_address; ?></p>
							                    <p>Shop Address Details: <?php echo $shop_address_details; ?></p>
							                    <p>Shop Added Date: <?php echo $entry_time; ?></p>
												<p>Shop Owner Name: <?php echo $name; ?></p>
							                    <p>Owner Contact: <?php echo $phone; ?></p>
							                    <p class="d-inline">Shop Verify Status:
							                    	<?php
					                                    if($shop_verify_status == 1)
					                                    {
					                                        $msg = '<div class="m-auto badge badge-success d-inline">Activated</div><br />';
					                                         echo $msg;
					                                    }
					                                    else
					                                    {
					                                        $msg = '<div class="m-auto badge badge-danger d-inline">Pending...</div><br />';
					                                         echo $msg;
					                                    }
					                                 ?>
							                    </p>
					                    	</div>
											<div class="col-lg-6">
												<p>Shop Image:</p>
												<img src="<?php echo '../owner_panel/'.$shop_image; ?>" height="250" alt="">
					                    	</div>
					                    </div>

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
