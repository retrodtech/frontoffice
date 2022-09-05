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
                                    <div class="table table-responsive">

                                        <table class="table align-items-center mb-0 tableLine">

                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room Number</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                            </tr>

                                            <?php 
                                                $si = 0;
                                                $sql = mysqli_query($conDB, "select * from roomnumber where hotelId = '$hotelId'");
                                                if(mysqli_num_rows($sql) > 0){
                                                    while($row = mysqli_fetch_assoc($sql)){
                                                        $si++;
                                                        $id = $row['id'];
                                                        $time = formatingDate($row['addOn']);

                                                        if($row['status'] == 1){
                                                            $status = "<a class='tableIcon status bg-gradient-success deactive' href='room-list.php?status=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Deactive'><i class='far fa-eye'></i></a>";
                                                        }else{
                                                            $status = "<a class='tableIcon status bg-gradient-warning  active' href='room-list.php?status=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Active'><i class='far fa-eye-slash'></i></a>";
                                                        }

                                                        $delete = "<a class='tableIcon delete bg-gradient-danger' href='room-list.php?delete=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                                                        $update = "<a class='tableIcon update bg-gradient-info' href='room-add.php?update=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Edit'><i class='far fa-edit'></i></a>";
                                                        
                                                        echo "
                                                        
                                                            <tr>

                                                                <td class='center mb-0 bold'>{$si}</td>
                                                                <td class='center mb-0 bold'>{$row['roomNo']}</td>
                                                                <td class='text-sm text-secondary mb-0'>{$row['roomId']}</td>
                                                                <td>
                                                                    <div class='tableCenter'>
                                                                        <span class='tableHide'><i class='fas fa-ellipsis-h'></i></span>
                                                                        <span class='tableHoverShow'>
                                                                            $status
                                                                            $update
                                                                            $delete
                                                                        </span>
                                                                    </div>
                                                                    
                                                                </td>
                                                            </tr>
                                                        
                                                        ";
                                                    }
                                                }else{
                                                    echo "
                                                        
                                                            <tr>
                                                                <td calspan='7'>No Data</td>
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
                <form action="" method="post" id="addRoomNumberForm">

                    <div class="form-group">
                        <label for="">Room Number</label>
                        <input type="number" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Room Name</label>
                        <select class="form-control" name="" id="">
                            <?php
                            
                                foreach(getRoomList('1') as $roomNameList){
                                    $name = $roomNameList['header'];
                                    $id = $roomNameList['id'];
                                    echo "<option value='$id'>$name</option>";
                                }
                            
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn bg-gradient-primary">Add Room Number</button>

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

      $('#addRoomNumerBtn').on('click',function(){
        $('#popUpBox').addClass('show');
      });

      $('#popUpBox .closeBox').on('click',function(){
        $('#popUpBox').removeClass('show');
      });

      $(document).on('click','#popUpBox .closeBtn',function(){
        $('#popUpBox').removeClass('show');
      });

      $(document).on('click','#popUpBox form',function(){
        var data = $('#addRoomNumberForm').serialize();
        $.ajax({
            url: 'include/ajax/resorvation.php' ,
            type: 'post',
            data: { type: 'generatrExcelSheet',  sheetType:idName },
            success: function (data) {
                console.log(data);
            }
        });
      });
      
  </script>

</body>

</html>