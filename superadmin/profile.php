<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

if(!isset($_SESSION['SUPER_ADMIN_ID'])){
    $_SESSION['ErrorMsg'] = "Please login";
    redirect('login.php');
}


$said = $_SESSION['SUPER_ADMIN_ID'];
$sql = mysqli_query($conDB, "select * from superadmin where id='$said'");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}else{
  $_SESSION['ErrorMsg'] = "Data Not Found!";
  die();
}

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

  <meta name="twitter:card" content="">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:creator" content="">
  <meta name="twitter:image" content="">

  <meta property="fb:app_id" content="">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta property=" og:description" content="">
  <meta property="og:site_name" content="">

  <title>Profile</title>

  <?php include(SERVER_ADMIN_SCREEN_PATH.'link.php') ?>


</head>

<body class="g-sidenav-show  bg-gray-100">

  <?php include(SERVER_ADMIN_SCREEN_PATH.'sidebar.php') ?>


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include(SERVER_ADMIN_SCREEN_PATH.'navbar.php') ?>

    <div class="container-fluid">
      <div class="page-header min-height-140 border-radius-xl mt-4"
        style="background-image: url('<?php echo FRONT_SITE_IMG.'headerBg.webp' ?>'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="<?php echo FRONT_SITE_IMG.'profile/'.$row['image'] ?>" alt="profile_image"
                class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $row['name'] ?>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              <?php echo $row['designation'] ?>
              </p>
            </div>
          </div>

        </div>
      </div>


    </div>




  </main>



  <?php include(SERVER_ADMIN_SCREEN_PATH.'script.php') ?>


  <script>

    $('#navTopBar').hide();
    $('.nav-link').removeClass('active');

  </script>



</body>

</html>