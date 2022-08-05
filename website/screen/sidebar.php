<div class="preloader">
    <div class="table">
      <div class="inner">
        <h5 class="preloader-text">LOADING PLEASE WAIT</h5>
        <img src="images/preloader.gif" alt="Image" class="preloader-img">
      </div>
    </div>
</div>

<aside class="navigation">
    <div class="top">Welcome to <?php echo hotelDetail()['name'] ?></div>
    <div class="table">
      <div class="inner">
        <div class="d_none">
          <ul>
            <li><a href="tel:<?php echo hotelDetail()['primaryphone'] ?>">tel: <?php echo hotelDetail()['primaryphone'] ?></a></li>
        
            <li><a href="mailto:<?php echo hotelDetail()['email'] ?>">Email: <?php echo hotelDetail()['email'] ?></a></li>
          </ul>
        </div>
        <div class="d_md_none">
          <ul>
            <li class="active"><a href="<?php echo FRONT_SITE ?>">Home</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/about.php">About Us</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/gallery.php">Gallery</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/policy.php">Policy</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/contact.php">Contact</a></li>
            <a target="blank" href="<?php echo FRONT_BOOKING_SITE ?>" class="reservation spacial_btn" style="position: relative;">Book Now</a>
          </ul>
        </div>
      </div>
    </div>
    <div class="bottom">© <?php echo date('Y') ?> <?php echo hotelDetail()['name'] ?>. All rights reserved.</div>

</aside>

<div class="search-box">
    <div class="table">
      <div class="inner">
        <div class="container">
          <h2>SEARCH</h2>
          <form>
            <input type="text" placeholder="Type here to search">
            <button type="submit">SEARCH</button>
            <a href="#">ADVANCED SEARCH</a>
          </form>
        </div>
      </div>
    </div>
</div>
  
<aside class="main-side">
    <div class="hamburger-menu"> <span></span> <span></span> <span></span> </div>
    <ul class="social-media">
      <li><a target="blank" href="https://www.facebook.com/jamindarspalacepuriodisha" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li><a target="blank" href="https://www.instagram.com/jamindarspalace" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      <li><a target="blank" href="<?php echo FRONT_BOOKING_SITE ?>" target="_blank"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a></li>
    </ul>
    <div class="search"> <a target="blank" href="<?php echo FRONT_BOOKING_SITE ?>/admin" target="_blank"><i class="fa fa-tachometer" aria-hidden="true"></i></a></div>

</aside>