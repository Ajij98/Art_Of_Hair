<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>

 <!-- Customer booking data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_customer_booking WHERE customer_username = '$user_name'";
   $read_booking = $db->select($sql);
  ?>

   <!-- Customer booking data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_customer_booking WHERE customer_username = '$user_name'";
   $read_payment = $db->select($sql);
  ?>




<!DOCTYPE html>
<html lang="en">


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Art Of Hair | Dashboard</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- jQuery Datatable Plugin (css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/nav_logo_2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/nav_logo_2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/nav_logo_2.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/nav_logo_2.png" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/nav_logo_2.png">
    
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top bg-dark" style="color: white;">
              <div class="container">
                  <div class="header-left py-4 ml-4">
                      <div>
                          <i class="icon-phone"></i> Call: <a href="tel:#">+880 1401-311811</a>
                      </div><!-- End .header-dropdown -->

                        <div>
                            <i class="icon-envelope ml-3"></i> Email: <a href="#">sajid.pciu@gmail.com</a>
                        </div><!-- End .header-dropdown -->
                  </div><!-- End .header-left -->

                  <div class="header-right mr-4">
                      <ul class="top-menu">
                          <li>
                              <a href="#">Links</a>
                              <ul>
                                  <li><a href="#">About Us</a></li>
                                  <li><a href="#">Contact Us</a></li>
                                  <li><a href="logout_customer.php" onclick="return confirm('Sure to logout?')" ><i class="icon-user"></i>Logout</a></li>
                              </ul>
                          </li>
                      </ul><!-- End .top-menu -->
                  </div><!-- End .header-right -->
              </div><!-- End .container-fluid -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.php" class="logo ml-4 my-0">
                          <h3 class="mt-0 mb-0 py-0 pl-3" style="font-family: fantasy;"><img src="icon/nav_logo_2.png" class="d-inline py-0 my-0" alt=""> Art of Hair<b>.</b></h3>
                          <small class="my-0 py-0" style="color: black; margin-left: 54px;">Men's Haircut & Haircare.</small>
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#services">Services</a>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">My Account</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search mr-2">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->


                        <a class="btn btn-round ml-4 bg-dark" style="color: white;" href="index.php">
                          <i class="icon-plus"></i>
                            <span>Book Appointment</span>
                        </a>

                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page_header_bg_1.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account<span><a href="index.php" class="logo ml-4 my-0">
                <h3 class="mt-0 mb-0 py-0 pl-3" style="font-family: fantasy;"><img src="icon/nav_logo_2.png" class="d-inline py-0 my-0" alt=""> Art of Hair<b>.</b></h3>
              </a></span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
                    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">My Profile</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-my-bookings-link" data-toggle="tab" href="#tab-my-bookings" role="tab" aria-controls="tab-my-bookings" aria-selected="false">My Bookings</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-payment-history-link" data-toggle="tab" href="#tab-payment-history" role="tab" aria-controls="tab-payment-history" aria-selected="false">Payment History</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" href="logout_customer.php" onclick="return confirm('Sure to logout?')">Logout</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								    	<p>Hello <span class="font-weight-normal text-dark"><?php echo $_SESSION['user_name']; ?></span> 
								    	<br>
								    	Welcome to Art Of Hair.</p>
								    </div><!-- .End .tab-pane -->



								    <div class="tab-pane fade" id="tab-my-bookings" role="tabpanel" aria-labelledby="tab-my-bookings-link">
                      <table class="table table-cart table-mobile" id="my_bookings_table">
                        <thead>
                          <tr>
                            <th>Booking Id</th>
                            <th>Booking Code</th>
                            <th>Shop No</th>
                            <th>Shop Name</th>
                            <th>Service Id</th>
                            <th>Service Name</th>
                            <th>Service Price</th>
                            <th>Booking Date</th>
                            <th>Booking Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php if($read_booking){ $i = 0; ?>
                          <?php while($result = $read_booking->fetch_assoc()){ $i = $i + 1; ?>
                          <tr>
                            <td><?php echo $result['booking_id']; ?></td>
                            <td><?php echo $result['booking_verification_code']; ?></td>
                            <td><?php echo $result['shop_no']; ?></td>
                            <td><?php echo $result['shop_name']; ?></td>
                            <td><?php echo $result['service_id']; ?></td>
                            <td><?php echo $result['service_name']; ?></td>
                            <td><?php echo $result['service_price'].' Tk.'; ?></td>
                            <td><?php echo $result['payment_date']; ?></td>
                            <td>
                                <?php
                                  $booking_verify_status = $result['booking_verify_status'];

                                    if($booking_verify_status == 1)
                                    {
                                        $msg = '<div class="m-auto badge badge-success">Confirmed</div><br />';
                                         echo $msg;
                                    }
                                    else
                                    {
                                        $msg = '<div class="m-auto badge badge-danger">Pending...</div><br />';
                                         echo $msg;
                                    }
                                 ?>
                               </td>
                            <td>
                              <a onclick="return confirm('Sure to delete booking?')" href="delete_data.php" title="cancel order" class="btn-remove d-inline"><i class="fa fa-trash-o text-danger pl-4 ml-4"></i></a>
                            </td>
                          </tr>
                          <?php } ?>
                          <?php }else{ ?>
                          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                            echo $msg; ?>
                          <?php } ?>

                        

                        </tbody>
                      </table><!-- End .table table-wishlist -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-payment-history" role="tabpanel" aria-labelledby="tab-payment-history-link">
                      <table class="table table-cart table-mobile" id="payment_history_table">
                        <thead>
                          <tr>
                            <th>Booking Id</th>
                            <th>Booking Code</th>
                            <th>Shop Name</th>
                            <th>Service Id</th>
                            <th>Service Name</th>
                            <th>Service Price</th>
                            <th>Paid Amount</th>
                            <th>TrxID</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php if($read_payment){ $i = 0; ?>
                          <?php while($result = $read_payment->fetch_assoc()){ $i = $i + 1; ?>
                          <tr>
                            <td><?php echo $result['booking_id']; ?></td>
                            <td><?php echo $result['booking_verification_code']; ?></td>
                            <td><?php echo $result['shop_name']; ?></td>
                            <td><?php echo $result['service_id']; ?></td>
                            <td><?php echo $result['service_name']; ?></td>
                            <td><?php echo "Tk. ".$result['service_price']; ?></td>
                            <td><?php echo "Tk. ".$result['paid_amount']; ?></td>
                            <td class="text-success"><?php echo $result['trx_id']; ?></td>
                            <td><?php echo $result['payment_date']; ?></td>
                            <td>
                              <a href="#" title="cancel booking" class="btn-remove d-inline"><i class="fa fa-ban text-danger"></i></a>
                            </td>
                          </tr>
                          <?php } ?>
                          <?php }else{ ?>
                          <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                            echo $msg; ?>
                          <?php } ?>

                        </tbody>
                      </table><!-- End .table table-wishlist -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="#">
			                				<div class="row">
			                					<div class="col-sm-6">
			                						<label>First Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 -->

			                					<div class="col-sm-6">
			                						<label>Last Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

		            						<label>Display Name *</label>
		            						<input type="text" class="form-control" required>
		            						<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" required>

		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2">

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer class="footer footer-2">
            <div class="footer-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="widget widget-about">
                              <a href="index.php" class="logo ml-4 my-0">
                                <h3 class="mt-0 mb-0 py-0 pl-3" style="font-family: fantasy;"><img src="icon/nav_logo_2.png" class="d-inline py-0 my-0" alt=""> Art of Hair<b>.</b></h3>
                                <small class="my-0 py-0" style="color: black; margin-left: 54px;">Men's Haircut & Haircare.</small>
                              </a>
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus. </p>

                                <div class="widget-about-info">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <span class="widget-about-title">Got Question? Call us 24/7</span>
                                            <a href="tel:123456789">+880 1401-311811</a>
                                        </div><!-- End .col-sm-6 -->
                                        
                                    </div><!-- End .row -->
                                </div><!-- End .widget-about-info -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-4 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Useful links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Contact us</a></li>
                                    <li><a href="logout_customer.php" onclick="return confirm('Sure to logout?')">Logout</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-2 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-2 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="dashboard.php">My Profile</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-2 -->

                        <div class="col-sm-6 col-lg-2">
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Our newsletter</h4><!-- End .widget-title -->

                                <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan.</p>

                                <form action="#">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- .End .input-group -->
                                </form>
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-2 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container-fluid">
                    <p class="footer-copyright">Copyright © <?php echo date("Y"); ?> Art Of Hair. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <ul class="footer-menu">
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul><!-- End .footer-menu -->

                    <div class="social-icons social-icons-color">
                        <span class="social-label">Social Media</span>
                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .container-fluid -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="megamenu-container active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#services">Services</a>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <li>
                                    <a href="dashboard.php">My Account</a>
                                </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->


    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>


    <!-- JQuery datatable plugin (js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
</body>


</html>



<!-- My Booking Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#my_bookings_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#my_bookings_table_wrapper .col-md-6:eq(0)' );
  } );

</script>


<!-- Payment History Table JS -->
<script>

  $(document).ready(function() {
    var table = $('#payment_history_table').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#payment_history_table_wrapper .col-md-6:eq(0)' );
  } );

</script>
