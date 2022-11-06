<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";
 ?>


 <!--Shop cart data load-->
 <?php
   $db   = new Database();
   $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1";
   $read = $db->select($sql);
  ?>


    <!-- Particular shop cart data load -->
  <?php
    error_reporting( error_reporting() & ~E_NOTICE );
    $db = new Database();
    $current_datetime = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
    date_default_timezone_set('Asia/Dhaka');

    if(isset($_POST['search']))
    {

      $shop_type = $_POST['shop_type'];

      $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1 AND shop_type = '$shop_type'";
      $read = $db->select($sql);

    }
   ?>

   <!-- View All Shop -->
   <?php
     if(isset($_POST['view_all']))
     {
       $db   = new Database();
       $sql  = "SELECT * FROM tb_shop WHERE shop_verify_status = 1";
       $read = $db->select($sql);
     }
    ?>



    <!--Top Rated Shop cart data load-->
 <?php
   $db   = new Database();
   $sql  = "SELECT DISTINCT shop_id,shop_image,shop_name,shop_type,shop_address FROM tb_shop_review";
   $read_top_rated_shop = $db->select($sql);
  ?>





<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Art Of Hair | Home</title>
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
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-7.css">
    <link rel="stylesheet" href="assets/css/demos/demo-7.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-7">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left py-4 ml-4">
                        <div>
                            <i class="icon-phone"></i> Call: <a href="tel:#">+880 1401-311811</a>
                        </div><!-- End .header-dropdown -->

                        <div>
                          <div>
                              <i class="icon-envelope ml-3"></i> Email: <a href="#">sajid.pciu@gmail.com</a>
                          </div><!-- End .header-dropdown -->
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right mr-4">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a  href="login.php"><i class="icon-user"></i>Login</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container-fluid">
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
                                    <a href="#haircut_and_haircare_center">Haircut & Hair Care Center</a>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right mr-4">
                      <a class="btn btn-round bg-dark" style="color: white;" href="#haircut_and_haircare_center">
                        <i class="icon-plus"></i>
                          <span>Book Appointment</span>
                      </a>
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner banner-big banner-overlay">

                            <img src="assets/images/demos/demo-7/banners/1.jpg" alt="Banner">

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-subtitle text-white">We care about your hair</h3><!-- End .banner-subtitle -->
                                <h2 class="banner-title text-white">Haircut</h2><!-- End .banner-title -->
                                <a href="#haircut_and_haircare_center" class="btn underline"><span>Book Appointment Now</span></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="banner banner-big banner-overlay">

                            <img src="assets/images/demos/demo-7/banners/2.jpg" alt="Banner">

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-subtitle text-white">We care about your hair</h3><!-- End .banner-subtitle -->
                                <h2 class="banner-title text-white">Hair Care</h2><!-- End .banner-title -->
                                <a href="#haircut_and_haircare_center" class="btn underline"><span>Book Appointment Now</span></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->

                <div class="heading heading-center mb-3 pt-3 mt-3" id="services">
                    <h2 class="title">OUR SERVICES</h2><hr class="col-6 m-auto"><!-- End .title -->
                </div><!-- End .heading -->

                <div class="row justify-content-center mx-4 px-4">

                    <div class="col-md-6 col-lg-4">
                        <div class="banner banner-overlay text-white">

                            <img src="images/9.jpg" alt="Banner">

                            <div class="banner-content banner-content-right">
                                <h4 class="banner-subtitle"><b>HAIRCUT</b></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title">MEN</h3><!-- End .banner-title -->
                                <a href="#haircut_and_haircare_center" class="btn underline btn-outline-white-3 banner-link">Book Now</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->

                    <div class="col-md-6 col-lg-4">
                        <div class="banner banner-overlay text-white">

                            <img src="images/hair_care.jpg" alt="Banner">

                            <div class="banner-content banner-content-right">
                                <h4 class="banner-subtitle"><b>HAIR CARE</b></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title">MEN</h3><!-- End .banner-title -->
                                <a href="#haircut_and_haircare_center" class="btn underline btn-outline-white-3 banner-link">Book Now</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->

                    <div class="col-md-6 col-lg-4">
                        <div class="banner banner-overlay text-white">

                            <img src="images/10.jpg" alt="Banner">

                            <div class="banner-content banner-content-right">
                                <h4 class="banner-subtitle"><b>FACIAL</b></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title">MEN</h3><!-- End .banner-title -->
                                <a href="#haircut_and_haircare_center" class="btn underline btn-outline-white-3 banner-link">Book Now</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-4 -->

                </div><!-- End .row -->
            </div><!-- End .container-fluid -->

            <div class="mb-6"></div><!-- End .mb-6 -->



            <div class="container-fluid mt-4 bg-light-2 pt-4 px-4" id="haircut_and_haircare_center">
                <div class="heading heading-center mb-3">
                    <h2 class="title">TOP RATED HAIRCUT & HAIR CARE CENTER</h2><hr class="col-6 m-auto"><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="new-women-tab" role="tabpanel" aria-labelledby="new-women-link">
                        <div class="products">
                            <div class="row justify-content-center">

                                <?php if($read_top_rated_shop){ ?>
                                <?php while($result = $read_top_rated_shop->fetch_assoc()){ ?>
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>">
                                                <img src="owner_panel/<?php echo $result['shop_image']; ?>" alt="Shop image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                              <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>List as Favourate</span></a>
                                            </div><!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>" class="btn-product"><span><i class="fa fa-plus fa-fw"></i> Book Appointment</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <h6 class="mb-0 pb-0"><a href="#"><?php echo $result['shop_name']; ?></a></h6>
                                            <small><?php echo $result['shop_type']; ?></small><!-- End .product-title -->
                                            <div class="product-price mt-2">
                                                <span class="text-muted"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>  <?php echo $result['shop_address']; ?></span>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $shop_id = $result['shop_id'];
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
                                                       $shop_id = $result['shop_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
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



                                                        <!-- Put rating strat -->
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

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                  echo $msg; ?>
                                <?php } ?>


                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->

                <div class="mb-4"></div>


                <hr class="mt-0 mb-6">

            </div><!-- End .container-fluid -->



            <div class="container-fluid mt-4 bg-light-2 pt-4 px-4" id="haircut_and_haircare_center">
                <div class="heading heading-center mb-3">
                    <h2 class="title">AVAILABLE HAIRCUT & HAIR CARE CENTER</h2><hr class="col-6 m-auto"><!-- End .title -->
                </div><!-- End .heading -->

                <div class="col-6 m-auto">
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-row">
                            <div class="form-group col-8">
                              <label for="shop_type">Shop Type <small>(What are you looking for?)</small></label>
                              <select class="form-control" id="shop_type" name="shop_type" required>
                                <option selected></option>
                                <option>Haircut</option>
                                <option>Hair Care</option>
                                <option>Haircut & Hair Care</option>
                                <option>Haircut, Hair Care and Facial</option>
                              </select>
                            </div>
                                <div class="form-group col-4">
                                  <input type="submit" class="btn" style="background-color: black; color: white; margin-top: 36px;" class="form-control" name="search" value="Search">
                                </div>
                        </div>
                        
                    </form>
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-row">
                            <div class="form-group col-3">
                              <input type="submit" class="btn" style="background-color: black; color: white;" class="form-control" name="view_all" value="View All Shop">
                            </div>
                        </div>
                        
                    </form>
                </div>

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="new-women-tab" role="tabpanel" aria-labelledby="new-women-link">
                        <div class="products">
                            <div class="row justify-content-center">

                                <?php if($read){ ?>
                                <?php while($result = $read->fetch_assoc()){ ?>
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>">
                                                <img src="owner_panel/<?php echo $result['shop_image']; ?>" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                              <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>List as Favourate</span></a>
                                            </div><!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <a href="shop_details.php?shop_id=<?php echo $result['shop_id']; ?>" class="btn-product"><span><i class="fa fa-plus fa-fw"></i> Book Appointment</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <h6 class="mb-0 pb-0"><a href="#"><?php echo $result['shop_name']; ?></a></h6>
                                            <small><?php echo $result['shop_type']; ?></small><!-- End .product-title -->
                                            <div class="product-price mt-2">
                                                <span class="text-muted"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>  <?php echo $result['shop_address']; ?></span>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">

                                                <!-- Total Review count -->
                                                 <?php
                                                     $shop_id = $result['shop_id'];
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
                                                       $shop_id = $result['shop_id'];
                                                       $db   = new Database();
                                                       $sql  = "SELECT sum(rating_value)rating_value FROM tb_shop_review WHERE shop_id = $shop_id";
                                                       $sum_of_rating_value = $db->select($sql);

                                                       while($getData = $sum_of_rating_value->fetch_assoc())
                                                       {
                                                         $total_rating = $getData['rating_value'];
                                                       }
                                                    ?>

                                                        <!-- Average rating value count -->
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



                                                        <!-- Put rating strat -->
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

                                                <span class="ratings-text">( <?php echo $total_review; ?> Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                <?php } ?>
                                <?php }else{ ?>
                                <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                                  echo $msg; ?>
                                <?php } ?>


                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->

                <div class="mb-4"></div>


                <hr class="mt-0 mb-6">


            </div><!-- End .container-fluid -->

            <div class=" pt-7 pb-6 testimonials">
                <div class="container">
                    <h2 class="title text-center mb-2">Our Customers Say</h2><!-- End .title text-center -->
                    <div class="owl-carousel owl-simple owl-testimonials" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "1200": {
                                    "nav": true
                                }
                            }
                        }'>
                        <blockquote class="testimonial testimonial-icon text-center">
                            <p class="lead">“Really great Shop</p><!-- End .lead -->
                            <p>“ Their service is really good. Thank You! ”</p>

                            <cite>
                                Abdur Rahman
                                <span>Customer</span>
                            </cite>
                        </blockquote><!-- End .testimonial -->

                        <blockquote class="testimonial testimonial-icon text-center">
                            <p class="lead">“Good Service & Well Behaved</p><!-- End .lead -->
                            <p>“ Their service is really good and they are well behaved. Thank You!”</p>

                            <cite>
                                Najmus Sajid
                                <span>Customer</span>
                            </cite>
                        </blockquote><!-- End .testimonial -->

                        <blockquote class="testimonial testimonial-icon text-center">
                            <p class="lead">“Good Service”</p><!-- End .lead -->
                            <p>“ Their service is really good. Thank You! ”</p>

                            <cite>
                                Imtiaz Uddin
                                <span>Customer</span>
                            </cite>
                        </blockquote><!-- End .testimonial -->
                    </div><!-- End .testimonials-slider owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .bg-light pt-5 pb-5 -->


        </main><!-- End .main -->

        <footer class="footer footer-2">
            <div class="footer-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="widget widget-about">
                              <a href="index.php" class="logo ml-4 my-0">
                                  <h3 class="mt-0 mb-0 py-0 pl-3" style="font-family: fantasy; color: white;"><img src="icon/nav_logo_2.png" class="d-inline py-0 my-0" alt=""> Art of Hair<b>.</b></h3>
                                  <small class="my-0 py-0" style="color: white; margin-left: 54px;">Men's Haircut & Haircare.</small>
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
                                    <li><a href="login.php">Login</a></li>
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
                                <h4 class="widget-title">Account Setting</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="login.php">Sign In</a></li>
                                    <li><a href="registration.php">Sign Up</a></li>
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
                    <p class="footer-copyright">Copyright © <?php echo date("Y"); ?> Art of Hair. All Rights Reserved.</p><!-- End .footer-copyright -->
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
                                    <a href="#haircut_and_haircare_center">Haircut & Hair Care Center</a>
                                </li>
                                <li>
                                    <a href="#">FAQs</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
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
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-7.js"></script>
</body>


<!-- molla/index-7.html  22 Nov 2019 09:56:58 GMT -->
</html>
