<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12"> <img src="images/logo-light.png" alt="Image" class="logo">
          <p style="color: #8f939d;"><?php echo hotelDetail()['description'] ?></p>
         
        </div>
        <div class="col-md-5 col-sm-6 col-xs-12">
          <h4 class="footer-title">EXPLORE</h4>
          <ul class="footer-menu">
            <li><a href="<?php echo FRONT_SITE ?>">Home</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/about.php">About Us</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/gallery.php">Gallery</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/blog.php">Blog</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/policy.php">Policy</a></li>
            <li><a href="<?php echo FRONT_SITE ?>/contact.php">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h4 class="footer-title">CONTACT</h4>
          <ul class="footer-menu">
            <li>
              <span>
              <i class="fa fa-mobile"></i>
              <a href=""><?php echo hotelDetail()['primaryphone'] ?></a>
              </span>
              <span><i class="fa fa-envelope-o"></i>
              <a href=""><?php echo hotelDetail()['email'] ?></a></span>
            </li>
              
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-xs-12"><span class="copyright"> © <?php echo date('Y') ?> <a href="<?php echo hotelDetail()['url'] ?>"><?php echo hotelDetail()['name'] ?></a> | All
              rights reserved. </span></div>
  
          <div class="col-sm-4 col-xs-12"><span class="creation">Powered By <a
                href="https://retrosolution.com" target="blank">Retrod</a></span> </div>
    
        </div>
      </div>
    </div>
  </footer>
  
  <div class="mobileVersionActive">
      <a target="_blank" href="<?php echo FRONT_BOOKING_SITE ?>" class="bookbtn" >Book Now</a>
      <!--<a style="margin: 0 0 0 15px;" target="_blank" href="https://jamindars.retrox.in/quick-pay.php" class="paybtn" >Pay Now</a>-->
  </div>
  
  
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/623426eaa34c2456412ba294/1fudrg1g6';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PP65MF6NZY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PP65MF6NZY');
</script>