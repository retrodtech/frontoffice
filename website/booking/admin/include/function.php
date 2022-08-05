<?php

function redirect($link){
    ob_start();
    header('Location: '.$link);
    ob_end_flush();
    die();
}

function pr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    die();
}

function safeData($data){
    global $conDB;
   return mysqli_real_escape_string($conDB, $data);
}

function str_openssl_dec($data,$iv){
    $key = KEY; 
    $cipher = "aes128"; 
    $option = 0; 
    return openssl_decrypt($data, $cipher, $key, $option, $iv);
}
function str_openssl_enc($data,$iv){
    $key = KEY; 
    $cipher = "aes128"; 
    $option = 0; 
    return openssl_encrypt($data, $cipher, $key, $option, $iv);
}


function ErrorMsg(){
    if(isset($_SESSION['ErrorMsg'])){
        $output = "<div class='alert error_box'><i class='ti-face-sad'></i>";
        $output .= $_SESSION['ErrorMsg'];
        $output .= "</div>";
        $_SESSION['ErrorMsg'] = null;
        return $output;
    }
}

function SuccessMsg(){
    if(isset($_SESSION['SuccessMsg'])){
        $output = "<div class='alert success_box'><i class='ti-face-smile'></i>";
        $output .= $_SESSION['SuccessMsg'];
        $output .= "</div>";
        $_SESSION['SuccessMsg'] = null;
        return $output;
    }
}

function hotelDetail(){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from profile");
    $row = mysqli_fetch_assoc($sql);
    $admin['email'] = $row['email'];
    $admin['primaryphone'] = $row['primaryphone'];
    $admin['address'] = $row['address'];
    $admin['pincode'] = $row['pincode'];
    $admin['district'] = $row['district'];
    $admin['gst'] = $row['gst'];
    $admin['description'] = $row['description'];
    $admin['name'] = $row['name'];
    $admin['logo'] = $row['logo'];
    $admin['url'] = $row['url'];
    $admin['checkIn'] = $row['checkIn'];
    $admin['checkOut'] = $row['checkOut'];
    return $admin;
}

function roomMaxCapacityById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from room where id = '$rid'"));
    return $sql['roomcapacity'];
}


function formatingDate($date){
    return  date("d-M-Y", strtotime($date));
}

function getBookingNumberById($oid){
    global $conDB;
    
    if(strlen($oid) == 1){
        $oid = BOOK_GENERATE."00".$oid;
    }elseif(strlen($oid) == 2){
        $oid = BOOK_GENERATE."0".$oid;
    }else{
        $oid = BOOK_GENERATE.$oid;
    }

    return $oid;
}

function roomCountById($rdid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from room_detail where id = '$rdid'"));
    return $sql['totalroom'];
}

function getRoomNameById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select header from room where id = '$rid'"));
    return $sql['header'];
}

function getRoomTypeById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select bedtype from room where id = '$rid'"));
    return $sql['bedtype'];
}

function getAdminUserNameById($aid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select username from admin where id = '$aid'"));
    return $sql['username'];
}

function getAdminLogoById($aid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select logo from admin where id = '$aid'"));
    return $sql['logo'];
}

function getAmenitieById($aid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select title from amenities where id = '$aid'"));
    return $sql['title'];
}

function getAmenitieIdByRoomId($rid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room_amenities where room_id = '$rid'");
    while($row = mysqli_fetch_assoc($sql)){
        $aid[] = $row['amenitie_id'];
    }
    return $aid;
}

function getRoomHeaderById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select header from room where id = '$rid'"));
    return $sql['header'];
}


