<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

    
    $title = '';
    if(isset($_GET['delete'])){
        $uid = $_GET['delete'];
        $sql = "update amenities set deleteRec = '0' where id ='$uid' ";
        if(mysqli_query($conDB, $sql)){
            $_SESSION['SuccessMsg'] = "Delete Record";
            $link = FO_FRONT_SITE."/amenities.php";
            redirect($link);
        }
    }
    if(isset($_GET['update'])){
        $uid = $_GET['update'];
        $sql = mysqli_query($conDB, "select * from amenities where id ='$uid'");
        $row = mysqli_fetch_assoc($sql);
        $title = $row['title'];
        if(isset($_POST['submit'])){
            $title = $_POST['amenities'];
            $sql = "update amenities set title='$title' where id ='$uid'";
            if(mysqli_query($conDB, $sql)){
                $_SESSION['SuccessMsg'] = "Update Successfull";
            }
        }
    }
    if(isset($_POST['submit'])){
        
            $title = $_POST['amenities'];
            $sql = "insert into amenities(title,hotelId) values('$title','$hotelId')";
            
            if(mysqli_query($conDB, $sql)){
                $_SESSION['SuccessMsg'] = "Insert Successfull";
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
                            <div class="card mb-3 p-3">
                                <form method="POST" id="amenitiesForm">
                                    <div class="row mb-4" style="align-items: flex-end;">
                                        <div class="form_group col-md-9">
                                            <label for="amenities2">Amenities</label>
                                            <input class="form-control" type="text" name="amenities" id="amenities2" value="<?php echo $title ?>">
                                        </div>
                                        
                                        <div class="form_group col-md-3">
                                            <label for=""></label>
                                            <input class="form_control btn btn-outline-primary btn-sm mb-0" type="submit" name="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="card p-3">
                                <div class="table table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl.</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type of Amenities</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        </tr>
                                        <?php

                                            $si = 0;
                                            
                                            $sql = mysqli_query($conDB, "select * from amenities where hotelId = '$hotelId' and deleteRec = '1'");
                                            if(mysqli_num_rows($sql) > 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    $si ++ ;
                                                    $id = $row['id'];
                                                    $time = formatingDate($row['add_on']);
                                                    $delete = "<a class='tableIcon delete bg-gradient-danger' href='amenities.php?delete=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                                                    $update = "<a class='tableIcon update bg-gradient-info' href='amenities.php?update=$id' style='margin-right:10px' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Edit'><i class='far fa-edit'></i></a>";
                                                    echo "

                                                    <tr>
                                                        <td class='mb-0 text-sm'><b>$si</b></td>
                                                        <td class='mb-0 text-sm'>{$row['title']}</td>
                                                        <td style='display: flex;justify-content: end; align-items: center;'>
                                                        
                                                        <div class='tableCenter'>
                                                            <span class='tableHide'><i class='fas fa-ellipsis-h'></i></span>
                                                            <span class='tableHoverShow'>
                                                            $update
                                                                $delete
                                                            </span>
                                                        </div>
                                                        
                                                        </td>
                                                    </tr>
                                                    
                                                    ";
                                                }
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



  <?php include(FO_SERVER_SCREEN_PATH.'script.php') ?>


  <script>
      $('#navTopBar').hide();
      $('.nav-link').removeClass('active');
      $('.frontOfficeLink').addClass('active');
      $('.dashboardLink').addClass('active');   
  </script>

</body>

</html>