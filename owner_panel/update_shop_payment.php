<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Select shop payment data -->
 <?php

   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['payment_id']))
   {

     $payment_id = $_GET['payment_id'];

     $sql    = "SELECT * FROM tb_shop_payment WHERE payment_id = $payment_id";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {

       $owner_name           = $getData['owner_name'];
       $owner_phone          = $getData['owner_phone'];
       $owner_address        = $getData['owner_address'];
       $shop_id              = $getData['shop_id'];
       $shop_no              = $getData['shop_no'];
       $shop_name            = $getData['shop_name'];
       $shop_address_details = $getData['shop_address_details'];
       $paid_amount          = $getData['paid_amount'];
       $trx_id               = $getData['Trx_ID'];
       $payment_ss_img       = $getData['payment_ss_img'];
       $paid_by              = $getData['paid_by'];
       $payment_acc_number   = $getData['payment_acc_number'];
       $payment_date         = $getData['payment_date'];

     }
   }
  ?>


  <!--Update shop details -->
  <?php
    $user_name = $_SESSION['user_name'];
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

   if(isset($_POST['update']))
   {
         $payment_id       = $_GET['payment_id'];

         $owner_name           = $_POST['name'];
         $owner_phone          = $_POST['phone'];
         $owner_address        = $_POST['address'];
         $shop_id              = $_POST['shop_id'];
         $shop_no              = $_POST['shop_no'];
         $shop_name            = $_POST['shop_name'];
         $shop_address_details = $_POST['shop_address_details'];
         $paid_amount          = $_POST['paid_amount'];
         $trx_id               = $_POST['trx_id'];
         $paid_by              = $_POST['paid_by'];
         $payment_acc_number   = $_POST['payment_acc_number'];
         $payment_date         = $_POST['payment_date'];
         $payment_added_by     = $user_name;

         $payment_ss_img = $_FILES["payment_ss_img"]["name"];
         $tmp        = md5(time());

         if($payment_ss_img != "")
         {
           $dst    = "./payment_ss_images/".$tmp.$payment_ss_img;
           $dst_db = "payment_ss_images/".$tmp.$payment_ss_img;
           move_uploaded_file($_FILES["payment_ss_img"]["tmp_name"],$dst);

           $sql = "UPDATE tb_shop_payment SET owner_name='$owner_name',owner_phone='$owner_phone',owner_address='$owner_address',shop_id='$shop_id',shop_no='$shop_no',shop_name='$shop_name',shop_address_details='$shop_address_details',paid_amount='$paid_amount',Trx_ID='$trx_id',payment_ss_img='$dst_db',paid_by='$paid_by',payment_acc_number='$payment_acc_number',payment_date='$payment_date' WHERE payment_id = $payment_id";

           $update_row = $db->update($sql);
         }

          $sql = "UPDATE tb_shop_payment SET owner_name='$owner_name',owner_phone='$owner_phone',owner_address='$owner_address',shop_id='$shop_id',shop_no='$shop_no',shop_name='$shop_name',shop_address_details='$shop_address_details',paid_amount='$paid_amount',Trx_ID='$trx_id',paid_by='$paid_by',payment_acc_number='$payment_acc_number',payment_date='$payment_date' WHERE payment_id = $payment_id";

           $update_row = $db->update($sql);

         if($update_row)
         {
         ?>
         <script type="text/javascript">

           window.alert("Shop payment history updated successfully.");
           window.location='shop_payment_history.php';

         </script>
         <?php
         }
         else
         {
           $msg = '<div class="alert alert-danger alert-dismissable w-75 m-auto" id="flash-msg"><strong>Error!</strong> Something went wrong!</div><br />';
           echo $msg;
           return false;
         }
   }
   ?>






<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Art Of Hair | Shop Payment</title>
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
            <li class="nav-item">
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
            <li class="nav-item active">
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
						<h4 class="page-title">Update Shop Payment</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Payment Details</div>
									</div>
									<div class="card-body">

                    <form class="" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                        <label for="email">Your Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="<?php echo $owner_name; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Your Phone Number" value="<?php echo $owner_phone; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="address">Address *</label>
                        <textarea name="address" rows="3" class="form-control" required><?php echo $owner_address; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="shop_id">Shop Id *</label>
                        <input type="text" id="shop_id" name="shop_id" class="form-control" placeholder="Enter shop Id" value="<?php echo $shop_id; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="shop_no">Shop No *</label>
                        <input type="text" id="shop_no" name="shop_no" class="form-control" placeholder="Enter Shop No" value="<?php echo $shop_no; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="shop_name">Shop Name *</label>
                        <input type="shop_name" id="shop_name" name="shop_name" class="form-control" placeholder="Enter Shop Name" value="<?php echo $shop_name; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="shop_address_details">Shop Address Details *</label>
                        <textarea rows="3" class="form-control" id="shop_address_details" name="shop_address_details" placeholder="Enter Shop Address Details" required><?php echo $shop_address_details; ?></textarea>
                        </div>
                      <div class="form-group">
                        <label for="amount">Paid Amount *</label>
                        <input type="number" id="amount" name="paid_amount" class="form-control" value="<?php echo $paid_amount; ?>" placeholder="Enter Amount" required>
                      </div>
                      <div class="form-group">
                        <label for="trx_id">TrxID *</label>
                        <input type="text" id="trx_id" name="trx_id" class="form-control" placeholder="Enter TrxID" value="<?php echo $trx_id; ?>" required>
                      </div>
                      <div class="form-group">
                        <img src="<?php echo $payment_ss_img; ?>" height="100" alt="payment_ss"><br>
                        <label for="payment_ss_img">Payment Screenshot *</label>
                        <input type="file" id="payment_ss_img" name="payment_ss_img" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="paid_by">Paid By *</label>
                        <select class="form-control" id="paid_by" name="paid_by" required>
                          <option selected><?php echo $paid_by; ?></option>
                          <option>Bkash</option>
                          <option>Nagad</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="payment_acc_number">Payment Account Number *</label>
                        <input type="text" id="payment_acc_number" name="payment_acc_number" class="form-control" placeholder="Enter Payment Account Number" value="<?php echo $payment_acc_number; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="payment_date">Payment Date *</label>
                        <input type="date" id="payment_date" name="payment_date" class="form-control" value="<?php echo $payment_date; ?>" required>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="update" class="btn btn-warning" value="Save Changes">
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