function getRoomPriceById($rdid, $date ,$date2=''){
    global $conDB;
    $data=array();
    if($date2 == ''){
        $date2 = $date;
    }
    $sql = "select * from inventory where room_detail_id = '$rdid' and type = 'room_detail' and add_date <= '$date' && out_date >= '$date2'";
    $inven_sql = mysqli_query($conDB, $sql);
    if(mysqli_num_rows($inven_sql)>0){
        while($inven_row = mysqli_fetch_assoc($inven_sql)){
            $price=$inven_row['price'];
        }
    }else{
        $sql = "select * from inventory where room_detail_id = '$rdid' and type = 'add2' and add_date = '0000-00-00'";
        $inven_sql = mysqli_query($conDB, $sql);
        if(mysqli_num_rows($inven_sql)>0){
            while($inven_row = mysqli_fetch_assoc($inven_sql)){
                $price=$inven_row['price'];
            }
        }else{
            $sql = "select * from room_detail where id = '$rdid'";
            $inven_sql = mysqli_query($conDB, $sql);
                while($inven_row = mysqli_fetch_assoc($inven_sql)){
                    $price=$inven_row['price'];
                }
        }
    }
    
    return $price;
}

function getRoomLowPriceById($rid, $date){
    global $conDB;
    $data=array();
    if(isset($_SESSION['checkout'])){
        $date2 = $_SESSION['checkout'];
    }else{
        $oneDay = strtotime('1 day 30 second', 0);
        $date2 = date('Y-m-d',strtotime($date) + $oneDay);
    }
    $sql = "select * from inventory where room_id = '$rid' and type = 'room_detail' and add_date <= '$date' && out_date >= '$date2' and price !='' order by price desc";
    $inven_sql = mysqli_query($conDB, $sql);
    if(mysqli_num_rows($inven_sql)>0){
        while($inven_row = mysqli_fetch_assoc($inven_sql)){
            $price=$inven_row['price'];
        }
    }else{
        $sql = "select * from inventory where room_id = '$rid' and type = 'add2' and add_date = '0000-00-00' and price !='' order by price desc";
        $inven_sql = mysqli_query($conDB, $sql);
        if(mysqli_num_rows($inven_sql)>0){
            while($inven_row = mysqli_fetch_assoc($inven_sql)){
                $price=$inven_row['price'];
            }
        }else{
            $sql = "select * from room_detail where room_id = '$rid' and price !='' order by price desc";
            $inven_sql = mysqli_query($conDB, $sql);
                while($inven_row = mysqli_fetch_assoc($inven_sql)){
                    $price=$inven_row['price'];
                }
        }
    }
    
    return $price;
}

function getRoomLowPriceByIdWithDate($rid, $date ,$date2=''){
    global $conDB;
    if($date2 == ''){
        $date2 = $date;
    }
    $data=array();
    $sql = "select * from inventory where room_id = '$rid' and type = 'room_detail' and add_date <= '$date' && out_date >= '$date2' and price !='' order by price desc";
    $inven_sql = mysqli_query($conDB, $sql);
    if(mysqli_num_rows($inven_sql)>0){
        while($inven_row = mysqli_fetch_assoc($inven_sql)){
            $price=$inven_row['price'];
        }
    }else{
        $sql = "select * from inventory where room_id = '$rid' and type = 'add2' and add_date = '0000-00-00' and price !='' order by price desc";
        $inven_sql = mysqli_query($conDB, $sql);
        if(mysqli_num_rows($inven_sql)>0){
            while($inven_row = mysqli_fetch_assoc($inven_sql)){
                $price=$inven_row['price'];
            }
        }else{
            $sql = "select * from room_detail where room_id = '$rid' and price !='' order by price desc";
            $inven_sql = mysqli_query($conDB, $sql);
                while($inven_row = mysqli_fetch_assoc($inven_sql)){
                    $price=$inven_row['price'];
                }
        }
    }
    
    return $price;
}

function getTotalRoom($rid, $date,$date2=''){
    global $conDB;
    if($date2 == ''){
        $date2 = $date;
    }
    $query = "select room from inventory where room_id  = '$rid' and type = 'room' and add_date <= '$date' && out_date >= '$date2'";
    $sql = mysqli_query($conDB, $query );
    if(mysqli_num_rows($sql)>0){
        while($inven_row = mysqli_fetch_assoc($sql)){
            $room=$inven_row['room'];
        }
    }else{
        $query = "select room from inventory where room_id  = '$rid' and type = 'add'";
        $sql = mysqli_query($conDB, $query);
        while($inven_row = mysqli_fetch_assoc($sql)){
            $room=$inven_row['room'];
        }
    }
    
    return $room;
}

