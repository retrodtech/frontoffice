<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

checkPageBySupperAdmin('bookingEngine','Room', 'Room');



if(isset($_GET['status'])){
    $sid = $_GET['status'];

    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from room where id='$sid'"));
    if($sql['status'] == 1){
        mysqli_query($conDB, "update room set status = '0' where id='$sid'");
        $_SESSION['SuccessMsg'] = "Successfull Status Change";
        redirect('room-list.php');
    }else{
        mysqli_query($conDB, "update room set status = '1' where id='$sid'");
        $_SESSION['SuccessMsg'] = "Successfull Status Change";
        redirect('room-list.php');
    }
}

if(isset($_GET['delete'])){
    $did = $_GET['delete']; 
    $sql = "delete from room where id='$did'";
    if (mysqli_query($conDB, $sql)) {
        $_SESSION['SuccessMsg'] = "Successfull Delete record";
        redirect('room-list.php');
    }else{
        $_SESSION['ErrorMsg'] = "Somthing Error";
        redirect('room-list.php');
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

    <title>Room List </title>

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


                            <div class="col-12 col-lg-12 m-auto">

                                <div class="card" style="padding: 25px 10px;">
                                    <div class="table table-responsive" id="loadRoomData">
                                        <table class="table align-items-center mb-0 tableLine">
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> S No</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Name</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Room Number</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Check In</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Pax</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Rent </th>
                                            </tr>

                                            
                                            <?php
                                            
                                                $currentDate = date('Y-m-d');
                                                $sl = 0;
                                                foreach(getBookingData('','',$currentDate) as $bookList){
                                                    $sl ++;
                                                    $bId = $bookList['id'];
                                                    $room_number = $bookList['room_number'];
                                                    $checkIn = date('d-M', strtotime($bookList['checkIn']));
                                                    $guestArry = getGuestDetail($bId);
                                                    $gName = '';
                                                    $pax = count($guestArry);
                                                    foreach ($guestArry as $guestValue) {
                                                        $gName .= $guestValue['name'].'<br/>';
                                                    }

                                                    $totalPrice = getBookingDetailById($bId)['totalPrice'];

                                                    echo "
                                                            <tr>

                                                                <td class='center mb-0 bold'>$sl</td>
                                                                <td class='center mb-0 bold'>$gName </td>
                                                                <td class='text-sm text-secondary mb-0'>$room_number</td>
                                                                <td class='text-sm text-secondary mb-0'>$checkIn</td>
                                                                <td class='text-sm text-secondary mb-0'>$pax</td>
                                                                <td class='text-sm text-secondary mb-0'>$totalPrice</td>
                                                            </tr>
                                                    ";
                                                }
                                                
                                            
                                            ?>

                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <?php include(FO_SERVER_SCREEN_PATH.'footer.php') ?>
        </div>

    </main>


    <div id="popUpBox">
        <div class="closeBox"></div>
        <div class="content">
            <div class="closeBtn">X</div>
            <div class="contentArea">

            </div>
        </div>
    </div>



    <?php include(FO_SERVER_SCREEN_PATH.'script.php') ?>


    <script>
    $('#navTopBar').hide();
    $('.nav-link').removeClass('active');
    $('.frontOfficeLink').addClass('active');
    $('.dashboardLink').addClass('active');

    

    $(document).ready(function() {

       
        


    });
    </script>

</body>

</html>