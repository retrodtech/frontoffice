<?php

include ('../include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="favicons/img-apple-icon.png">
  <link rel="icon" type="image/png" href="favicons/img-favicon.png">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <title>Dashboard </title>

<?php include(FO_SERVER_SCREEN_PATH.'link.php') ?>


</head>

<body class="g-sidenav-show  bg-gray-100">

<?php include(FO_SERVER_SCREEN_PATH.'sidebar.php') ?>
  

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include(FO_SERVER_SCREEN_PATH.'navbar.php') ?>

    <div class="container-fluid py-4" >
      <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
          <div class="card card-plain mb-4">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <h2 class="font-weight-bolder mb-0">Booking Statistics</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="dashboardCard">
            

          </div>
          
        </div>
      </div>

      <div class="row mt-4">
        

      </div>

      <div class="row" style="opacity:.1">
        <div class="col-12">
          <div id="globe" class="position-absolute end-0 top-10 mt-sm-3 mt-7 me-lg-7">
            <canvas width="700" height="600" class="w-lg-100 h-lg-100 w-75 h-75 me-lg-0 me-n10 mt-lg-5"></canvas>
          </div>
        </div>
      </div>
      <?php include(FO_SERVER_SCREEN_PATH.'footer.php') ?>
    </div>

  </main>



  <?php include(FO_SERVER_SCREEN_PATH.'script.php') ?>


  <script>
      $('#navTopBar').hide();
      $('.nav-link').removeClass('active');
      $('.frontOfficeLink').addClass('active');
      $('.dashboardLink').addClass('active');   
  </script>

</body>

</html>