function countTotalBooking($rid, $date='',$date2=''){
    global $conDB;
    $sql ="SELECT sum(no_room) FROM booking where room_id = '$rid' and status = '1' and checkIn <= '$date' && checkOut >= '$date2'";
    $row = mysqli_fetch_assoc(mysqli_query($conDB,$sql));
    return $row['sum(no_room)'];
}


function roomExist($rid,$date='',$date2='',$rdid=''){
    global $conDB;
    $sql ="SELECT * FROM room where id = '$rid'";
    $status = mysqli_fetch_assoc(mysqli_query($conDB,$sql));

    if($status['status'] == 1){
        $sql = "SELECT * FROM inventory where room_id = '$rid' and type='add'";
        $status = mysqli_fetch_assoc(mysqli_query($conDB,$sql));

        if($status['status'] == 1){
            if($date == ''){
                $checkIn = $_SESSION['checkIn'];
            }else{
                $checkIn = $date;
            }

            if($date2 == ''){
                $checkOut = $_SESSION['checkout'];
            }else{
                $checkOut = $date2;
            }
            
            
            $sql ="SELECT sum(no_room) FROM booking where room_id = '$rid' and status = '1' and payment_status='complete' and checkIn <= '$checkIn' && checkOut >= '$checkOut'";
            
            $check_sold_arr = mysqli_fetch_row(mysqli_query($conDB,$sql));

            $check_sold= $check_sold_arr[0];

            $check_stock = getTotalRoom($rid, $checkIn);

            $result =  $check_stock - $check_sold;
        }else{
            $result = 0;
        }
    }else{
        $result = 0;
    }

    if($rdid != ''){
        if(isset($_SESSION['checkIn'])){
            $checkInTime = $_SESSION['checkIn'];
        }
        if(getRatePlanStatusByRoomDetailId($rdid) == 1){
            if(getRoomPriceById($rdid,$checkInTime) == 0){
                $result = 0;
            }
        }else{
            $result = 0;
        }
    }

    
    
    
    

    return $result;
    
}

function getRoomAdultCountById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select noAdult from room where id = '$rid'"));
    return $sql['noAdult'];
}

function getRoomChildCountById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select noChild from room where id = '$rid'"));
    return $sql['noChild'];
}

function getRoomExtraAdultPriceById($rdid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select extra_adult from room_detail where id = '$rdid'"));
    return $sql['extra_adult'];
}

function getAdultPriceByNoAdult($n,$rid,$rdid){
    if(getRoomAdultCountById($rid) >= $n){
        $data = 0;
    }else{
        $data = ($n - getRoomAdultCountById($rid)) * getRoomExtraAdultPriceById($rdid);
    }
    return $data;
}

function getRoomExtraChildPriceById($rdid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select extra_child from room_detail where id = '$rdid'"));
    return $sql['extra_child'];
}


function getChildPriceByNoChild($n,$rid,$rdid){
    if(getRoomChildCountById($rid) >= $n){
        $data = 0;
    }else{
        $data = ($n - getRoomChildCountById($rid)) * getRoomExtraChildPriceById($rdid);
    }
    return $data;
}

function getOrderDetailByOrderId($oid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from booking where id= '$oid'");
    $row = mysqli_fetch_assoc($sql);
    return $row;
}

function tryRoomBooking(){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from booking where payment_status = 'pending' and status = '1'");
    return mysqli_num_rows($sql);
}

function tryBook(){
    global $conDB;
    $count = roomBooking();
    if($count > 0){
        $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select sum(price) from booking where payment_status = 'pending' and status = '1'"));
        $result= custom_number_format($sql['sum(price)']);
    }else{
        $result = 0;
    }
    return $result;
    
}

function getImageById($rid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room_img where room_id = '$rid'");
    
    if(mysqli_num_rows($sql)){
        while($row = mysqli_fetch_assoc($sql)){
            $img[] = $row['image'];
        }
    }else{
        $img[] = 'room1.jpg';
    }
    
    return $img;
}

function getImageByImgId($rid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room_img where id = '$rid'");
    $row = mysqli_fetch_assoc($sql);    
    return $row['image'];;
}


