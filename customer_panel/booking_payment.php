<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>



 <!-- Select particular shop details -->
 <?php
   error_reporting( error_reporting() & ~E_NOTICE );
   $db = new Database();
   $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
   date_default_timezone_set('Asia/Dhaka');

   if(isset($_GET['shop_id']))
   {

     $shop_id = $_GET['shop_id'];

     $sql = "SELECT * FROM tb_shop WHERE shop_id = $shop_id";

     $result = $db->select($sql);

     while($getData = $result->fetch_assoc())
     {
       $shop_id                = $getData['shop_id'];
       $shop_name              = $getData['shop_name'];
       $shop_verification_code = $getData['shop_verification_code'];
       $added_by               = $getData['added_by'];
     }
   }
  ?>


  <!-- Review section -->
  <?php
    $user_name = $_SESSION['user_name'];
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['submit']))
    {
          if(check_Duplicate_Review())
          {
            $shop_id      = $_POST['shop_id'];
            $shop_name    = $_POST['shop_name'];
            $shop_code    = $_POST['shop_code'];
            $rating_value = $_POST['rating_value'];
            $comment      = $_POST['comment'];
            $reviewed_by  = $user_name;
            $shop_owner   = $added_by;

            $sql = "INSERT INTO tb_shop_review(shop_id,shop_name,shop_code,rating_value,comment,shop_owner,reviewed_by,entry_time)values('$shop_id','$shop_name','$shop_code','$rating_value','$comment','$shop_owner','$reviewed_by','$current_datetime')";
            $insert_row = $db->insert($sql);

            if($insert_row)
            {
            ?>

            <script type="text/javascript">

              window.alert("Your review submitted successfully. Thank You!");
              window.location="shop_details.php?shop_id=<?php echo $shop_id; ?>";

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
    }

    function check_Duplicate_Review()
    {
      $shop_id = $_GET['shop_id'];
      $user_name  = $_SESSION['user_name'];
      $db     = new Database();
      $sql    = "SELECT * FROM tb_shop_review WHERE shop_id='".$_POST['shop_id']."' AND reviewed_by='$user_name'";
      $result = $db->select($sql);
      if($result->num_rows > 0)
      {
        ?>

        <script type="text/javascript">

          window.alert("Warning! You review already counted, you can't give multiple review. Thank you!");
          window.location="shop_details.php?shop_id=<?php echo $shop_id; ?>";

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
<html lang="en">


<!-- molla/product.html  22 Nov 2019 09:54:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Art Of Hair - Booking Payment</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Fontawsome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
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
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="dashboard.php">My Account</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Payment</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">

                          <div class="col-9 m-auto shadow px-4 p-4" style="border-radius: 5px; border-top: 1px solid;">

                            <h6 class="mt-1">Booking Confirmation Payment</h6><hr class="mt-0">

                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <label>Your Name *</label>
                                      <input type="text" name="customer_name" class="form-control" value="<?php echo $customer_name; ?>" readonly>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Phone *</label>
                                      <input type="text" name="customer_phone" class="form-control" value="<?php echo $customer_phone; ?>" readonly>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Address *</label>
                                      <input type="text" name="customer_address" class="form-control" value="<?php echo $customer_address; ?>" readonly>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-6">
                                      <label>Booking Id *</label>
                                      <input type="text" name="order_id" class="form-control" value="<?php echo $order_id; ?>" readonly>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Booking Code *</label>
                                        <input type="text" name="order_code" class="form-control" value="<?php echo $order_code; ?>" readonly>
                                    </div>
                                  </div>

            			                <div class="row">
                                    <div class="col-sm-4">
                                      <label>Shop Id *</label>
                                      <input type="text" name="product_id" class="form-control" value="<?php echo $product_id; ?>" readonly>
                                    </div>

            			                	<div class="col-sm-4">
            			                		<label>Shop Name *</label>
            			                		<input type="text" name="product_title"  class="form-control" value="<?php echo $product_title; ?>" readonly>
            			                	</div>

                                    <div class="col-sm-4">
            			                		<label>Shop Code *</label>
            			                		<input type="text" name="product_code" class="form-control" value="<?php echo $product_code; ?>" readonly>
            			                	</div>
            			                </div>

                                  <div class="row">
                                     <div class="col-sm-6">
                                      <label>Service Price *</label>
                                        <input type="text" name="product_price" class="form-control" value="<?php echo $product_price; ?>" readonly>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Paid Amount *</label>
                                      <input type="text" name="paid_amount" class="form-control" required>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-6">
                                        <label>Paid By *</label>
                                        <select name="payment_method" class="form-control" required>
                                          <option selected>Select one please</option>
                                          <option>Bkash</option>
                                          <option>Nagad</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                      <label>Bkash/Nagad Account Number *</label>
                                      <input type="text" name="bkash_nagad_acc_number" class="form-control" required>
                                    </div>
                                  </div>

      		                				<div class="row">
                                                <div class="col-sm-6">
                                      <label>TrxID *</label>
                                                    <input type="text" name="trx_id" class="form-control" required>
                                                </div>

                                    <div class="col-sm-6">
                                      <label>Payment Screenshot *</label>
                                                    <input type="file" name="payment_ss" class="form-control" required>
                                                </div>
                                            </div>

                                  <label>Payment Date *</label>
                                  <input type="date" name="payment_date" class="form-control" required>

      		                		<input type="submit" name="submit" class="btn btn-primary btn-round" value="Submit Payment">

      			               </form>

                          </div>

                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
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
                                    <li><a href="logout_customer.php">Logout</a></li>
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
    <button style="border-radius: 5px;" id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


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

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
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
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                          <li><a href="#">Computer & Laptop</a></li>
                          <li><a href="#">Smart Phones</a></li>
                          <li><a href="#">Televisions</a></li>
                          <li><a href="#">Camera</a></li>
                          <li><a href="#">Lighting</a></li>
                          <li><a href="#">Cooking</a></li>
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

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
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>
