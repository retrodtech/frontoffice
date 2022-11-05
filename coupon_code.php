<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

$couponCode = '';
$couponType = '';
$minVal = '';
$expireOn = '';
$couponValue = '';
$btn = 'Add Coupon';
$header_text = 'Add Coupon';
$disable = '';

if(isset($_GET['update'])){
    $id = $_GET['update'];
    $header_text = 'Update Coupon';
    $disable = 'disabled';
    $sql = mysqli_query($conDB, "select * from couponcode where id = '$id'");
    if(mysqli_num_rows($sql) > 0){
        $update_row = mysqli_fetch_assoc($sql);
        $uid = $update_row['id'];
        $couponCode = $update_row['coupon_code'];
        // $couponType = $update_row['coupon_type'];
        $minVal = $update_row['min_value'];
        $expireOn = $update_row['expire_on'];
        $couponValue = $update_row['coupon_value'];
        $btn = 'Update Coupon';

        if(isset($_POST['submit'])){
            $minVal = $_POST['minVal'];
            $expireOn = $_POST['expireOn'];
            $sql = "update couponcode set min_value='$minVal', expire_on='$expireOn' where id = '$id'";
            if(mysqli_query($conDB,$sql)){
                $_SESSION['SuccessMsg'] = "Coupon Code Successfully Update";
                redirect('coupon_code.php');
            }
        }

    }else{
        $_SESSION['ErrorMsg'] = "Coupon Id not exist";
        redirect('coupon_code.php');
    }
    
}else{
    if(isset($_POST['submit'])){
        $couponCode = $_POST['couponCode'];
        // $couponType = $_POST['couponType'];
        $minVal = $_POST['minVal'];
        $expireOn = $_POST['expireOn'];
        $couponValue = $_POST['couponValue'];

        if($expireOn >= date('Y-m-d')){
            $sql = "insert into couponcode(coupon_code,coupon_type,min_value,coupon_value,expire_on,hotelId) value('$couponCode','P','$minVal','$couponValue','$expireOn','$hotelId')";
            if(mysqli_query($conDB,$sql)){
                $_SESSION['SuccessMsg'] = "Coupon Code Successfully Added";
                redirect('coupon_code.php');
            }
        }else{
            $_SESSION['ErrorMsg'] = "Please Select Future Date";
            die();
        }

    }
}



if(isset($_GET['status'])){
    $sid = $_GET['status'];

    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from couponcode where id='$sid'"));
    if($sql['status'] == 1){
        mysqli_query($conDB, "update couponcode set status = '0' where id='$sid'");
        $_SESSION['SuccessMsg'] = "Successfull Status Change";
        redirect('coupon_code.php');
    }else{
        mysqli_query($conDB, "update couponcode set status = '1' where id='$sid'");
        $_SESSION['SuccessMsg'] = "Successfull Status Change";
        redirect('coupon_code.php');
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
                                <form action="" id="manageForm" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="couponCode">Coupon Code</label>
                                        <input <?php echo $disable ?> required class="form-control" type="text" id="couponCode" name="couponCode" placeholder="Enter Coupon Code." value="<?php echo $couponCode ?>">
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--    <label for="couponType">Coupon Type</label>-->
                                    <!--    <select <?php echo $disable ?> required class="form-control" name="couponType" id="couponType">-->
                                    <!--        <option value="">Select Coupon Type</option>-->
                                            <?php
                                            
                                                // $coupontype = ['P' => 'Percentage','F' => 'Fixed'];
                                                // foreach($coupontype as $key=>$val){
                                                //     echo "<option value='$key'>$val</option>";
                                                // }
                                            
                                            ?>
                                    <!--    </select>-->
                                    <!--</div>-->
                                    
                                    <div class="row p0">
                                        <div class="form-group col-md-6">
                                            <label for="minVal">Minimum Price</label>
                                            <input required class="form-control" type="number" id="minVal" name="minVal" placeholder="Enter Minimum Value." value="<?php echo $minVal ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="expireOn">Expire On</label>
                                            <input required class="form-control" type="date" id="expireOn" name="expireOn" value="<?php echo $expireOn ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="couponValue">Coupon Percentage</label>
                                        <input <?php echo $disable ?> required class="form-control" type="number" id="couponValue" name="couponValue" placeholder="Enter Coupon Value." value="<?php echo $couponValue ?>">
                                    </div>

                                    <div class="s25"></div>
                                    
                                    <div id="add_content"></div>
                                    <button class="btn bg-gradient-primary mb-0 mt-lg-auto" type="submit" name="submit"><?php echo $btn ?></button>
                                    <div class="s25"></div>
                                    <div class="s25"></div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-10 offset-md-1" style="background: white;box-shadow: 0 5px 25px #00000040;padding: 30px 20px;border-radius: 10px;">
                            <?php echo SuccessMsg(); echo ErrorMsg() ?>
                            <!-- <a href="<?php echo FRONT_BOOKING_SITE.'/admin/manage-room.php' ?>" class="btn dark mb15">Add Room</a> -->
                                <div class="table table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <tr>
                                            <th width="5%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SI</th>
                                            <th width="10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Coupon Code</th>
                                            <th width="10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">coupon Type</th>
                                            <th width="10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Coupon Value</th>
                                            <th width="10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Minimum value</th>
                                            <th width="10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expire On</th>
                                            <th width="20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        </tr>
                                        <?php 
                                            $si = 0;
                                            $sql = mysqli_query($conDB, "select * from couponcode where hotelId = '$hotelId'");
                                            if(mysqli_num_rows($sql) > 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    $si++;
                                                    $id = $row['id'];
                                                    $time = formatingDate($row['add_on']);
                                                    if($row['status'] == 1){
                                                        $status = "<a class='tableIcon status bg-gradient-success deactive' href='coupon_code.php?status=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Deactive'><i class='far fa-eye'></i></a>";
                                                    }else{
                                                        $status = "<a class='tableIcon status bg-gradient-warning  active' href='coupon_code.php?status=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Active'><i class='far fa-eye-slash'></i></a>";
                                                    }
                                                    $update = "<a class='tableIcon update bg-gradient-info' href='coupon_code.php?update=$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Edit'><i class='far fa-edit'></i></a>";
                                                    $date = formatingDate($row['expire_on']);
                                                    echo "
                                                    
                                                        <tr>
                                                            <td class='mb-0 text-sm'><b>$si</b></td>
                                                            <td class='mb-0 text-sm'>{$row['coupon_code']}</td>
                                                            <td class='mb-0 text-sm'>{$row['coupon_type']}</td>
                                                            <td class='mb-0 text-sm'>{$row['coupon_value']}</td>
                                                            <td class='mb-0 text-sm'>{$row['min_value']}</td>
                                                            <td class='mb-0 text-sm'>{$date}</td>
                                                            <td>
                                                                
                                                                <div class='tableCenter'>
                                                                    <span class='tableHide'><i class='fas fa-ellipsis-h'></i></span>
                                                                    <span class='tableHoverShow'>
                                                                    $status
                                                                    $update
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