function getRatePlanByRoomId($rid){
    global $conDB;
    $data=array();
    $sql = mysqli_query($conDB, "select * from room_detail where room_id  = '$rid'");
    if(mysqli_num_rows($sql)){
        while($row = mysqli_fetch_assoc($sql)){
            $data[]=$row;
        }
    }
    return $data;
}

function getRatePlanByRoomDetailId($rdid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room_detail where id  = '$rdid'");
    $row = mysqli_fetch_assoc($sql);
    return $row['title'];
}

function getRatePlanStatusByRoomDetailId($rdid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room_detail where id  = '$rdid'");
    $row = mysqli_fetch_assoc($sql);
    return $row['status'];
}

function getDataBaseDate($date){

    $checkInArr = explode('/',$date);
    $checkIn = $checkInArr['2'].'-'.$checkInArr['0'].'-'.$checkInArr['1'];
    return $checkIn;
}

function getDataBaseDate2($date){

    $checkInArr = explode('/',$date);
    $checkIn = $checkInArr['2'].'-'.$checkInArr['1'].'-'.$checkInArr['0'];
    return $checkIn;
}

function send_email($email,$gname='',$cc='',$bcc='',$html,$subject){
    include(SERVER_BOOKING_PATH.'/admin/smtp/PHPMailerAutoload.php');
    $hotel_name = hotelDetail()['name'];

    $mail = new PHPMailer;

    $mail->SMTPDebug = 0;                               

    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'confirmbookingvoucher@gmail.com';                 
    $mail->Password = 'Voucher@2022';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;                                    

    $mail->setFrom('confirmbookingvoucher@gmail.com',$hotel_name);
    $mail->addAddress("$email", "$gname");
    $mail->addCC("$cc");
    $mail->addBCC("$bcc");

    $mail->isHTML(true);
    $mail->Subject = "$subject";
    $mail->Body    = $html;

    if($mail->send()) {
        // echo 1;
    } else {
        // echo 0;
    }
}


