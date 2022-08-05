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
  <title>Jamindars Palace || Contact</title>
  <?php include(SERVER_SCREEN_PATH.'head.php') ?>
</head>

<body>
  <div class="preloader">
    <div class="table">
      <div class="inner">
        <h5 class="preloader-text">LOADING PLEASE WAIT</h5>
        <img src="images/preloader.gif" alt="Image" class="preloader-img">
      </div>
    </div>
  </div>
  <?php include(SERVER_SCREEN_PATH.'sidebar.php') ?>

  <header class="int-header">
    <?php include(SERVER_SCREEN_PATH.'navbar.php') ?>
  </header>

  <section class="contact">
    <div class="bgDot"></div>
    <div class="contactHeader">
      <div class="headerbg"></div>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
            <h2>Contact</h2>
            <p class="lead"><a href="<?php echo FRONT_BOOKING_SITE ?>">Home</a> // <a href="">Contact</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="contactAddress">
        <div class="container">
          <div class="row align-items-center"
            style="background: white;box-shadow: 0 5px 25px #00000047;width: 96%;margin-left: 0%;z-index: 1;position: relative;">
            
            <div class="col-md-4 col-sm-6 col-xs-12">
              <address style="padding-top: 15px; margin-bottom: 0px;">
                <h3>HOTEL LOCATION</h3>
                <p>Chakratirtha Road, Near Pantha Niwas, Puri, Odisha 752002, India<br>
              </address>
              
              <address style="padding-top: 15px;">
                <h3>FOR RESERVATION</h3>
                <p style="word-break: break-all;">Website: <a href="<?php echo FRONT_BOOKING_SITE ?>">
                    <?php echo FRONT_BOOKING_SITE ?>
                  </a>
              </address>
              
            </div>

            

            <div class="col-md-4 col-sm-6 col-xs-12">
              <a style="padding: 10px 20px;background: #d57503;display: block;color: wheat;font-size: 31px;" target="_blank" href="https://jamindars.retrox.in/quick-pay.php" class="reservation">Pay Advance</a>
            </div>
            
            <div class="col-md-4 col-sm-6 col-xs-12">
              <address style="padding-top: 15px;">
                <h3>CONTACT US</h3>
                <p>Email: <a href="#">
                    <?php echo hotelDetail()['email'] ?>
                  </a>
                  <br>
                  tel: <a href="tel:<?php echo hotelDetail()['primaryphone'] ?>"> <?php echo hotelDetail()['primaryphone'] ?></a> <br/>
                  tel: <a href="tel:7682830918"> 7682830918</a>
                </p>
              </address>
            </div>
            
            
          </div>
        </div>
      </div>


    <div id="map">
    
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15015.959088512338!2d85.832585!3d19.798031!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc3ae4d6dfe30be72!2z4Kyc4Kyu4Ky_4Kym4Ky-4KywIOCsquCtjeCtn-CsvuCssuCth-CstiBKYW1pbmRhcidzIFBhbGFjZSAtIEJlYWNoIFNpZGUgSG90ZWw!5e0!3m2!1sen!2sin!4v1644478532909!5m2!1sen!2sin"
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="contact-form">
            <div class="contactFormContent">
              <h3>Contact Form</h3>
              <form>
                <div class="form-group">
                  <label>Your Name</label>
                  <input type="text" placeholder="Type your name">
                </div>
                <div class="form-group">
                  <label>Your E-mail</label>
                  <input type="text" placeholder="Type your e-mail">
                </div>
                <div class="form-group">
                  <label>Subject </label>
                  <input type="text" placeholder="Type subject">
                </div>
                <div class="form-group">
                  <label>Your message</label>
                  <textarea placeholder="Type your message"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit"><span data-hover="SUBMIT">SUBMIT</span></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include(SERVER_SCREEN_PATH.'footer.php') ?>

  <script src="js/jquery.min.js"></script>
  <script type="text/javascript">
    (function ($) {
      $(window).load(function () {
        $("body").addClass("page-loaded");
      });
    })(jQuery)
  </script>

  <?php include(SERVER_SCREEN_PATH.'script.php') ?>

  <script>
    $('.language li').removeClass('active');
    $('.language li a[href$="contact.php"]').parent().addClass('active');
  </script>

</body>

</html>