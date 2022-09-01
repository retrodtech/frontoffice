<?php

include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

checkLoginAuth();

checkPageBySupperAdmin('bookingEngine','Room Add', 'Room Add');


$header = '';
$bedtype = '';
$totalroom = '';
$roomcapacity = '';
$uid = '';
$noAdult = '';
$extraAdult = '';
$extraChild = '';
$noChild = '';
$mrp='';
$btn = 'Add Room';
$header_text = 'Add Room';

$imgSize = '(900 x 1060)';

if(isset($_GET['update'])){
    $id = $_GET['update'];
    $header_text = 'Update Room';
    $sql = mysqli_query($conDB, "select * from room where id = '$id'");
    if(mysqli_num_rows($sql) > 0){
        $update_row = mysqli_fetch_assoc($sql);
        $uid = $update_row['id'];
        $header = $update_row['header'];
        $bedtype = $update_row['bedtype'];
        $totalroom = $update_row['totalroom'];
        $roomcapacity = $update_row['roomcapacity'];

        $noAdult = $update_row['noAdult'];
        $noChild = $update_row['noChild'];
        $mrp = $update_row['mrp'];
        $btn = 'Update Room';
    }else{
        $_SESSION['ErrorMsg'] = "Room Id not exist";
        redirect('list-room.php');
    }
}

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
                                    <form action="" id="manageForm" method="post" enctype="multipart/form-data">



                                        <div class="row p0">
                                            <div class="form_group col-12 col-sm-6 mb-3">
                                                <label for="header">Room</label>
                                                <input class="form-control" type="text" id="header" name="header"
                                                    placeholder="Enter Room Name." value="<?php echo $header ?>">
                                            </div>
                                            <div class="form_group col-12 col-sm-6 mb-3">
                                                <label for="bedType">Bed Type</label>
                                                <input class="form-control" type="text" id="bedType" name="bedType"
                                                    placeholder="Enter Bed Type" value="<?php echo $bedtype ?>">
                                            </div>
                                        </div>

                                        <div class="row p0">
                                            <div class="form_group col_12 mb-3">
                                                <label for="slug">Slug</label>
                                                <input class="form-control" type="text" id="slug" name="slug"
                                                    placeholder="Enter Slug." value="<?php echo $header ?>">
                                            </div>
                                        </div>

                                        <input type="hidden" name="type" value="add_room">

                                        <div class="row p0">
                                            <div class="form_group col-12 col-sm-6 mb-3">
                                                <label for="totalRoom">Total Inventory</label>
                                                <select class="form-control" name="totalRoom" id="totalRoom">
                                                    <option value="">Total no. of Inventory</option>
                                                    <?php
                                                    for($i=0; $i<=5; $i++){
                                                        if($i == $totalroom){
                                                            echo "<option selected value='$i'>$i</option>";
                                                        }else{
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form_group col-12 col-sm-6 mb-3">
                                                <label for="roomCapacity">Room Capacity</label>
                                                <select class="form-control" name="roomCapacity" id="roomCapacity">
                                                    <option value="">Select Room Capacity</option>
                                                    <?php
                                                    for($i=1; $i<=settingValue()['maxRoomCapacity']; $i++){
                                                        if($i == $roomcapacity){
                                                            echo "<option selected value='$i'>$i</option>";
                                                        }else{
                                                            echo "<option value='$i'>$i</option>";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row p0">

                                            <div class="col-md-4 mb-3">
                                                <div class="form_group">
                                                    <label for="noAdult">No of Adult</label>
                                                    <input class="form-control" type="text" id="noAdult" name="noAdult"
                                                        placeholder="Enter No of Adult" value="<?php echo $noAdult ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form_group">
                                                    <label for="noChild">No of Child ( Above 5 Years )</label>
                                                    <input class="form-control" type="text" id="noChild" name="noChild"
                                                        placeholder="Enter No of Child" value="<?php echo $noChild ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="form_group">
                                                    <label for="mrp">Rack Rate</label>
                                                    <input class="form-control" type="number" id="mrp" name="mrp"
                                                        placeholder="Enter Room MRP" value="<?php echo $mrp ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <?php

                                        if(isset($_GET['update'])){
                                            echo "<div class='row p0'>";
                                            $imageSql = mysqli_query($conDB, "select * from room_img where room_id= {$_GET['update']}");

                                            while($image_row = mysqli_fetch_assoc($imageSql)){

                                                $img_path = FRONT_SITE_ROOM_IMG.$image_row['image'];
                                                $img_remove_path = FRONT_BOOKING_SITE.'/admin/manage-room.php?removeImage='.$image_row['id'];

                                                echo "
                                                    
                                                    <div class='img_old'>
                                                        <a href='$img_remove_path'>X</a>
                                                        <img style='width:80px' src='$img_path' >
                                                    </div>
                                                    
                                                ";
                                            }
                                            echo "</div> <br/>";
                                            
                                            echo '
                                                <div class="row p0" id="roomImgContent">
                                                    <div class="form_group col-md-6 col-sm-12 mb-3">
                                                        <label for="roomImage1">Room Image '.$imgSize.'</label>
                                                        <input class="form-control checkRoomImg" type="file" id="roomImage1" accept="image/png, image/jpeg" name="roomImage[]">
                                                        <span id="errorImage1"></span>
                                                    </div>
                                                    <div class="form_group col-md-6 col-sm-12 mb-3">
                                                        <label for="roomImage2">Room Image '.$imgSize.'</label>
                                                        <input class="form-control checkRoomImg" type="file" id="roomImage2" accept="image/png, image/jpeg" name="roomImage[]">
                                                        <span id="errorImage2"></span>
                                                    </div>
                                                </div>
                                            
                                            ';
                                        }else{
                                            echo '
                                            
                                            <div class="row p0" id="roomImgContent">
                                                <div class="form_group col-md-6 col-sm-12 mb-3">
                                                    <label for="roomImage1">Room Image '.$imgSize.'</label>
                                                    <input class="form-control checkRoomImg" type="file" id="roomImage1" accept="image/png, image/jpeg" name="roomImage[]">
                                                    <span id="errorImage1"></span>
                                                </div>
                                                <div class="form_group col-md-6 col-sm-12 mb-3">
                                                    <label for="roomImage2">Room Image '.$imgSize.'</label>
                                                    <input class="form-control checkRoomImg" type="file" id="roomImage2" accept="image/png, image/jpeg" name="roomImage[]">
                                                    <span id="errorImage2"></span>
                                                </div>
                                            </div>
                                            
                                            ';
                                        }

                                    ?>


                                        <?php

                                        if(isset($_GET['update'])){
                                            echo '<input type="hidden" value="update_room" name="type">';
                                            echo "<input type='hidden' value='$uid' name='update_id'>";
                                        }else{
                                            echo '<input type="hidden" value="add_room" name="type">';
                                        }

                                    ?>

                                        <div class="s25"></div>



                                        <div class="form_group amenities mb-3" id="amenitiesContent">
                                            <label for="amenities">Amenities</label> <br /><br />
                                            <?php

                                            $query = "select * from amenities";
                                            $sql = mysqli_query($conDB, $query);
                                            if(mysqli_num_rows($sql) > 0){
                                                if(isset($_GET['update'])){
                                                    $rid = $_GET['update'];
                                                    echo "<input type='hidden' name='amenitieRoomId' value='$rid'>";
                                                }else{
                                                    $rid = '';
                                                }
                                                
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    $title = ucfirst($row['title']);
                                                    $id = $row['id'];
                                                    
                                                    
                                                    if(checkAmenitiesById($rid, $row['id']) == 1){
                                                        echo "
                                                    
                                                        <span style='display: inline-block;margin-right: 10px;'>
                                                            <input checked type='checkbox' id='amenitie{$row['id']}' name='amenities[]' value='{$row['id']}'>
                                                            <label for='amenitie{$row['id']}'> $title</label>
                                                        </span>
                                                    
                                                        ";
                                                    }else{
                                                        echo "
                                                    
                                                        <span style='display: inline-block;margin-right: 10px;'>
                                                            <input type='checkbox' id='amenitie{$row['id']}' name='amenities[]' value='{$row['id']}'>
                                                            <label for='amenitie{$row['id']}'> $title</label>
                                                        </span>
                                                    
                                                    ";
                                                    }
                                                    
                                                    
                                                }
                                            }
                                        
                                        ?>

                                        </div>

                                        <?php

                                    if(isset($_GET['update'])){
                                        $detail_sql = mysqli_query($conDB, "select * from roomratetype where room_id = '$uid'");
                                        $count = 0;
                                        if(mysqli_num_rows($sql)>0){

                                            while($detail_row = mysqli_fetch_assoc($detail_sql)){ $count++?>
                                        <input type="hidden" name="room_detail_id[]"
                                            value="<?php echo $detail_row['id'] ?>">
                                        <div class="row p0" style="align-items: flex-end;">
                                            <div class="form_group col-md-4 mb-3">
                                                <label for="">Rate Plane</label>
                                                <input class="form-control" type="text" id="" name="titleUpload[]"
                                                    placeholder="Enter Title."
                                                    value="<?php echo $detail_row['title'] ?>">
                                            </div>
                                            <div class="form_group col-md-3 col-sm-6 col-xs-12 mb-3">
                                                <label for="">Room Price</label>
                                                <input class="form-control mb-3" type="number" id=""
                                                    name="singleRoomPriceUpload[]" placeholder="Enter Room Price."
                                                    value="<?php echo $detail_row['singlePrice'] ?>">
                                            </div>
                                            <div class="form_group col-md-3 col-sm-6 col-xs-12 mb-3">
                                                <label for="">Room Price</label>
                                                <input class="form-control" type="number" id=""
                                                    name="doubleRoomPriceUpload[]" placeholder="Enter Room Price."
                                                    value="<?php echo $detail_row['doublePrice'] ?>">
                                            </div>

                                            <?php
                                                        if($count == 1){
                                                            echo '<div class="add_sub col-md-2 "  data-id="1"><div class="btn update">Add</div></div>';
                                                        }else{
                                                            echo "<div class='col-md-2'><a href='manage-room.php?remove={$detail_row['id']}'><div class='btn delete'>Remove</div></a></div>";
                                                        }
                                                    
                                                    ?>
                                            <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                                                <div class="form_group">
                                                    <label for="">Extra charge of Adult</label>
                                                    <input class="form-control" type="number" id=""
                                                        name="extraAdultUpload[]"
                                                        placeholder="Enter Extra charge of Adult"
                                                        value="<?php echo $detail_row['extra_adult'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                                                <div class="form_group">
                                                    <label for="">Extra charge of Child</label>
                                                    <input class="form-control" type="number" id=""
                                                        name="extraChildUpload[]"
                                                        placeholder="Enter Extra charge of Child"
                                                        value="<?php echo $detail_row['extra_child'] ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <?php }
                                        }
                                    }else{ ?>

                                        <div class="row p0" style="align-items: flex-end;" id="add_content_id1">

                                            <div class="form_group col-md-4 mb-3">
                                                <label for="title">Rate Plan</label>
                                                <input class="form-control" type="text" id="title" name="title[]"
                                                    placeholder="Enter Title.">
                                            </div>
                                            <div class="form_group col-md-3 col-sm-6 col-xs-12 mb-3">
                                                <label for="singleRoomPrice">Single occupancy</label>
                                                <input class="form-control" type="number" id="singleRoomPrice"
                                                    name="singleRoomPrice[]" placeholder="Enter Single Price.">
                                            </div>
                                            <div class="form_group col-md-3 col-sm-6 col-xs-12 mb-3">
                                                <label for="doubleRoomPrice">Double occupancy</label>
                                                <input class="form-control" type="number" id="doubleRoomPrice"
                                                    name="doubleRoomPrice[]" placeholder="Enter Double Price.">
                                            </div>
                                            <div class="add_sub col-md-2 mb-3 " data-id="1">
                                                <div class="btn update">Add</div>
                                            </div>

                                            <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                                                <div class="form_group">
                                                    <label for="extraAdult">Extra charge of Adult</label>
                                                    <input class="form-control" type="number" id="extraAdult"
                                                        name="extraAdult[]" placeholder="Enter Extra charge of Adult"
                                                        value="<?php echo $extraAdult ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                                                <div class="form_group">
                                                    <label for="extraChild">Extra charge of Child</label>
                                                    <input class="form-control" type="number" id="extraChild"
                                                        name="extraChild[]" placeholder="Enter Extra charge of Child"
                                                        value="<?php echo $extraChild ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <?php }

                                    ?>

                                        <div id="add_content"></div>
                                        <div class="s25"></div>
                                        <button class="btn bg-gradient-primary mb-0 mt-lg-auto deactive" type="submit"
                                            name="addRoom">
                                            <?php echo $btn ?>
                                        </button>
                                    </form>
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
       
        $attr_count = 1;
        $(document).on('click', '.add_sub',function(){
            $attr_count ++;
            $html = '<div class="row p0" id="add_content_id' + $attr_count + '" style="align-items: flex-end;">';
            $html += '<div class="form_group col-md-4"><label for="title' + $attr_count + '">Rate Plan</label><input class="form-control" type="text" id="title' + $attr_count + '" name="title[]" placeholder="Enter Title."></div>';
            $html += '<div class="form_group col-md-3 col-sm-6 col-xs-12"><label for="singleRoomPrice' + $attr_count + '">Room Price</label><input class="form-control" type="text" id="singleRoomPrice' + $attr_count + '" name="singleRoomPrice[]" placeholder="Enter Room Price."></div>';
            $html += '<div class="form_group col-md-3 col-sm-6 col-xs-12"><label for="doubleRoomPrice' + $attr_count + '">Room Price</label><input class="form-control" type="text" id="doubleRoomPrice' + $attr_count + '" name="doubleRoomPrice[]" placeholder="Enter Room Price."></div>';
            $html += '<div class="add_sub col-md-2" data-id="' + $attr_count + '"><div class="btn update">Add</div></div>';
            $html += '<div class="col-md-4 col-sm-6 col-xs-12"><div class="form_group"><label for="extraAdult' + $attr_count + '">Extra charge of Adult</label><input class="form-control" type="text" id="extraAdult' + $attr_count + '" name="extraAdult[]" placeholder="Enter Extra charge of Adult"></div></div>';
            $html += '<div class="col-md-4 col-sm-6 col-xs-12"><div class="form_group"><label for="extraChild' + $attr_count + '">Extra charge of Child</label><input class="form-control" type="text" id="extraChild' + $attr_count + '" name="extraChild[]" placeholder="Enter Extra charge of Child"></div></div>';
            $html += '</div>';
            var content = $(this).find('.btn');
            $(this).removeClass('add_sub').addClass('remove_sub');
            $(content).removeClass('update').addClass('delete').html('Remove');
            $('#add_content').append($html);
        });
        $(document).on('click', '.remove_sub',function(){
            var id = $(this).data('id');
            $('#add_content_id'+id).remove();
        });

        $(document).on('submit', '#manageForm', function(e){
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
				success : function(data){
                    // window.location.href = "room-list.php";
				}
			});

		});

        $(document).on('change', '#parentId', function(){
            var id = $(this).val();
            if(id == 0){
                $('#header').val('').prop('disabled', false);
                $('#bedType').val('').prop('disabled', false);
                $('#roomCapacity').val('').prop("checked","checked");
                $('#noChild').val('').prop('disabled', false);
                $('#slug').val('').prop('disabled', false);

                $('#roomImgContent').show();
                $('#amenitiesContent').show();
            }else{
                $.ajax({
                    url : 'include/ajax/room.php',
                    type : 'post',
                    data: {id:id, type:'getParentIdData'},
                    success : function(data){
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
                        $('#roomCapacity').val(roomcapacity).prop("checked","checked");
                        $('#noChild').val(noChild).prop('disabled', true);
                        $('#slug').val(slug).prop('disabled', true);

                        $('#roomImgContent').hide();
                        $('#amenitiesContent').hide();
                    }
                });
            }
        });

        $(document).on('change','#header',function(){
            var hotelName= $(this).val().toLowerCase();
            let result = hotelName.replace(" ", "-");
            $('#slug').val(result);
        });
  </script>

</body>

</html>