function orderEmail($oid){

    $name = getOrderDetailByOrderId($oid)['name'];
    $room_id = getOrderDetailByOrderId($oid)['room_id'];
    $room_detail_id = getOrderDetailByOrderId($oid)['room_detail_id'];
    $email = getOrderDetailByOrderId($oid)['email'];
    $phone = getOrderDetailByOrderId($oid)['phone'];
    $company_name = getOrderDetailByOrderId($oid)['company_name'];
    $gst = getOrderDetailByOrderId($oid)['gst'];
    $no_room = getOrderDetailByOrderId($oid)['no_room'];
    $adult = getOrderDetailByOrderId($oid)['adult'];
    $child = getOrderDetailByOrderId($oid)['child'];
    $night = getOrderDetailByOrderId($oid)['night'];
    $price = getOrderDetailByOrderId($oid)['price'];
    $payment_status = getOrderDetailByOrderId($oid)['payment_status'];
    $add_on = getOrderDetailByOrderId($oid)['add_on'];
    $checkIn = getOrderDetailByOrderId($oid)['checkIn'];
    $checkOut = getOrderDetailByOrderId($oid)['checkOut'];

    $extraAdult = getOrderDetailByOrderId($oid)['extraAdult'];
    $extraChild = getOrderDetailByOrderId($oid)['extraChild'];

    $company_name = getOrderDetailByOrderId($oid)['company_name'];
    $gst = getOrderDetailByOrderId($oid)['gst'];

    $roomPrice = getOrderDetailByOrderId($oid)['roomPrice'];

    $couponCode = getOrderDetailByOrderId($oid)['couponCode'];
    $pickUp = getOrderDetailByOrderId($oid)['pickUp'];
    $pickupHtml = '';
    
    $img = FRONT_SITE_IMG.hotelDetail()['logo'];
    

    $adultextra = 0;
    $childextra = 0;
    if($no_room > 1){

        $printRoomPrice =  $no_room .' * '. $roomPrice ;

        if($extraAdult == 0){
            $printExtraAdult = 0;
            
        }else{
            $adultextra = $extraAdult / $no_room;
            $printExtraAdult = $no_room.' * ' .$adultextra;
        }


        if($extraChild == 0){
            $printExtraChild = 0;
        }else{
            $childextra = $extraChild / $no_room;
            $printExtraChild = $no_room.' * '.$childextra;
        }

    }else{

        $printRoomPrice = $roomPrice;

        $printExtraAdult = $extraAdult;


        $printExtraChild = $extraChild;
    }
    
    
    $priceHtml = '';
    $total_price = $night * (($roomPrice * $no_room) + $adultextra + $childextra);
    
    if($pickUp > 0){
        $total_price = $total_price + $pickUp;
        $pickupHtml = '<tr align="right">
                        <td>Pick Up:</td>
                        <td>'.$pickUp.'</td>
                    </tr>';
    }

    $gst_price = $total_price * (12 / 100);
    $totalGst = $total_price + $gst_price;
    $couponCodeHtml = '';

    if($couponCode != ''){
        $totalGst = couponPrice($couponCode,$totalGst) ;
        $couponCodeHtml = '<tr align="right">
                            <td>Coupon Code:</td>
                            <td>'.$couponCode.'</td>
                        </tr>';
    }

    if($payment_status == 'pending'){
        $priceStatus = 'Failed Payment';
        $priceHtml = '<tr><td style="width: 100%;text-align: center;padding: 20px 10px;border-radius: 3px;border: 2px dashed;color: #842029;background-color: #f8d7da;border-color: #d1898f; "><div><strong>'.$priceStatus.' </strong> <br/> <strong style="font-size: 14px;">Price: '.$price.' Rs</strong></div></td></tr>';
    }
    
    $partial = getOrderDetailByOrderId($oid)['partial'];
    $buttomBar = '';
    if($payment_status == 'complete'){
        $priceStatus = 'Successful Payment';
        
        $priceHtml = '<tr><td style="width: 100%;color: #0f5132;background-color: #d1e7dd;border-color: #0f5132;text-align: center;padding: 20px 10px;border-radius: 3px;border: 2px dashed;"><div><strong>'.$priceStatus.' </strong> <br/> <strong style="font-size: 14px;">Pay: '.$price.' Rs</strong></div></td></tr>';
        
        if($partial == 'Yes'){
            $priceHtml = '<tr><td style="width: 100%;color: #0f5132;background-color: #d1e7dd;border-color: #0f5132;text-align: center;padding: 20px 10px;border-radius: 3px;border: 2px dashed;"><div><strong>'.$priceStatus.' </strong> <br/> <strong style="font-size: 14px;"> <strong>Total Price : '.$totalGst.' Rs </strong><br/> 50% Pay: '.$price.' Rs</strong></div></td></tr>';
            $buttomBar = '<tr align="right">
                        <td>50% Pay:</td>
                        <td><strong>'.$price.' Rs</strong></td>
                    </tr>';
        }
    }

    

    

    $html = '
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Order Invoice</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Order confirmation </title>
        <meta name="robots" content="noindex,nofollow" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
        <style type="text/css">
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

            div,
            p,
            a,
            li,
            td {
                -webkit-text-size-adjust: none;
                word-break: break-all;
            }

            body {
                margin: 0;
                padding: 0;
                background: #e1e1e1;
            }

            body {
                width: 100%;
                height: 100%;
                background-color: #e1e1e1;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                max-width: 600px;
                margin: 0 auto;
                font-family: "Open Sans", sans-serif;
            }

            html {
                width: 100%;
            }

            #invoice {
                background: white;
                background: white;
                border-radius: 25px 25px 0 0;
                padding: 2em;
            }

            .dish_list td {
                padding: 1em;
                border-bottom: 1px solid rgba(0, 0, 0, .1);
            }

            .dish_list td strong {
                color: rgba(0, 0, 0, .7);
            }
        </style>

    </head>

    <body>
        <div style="background-color: #e1e1e1; -webkit-font-smoothing: antialiased;padding: 1em; max-width:600px;">
            <div id="invoice">
                <table style="width:100%; max-width:600px;">
                    <tr>
                        <td align="left"><img width="80px" src="'.$img.'"></td>
                        <td align="right"><strong>Invoice #'.getBookingNumberById($oid).'</strong></td>
                    </tr>
                </table>
                <hr>

                <table style="width:100%; margin-bottom: 35px; max-width:600px;">
                    <tr>
                        <td align="left">
                            <div> Hello <b>'.$name.'</b>,</div>
                            <div> '.$email.'</div>
                            <div> '.$company_name.'</div>
                            <div> '.$gst.'</div>
                        </td>

                        <td align="right">
                            <div><b>'.hotelDetail()['name'].'</b></div>
                            <div>'.hotelDetail()['pincode'].'</div>
                            <div>'.ucfirst(hotelDetail()['district']).'</div>
                            <div>'.ucfirst(hotelDetail()['address']).'</div>
                            <div>GST:- '.hotelDetail()['gst'].'</div>
                        </td>
                    </tr>
                </table>

                <table style="width:100%; margin-bottom: 35px; max-width:600px;">
                    <tr>
                        <td align="left">
                            <div style="margin-bottom:10px;"><small>Invoice Date: '.$add_on.'</small></div>
                        </td>
                    </tr>
                    '.$priceHtml.'
                </table>

                <table class="dish_list"
                    style="width:100%; margin-bottom: 25px;transform: translateX(0); border-collapse: collapse; max-width:600px;">
                    <tr>
                        <td align="left"><strong>01</strong></td>
                        <td align="left"><strong>Room</strong></td>
                        <td align="right"><strong>'.getRoomNameById($room_id).'</strong></td>
                    </tr>
                    <tr>
                        <td width="20px" align="left">02</td>
                        <td align="left">Rate Plan</td>
                        <td width="40%" align="right">'.getRatePlanByRoomDetailId($room_detail_id).'</td>
                    </tr>
                    <tr>
                        <td align="left">03</td>
                        <td align="left"><small>Room Price</small></td>
                        <td align="right"><small>'.$printRoomPrice.' Rs</small></td>
                        
                    </tr>
                    
                    <tr>
                        <td align="left">04</td>
                        <td align="left"><small>Adult '.$adult.'</small></td>
                        <td align="right"><small>'.$printExtraAdult. ' Rs</small></td>
                        
                    </tr>
                    <tr>
                        <td align="left">05</td>
                        <td align="left"><small>Child '.$child.'</small></td>
                        <td align="right"><small>'.$printExtraChild.' Rs</small></td>
                        
                    </tr>
                    <tr>
                        <td align="left">06</td>
                        <td align="left"><small>Night</small></td>
                        <td align="right"><small>'.$night.'</small></td>
                    </tr>
                    <tr>
                        <td align="left">07</td>
                        <td align="left"><small>Check In Time</small></td>
                        <td align="right"><small>'.date('d-m-Y', strtotime($checkIn)).'</small></td>
                    </tr>
                    <tr>
                        <td align="left">08</td>
                        <td align="left"><small>Check Out Time</small></td>
                        <td align="right"><small>'.date('d-m-Y', strtotime($checkOut)).'</small></td>
                    </tr>
                    <tr>
                        <td align="left">09</td>
                        <td align="left"><small>Total Room</small></td>
                        <td align="right"><small>'.$no_room.'</small></td>
                    </tr>
                </table>
                <table style="width:70%; margin-bottom: 25px;margin-left: 30%;">
                    <tr align="right">
                        <td>Sub Total:</td>
                        <td><small>'.$total_price.' Rs</small></td>
                    </tr>'.$pickupHtml.'
                    <tr align="right">
                        <td width="50%">GST (12%):</td>
                        <td>'.$gst_price.' Rs</td>
                    </tr>'.$couponCodeHtml.'
                    <tr align="right">
                        <td>Total:</td>
                        <td><strong>'.$totalGst.' Rs</strong></td>
                    </tr>
                    '.  $buttomBar .'
                </table>
                
            </div>
        </div>

    </body>

    </html>
  
    
    ';
    return $html;
}

