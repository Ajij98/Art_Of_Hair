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
       $shop_id        = $getData['shop_id'];
       $shop_image     = $getData['shop_image'];
       $shop_name      = $getData['shop_name'];
       $shop_type      = $getData['shop_type'];
       $about_shop     = $getData['about_shop'];
       $shop_no        = $getData['shop_no'];
       $service_type   = $getData['service_type'];
       $shop_available = $getData['shop_available'];
       $shop_address_details = $getData['shop_address_details'];
       $bkash_merchant_number = $getData['bkash_merchant_number'];
       $nagad_merchant_number = $getData['nagad_merchant_number'];

       $phone    = $getData['phone'];
       $email    = $getData['email'];
       $added_by = $getData['added_by'];
     }
   }
  ?>


  <!-- Service (Haircut) data select -->
  <?php
    $shop_id = $_GET['shop_id'];

    $db   = new Database();
    $sql  = "SELECT * FROM tb_shop_service WHERE shop_id = $shop_id AND service_type ='Haircut' ";
    $read_haircut = $db->select($sql);
  ?>

  
  <!-- Service (Hair Care) data select -->
  <?php
    $shop_id = $_GET['shop_id'];

    $db   = new Database();
    $sql  = "SELECT * FROM tb_shop_service WHERE shop_id = $shop_id AND service_type ='Hair Care' ";
    $read_hair_care = $db->select($sql);
  ?>


  <!-- Service (Haircut & Hair Care) data select -->
  <?php
    $shop_id = $_GET['shop_id'];

    $db   = new Database();
    $sql  = "SELECT * FROM tb_shop_service WHERE shop_id = $shop_id AND service_type ='Haircut & Hair Care' ";
    $read_haircut_and_haircare = $db->select($sql);
  ?>


  <!-- Service (Haircut, Hair Care and Facial) data select -->
  <?php
    $shop_id = $_GET['shop_id'];

    $db   = new Database();
    $sql  = "SELECT * FROM tb_shop_service WHERE shop_id = $shop_id AND (service_type ='Haircut, Hair Care and Facial' OR service_type ='Facial') ";
    $read_haircut_haircare_fac = $db->select($sql);
  ?>



  <!-- ///// Review Section ///// -->


  <!--Shop Review load-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_shop_review WHERE shop_id = $shop_id AND shop_owner = '$added_by'";
   $read_shop_review = $db->select($sql);
  ?>


  <!-- Total Review count -->
 <?php
     $db   = new Database();
     $sql  = "SELECT * FROM tb_shop_review WHERE shop_id = $shop_id";
     $read_total_review = $db->select($sql);
     if($read_total_review)
     {
       $total_review = $read_total_review->num_rows;
     }
     else
     {
       $total_review = 0;
     }
    ?>


    <!-- Total rating value count -->
<?php
   $db   = new Database();
   $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
   $sum_of_rating_value = $db->select($sql);

   while($getData = $sum_of_rating_value->fetch_assoc())
   {
     $total_rating = $getData['rating_value'];
   }
?>


