<?php

include ('booking/admin/include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jamindars Palace || Policy</title>
  <?php include(SERVER_SCREEN_PATH.'head.php') ?>
</head>

<body>
<div class="preloader">
  <div class="table">
    <div class="inner">
      <h5 class="preloader-text">LOADING PLEASE WAIT</h5>
      <img src="images/preloader.gif" alt="Image" class="preloader-img"> </div>
   
  </div>
</div>

<?php include(SERVER_SCREEN_PATH.'sidebar.php') ?>

<header class="int-header">
  <?php include(SERVER_SCREEN_PATH.'navbar.php') ?>
</header>

<section class="intro">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
        <h2>Policy</h2>
        <p class="lead"><a href="<?php echo FRONT_SITE ?>">Home</a> // <a href="">Policy</a></p> </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>


<!-- end quarto-full-image -->
<section class="core-values policy">
<div class="container">
    <div class="row">

      <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12" style="padding: 50px 0;">
      <h5>Reservation :</h5>
        <p>Please make advance reservations via telephone or book online to assure room availability.</p>

        <p>A deposit is required to obtain a confirmed reservation. Please note the cancellation policy before committing to a reservation.</p>

        <p>Rates may change without notice and may vary for special events except for confirmed reservation (deposit taken).</p>
<br/>
    <h5>Occupancy:</h5>

        <p>Normal occupancy is one person per room. Additional person is extra chargeable.</p>
<br/>
    <h5>Deposit :</h5>

    <p>To confirm your reservations, a deposit equal to a minimum of one night's room rate, or 50% of the entire stay's Whichever is more is must for confirm reservation. We accept American Express, Maestro, Visa and MasterCard. For alternate arrangements, please contact the Hotel.</p>

    <p>For Corporate reservations secured by a company credit card, the deposit requirement may be waived at the discretion of the Hotel. Please inquire before making a reservation.</p>

    <p>Group bookings of four or more rooms requires a 30 day cancellation notice for return of the deposit.</p>
<br/>
    <h5>Cancellation and Early Checkout Policy:</h5>

    <p>Once the Booking done.</p>

    <p>No Refund Policy.</p>

    <p>If you want to cancel you can avail the same amount of booking with in one year.</p>
<br/>
    <table width="400px">
        <tr>
            <th>Reserved Nights</th>
            <th>Cancellation prior to arrival</th>
        </tr>
        <tr>
            <td>1</td>
            <td>48 hours</td>
        </tr>
        <tr>
            <td>2-6</td>
            <td>7 days</td>
        </tr>
        <tr>
            <td>7</td>
            <td>14 days</td>
        </tr>
    </table>

<br/>
    <h5>Refund Policy:</h5>
    <p>Reservation payments are non refundable but it can be adjusted in the next visit of yours within one year.</p>

    <p>Provided you must confirm us before 07 days in advance from the date of arrival. Entire advance shall be forfeited if the reservation is cancelled within one week of the scheduled arrival or the guest fails to check in one due date. All disputes shall strictly be subjects to the jurisdiction of Puri Court only.</p>
    <p>Cheques are accepted subject to realisation.</p>
<br/>
    <h5>Check In 10 Am :</h5>
    <p>Check Out Time 08 Am. (Late Check In/Out - Extra Charges Will Be Added.)</p>
<br/>
    <h5>Modification:</h5>
    <p>We require 7 days before original arrival date for the amendment request. Any modifications are subject to availability at the time you make the request. Modifications made less than 7 days before original arrival date may be liable for the fees as a result of the late modification of Rs.500</p>
<br/>
    <h5>Non-arrival to the Hotel (No Show) :</h5>
    <p>If you fail to arrive at the hotel on the arrival date the entire reservation will be cancelled automatically by the hotels and you will be charged the cost of the whole reservation.</p>

    <p>If you fail to check in on the first date but still continue your travel plan to stay at the hotel, please urgently contact us so that we can keep the room for you for the rest of the nights. Otherwise as mentioned above, the entire reservation will be auto-cancelled and no refund will be issued.</p>

    <p>Shorten Stay (Early check-out) :</p>
    <p>Shorten stay is subject to whole period charge whether or not you stay the whole period.</p>
    <p>If you know that you are changing your plan, please contact us as early as possible to minimize the charge by the hotel.</p>
<br/>
    <h5>Special Request :</h5>
    <p>Please note all the requests will not be guaranteed as they are subject to availability upon your arrival to the hotel only.</p>

    <p>In case that there is an accessibility request (i.e. wheelchair accessible room), please contact us before submitting the reservation.</p>
<br/>
    <h5>Payment Security :</h5>
    <p>It is important for you to know that whenever you provide us with personal details or credit card information, it is secure. Your credit card number, name, address, and telephone number are protected by the latest security technology. Upon checkout, your credit card information is directly transferred to the bank and securely tested.</p>
<br/>
    <h5>Delivery & Returns:</h5>
    <p>Delivery and returns are not applicalbe.</p>

    <h5>Shipping:</h5>
    <p>Shipping is not applicable.</p>



      </div>
      
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>



<?php include(SERVER_SCREEN_PATH.'footer.php') ?>

<!-- JS FILES --> 
<script src="js/jquery.min.js"></script> 
<script type="text/javascript">
(function($) {
	$(window).load(function(){
		$("body").addClass("page-loaded");	
	});
})(jQuery)
</script> 

<?php include(SERVER_SCREEN_PATH.'script.php') ?>

<script>
  $('.language li').removeClass('active');
  $('.language li a[href$="policy.php"]').parent().addClass('active');
</script>

</body>

</html>