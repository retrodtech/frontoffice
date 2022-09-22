<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

checkPageBySupperAdmin('bookingEngine','Room Add', 'Room Add');



if(isset($_GET['ustatus'])){
    $status =  $_GET['ustatus'];
    $sql = mysqli_query($conDB, "select * from room_detail where id = '$status' ");
    if(mysqli_num_rows($sql)>0){
        $query = mysqli_fetch_assoc($sql);
        $status_value = $query['status'];
        if($status_value == 1){
            $sql = "update room_detail set status='0' where id = '$status'";
        }else{
            $sql = "update room_detail set status='1' where id = '$status'";
        }
        
        if(mysqli_query($conDB, $sql)){
            $_SESSION['SuccessMsg'] = "Successfully Change Status";
            redirect('list-room.php');
        }
    }

}

if(isset($_GET['remove'])){
    $removeId =  $_GET['remove'];
    $sql = mysqli_query($conDB, "select * from room_detail where id = '$removeId' ");
    if(mysqli_num_rows($sql)>0){
        $sql = "delete from room_detail where id='$removeId'";
        $href = $_SERVER['HTTP_REFERER'];
        if(mysqli_query($conDB, $sql)){
            $_SESSION['SuccessMsg'] = "Successfully Delete Record";
            
            redirect($href);
        }
    }

}

if(isset($_GET['removeImage'])){
    $removeImgId =  $_GET['removeImage'];
    $sql = mysqli_query($conDB, "select * from room_img where id = '$removeImgId' ");
    if(mysqli_num_rows($sql)>0){
        unlink(SERVER_ROOM_IMG.getImageByImgId($removeImgId));
        $sql = "delete from room_img where id='$removeImgId'";
        $href = $_SERVER['HTTP_REFERER'];
        if(mysqli_query($conDB, $sql)){
            $_SESSION['SuccessMsg'] = "Successfully Delete Record";
            redirect($href);
        }
    }

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

    <title>Dashboard </title>

    <?php include(FO_SERVER_SCREEN_PATH.'link.php') ?>


</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php include(FO_SERVER_SCREEN_PATH.'sidebar.php') ?>


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php include(FO_SERVER_SCREEN_PATH.'navbar.php') ?>

        <div class="container-fluid py-4" id="manage_room">
            
            <div class="row">
                
                <div class="col-12">
                    <div class="multisteps-form">


                        <div class="row">
                            <div class="col-12 col-lg-8 m-auto">
                                <?php echo SuccessMsg(); echo ErrorMsg() ?>
                                <!-- <a href="<?php echo FRONT_BOOKING_SITE.'/admin/list-room.php' ?>" class="btn dark mb15">Manage Room</a> -->
                                <div class="card p-4">

                                    

                                </div>

                            </div>
                        </div>
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