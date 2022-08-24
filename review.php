<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

checkPageBySupperAdmin('pms','Review', 'Review');


if(isset($_POST['reservationSubmit'])){

    $bookId = BOOK_GENERATE.unique_id(5);
    
    $checkIn = safeData($_POST['checkIn']);
    $checkOut = safeData($_POST['checkOut']);
    $roomQuntity = safeData($_POST['roomQuntity']);
    $reservationType = safeData($_POST['reservationType']);
    $bookinSource = safeData($_POST['bookinSource']);
    $businessSource = safeData($_POST['businessSource']);
    // $bookAvailable = safeData($_POST['bookAvailable']);

    $selectRoom = $_POST['selectRoom'];
    $selectRateType = $_POST['selectRateType'];
    $selectAdult = $_POST['selectAdult'];
    $selectChild = $_POST['selectChild'];

    $guestName = safeData($_POST['guestName']);
    $guestMobile = safeData($_POST['guestMobile']);
    $guestEmail = safeData($_POST['guestEmail']);
    $guestAddress = safeData($_POST['guestAddress']);
    $guestCuntry = safeData($_POST['guestCuntry']);
    $guestState = safeData($_POST['guestState']);
    $guestCity = safeData($_POST['guestCity']);
    $guestZip = safeData($_POST['guestZip']);

    // $bookingVoucher = safeData($_POST['bookingVoucher']);


    mysqli_query($conDB, "insert into booking(bookinId,checkIn,checkOut,nroom,payment_status,bookingSource,bussinessSource) values('$bookId','$checkIn','$checkOut','$roomQuntity','$reservationType','$bookinSource','$businessSource')");

    echo $lastId = mysqli_insert_id($conDB);

    mysqli_query($conDB, "insert into guest(bookId,name,email,phone,country) values('$lastId','$guestName','$guestEmail','$guestMobile','$guestCuntry')");

    if(isset($selectRoom)){
        foreach($selectRoom as $key=> $val){
            $room = $val;
            $rateType = $selectRateType[$key];
            $adult = $selectAdult[$key];
            $child = $selectChild[$key];

            mysqli_query($conDB, "insert into bookingdetail(bid,roomId,roomDId,adult,child) values('$lastId','$room','$rateType','$adult','$child')");

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
                                Guest Review
                            </h5>
                            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                <li class="breadcrumb-item text-sm">
                                    <a class="opacity-3 text-dark" href="javascript:;.html">
                                        <svg width="17px" height="17px" viewBox="0 0 46 42" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>customer-support</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1717.000000, -291.000000)" fill="#344767"
                                                    fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(1.000000, 0.000000)">
                                                            <path class="color-background"
                                                                d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                                opacity="0.59858631"></path>
                                                            <path class="color-foreground"
                                                                d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                            </path>
                                                            <path class="color-foreground"
                                                                d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
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
                                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Guest Database
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">


                    <div id="errorBox"></div>

                    <div class="card" id="guestDatabaseContent">
                        <div class="card-head">
                            <div class="dFlex jcsb aic">
                                <div class="left dFlex" style="width:50%">
                                    <h4 class="mr10">Guest Review Database</h4>
                                    <form action="" method="post" class="dFlex aic" style="width:40%">
                                        <input class="form-control" type="text" name="quickSearchGuest" placeholder="Quick search by Name,Email,Contact" style="width: 80%;"> 
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="right">
                                    <ul>
                                        <li><button id="addGuestDataBtn" class="btn btn-outline-primary" >Add Guest</button></li>
                                        <li><button class="btn btn-outline-secondary">Export</button></li>
                                        <li><button class="btn btn-outline-secondary">Audit Trail</button></li>
                                        <li><button class="btn btn-outline-secondary">Search</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="reviewContent"></div>
                        </div>
                    </div>

                    <div id="loadAddGuest"></div>



                </div>

    </main>

    <section id="popupBox">
        <div class="closeBox"></div>
        <div class="box">
            <div class="content">
                <form action="">
                    <div class="card">
                        <div class="card-head">
                            <h4>Add Guest</h4>
                            <a href="javascript:void(0)">X</a>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="file" name="guestImg[]">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" placehold="Enter Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" placehold="Enter Phone Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" placehold="Enter Email Id" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label> <br />
                                                <input type="radio" name="gender" value="male" id="male"><label
                                                    class="mr5" for="male">Male</label>
                                                <input type="radio" name="gender" value="female" id="female"><label
                                                    class="mr5" for="female">Female</label>
                                                <input type="radio" name="gender" value="other" id="other"><label
                                                    for="other">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Address">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control" placeholder="Enter Address">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">State</label>
                                        <input type="text" class="form-control" placeholder="Enter Address">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" class="form-control" placeholder="Enter Address">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Zip</label>
                                        <input type="text" class="form-control" placeholder="Enter Address">
                                    </div>
                                </div>


                            </div>

                            <hr>
                            <h4>Other Information</h4>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="file" name="guestIdProofImg[]">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">ID Number</label>
                                                <input type="text" placehold="Enter ID Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">ID Type</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-Select-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Issuing Country</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">-Select-</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Issuing City</label>
                                                <input type="text" placehold="Issuing City" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Expiry Date</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-foot">
                            <button class="btn btn-outline-secondary">Close</button>
                            <button type="submit" class="btn bg-gradient-info">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    

    <section id="sideBox">
        <div class="closeContent"></div>
        <div class="box">
            <div class="closeBox"></div>
            <div class="content"></div>
        </div>
    </section>


    <?php include(FO_SERVER_SCREEN_PATH.'script.php') ?>

    <script>

        $('#navTopBar').hide();
        $('.nav-link').removeClass('active');
        $('.frontOfficeLink').addClass('active');
        $('.reservationsLink').addClass('active');


        $(document).on('change', "input[type='checkbox']", function () {
            var target = $(this).parent().parent();
            if ($(this).is(':checked')) {
                target.addClass('active');
            } else {
                target.removeClass('active');
            }

        });

        $(document).ready(() => {

            loadReview();


            $('#addGuestDataBtn').click(function () {
                $('#loadAddGuest').show();
                loadAddGuestData();
            });

        });


    </script>

</body>

</html>