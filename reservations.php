<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

checkPageBySupperAdmin('pms','Reservation', 'Reservation');


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

    <title>Reservations </title>

    <?php include(FO_SERVER_SCREEN_PATH.'link.php') ?>


</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php include(FO_SERVER_SCREEN_PATH.'sidebar.php') ?>


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php include(FO_SERVER_SCREEN_PATH.'navbar.php') ?>

        <div class="container-fluid">

            <div class="page-header min-height-140 border-radius-xl mt-4"
                style="background-image: url('<?php echo FRONT_SITE_IMG.'headerBg.webp' ?>'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>

            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">

                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Reservations
                            </h5>
                            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                <li class="breadcrumb-item text-sm">
                                    <a class="opacity-3 text-dark" href="javascript:;.html">
                                        <svg width="12px" height="12px" class="mb-1" viewbox="0 0 45 40" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>shop </title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1716.000000, -439.000000)" fill="#252f40"
                                                    fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(0.000000, 148.000000)">
                                                            <path
                                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                            </path>
                                                            <path
                                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                        href="<?php echo FRONT_BOOKING_SITE ?>">Home</a></li>
                                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Reservations
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-md-12">
                    <div class="resvationGroupBtn">

                        <div class="toggle_btn singleGroupToggleBtn active">
                            <label for="singleGroupBtn"></label>
                            <input id="singleGroupBtn" type="checkbox" checked class="cb-value" />
                            <span class="round-btn"></span>
                        </div>

                        <!-- <div class="paymentTypeBtn">
                            <label for="paymentType">Payment Type</label>
                            <select name="paymentType" id="paymentType">
                                <option value="1">Booking Engine</option>
                                <option value="2">Quick Pay</option>
                            </select>
                        </div> -->

                        <div class="currentDate mb-2">
                            <label for="currentDateStart">Date</label>
                            <input class="form-control" type="date" id="currentDateStart" name="currentDate" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" max="">
                        </div>

                    </div>
                </div>

                <div class="col-12">

                    <div class="card mb-4 reservationNav">
                        <div class="card-body">
                            <div class="dFlex jcsb">
                                <div class="left">
                                    <ul id="loadReservationCountContent">
                                        <li><a id="reservationBtn" class="reservationTab active"
                                                href="javascript:void(0)">Reservations
                                                <span><?= countBookingRow('reservation')?>
                                                </span></a></li>
                                        <li><a id="ariveBtn" class="reservationTab" href="javascript:void(0)">Arrivals
                                                <span><?= countBookingRow('arrives')?></span></a></li>
                                        <li><a id="failedBtn" class="reservationTab" href="javascript:void(0)">Failed
                                                <span><?= countBookingRow('failed')?></span></a></li>
                                        <li><a id="inHouseBtn" class="reservationTab" href="javascript:void(0)">In house
                                                <span><?= countBookingRow('inHouse')?></span></a></li>
                                        <li><a id="inHouseBtn" class="reservationTab" href="javascript:void(0)">Check
                                                Out <span><?= countBookingRow('checkOut')?></span></a></li>
                                    </ul>
                                </div>
                                <div class="right">
                                    <ul>
                                        <li><a href="javascript:void(0)" id="addReservationBtn" data-page="reservation">
                                                <i class="fas fa-users"></i> Add Reservations</a> </li>
                                        <li><a id="excelImport" href="javascript:void(0)"> <i
                                                    class="fas fa-file-import"></i> Import</a> </li>
                                        <li><a id="excelExport" href="javascript:void(0)"> <i
                                                    class="fas fa-file-export"></i> Export</a> </li>
                                        <li><a id="searchBtnReservation" href="javascript:void(0)"> <i
                                                    class="fas fa-search"></i> Search</a> </li>
                                    </ul>
                                    <div id="searchForReservation">
                                        <input id="searchForReservationValue" type="text" class="form-contol"
                                            placeholder="Search Text.">
                                        <button id="searchForCloseBtn">X</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="errorBox"></div>
                    <div id="resorvationContent">
                        <div class="loadingIcon">
                            <img src="<?= FRONT_SITE_IMG.'/loading.gif'?>" alt="">
                        </div>
                    </div>

                    <div id="loadAddResorvation"></div>

                </div>
            </div>



        </div>

    </main>

    <?php include(FO_SERVER_SCREEN_PATH.'booing_detail.php') ?>


    <?php include(FO_SERVER_SCREEN_PATH.'script.php') ?>

    <script>
    $('#navTopBar').hide();
    $('.nav-link').removeClass('active');
    $('.frontOfficeLink').addClass('active');
    $('.reservationsLink').addClass('active');

    closeContent('#reservationAddGuestForm .card-head a', '#addGestOnReservation');
    closeContent('#reservationAddGuestForm .card-foot .btn-outline-secondary', '#addGestOnReservation');

    function reservationCountNavBar($rTab = '', $group = '', $currentDate='') {
        var rTab = $rTab;
        var group = $group;
        var currentDate = $currentDate;
        if(rTab == ''){
            rTab = 'reservation';
        }
        $.ajax({
            url: 'include/ajax/room.php',
            type: 'post',
            data: {
                type: 'loadReservationCountNavBar',
                rTab: rTab,
                group: group,
                currentDate: currentDate
            },
            success: function(data) {
                $('#loadReservationCountContent').html(data);
            }
        });
    }

    $(document).ready(() => {

        loadResorvation('reservation');
        reservationCountNavBar();


        $(document).on('click', '.reservationTab', function() {
            var tabName = $(this).attr('id');
            var singleGroupBtn = $(".singleGroupToggleBtn").hasClass("active");
            var currentDate = $('#currentDateStart').val();
            if (singleGroupBtn == true) {
                loadResorvation(tabName,'','','',currentDate);
                reservationCountNavBar(tabName,currentDate);
            } else {
                loadResorvation(tabName, '', 1,'',currentDate);
                reservationCountNavBar(tabName,currentDate);
            }

        });
    });
    </script>

</body>

</html>