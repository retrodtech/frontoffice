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

                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="btnGroup">
                                            <li>
                                                <a href="<?php echo FO_FRONT_SITE ?>/room-add.php"><button type="button"
                                                        id="addRoomBtn" class="btn bg-gradient-info">Add
                                                        Room</button></a>
                                            </li>

                                            <li>
                                                <a href="<?php echo FO_FRONT_SITE ?>/amenities.php"><button
                                                        type="button"
                                                        class="btn btn-outline-secondary">Amenities</button></a>
                                            </li>

                                            <li>
                                                <a href="<?php echo FO_FRONT_SITE ?>/coupon_code.php"><button
                                                        type="button"
                                                        class="btn btn-outline-secondary">Coupon</button></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-12 m-auto">
                                <?php // echo SuccessMsg(); echo ErrorMsg() ?>
                                <!-- <a href="<?php echo FRONT_BOOKING_SITE.'/admin/manage-room.php' ?>" class="btn dark mb15">Add Room</a> -->

                                <div class="card" style="padding: 25px 10px;">
                                    <div class="table table-responsive" id="loadRoomData">

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

    function loadRoomList() {
        $.ajax({
            url: '<?= FRONT_ADMIN_SITE_INCLUDE ?>/ajax/room.php',
            type: 'post',
            data: {
                type: 'loadRoomList'
            },
            success: function(data) {
                $('#loadRoomData').html(data);
            }
        });
    }

    $(document).ready(function() {

        loadRoomList();

        $('#addRoomBtn').on('click', function(e) {

            e.preventDefault();
            $('#popUpBox').addClass('show');

            $.ajax({
                url: 'include/ajax/room.php',
                type: 'post',
                data: {
                    type: 'showAddRoomForm'
                },
                success: function(data) {
                    $('#popUpBox .contentArea').html(data);
                }
            });

        });

        $(document).on('submit', '#manageForm', function(e) {
            e.preventDefault();
            $('#manageForm button').prop('disabled', false);
            $('#manageForm button').html('Loading..');
            $.ajax({
                url: '<?= FRONT_ADMIN_SITE_INCLUDE ?>/ajax/room.php',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    loadRoomList();
                    $('#popUpBox').removeClass('show');
                    swal("Good job!", "Successfully Add Room.", "success");
                }
            });

        });

        $attr_count = 1;
        $(document).on('click', '.add_sub', function() {
            $attr_count++;
            $html = '<div class="row p0" id="add_content_id' + $attr_count +
                '" style="align-items: flex-end;">';
            $html += '<div class="form_group col-md-4"><label for="title' + $attr_count +
                '">Rate Plan</label><input class="form-control" type="text" id="title' + $attr_count +
                '" name="title[]" placeholder="Enter Title."></div>';
            $html += '<div class="form_group col-md-3 col-sm-6 col-xs-12"><label for="singleRoomPrice' +
                $attr_count +
                '">Room Price</label><input class="form-control" type="text" id="singleRoomPrice' +
                $attr_count + '" name="singleRoomPrice[]" placeholder="Enter Room Price."></div>';
            $html += '<div class="form_group col-md-3 col-sm-6 col-xs-12"><label for="doubleRoomPrice' +
                $attr_count +
                '">Room Price</label><input class="form-control" type="text" id="doubleRoomPrice' +
                $attr_count + '" name="doubleRoomPrice[]" placeholder="Enter Room Price."></div>';
            $html += '<div class="add_sub col-md-2" data-id="' + $attr_count +
                '"><div class="btn update">Add</div></div>';
            $html +=
                '<div class="col-md-4 col-sm-6 col-xs-12"><div class="form_group"><label for="extraAdult' +
                $attr_count +
                '">Extra charge of Adult</label><input class="form-control" type="text" id="extraAdult' +
                $attr_count +
                '" name="extraAdult[]" placeholder="Enter Extra charge of Adult"></div></div>';
            $html +=
                '<div class="col-md-4 col-sm-6 col-xs-12"><div class="form_group"><label for="extraChild' +
                $attr_count +
                '">Extra charge of Child</label><input class="form-control" type="text" id="extraChild' +
                $attr_count +
                '" name="extraChild[]" placeholder="Enter Extra charge of Child"></div></div>';
            $html += '</div>';
            var content = $(this).find('.btn');
            $(this).removeClass('add_sub').addClass('remove_sub');
            $(content).removeClass('update').addClass('delete').html('Remove');
            $('#add_content').append($html);
        });

        $(document).on('click', '.remove_sub', function() {
            var id = $(this).data('id');
            $('#add_content_id' + id).remove();
        });

        $(document).on('change', '#parentId', function() {
            var id = $(this).val();
            if (id == 0) {
                $('#header').val('').prop('disabled', false);
                $('#bedType').val('').prop('disabled', false);
                $('#roomCapacity').val('').prop("checked", "checked");
                $('#noChild').val('').prop('disabled', false);
                $('#slug').val('').prop('disabled', false);

                $('#roomImgContent').show();
                $('#amenitiesContent').show();
            } else {
                $.ajax({
                    url: 'include/ajax/room.php',
                    type: 'post',
                    data: {
                        id: id,
                        type: 'getParentIdData'
                    },
                    success: function(data) {
                        var returnedData = JSON.parse(data);
                        // console.log(returnedData);
                        var roomName = returnedData.header;
                        var bedtype = returnedData.bedtype;
                        var totalroom = returnedData.totalroom;
                        var roomcapacity = returnedData.roomcapacity;
                        var noChild = returnedData.noChild;
                        var slug = returnedData.slug;


                        $('#header').val(roomName).prop('disabled', true);
                        $('#bedType').val(bedtype).prop('disabled', true);
                        $('#roomCapacity').val(roomcapacity).prop("checked", "checked");
                        $('#noChild').val(noChild).prop('disabled', true);
                        $('#slug').val(slug).prop('disabled', true);

                        $('#roomImgContent').hide();
                        $('#amenitiesContent').hide();
                    }
                });
            }
        });

        $(document).on('change', '#header', function() {
            var hotelName = $(this).val().toLowerCase();
            let result = hotelName.replace(" ", "-");
            $('#slug').val(result);
        });

        $(document).on('click', '#loadRoomData .update', function(e){
            var rid = $(this).data('rid');
            $('#popUpBox').addClass('show');
            $.ajax({
                url: '<?= FRONT_ADMIN_SITE_INCLUDE ?>/ajax/room.php',
                type: 'post',
                data: {
                    type: 'showUpdateRoomFrom', rid:rid
                },
                success: function(data) {
                    $('#popUpBox .contentArea').html(data);
                }
            });
        });

        $(document).on('submit', '#updateManageForm', function(e) {
            e.preventDefault();
            $('#manageForm button').prop('disabled', false);
            $('#manageForm button').html('Loading..');
            $.ajax({
                url: '<?= FRONT_ADMIN_SITE_INCLUDE ?>/ajax/room.php',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    loadRoomList();
                    $('#popUpBox').removeClass('show');
                    swal("Good job!", "Successfully Update.", "success");
                }
            });

        });

        $(document).on('click','#loadRoomData .delete', function(){
            var rid = $(this).data('rid');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this room record!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    function deleteRoom(){
                        $.ajax({
                            url: 'include/ajax/room.php',
                            type: 'post',
                            data: {type: 'deleteRoom', rid : rid},
                            success: function (data) {
                                if(data == 1){
                                    loadRoomList();
                                    swal("Poof! Your room record has been deleted!", {
                                        icon: "success",
                                    });
                                }else {
                                    swal("Your room record is safe!");
                                }
                            }
                        });
                    }
                    
                    if (willDelete) {
                        deleteRoom();
                    } else {
                        swal("Your room number record is safe!");
                    }
                    
                });
        });  

        $(document).on('click','.status', function(){
            var rid = $(this).data('rid');
            $.ajax({
                url: 'include/ajax/room.php',
                type: 'post',
                data: {type: 'statusUpdateForRoom', rid : rid},
                success: function (data) {
                    if(data == 1){
                        loadRoomList();
                        swal("Good job!", "Successfull change status.", "success");
                    }
                }
            });
        });

        
    });
    </script>

</body>

</html>