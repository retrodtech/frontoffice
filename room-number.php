<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

checkPageBySupperAdmin('bookingEngine','Room', 'Room');


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

  <title>Room Number </title>

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
                                                <a href="javascript:void(0)" id="addRoomNumerBtn"><button type="button" class="btn bg-gradient-info">Add  Room Number</button></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-lg-12 m-auto">
                            <?php echo SuccessMsg(); echo ErrorMsg() ?>
                            <!-- <a href="<?php echo FRONT_BOOKING_SITE.'/admin/manage-room.php' ?>" class="btn dark mb15">Add Room</a> -->
                                
                                <div class="card" style="padding: 25px 10px;">
                                    <div class="table table-responsive" id="loadRoomNumData">

                                        

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
                <form action="" method="post" id="addRoomNumberForm">

                    

                </form>
            </div>
        </div>
    </div>

  <?php include(FO_SERVER_SCREEN_PATH.'script.php') ?>


  <script>
      $('#navTopBar').hide();
      $('.nav-link').removeClass('active');
      $('.frontOfficeLink').addClass('active');
      $('.dashboardLink').addClass('active');   

      function loadRoomNumber(){
        $.ajax({
            url: 'include/ajax/room.php',
            type: 'post',
            data: {type: 'loadRoomNumber'},
            success: function (data) {
                $('#loadRoomNumData').html(data);
            }
        });
      }
    

      $(document).ready(function(){

        loadRoomNumber();

        $('#addRoomNumerBtn').on('click',function(){
            $('#popUpBox').addClass('show');

            $.ajax({
                url: 'include/ajax/room.php',
                type: 'post',
                data: {type: 'addRoomNumForm'},
                success: function (data) {
                    $('#addRoomNumberForm').html(data);
                }
            });

        });

        $('#popUpBox .closeBox').on('click',function(){
            $('#popUpBox').removeClass('show');
        });

        $(document).on('submit','#addRoomNumberForm',function(e){
            e.preventDefault();
            var data = $('#addRoomNumberForm').serialize()+ '&type=submitRoomNumber';
            
            $.ajax({
                url: 'include/ajax/room.php',
                type: 'post',
                data: data,
                success: function (data) {
                    loadRoomNumber();
                    $('#popUpBox').removeClass('show');
                }
            });
            
        });

        $(document).on('click','.status', function(){
            var rnid = $(this).data('rnid');
            $.ajax({
                url: 'include/ajax/room.php',
                type: 'post',
                data: {type: 'statusUpdate', rnid : rnid},
                success: function (data) {
                    if(data == 1){
                        loadRoomNumber();
                    }
                }
            });
        });

        // $(document).on('click','.delete', function(){
        //     var rnid = $(this).data('rnid');
        //     $.ajax({
        //         url: 'include/ajax/room.php',
        //         type: 'post',
        //         data: {type: 'deleteRoomNumber', rnid : rnid},
        //         success: function (data) {
        //             if(data == 1){
        //                 loadRoomNumber();
        //             }
        //         }
        //     });
        // });

        $(document).on('click','.delete', function(){
            var rnid = $(this).data('rnid');
            Confirm('Delete', 'Are you sure you want to Delete This Record', 'Yes', 'Cancel','rnid',rnid);
        });

        $(document).on('click', '.cancelAction', function(){
            $.ajax({
                url: 'include/ajax/room.php',
                type: 'post',
                data: {type: 'editRoomNumber', rnid : rnid},
                success: function (data) {
                    if(data == 1){
                        loadRoomNumber();
                    }
                }
            });
        });

      });
      
  </script>

</body>

</html>