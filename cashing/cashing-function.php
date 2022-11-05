<?php



    function cashingHtml($title,$key){ ?>


        
        <!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="favicons/img-apple-icon.png">
        <link rel="icon" type="image/png" href="favicons/img-favicon.png">
        <meta name="keywords" content="">
        <meta name="description" content="">

        <title><?= $title ?></title>

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
                                                        <a href="javascript:void(0)" id="addRoomSelPersonBtn"><button type="button" class="btn bg-gradient-info">Add <?= $title ?></button></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-lg-12 m-auto">
                                    <?php echo SuccessMsg(); echo ErrorMsg() ?>
                                    <!-- <a href="<?php echo FRONT_BOOKING_SITE.'/admin/manage-room.php' ?>" class="btn dark mb15">Add Room</a> -->
                                        
                                        <div class="card" style="padding: 25px 10px;">
                                            <div class="table table-responsive" id="loadSalePersonData">

                                                

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

            function loadCashing(){
                $.ajax({
                    url: "<?= FRONT_SITE.'/include/ajax/cashing.php' ?>",
                    type: 'post',
                    data: {type: 'loadCashing', cashingType : '<?= $key ?>'},
                    success: function (data) {
                        $('#loadSalePersonData').html(data);
                    }
                });
            }
            

            $(document).ready(function(){

                loadCashing();

                $('#addRoomSelPersonBtn').on('click',function(){
                    $('#popUpBox').addClass('show');

                    $.ajax({
                        url: "<?= FRONT_SITE.'/include/ajax/cashing.php' ?>",
                        type: 'post',
                        data: {type: 'addCashingForm',cashingType: '<?= $key ?>'},
                        success: function (data) {
                            $('#popUpBox .contentArea').html(data);
                        }
                    });

                });

                $(document).on('submit','#addCashingForm',function(e){
                    e.preventDefault();
                    var data = $('#addCashingForm').serialize()+ '&type=submitCashing&cashingType=<?= $key ?>';
                    
                    $.ajax({
                        url: "<?= FRONT_SITE.'/include/ajax/cashing.php' ?>",
                        type: 'post',
                        data: data,
                        success: function (data) {
                            loadCashing();
                            if(data == 0){
                                swal("Something error?", "Already exist <?= $title ?>.", "error");
                            }
                            if(data == 1){
                                swal("Good job!", "Successfull add <?= $title ?>.", "success");
                            }
                            
                            $('#popUpBox').removeClass('show');
                        }
                    });
                    
                });

                $(document).on('click','.status', function(){
                    var rnid = $(this).data('rnid');
                    $.ajax({
                        url: "<?= FRONT_SITE.'/include/ajax/cashing.php' ?>",
                        type: 'post',
                        data: {type: 'statusUpdate', rnid : rnid},
                        success: function (data) {
                            if(data == 1){
                                loadCashing();
                                swal("Good job!", "Successfull change status.", "success");
                            }
                        }
                    });
                });

                $(document).on('click','.delete', function(){
                    var rnid = $(this).data('rnid');
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this <?= $title ?> record!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                            function deleteRoomNumber(){
                                $.ajax({
                                    url: "<?= FRONT_SITE.'/include/ajax/cashing.php' ?>",
                                    type: 'post',
                                    data: {type: 'deleteRoomNumber', rnid : rnid},
                                    success: function (data) {
                                        if(data == 1){
                                            loadCashing();
                                            swal("Poof! Your <?= $title ?> record has been deleted!", {
                                                icon: "success",
                                            });
                                        }else {
                                            swal("Your <?= $title ?> record is safe!");
                                        }
                                    }
                                });
                            }
                            
                            if (willDelete) {
                                deleteRoomNumber();
                            } else {
                                swal("Your <?= $title ?> record is safe!");
                            }
                            
                        });
                });  


                $(document).on('click', '.update', function(){
                    var rnid= $(this).data('rnid');
                    $('#popUpBox').addClass('show');
                    $.ajax({
                        url: "<?= FRONT_SITE.'/include/ajax/cashing.php' ?>",
                        type: 'post',
                        data: {type: 'editCashingForm', rnid : rnid},
                        success: function (data) {
                            $('#popUpBox .contentArea').html(data);
                        }
                    });
                });

                $(document).on('submit','#updateCashingForm',function(e){
                    e.preventDefault();
                    var data = $('#updateCashingForm').serialize()+ '&type=updateCashing&cashingType=<?= $key ?>';
                    
                    $.ajax({
                        url: "<?= FRONT_SITE.'/include/ajax/cashing.php' ?>",
                        type: 'post',
                        data: data,
                        success: function (data) {
                            loadCashing();
                            if(data == 0){
                                swal("Something error?", "Already exist <?= $title ?>.", "error");
                            }
                            if(data == 1){
                                swal("Good job!", "Successfull update <?= $title ?>.", "success");
                            }
                            $('#popUpBox').removeClass('show');
                        }
                    });
                    
                });

            });
            
        </script>

        </body>

        </html>



    <?php }






?>