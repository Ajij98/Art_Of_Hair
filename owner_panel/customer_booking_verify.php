<?php
  //session_start();

  include "include/Config.php";
  include "include/Database.php";
 ?>



  <!--Customer booking verification section-->
  <?php
   $db = new Database();

     if(isset($_GET['booking_id']))
     {
       $booking_id = $_GET['booking_id'];

       $sql = "SELECT booking_verify_status FROM tb_customer_booking WHERE booking_verify_status = 0 AND booking_id = '$booking_id' LIMIT 1";

       $result = $db->link->query($sql) or die($this->link->error.__LINE__);

       if($result->num_rows == 1)
       {
         $sql = "UPDATE tb_customer_booking SET booking_verify_status = 1 WHERE booking_id = '$booking_id' LIMIT 1";

         $update = $db->link->query($sql) or die($this->link->error.__LINE__);

         if($update)
         {
           ?>
           <script type="text/javascript">

             window.alert("Booking confirmed successfully.");
             window.location='customer_bookings.php';

           </script>
           <?php
         }
         else
         {
           echo $db->link->error;
         }
       }
       else
       {
         $msg = '<br /><br /><br /><div class="alert alert-danger w-50 m-auto text-center">Something went wrong!</div><br />';
         echo $msg;
       }
     }
     else
     {
       die("Something went wrong!");
     }
   ?>