function custom_number_format($n, $precision = 1) {
    if ($n < 900) {
        $n_format = number_format($n);
    } else if ($n < 900000) {
        $n_format = number_format($n / 1000, $precision). 'K';
    } else if ($n < 900000000) {
        $n_format = number_format($n / 1000000, $precision). 'M';
    } else if ($n < 900000000000) {
        $n_format = number_format($n / 1000000000, $precision). 'B';
    } else {
        $n_format = number_format($n / 1000000000000, $precision). 'T';
    }
    return $n_format;
}

function checkAmenitiesById($rid,$aid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room_amenities where room_id  = '$rid' and amenitie_id  = '$aid'");
    if(mysqli_num_rows($sql)){
        $data = 1;
    }else{
        $data = 0;
    }
    return $data;
}

function visiter_count($ip){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from counter_table where visiter_ip = '$ip'");
    if(mysqli_num_rows($sql)>0){

    }else{
        mysqli_query($conDB, "insert into counter_table(visiter_ip) values('$ip')");
    }
}

function roomBooking(){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from booking where status = '1'");
    return mysqli_num_rows($sql);
}

function roomNight(){
    global $conDB;
    $count = roomBooking();
    $currennt_date = date('Y-m-d');
    if($count > 0){
        $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select sum(night) from booking where checkIn <= '$currennt_date' && checkOut >= '$currennt_date' and status = '1'"));
        $result = $sql['sum(night)'];
    }else{
        $result = 0;
    }
    return $result;
    
}