<?php 
  
  error_reporting( error_reporting() & ~E_NOTICE );
  if ($total_rating == 0 AND $total_review == 0) 
  {
    $avg_rating = 0;
  }
  else
  {
    $avg_rating = (int) ($total_rating/$total_review);
  }

 ?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Art Of Hair | Shop Details</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">

    <!-- Fontawsome (Version-4.7.0)-->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


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


                        <a class="btn btn-round ml-4 bg-dark" style="color: white;" href="#services">
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
                        <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
                    </ol>

                    
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="../owner_panel/<?php echo $shop_image; ?>" data-zoom-image="../owner_panel/<?php echo $shop_image; ?>" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?php echo $shop_name; ?> <small>(<?php echo $shop_type; ?>)</small></h1><!-- End .product-title -->

                                    <div class="ratings-container">

                                      <?php 

                                        if($avg_rating == 0)
                                        {
                                          ?>

                                            <i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                          <?php
                                        }
                                        else if($avg_rating == 1)
                                        {
                                          ?>

                                            <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                          <?php
                                        }
                                        else if($avg_rating == 2)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                            <?php
                                        }
                                        else if($avg_rating == 3)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                            <?php
                                        }
                                        else if($avg_rating == 4)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                            <?php
                                        }
                                        else if($avg_rating >= 5)
                                        {
                                            ?>

                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                            <?php
                                        }

                                       ?>
                                        
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( <?php echo $total_review; ?> Review )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-content">
                                        <p><?php echo $about_shop; ?> </p>
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <p><span class="text-primary">Shop No:</span> <?php echo $shop_no; ?></p>
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <p><span class="text-primary">Our Location:</span> <?php echo $shop_address_details; ?></p>
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <p><span class="text-primary">Our Services:</span> We care about <?php echo $services_for; ?> Given below</p>
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <a href="shop_review.php?shop_id=<?php echo $shop_id; ?>" class="btn btn-outline-primary py-3"><span><i class="fa fa-star-o" aria-hidden="true"></i>Add Review</span></a>
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <p><span>Available:</span><?php echo $shop_available; ?></p>
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Find Us:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Shop information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Contact information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="payment-info-link" data-toggle="tab" href="#payment-info-tab" role="tab" aria-controls="payment-info-tab" aria-selected="false">Payment information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (<?php echo $total_review; ?>)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Shop Information</h3><hr>

                                    <p><span class="text-primary">Shop No:</span> <?php echo $shop_no; ?></p><br>

                                    <p><span class="text-primary">Shop Name:</span> <?php echo $shop_name; ?>, <?php echo $shop_type; ?></p><br>

                                    <p><span class="text-primary">Location:</span> <?php echo $shop_address_details; ?></p><br>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="payment-info-tab" role="tabpanel" aria-labelledby="payment-info-link">
                                <div class="product-desc-content">
                                    <h3>Payment Information</h3>
                                    <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> You have to pay at least Tk. 100 advance to confirm your booking.</p>
                                    <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Save your payment history for future evidence.</p>
                                    <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> You can pay by Bkash or Nagad, which has been given below.</p>
                                    <p class="mb-3"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Make sure your advance payment accepted by shop owner or not.</p>
                                    <div class="row">
                                        <div class="col-lg-4 mr-0 pr-0">
                                          <p><img src="payment_icon/bkash.svg" width="120"> Bkash Merchant Number : <b><?php echo $bkash_merchant_number; ?></b></p>
                                        </div>
                                        <div class="col-lg-4 ml-0 pl-0">
                                         <p><img src="payment_icon/nagad.png" width="120"> Nagad Merchant Number : <b><?php echo $nagad_merchant_number; ?></b></p>
                                        </div>
                                    </div>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                  <h3>Contact Information</h3><hr class="mt-0">

                                  <p class="mb-2"><u>CONTACT US</u></p>

                                  <p class="mb-2"><span class="text-primary">Contact No:</span> <?php echo $phone; ?></p>

                                  <p><span class="text-primary">Email:</span> <?php echo $email; ?></p><br>

                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews (<?php echo $total_review; ?>)</h3>


                                    <?php if($read_shop_review){ $i = 0; ?>
                                    <?php while($result = $read_shop_review->fetch_assoc()){ $i = $i + 1; ?>
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#"><?php echo $result['reviewed_by']; ?></a></h4>
                                                <div class="ratings-container">
                                                    <?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star-o fa-fw"></i>

                                                            <?php
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            ?>

                                                              <i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i><i class="fa fa-star text-warning fa-fw"></i>

                                                            <?php
                                                        }
                                                     ?>
                                                </div><!-- End .rating-container -->
                                                <span class="review-date"><?php echo $result['entry_time']; ?></span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4><?php
                                                      $rating_value = $result['rating_value'];

                                                        if($rating_value == 1)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-danger">Awful</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 2)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-warning " style="color: white;">Poor</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 3)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-secondary">Average</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 4)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-info">Good</div><br />';
                                                             echo $msg;
                                                        }
                                                        else if($rating_value == 5)
                                                        {
                                                            $msg = '<div class="m-auto badge badge-success">Excellent</div><br />';
                                                             echo $msg;
                                                        }
                                                     ?></h4>

                                                <div class="review-content">
                                                    <p><?php echo $result['comment']; ?></p>
                                                </div><!-- End .review-content -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Review Found!</div><br />';
                                      echo $msg; ?>
                                    <?php } ?>

                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <div id="services">

                    </div>

                    <h2 class="title text-center mb-4">Our Services (Haircut) <hr></h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        <?php if($read_haircut){ ?>
                        <?php while($result = $read_haircut->fetch_assoc()){ ?>
                        <div class="product product-7 text-center shadow" style="border-radius: 5px;">
                            <figure class="product-media">
                                <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>">
                                    <img src="../owner_panel/<?php echo $result['service_image']; ?>" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to favourate</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>" class="btn-product"><span><i class="fa fa-plus fa-fw"></i> Book Now</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title"><a href="#"><?php echo $result['service_name']; ?></a></h3><!-- End .product-title -->
                                <div class="product-price my-4">
                                    Price: <?php echo "Tk. ".$result['service_price']; ?>
                                </div><!-- End .product-price -->
                                
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        <?php } ?>
                        <?php }else{ ?>
                        <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                            echo $msg; ?>
                        <?php } ?>

                </div><!-- End .container -->


                <h2 class="title text-center mb-4">Our Services (Hair Care) <hr></h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":1
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <?php if($read_hair_care){ ?>
                    <?php while($result = $read_hair_care->fetch_assoc()){ ?>
                    <div class="product product-7 text-center shadow" style="border-radius: 5px;">
                        <figure class="product-media">
                            <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>">
                                <img src="../owner_panel/<?php echo $result['service_image']; ?>" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to favourate</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>" class="btn-product"><span><i class="fa fa-plus fa-fw"></i> Book Now</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="#"><?php echo $result['service_name']; ?></a></h3><!-- End .product-title -->
                            <div class="product-price my-4">
                                Price: <?php echo "Tk. ".$result['service_price']; ?>
                            </div><!-- End .product-price -->
                            
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                    <?php } ?>
                    <?php }else{ ?>
                    <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                        echo $msg; ?>
                    <?php } ?>

            </div><!-- End .container -->


            <h2 class="title text-center mb-4">Our Services (Haircut & Hair Care) <hr></h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                <?php if($read_haircut_and_haircare){ ?>
                <?php while($result = $read_haircut_and_haircare->fetch_assoc()){ ?>
                <div class="product product-7 text-center shadow" style="border-radius: 5px;">
                    <figure class="product-media">
                        <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>">
                            <img src="../owner_panel/<?php echo $result['service_image']; ?>" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to favourate</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>" class="btn-product"><span><i class="fa fa-plus fa-fw"></i> Book Now</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="#"><?php echo $result['service_name']; ?></a></h3><!-- End .product-title -->
                        <div class="product-price my-4">
                            Price: <?php echo "Tk. ".$result['service_price']; ?>
                        </div><!-- End .product-price -->
                        
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                <?php } ?>
                <?php }else{ ?>
                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                    echo $msg; ?>
                <?php } ?>
                
        </div><!-- End .container -->




        <h2 class="title text-center mb-4">Our Services (Haircut, Hair Care & Facial) <hr></h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                <?php if($read_haircut_haircare_fac){ ?>
                <?php while($result = $read_haircut_haircare_fac->fetch_assoc()){ ?>
                <div class="product product-7 text-center shadow" style="border-radius: 5px;">
                    <figure class="product-media">
                        <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>">
                            <img src="../owner_panel/<?php echo $result['service_image']; ?>" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to favourate</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="book_appointment.php?shop_id=<?php echo $shop_id; ?>&service_id=<?php echo $result['service_id']; ?>" class="btn-product"><span><i class="fa fa-plus fa-fw"></i> Book Now</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="#"><?php echo $result['service_name']; ?></a></h3><!-- End .product-title -->
                        <div class="product-price my-4">
                            Price: <?php echo "Tk. ".$result['service_price']; ?>
                        </div><!-- End .product-price -->
                        
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                <?php } ?>
                <?php }else{ ?>
                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                    echo $msg; ?>
                <?php } ?>
                
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

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

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


<!-- molla/book_appointment.html  22 Nov 2019 09:55:05 GMT -->
</html>
