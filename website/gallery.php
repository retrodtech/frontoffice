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
  <title>Jamindars Palace || Gallery</title>
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

  <section class="gallery" style="padding: 0 0 0;">
    <div class="header_area" style="padding: 100px 0 0px;position: relative;">
    <div class="headerbg"></div>
    <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
            <h2>Gallery</h2>
            <p class="lead"><a href="<?php echo FRONT_SITE ?>">Home</a> // <a href="">Gallery</a></p>
          </div>
        </div>
      </div>
  </div>
  

    <div class="row" style="margin-left: 0;padding: 50px 0;background: white;">

      <?php
      
        $sql = mysqli_query($conDB, "select * from gallery");
        if(mysqli_num_rows($sql)>0){
          while($imgrow = mysqli_fetch_assoc($sql)){
            $img = FRONT_SITE_IMG.'gallery/'.$imgrow['img'];
            echo '

            <div class="col-md-4 col-sm-4 col-xs-12">
              <figure>
                <a href="'.$img.'" class="fancybox">
                  <img src="'.$img.'">
                </a>
                <figcaption><span>'.$imgrow['text'].'</span></figcaption>
              </figure>
            </div>
            
            ';
          }
        }
      
      ?>
      
      

    </div>


  </section>


  <?php include(SERVER_SCREEN_PATH.'footer.php') ?>

  <!-- JS FILES -->
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
    $('.language li a[href$="gallery.php"]').parent().addClass('active');
  </script>

</body>

</html>