function earnig(){
    global $conDB;
    $count = roomBooking();
    if($count > 0){
        $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select sum(price) from booking where status = '1'"));
        $result= custom_number_format($sql['sum(price)']);
    }else{
        $result = 0;
    }
    return $result;
    
}

function visiter(){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from counter_table");
    return mysqli_num_rows($sql);
}

function revenue(){
    global $conDB;
    $count = roomBooking();
    $currennt_date = date('Y-m-d');
    if($count > 0){
        $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select sum(price) from booking where checkIn <= '$currennt_date' && checkOut >= '$currennt_date' and status = '1'"));
        $revenue = $sql['sum(price)'];
    }else{
        $revenue = 0;
    }
    return custom_number_format($revenue);
}

function averageStay(){
    global $conDB;
    $total_booking = roomBooking();
    if($total_booking == 0){
        $result = 0;
    }else{
        $sql = mysqli_query($conDB, "select * from booking where payment_status = 'complete' and status = '1'");
        $count_complete_booking = mysqli_num_rows($sql);
        $result = ($count_complete_booking * 100) / $total_booking;
    }
    return ceil($result); 
}

function rate_performance(){
    global $conDB;
    $total_booking = roomBooking();
    $currennt_date = date('Y-m-d');
    if($total_booking == 0){
        $result = 0;
    }else{
        $query = "select * from booking where checkIn <= '$currennt_date' && checkOut >= '$currennt_date' GROUP BY room_detail_id and status = '1'";
        $sql = mysqli_query($conDB, $query);
        if(mysqli_num_rows($sql)>0){
            while($row = mysqli_fetch_assoc($sql)){
                $roomDId=$row['room_detail_id'];
                $query = "select * from booking where checkIn <= '$currennt_date' && checkOut >= '$currennt_date' and room_detail_id = '$roomDId' and status = '1'";
                $sqlById = mysqli_query($conDB, $query);
                $count[]=mysqli_num_rows($sqlById);
            }
            $result = getRatePlanByRoomDetailId(max($count));
        }else{
            $result = 0;
        }
       
    }
    return $result; 
}

function settingValue(){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from setting where id = '1'");
    $row = mysqli_fetch_assoc($sql);
    return $row;
}

function couponPrice($code,$price){
    global $conDB;
        $sql = mysqli_query($conDB, "select * from couponcode where status = '1' and coupon_code = '$code'");
        $row = mysqli_fetch_assoc($sql);
        $coupon_type = $row['coupon_type'];
        $coupon_value = $row['coupon_value'];
        $totalPrice = 0;
        
        if($coupon_type == 'P'){
            $totalPrice = $price - ($price * ($coupon_value / 100));
        }
        if($coupon_type == 'F'){
            $totalPrice = $price - $coupon_value;
        }
        return  $totalPrice;
}

function checkLive(){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from live where id = '1'"));
    return $sql['status'];
}




?>