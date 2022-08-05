<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
include (SERVER_INCLUDE_PATH.'add_to_room.php');
$obj = new add_to_room();

$type = $_POST['type'];

if($type == 'updateRoom'){
    
    $form = getDataBaseDate2($_POST['from']);
    $to = getDataBaseDate2($_POST['to']);
    $oneDay = strtotime('1 day 30 second', 0);
    
    $room = $_POST['room'];
    $updateId = $_POST['updateId'];
    $existQuery = mysqli_query($conDB, "select * from inventory where type='room' and room_id='$updateId' and add_date = '$form' && out_date= '$to'");
    if(mysqli_num_rows($existQuery) > 0){
        $sql= "update inventory set room='$room' where type='room' and room_id='$updateId' and add_date = '$form' && out_date= '$to'";
    }else{
        $sql= "insert into inventory(type,room_id,add_date,out_date,room) values('room','$updateId','$form','$to','$room')";
    }
    if(mysqli_query($conDB,$sql)){
        $_SESSION['SuccessMsg'] = "Successfull Update Room";
    }
}

if($type == 'updateRate'){
    // pr($_POST);
    $form = getDataBaseDate2($_POST['from']);
    $to = getDataBaseDate2($_POST['to']);
    $oneDay = strtotime('1 day 30 second', 0);
    
    $price = $_POST['price'];
    $updateId = $_POST['updateId'];
    $updateRId = $_POST['updateRId'];
    $existQuery = mysqli_query($conDB, "select * from inventory where type='room_detail' and room_id='$updateId' and add_date = '$form' && out_date= '$to'");
    if(mysqli_num_rows($existQuery) > 0){
        $sql= "update inventory set price='$price' where type='room_detail' and room_id='$updateId' and add_date = '$form' && out_date= '$to'";
    }else{
        $sql= "insert into inventory(type,room_id,room_detail_id,add_date,out_date,price) values('room_detail','$updateRId','$updateId','$form','$to','$price')";
    }
    
    if(mysqli_query($conDB,$sql)){
        $_SESSION['SuccessMsg'] = "Successfull Update Price";
    }
}

if($type == 'reloadRoom'){
    $updateRoom = $_POST['updateRoom'];
    $sql = "delete from inventory where room_id = '$updateRoom' and type = 'room'";
   
    if(mysqli_query($conDB,$sql)){
        $_SESSION['SuccessMsg'] = "Successfull Reload Room";
    }
}

if($type == 'reloadRate'){
    $updateRateId = $_POST['updateRoom'];
    $updateRateDetail = $_POST['updateRoomDetail'];
    $sql = "delete from inventory where room_detail_id = '$updateRateDetail' and type = 'room_detail' and room_id = '$updateRateId'";
    if(mysqli_query($conDB,$sql)){
        $_SESSION['SuccessMsg'] = "Successfull Reload Rate";
    }
}

?>