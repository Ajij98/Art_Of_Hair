<?php
  session_start();

  include "include/Config.php";
  include "include/Database.php";


  if(!isset($_SESSION['user_name']))
  {
    header('location:../login.php');
  }
 ?>


 <!-- Shop payment table data load -->
 <?php
   $user_name = $_SESSION['user_name'];
   $db   = new Database();
   $sql  = "SELECT * FROM tb_shop_payment WHERE payment_added_by = '$user_name'";
   $read_shop_payment = $db->select($sql);
  ?>




<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Art Of Hair | Shop Payment History</title>
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

  <!-- jQuery Datatable Plugin (css) -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">

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
						<h4 class="page-title">Shop Payment History</h4>
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title d-inline">Payment List</div>
									</div>
									<div class="card-body">

                    <table id="shop_payment_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                              <th>Payment Id</th>
                              <th>Payment Code</th>
                              <th>Shop Id</th>
                              <th>Shop Name</th>
                              <th>Shop Address</th>
                              <th>Paid Amount</th>
                              <th>Paid By</th>
                              <th>Payment Account Number</th>
                              <th>TrxID</th>
                              <th>Payment Screenshot</th>
                              <th>Payment Verify Status</th>
							  <th>Payment Date</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        	<?php if($read_shop_payment){ $i = 0; ?>
                            <?php while($result = $read_shop_payment->fetch_assoc()){ $i = $i + 1; ?>
                            <tr>
                              <td class="text-success font-weight-bold"><?php echo "Payment Id-".$result['payment_id']; ?></td>
                              <td><?php echo $result['payment_verification_code']; ?></td>
                              <td><?php echo "Shop Id-".$result['shop_id']; ?></td>
                              <td><?php echo $result['shop_name']; ?></td>
                              <td><?php echo $result['shop_address_details']; ?></td>
                              <td><?php echo "Tk. ".$result['paid_amount']; ?></td>
                              <td><?php echo $result['paid_by']; ?></td>
                              <td>01856253644</td>
                              <td class="text-success"><?php echo $result['Trx_ID']; ?></td>
                              <td><img src="<?php echo $result['payment_ss_img'] ?>" height="80"></td>
                              <td>
							    <?php
                                  $payment_verify_status = $result['payment_verify_status'];

                                    if($payment_verify_status == 1)
                                    {
                                        $msg = '<div class="m-auto badge badge-success">Accepted</div><br />';
                                         echo $msg;
                                    }
                                    else
                                    {
                                        $msg = '<div class="m-auto badge badge-danger">Not accept yet</div><br />';
                                         echo $msg;
                                    }
                                 ?>
							   </td>
							  <th><?php echo $result['payment_date']; ?></th>
                              <td><a href="update_shop_payment.php?payment_id=<?php echo $result['payment_id']; ?>" title="update" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> || <a href="delete_data.php?payment_id=<?php echo $result['payment_id']; ?>" title="delete" onclick="return confirm('Sure to delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td></td>
                            </tr>
                            <?php } ?>
                            <?php }else{ ?>
                            <?php $msg = '<div class="alert alert-warning alert-dismissable w-75 m-auto" id="flash-msg">No Data Found!</div><br />';
                               echo $msg; ?>
                            <?php } ?>

                        </tbody>
                      </table>

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

<!-- JQuery datatable plugin (js) -->
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


</html>


<script>

  $(document).ready(function() {
    var table = $('#shop_payment_table').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#shop_payment_table_wrapper .col-md-6:eq(0)' );
  } );

</script>
