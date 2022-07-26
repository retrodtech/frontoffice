<?php

if(isset($_SESSION['HOTEL_ID'])){
    $hotelId = $_SESSION['HOTEL_ID'];
}else{
    $hotelId = '';
}

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

function str_openssl_dec($data,$iv=''){
    $key = KEY; 
    $cipher = "aes128"; 
    $option = 0; 
    $iv = '1234567891234567';
    return openssl_decrypt($data, $cipher, $key, $option, $iv);
}

function str_openssl_enc($data,$iv=''){
    $key = KEY; 
    $cipher = "aes128"; 
    $option = 0; 
    $iv = '1234567891234567';
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
        $output = "<div class='alert success_box'><i class='far fa-smile mr-4'></i>";
        $output .= $_SESSION['SuccessMsg'];
        $output .= "</div>";
        $_SESSION['SuccessMsg'] = null;
        return $output;
    }
}

function checkLoginAuth(){
    if(!isset($_SESSION['HOTEL_ID']) && !isset($_SESSION['SUPER_ADMIN_ID'])){
        $_SESSION['ErrorMsg'] = "Please login";
        redirect('login.php');
      }
}

function convertArryToJSON($arry){
    return $arry;
}

function reservationReturnQuery($tab, $currentDate = ''){
    if($tab == 'reservation'){        
        $sql = "select booking.*,bookingdetail.checkinstatus,bookingdetail.id as bookingDetailMainId from booking,bookingdetail where bookingdetail.checkinstatus = '1' and booking.payment_status = '1' and booking.checkIn >= '$currentDate'";
    }

    if($tab == 'arrives'){        
        $sql = "select booking.*,bookingdetail.checkinstatus,bookingdetail.id as bookingDetailMainId from booking,bookingdetail where booking.checkIn <= '$currentDate' and booking.checkOut >= '$currentDate' and booking.payment_status = '1'";
    }

    if($tab == 'failed'){        
        $sql = "select booking.*,bookingdetail.checkinstatus,bookingdetail.id as bookingDetailMainId from booking,bookingdetail where booking.payment_status = '2' and booking.add_on like '%$currentDate%'";
    }

    if($tab == 'inHouse'){        
        $sql = "select booking.*,bookingdetail.checkinstatus,bookingdetail.id as bookingDetailMainId from booking,bookingdetail where bookingdetail.checkinstatus = '2' and booking.payment_status = '1' and booking.checkIn >= '$currentDate'";
    }

    if($tab == 'checkOut'){        
        $sql = "select booking.*,bookingdetail.checkinstatus,bookingdetail.id as bookingDetailMainId from booking,bookingdetail where bookingdetail.checkinstatus = '3' and booking.payment_status = '1' and booking.checkIn >= '$currentDate'";
    }

    return $sql;

}

function checkPageBySupperAdmin($pg='',$title='',$ttext=''){
    global $conDB;
    $hotelId = $_SESSION['HOTEL_ID'];
    $sql = "select * from hotel where status = '1' and hCode = '$hotelId'";

    if($pg == 'pms'){
        $sql .= " and pms = '1'";
    }

    if($pg == 'webBilder'){
        $sql .= " and webBilder = '1'";
    }

    if($pg == 'bookingEngine'){
        $sql .= " and bookingEngine = '1'";
    }

    $query = mysqli_query($conDB, $sql);
    if(mysqli_num_rows($query) > 0){

    }else{
        include(FO_SERVER_PATH.'/subscription.php');
        $html = subscriptionData($title,$ttext);
        echo  $html;
        die();
    }
    

}

function unique_id($l = 8){
    $better_token = md5(uniqid(rand(), true));
    $rem = strlen($better_token)-$l;
    $unique_code = substr($better_token, 0, -$rem);
    $uniqueid = $unique_code;
    return $uniqueid;

}

function printBooingId($bid, $obid = '', $or = ''){
    $reciptNum = getBookingData($bid)[0]['reciptNo'];
    $bookingId = getBookingData($bid)[0]['bookinId'];

    $data = $bookingId.' / '.$reciptNum;
    if($obid != ''){
        $data = $bookingId;
    }

    if($or != ''){
        $data = $reciptNum;
    }

    return $data;
}

function checkImg($path,$demo=''){

    $data = $path; 
    

    if($demo == 'guest'){
        
        if($path == ''){
            $data = FRONT_SITE_IMG.'demo/person-icon.png';
        }else{
            $data = FRONT_SITE_IMG.'guest/'.$path;
        }
    }

    return $data;
}

function imgUploadWithData($img,$path,$oldImg=''){
    global $conDB;
    $image = $img['name'];
    $imageTemp = $img['tmp_name'];
    $extension=array('jpeg','jpg','JPG','png','gif');
    $ext=pathinfo($image,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)){
        if($oldImg == ''){

        }else{
            unlink(SERVER_IMG.$path.'/'.$oldImg);
        }
        
        $newfilename=$path.'_'.rand(100000,999999).".".$ext;
        move_uploaded_file($imageTemp, SERVER_IMG.$path.'/'.$newfilename);  
        $data["img"] = $newfilename;
        $data['error'] = 'false';      
    }else{
        $data['error'] = 'true';
        $data['msg'] = 'Valid Image File Format';
    }

    return $data;
}

function generateRecipt(){
    global $conDB;
    $hotelId = $_SESSION['HOTEL_ID'];
    $sql = "select MAX(reciptNo) as recipt from booking where hotelId = '$hotelId'";
    $query = mysqli_query($conDB, $sql);

    $row = mysqli_fetch_assoc($query);

    $incRecipt = $row['recipt'] + 1;
    return generateNumberById($incRecipt);
}

function generateNumberById($oid){
    if($oid == ''){
        $oid = 0;
    }
    if(strlen($oid) == 1){
        $oid = "00".$oid;
    }elseif(strlen($oid) == 2){
        $oid = "0".$oid;
    }else{
        $oid = $oid;
    }

    return $oid;
}

function getRoomNumber($rNo='', $status = '', $rid='', $checkIn ='', $checkOut = '',$ridRes = '', $rnid = '',$bdid=''){
    global $conDB;
    if($status != ''){
        $sql = "select * from roomnumber where status = '1' and deleteRec= '1'";
    }else{
        $sql = "select * from roomnumber where deleteRec= '1'";
    }

    if($rNo != ''){
        $sql .= " and roomNo = '$rNo'";
    }

    if($rnid != ''){
        $sql .= " and id = '$rnid'";
    }

    if($rid != ''){
        $roomNumCheck = "";
        foreach(checkRoomNumberExiist($rid,$checkIn,$checkOut) as $roomNumList){
            $value = $roomNumList['room_number'];
            $roomNumCheck .= " and roomNo != '$value'";
        }
        if($ridRes != ''){
            $sql .= " and roomId = '$rid' $roomNumCheck";
        }else{
            $sql .= " and roomId = '$rid' ";
        }
    }

    if($bdid != ''){
        $grapRoomNum = mysqli_fetch_assoc(mysqli_query($conDB, "select * from bookingdetail where id = '$bdid'"));
        $room_number = $grapRoomNum['room_number'];
        $sql .= " and roomNo  != '$room_number' ";
    }

    $query = mysqli_query($conDB, $sql);
    $data = array();
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
} 

function getRoomList($status='',$rid=''){
    global $conDB;
    $hotelId = $_SESSION['HOTEL_ID'];
    if($status != ''){
        $sql = "select * from room where status = '1' and hotelId = '$hotelId'";
    }else{
        $sql = "select * from room where hotelId = '$hotelId'";
    }

    if($rid != ''){
        $sql .= " and id = '$rid'";
    }
    
    

    $query = mysqli_query($conDB, $sql);
    $data = array();
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
} 

function getGuestIdProofData($status='',$gip=''){
    global $conDB;
    if($status != ''){
        $sql = "select * from guestidproof where status = '1'";
    }else{
        $sql = "select * from guestidproof where id != ''";
    }

    if($gip != ''){
        $sql .= " and id = '$gip'";
    }

    $query = mysqli_query($conDB, $sql);
    $data = array();
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
}


function getCouponList($status='',$hid = '', $cid =''){
    global $conDB; 
    global $hotelId;
    if($status != ''){
        $sql = "select * from couponcode where status = '1'";
    }else{
        $sql = "select * from couponcode where id != ''";
    }

    if($cid != ''){
        $sql .= " and id = '$cid'";
    }

    if($hid != ''){
        $sql .= " and hotelId = '$hotelId'";
    }

    $query = mysqli_query($conDB, $sql);
    $data = array();
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
}



// Booking Detail Start

function getBookingIdByBVID($bvid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select id from booking where bookinId = '$bvid'"));
    return $sql['id'];
}

function getBookingData($bid = '', $rNum = '', $checkIn='',$id='',$onlyCheckIn=''){
    global $conDB;
    $hotelId = $_SESSION['HOTEL_ID'];
    $query = "select booking.*,bookingdetail.*, bookingdetail.id as bookingdetailId , guest.id as guestId from booking,bookingdetail,guest where booking.id=bookingdetail.bid and booking.id=guest.bookId and bookingdetail.id = guest.bookingdId and booking.hotelId='$hotelId'";
    if($bid != ''){
        $query .= " and bookingdetail.bid = '$bid'";
    }
    if($rNum != ''){
        $query .= " and bookingdetail.room_number = '$rNum'";
    }
    if($id != ''){
        $query .= " and bookingdetail.id = '$id'";
    }
    if($checkIn != ''){
        if($onlyCheckIn != ''){
            $query .= " and booking.checkIn = '$checkIn' ";
        }else{
            $query .= " and booking.checkIn <= '$checkIn' and booking.checkOut > '$checkIn'";
        }
        
    }


    $sql = mysqli_query($conDB, $query);
    $data = array();
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $data[] = $row;
        }
    }
    return $data;
}

// function getBookDetailByRoomNumber ($rNo,$checkIn=''){
//     global $conDB;
//     $sql = mysqli_query($conDB, "select * from bookingdetail where room_number = $rNo");
//     $data = '';
//     if(mysqli_num_rows($sql) > 0){
//         $row = mysqli_fetch_assoc($sql);
//         $bid = $row['bid'];
//         $bookingData = getBookingData($bid,$checkIn);
//         $data = array_merge($row,$bookingData);
//     }
//     return $data;
// }

function getGuestDetail($bId='',$group='',$gid='', $bdid = ''){
    global $conDB;
    $data =  array();
    $query = "select * from guest where id != ''";
    if($bId  != ''){
        $query .= " and bookId = '$bId'";
    }
    if($group != ''){
        $query .= " and serial = '$group'";
    }
    if($gid  != ''){
        $query .= " and id = '$gid'";
    }
    if($bdid != ''){
        $query .= " and bookingdId = '$bdid'";
    }
    $sql = mysqli_query($conDB, $query);
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $data[] = $row;
        }
    }
    return $data;
}

function getBookingDetailById($bid,$roomNo='', $bdid = ''){
    global $conDB;
    
    $checkIn = getBookingData($bid)[0]['checkIn'];
    $checkOut = getBookingData($bid)[0]['checkOut'];
    $userPay = getBookingData($bid)[0]['userPay'];
    $paymentStatus = getBookingData($bid)[0]['payment_status'];
    $paymentId = getBookingData($bid)[0]['payment_id'];
    $addOn = getBookingData($bid)[0]['add_on'];
    $couponCode = getBookingData($bid)[0]['couponCode'];
    $pickUp = getBookingData($bid)[0]['pickUp'];
    $night = getNightByTwoDates($checkIn, $checkOut);

    $guestRow = array();
    $questQuery = "select * from guest where bookId = '$bid'";
    if($roomNo != ''){
        $questQuery .= " and roomnum = '$roomNo'";
    }
    if($bdid != ''){
        $questQuery .= " and bookingdId = '$bdid'";
    }
    $guestSql = mysqli_query($conDB, $questQuery);
    if(mysqli_num_rows($guestSql)>0){
        while($row = mysqli_fetch_assoc($guestSql)){
            $guestRow[] = $row;
        }
    }
    $name = '';
    $guest = array();
    $totalAdult = 0;
    $totalChild = 0;
    $bookingQuery = "select * from bookingdetail where bid = '$bid'";
    if($roomNo != ''){
        $bookingQuery .= " and room_number = '$roomNo' ";
    }
    $bookingQuery .= " and deleteRec = '1'";
    $bookingSql = mysqli_query($conDB, $bookingQuery);
    $subTotalPrice = 0;

    if(mysqli_num_rows($bookingSql) > 0){
        while($row = mysqli_fetch_assoc($bookingSql)){
            $adult = $row['adult'];
            $child = $row['child'];

            $roomId = $row['roomId'];
            $roomDId = $row['roomDId'];

            $roomPrice = getRoomPriceById($roomId,$roomDId,$adult,$checkIn);
            $adultPrice = getAdultPriceByNoAdult($adult,$roomId,$roomDId,$checkIn);
            $childPrice = getChildPriceByNoChild($child,$roomId,$roomDId,$checkIn);

            $subTotalPrice += $roomPrice + $adultPrice + $childPrice;
            $totalAdult += $adult;
            $totalChild += $child;
        }
    }

    foreach($guestRow as $key => $val){
        if($key == 0){
            $name = $val['id'];
        }
        $guest[] =  $val['id'];
    };

    $subTotalPrice = $subTotalPrice * $night;

    $totalPrice = $subTotalPrice + getPercentageValu($subTotalPrice, 12);

    $data = [
        'name'=>$name,
        'guest'=>$guest,
        'totalAdult'=> $totalAdult,
        'totalChild'=> $totalChild,
        'night'=> $night,
        'checkIn'=> $checkIn,
        'checkOut'=> $checkOut,
        'couponCode'=> $couponCode,
        'pickUp'=> $pickUp,
        'paymentStatus'=> $paymentStatus,
        'paymentId'=> $paymentId,
        'userPay'=> $userPay,
        'subTotalPrice'=>$subTotalPrice,
        'totalPrice'=>$totalPrice,
        'addOn'=>$addOn,
    ];

    return $data;
}



// Booking Detail End

function getRoomNameType($rtid = ''){
    global $conDB;
    $sql = "select * from room";

    if($rtid != ''){
        $sql .= " where id='$rtid'";
    }

    $query = mysqli_query($conDB, $sql);

    $row = array();
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
    }

    return $row;
}

function getDateFormatByTwoDate($date,$date2){
    $dateString = date('M-d', strtotime($date));
    $date2String = date('M-d', strtotime($date2));

    $dateArr = explode('-',$dateString);
    $date2Arr = explode('-',$date2String);

    return $dateArr[0].' '.$dateArr[1].' - '. $date2Arr['1'];
}

function checkGuestCheckInStatus($status=''){
    global $conDB;
    
    $data = array();
    if($status != ''){
        $sql = mysqli_query($conDB, "select * from check_in_status where id = '$status'");
    }else{
        $sql = mysqli_query($conDB, "select * from check_in_status");
    }

    while($row = mysqli_fetch_assoc($sql)){
        $data[] = [
            'name'=>$row['name'],
            'clr'=>$row['color']
        ];
    };
    

    return $data;
}

function getPaymentTypeMethod($pid = '',$status  = ''){
    global $conDB;
    if($status != ''){
        $sql = "select * from banktypemethod where status = 1";
    }else{
        $sql = "select * from banktypemethod where id != ''";
    }
    if($pid != ''){
        $sql .= " and pid = '$pid'";
    }
    $query = mysqli_query($conDB, $sql);
    if(mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query) ) {
            $data[] = $row;
        }
    }

    return $data;
}

//    Frontoffice function 


function getBookingSource($bsid = ''){
    global $conDB;
    $sql = "select * from bookingsource where status = '1'";
    if($bsid != ''){
        $sql .= " and id = '$bsid'";
    }

    $data = array();
    $query = mysqli_query($conDB,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
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

function getReservationType($rid = ''){
    global $conDB;
    $sql = "select * from reservationtype";
    if($rid != ''){
        $sql .= " where id = '$rid'";
    }

    $data = array();
    $query = mysqli_query($conDB,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
}

function getCashiering($tpe = '',$bs = '',$cid = '',$status=''){
    global $conDB;
    $sql = "select * from cashiering";
    if($tpe != '' || $bs != '' || $cid != '' || $status != ''){
        $sql .= " where status = '1'";
    }
    if($tpe != ''){
        $sql .= " and type = '$tpe'";
    }
    if($bs != ''){
        $sql .= " and bookingSource like '%$bs%'";
    }
    if($cid != ''){
        $sql .= " and id = '$cid'";
    }

    $data = array();
    $query = mysqli_query($conDB,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
}

function getRoomType($rid = '', $status = '', $slug = ''){
    global $conDB;
    
    if($status != ''){
        $sql = "select * from room where status = '1'";
    }else{
        $sql = "select * from room where id != ''";
    }
    if($rid != ''){
        $sql .= " and id = '$rid'";
    }

    if($slug != ''){
        $sql .= " and slug = '$slug'";
    }

    $data = array();
    $query = mysqli_query($conDB,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
}

function getRateType($rid = '',$rdid = '', $status = ''){
    global $conDB;
    $sql = "select * from roomratetype";
    if($rid != '' || $status != '' || $rdid != ''){
        $sql .= " where status = '1'";
    }
    if($rid != ''){
        $sql .= " and room_id = '$rid'";
    }
    if($rdid != ''){
        $sql .= " and id = '$rdid'";
    }

    $data = array();
    $query = mysqli_query($conDB,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[] = $row;
        }
    }

    return $data;
}

function getMaxAdultCountByRId($rid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room where id = '$rid'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $data = $row['roomcapacity'];
    }
    return $data;
}

function getNoAdultCountByRId($rid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from room where id = '$rid'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $data = $row['noAdult'];
    }
    return $data;
}

function getNightByTwoDates($date1,$date2){
    $earlier = new DateTime($date1);
    $later = new DateTime($date2);

    $abs_diff = $later->diff($earlier)->format("%a");
    return $abs_diff;
}

function getCountChildData($rid,$nAdult = ''){
    global $conDB;
    $maxAdult = getMaxAdultCountByRId($rid);
    $minAdult = getNoAdultCountByRId($rid);
    if($nAdult != ''){
        $minAdult = $nAdult;
    }

    $data = $maxAdult - $minAdult;
    return $data;
}

function getGSTPercentage($price){
    if($price <= 999){
        $data = 0;
    }elseif($price <= 7499){
        $data = 12;
    }else{
        $data = 18;
    }
    return $data;
}

function getGSTPrice($price){
    if($price <= 999){
        $gstprice = 0;
    }elseif($price <= 7499){
        $gstprice = $price * 12 / 100;
    }else{
        $gstprice = $price * 18 / 100;
    }
    return $gstprice;
}

function couponActualPrice($code,$price){
    global $conDB;
    $totalPrice = 0;
    if($code != 0 && $code != ''){
        $sql = mysqli_query($conDB, "select * from couponcode where coupon_code = '$code'");
        $row = mysqli_fetch_assoc($sql);
        $coupon_type = $row['coupon_type'];
        $coupon_value = $row['coupon_value'];
        
        
        if($coupon_type == 'P'){
            $totalPrice = $price * ($coupon_value / 100);
        }
        if($coupon_type == 'F'){
            $totalPrice = $coupon_value;
        }
    }
    
    return  $totalPrice;
}

function getRoomPriceById($rid,$rdid, $nadult, $date ,$date2=''){
    global $conDB;
  
    $countAdult= getMinRoomAdultCountById($rid);
    if($countAdult < $nadult){
        $nadult = $countAdult;
    }
    if($nadult > 2){
        $nadult = 2;
    }
    if($nadult == 1){
        $sql = "select price as price from inventory where room_id = '$rid' and room_detail_id = '$rdid'  and add_date = '$date'  and price != 'Null' and price != '0'";
        $query = mysqli_query($conDB,$sql);
        if(mysqli_num_rows($query)>0){
            $inven_row = mysqli_fetch_assoc($query);
            $price = $inven_row['price'];
        }
    }
    if($nadult == 2){
        $sql = "select price2 as price from inventory where room_id = '$rid' and room_detail_id = '$rdid'  and add_date = '$date'  and price != 'Null' and price2 != '0'";
        $query = mysqli_query($conDB,$sql);
        if(mysqli_num_rows($query)>0){
            $inven_row = mysqli_fetch_assoc($query);
            $price = $inven_row['price'];
        }else{
            $sql = "select doublePrice as price from roomratetype where room_id = '$rid' and id='$rdid' and doublePrice != 0";
            $query = mysqli_query($conDB,$sql);
            if(mysqli_num_rows($query)>0){
                $inven_row = mysqli_fetch_assoc($query);
                $price = $inven_row['price'];
            }
        }
    }
    if(!isset($price)){
        if($nadult == 1){
            $sql = "select singlePrice as price from roomratetype where room_id = '$rid' and id='$rdid'";
            $query = mysqli_query($conDB,$sql);
            if(mysqli_num_rows($query)>0){
                $inven_row = mysqli_fetch_assoc($query);
                $price = $inven_row['price'];
            }
        }
        if($nadult == 2){
            $sql = "select doublePrice as price from roomratetype where room_id = '$rid' and id='$rdid' and doublePrice != 0";
            $query = mysqli_query($conDB,$sql);
            if(mysqli_num_rows($query)>0){
                $inven_row = mysqli_fetch_assoc($query);
                $price = $inven_row['price'];
            }else{
                $sql = "select singlePrice as price from roomratetype where room_id = '$rid' and id='$rdid'";
                $query = mysqli_query($conDB,$sql);
                if(mysqli_num_rows($query)>0){
                    $inven_row = mysqli_fetch_assoc($query);
                    $price = $inven_row['price'];
                }
            }
        }
    }

    return $price;
}

function getRoomAdultCountById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select max(room.roomcapacity) as maxAdult from room,roomratetype where room.id=roomratetype.room_id and roomratetype.room_id = '$rid'"));
    return $sql['maxAdult'];
}

function getMinRoomAdultCountById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from room,roomratetype where room.id=roomratetype.room_id and roomratetype.room_id = '$rid'"));
    $data = $sql['noAdult'];
    return $data;
}

function getMinRoomAdultCountByIdRdid($rid,$rdid=''){
    global $conDB;
    $query = mysqli_query($conDB, "select room.*,roomratetype.*, roomratetype.id as room_detailId from room,roomratetype where room.id=roomratetype.room_id and roomratetype.room_id = '$rid' and  roomratetype.id = '$rdid'");
    $sql = mysqli_fetch_assoc($query);
    $single = getRoomPriceById($rid,$rdid, 1, date('Y-m-d'));
    $double = getRoomPriceById($rid,$rdid, 2, date('Y-m-d'));
    if($single == $double){
        $data = $sql['noAdult'];
    }elseif($double == 0){
        $data = 1;
    }elseif($single < $double){
        $data = 1;
    }
    return $data;
}

function getRoomChildCountById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select max(room.noChild) as maxChild from room,roomratetype where room.id=roomratetype.room_id and roomratetype.room_id = '$rid'"));
    return $sql['maxChild'];
}

function getRoomExtraAdultPriceById($rdid,$date=''){
    global $conDB;
    $invenSql = mysqli_query($conDB, "select eAdult from inventory where room_detail_id = '$rdid' and add_date = '$date' and eAdult != '0'");
    if(mysqli_num_rows($invenSql) > 0){
        $row = mysqli_fetch_assoc($invenSql);
        $price = $row['eAdult'];
    }else{
        $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select extra_adult from roomratetype where id = '$rdid'"));
        $price = $sql['extra_adult'];
    }
    
    return $price;
}

function getAdultPriceByNoAdult($n,$rid,$rdid,$date=''){
    if(getRoomAdultCountById($rid) >= $n){
        $data = 0;
    }else{
        $data = ($n - getRoomAdultCountById($rid)) * getRoomExtraAdultPriceById($rdid,$date);
    }
    return $data;
}

function getRoomExtraChildPriceById($rdid,$date=''){
    global $conDB;
    $invenSql = mysqli_query($conDB, "select eChild from inventory where room_detail_id = '$rdid' and add_date = '$date' and eChild != '0'");
    if(mysqli_num_rows($invenSql) > 0){
        $row = mysqli_fetch_assoc($invenSql);
        $price = $row['eChild'];
    }else{
        $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select extra_child from roomratetype where id = '$rdid'"));
        $price = $sql['extra_child'];
    }
    
    return $price;
}

function getChildPriceByNoChild($n,$rid,$rdid,$date=''){
    if(getRoomChildCountById($rid) >= $n){
        $data = 0;
    }else{
        $data = ($n - getRoomChildCountById($rid) ) * getRoomExtraChildPriceById($rdid,$date);
    }
    return $data;
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
    $sql = "select * from inventory where room_id = '$rid' and add_date <= '$date'  and price !='' order by price desc";
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
    
    return $price;
}

function getRoomLowPriceByIdWithDate($rid, $date ,$date2=''){
    global $conDB;
    if($date2 == ''){
        $date2 = $date;
    }
    $data=array();
    $sql = "select * from inventory where room_id = '$rid' and add_date = '$date' and price !='' order by price desc";
    $inven_sql = mysqli_query($conDB, $sql);
    if(mysqli_num_rows($inven_sql)>0){
        while($inven_row = mysqli_fetch_assoc($inven_sql)){
            $price=$inven_row['price'];
        }
    }else{
        $sql = "select * from roomratetype where room_id = '$rid' order by singlePrice desc";
        $inven_sql = mysqli_query($conDB, $sql);
            while($inven_row = mysqli_fetch_assoc($inven_sql)){
                $price=$inven_row['singlePrice'];
            }
    }
    
    return $price;
}

function getSingleRoomPrice($rid, $rdid, $adult, $child ,$date, $nNight,$couponCode=''){
    global $conDB;

    $singleRoom = getRoomPriceById($rid,$rdid, $adult, $date);
    $adultPrice = getAdultPriceByNoAdult($adult,$rid,$rdid, $date);
    $childPrice = getChildPriceByNoChild($child,$rid,$rdid, $date);

    $roomPrice = $singleRoom; 
    $couponPrice = '';
    
    if($couponCode != ''){
        $couponPrice = couponActualPrice($couponCode,$roomPrice);
        $roomPrice = $roomPrice - $couponPrice;
    }
    
    $nightPrice = $roomPrice + $adultPrice + $childPrice;

    $totalRoomPrice = ($nightPrice  * $nNight) ;
  
    $gstper = getGSTPercentage($roomPrice);
    
    $gst = ($totalRoomPrice * $gstper) / 100;
    if($gstper == 0){
        $gst = 0;
    }

    $totalPrice = $totalRoomPrice + $gst;
    $nightPriceHtml = $nightPrice;
    if($nNight > 1){
        $nightPriceHtml = $nightPrice.' * '.$nNight;
    }


    $data = array();
    
    $data= [
        'room' => $singleRoom,
        'adultPrint' => $adult,
        'childPrint' => $child,
        'adult' => $adultPrice,
        'child' => $childPrice,
        'noNight' => $nNight,
        'night' => $nightPrice,
        'nightPrice' => $nightPriceHtml,
        'couponCode' => $couponCode,
        'couponPrice' => $couponPrice,
        'gstPer' => $gstper,
        'gst' => $gst,
        'total' => $totalPrice
        ];
    
    return $data;
}

function getPercentageByTwoValue($first,$sec){
    $data = $first * 100 / $sec;
    return round($data);
}

function getPercentageValu($amount, $value){
    $data = $value * $amount / 100;

    return $data;
}

function checkRoomNumberExiist($rId, $checkIn='',$checkOut='',$rnum = ''){
    global $conDB;
    // $sql = "select booking.checkIn, bookingdetail.room_number from booking, bookingdetail where booking.id = bookingdetail.bid and booking.checkIn= '$checkIn' and bookingdetail.roomId = '$rId'";
    $sql ="SELECT  booking.checkIn, booking.checkOut, bookingdetail.room_number FROM booking, bookingdetail
        WHERE
            booking.id = bookingdetail.bid AND bookingdetail.roomId = '$rId' AND (
                booking.checkIn <= '$checkIn' AND booking.checkOut >= '$checkIn' AND booking.checkOut <= '$checkOut'
            ) OR(
                booking.checkIn >= '$checkIn' AND booking.checkOut <= '$checkOut'
            ) OR(
                booking.checkIn >= '$checkIn' AND booking.checkOut >= '$checkIn' AND booking.checkOut >= '$checkOut' AND booking.checkIn <= '$checkOut'
            ) OR(
                booking.checkIn <= '$checkIn' AND booking.checkOut >= '$checkOut'
            )";

            if($rnum != ''){
                $sql .= " and bookingdetail.room_number = '$rnum'";
            }
    $query = mysqli_query($conDB, $sql);
    $data = array();
    while($row = mysqli_fetch_assoc($query)){
        $data[] = $row;
    }


    return $data;
}

function countBookingRow($rTab='',$currentDate = ''){

    global $conDB;
    $hotelId = $_SESSION['HOTEL_ID'];

    $sql = reservationReturnQuery($rTab, $currentDate);
    
    $sql .= " and booking.id=bookingdetail.bid and bookingdetail.deleteRec = '1'";

    $query = mysqli_query($conDB, $sql);

    $data = mysqli_num_rows($query);

    return $data;

}

function getPageName($page){
    $page = explode('/',$page);
    return explode('.',end($page))[0];
}


function roomMoveOptionByRoomId($roomId, $opType, $bdid){ 
    $data='';
    if($opType == 'rate'){
        foreach(getRatePlanArrById($roomId) as $ratePlaneList){
            $id = $ratePlaneList['id'];
            $rplan = $ratePlaneList['rplan'];
    
            $data .= "<option value='$id'>$rplan</option>";
        }
    }
    if($opType == 'roomNum'){
        foreach(getRoomNumber('','1',$roomId,'','','','',$bdid) as $roomTypeList){
            $num = $roomTypeList['roomNo'];
            $numId = $roomTypeList['id'];
    
            $data .= "<option value='$num'>$num</option>";
        }
    }
    
    

    return $data;
}



// Reservation

function reservationContent($bid,$reciptNo,$gname,$checkIn,$checkOut,$bDate,$nAdult,$nChild,$total,$paid,$preview='',$rTab = '',$BDId='',$clickBtn = ''){
    if($checkIn == ''){
        $checkIn = date('Y-m-d');
    }
    if($checkOut == ''){
        $checkOut = date("Y-m-d", strtotime("1 day", strtotime(date('Y-m-d'))));
    }
    $actionCon = '';
    if($gname == ''){
        $gname = '_ _ _';
    }
    if($total == ''){
        $total = 0;
    }
    if($paid == ''){
        $paid = 0;
    }
    if($nAdult == ''){
        $nAdult = 0;
    }
    if($nChild == ''){
        $nChild = 0;
    }
    $gname = ucfirst($gname);
    $checkInOut = getDateFormatByTwoDate($checkIn,$checkOut);
    $totalAmount = number_format($total,2);
    $paidAmount = number_format($paid,2);
    $pending = number_format($total - $paid,2);
    $countNight = getNightByTwoDates($checkIn, $checkOut);
    $previewContent = '';

    if($preview == 'yes'){
        $previewContent = "
        
                <div class='foot'>
                    <ul>
                        <li>
                            <a href='javascript:void(0)'><i class='fas fa-print'></i></a>
                        </li>

                        <li>
                            <a href='javascript:void(0)'><i class='far fa-envelope-open'></i></a>
                        </li>

                        <li>
                            <a href='javascript:void(0)'><i class='far fa-file-alt'></i></a>
                        </li>
                    </ul>
                </div>
        
        ";
    }

    $reservationBtn = 'reservationContent';
    if($clickBtn != ''){
        $reservationBtn = 'reservationContentPreview';
    }

    $html = "
            <div class='$reservationBtn' data-bookingId='$bid' data-reservationTab='$rTab' data-bdid='$BDId'>
                            
                <div class='head'>
                    <div class='leftSide'>
                        <div class='icon'><i class='fas fa-user'></i></div>
                        <div class='userName'>
                            <h4>$gname</h4>
                            <p> $reciptNo / $bid </p>
                        </div>
                    </div>
                    <div class='rightSide'>
                        $actionCon
                        
                    </div>
                </div>

                <div class='body'>
                    <div class='checkInDetail'>
                        <div class='left'>
                            <strong>$checkInOut</strong>
                        </div>
                        <div class='right'>
                            <span>Night </span>
                            <strong>$countNight</strong>
                        </div>
                    </div>
                    <div class='bookingDate'>
                        <div class='left'>
                            <strong>Booking Date:- </strong>
                            <span>$bDate</span>
                        </div>
                        <div class='right'>
                            <ul>
                                <li>
                                    <i class='fas fa-male'></i>
                                    <strong>$nAdult</strong>
                                </li>
                                <li>
                                    <i class='fas fa-child'></i>
                                    <strong>$nChild</strong>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class='bookingDetail'>
                        <ul>
                            <li>
                                <small>Total</small>
                                <strong>Rs $totalAmount</strong>
                            </li>
                            <li>
                                <small>Paid</small>
                                <strong>Rs $paidAmount</strong>
                            </li>
                            <li>
                                <small>Due Amount</small>
                                <strong>Rs $pending</strong>
                            </li>
                        </ul>
                    </div>

                </div>

                $previewContent

            </div>
    ";

    
        return $html;
}





// Web Builder Function 


function getSlider($sid=''){
    global $conDB;
    $hotelId = $_SESSION['HOTEL_ID'];
    $sidStatus = '';
    if($sid != ''){
        $sidStatus = " and id = '$sid'";
    }
    
    $sql = mysqli_query($conDB, "select * from herosection where hotelId = '$hotelId' and deleteRec='1' $sidStatus");
    $data = array();
    
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_assoc($sql)){
            $data[] = [
                    
                    'id'=>$row['id'],
                    'title'=>$row['title'],
                    'subtitle'=>$row['subTitle'],
                    'img'=>$row['img'],
                    'status'=>$row['status']
                ];
        }
    }else{
        $data = array();
    }
    return $data;
}

function getRatePlanArrById($rid,$bdid=''){
    global $conDB;

    $query = "select * from roomratetype where room_id = '$rid'";

    if($bdid != ''){
        $query .= " and bid = '$bdid'";
    }
    
    $sql = mysqli_query($conDB, $query);
    $data = array();
    while($row = mysqli_fetch_assoc($sql)){
        $data[] = [
            'id'=> $row['id'],
            'rplan'=>$row['title'],
            'price'=> $row['price']
            ];
    }
    return $data;
}


function inventoryCheck($date, $rid='', $rdid=''){
    global $conDB;
    global $hotelId;
    $data = 1;
    $rdidStatus = '';
    if($rdid !=''){
        $rdidStatus = " and room_detail_id = '$rdid' ";
    }
    
    $sql = mysqli_query($conDB, "select status from inventory where add_date = '$date' and room_id = '$rid' and hotelId='$hotelId' $rdidStatus");
    if(mysqli_num_rows($sql)>0){
        $row = mysqli_fetch_assoc($sql);
        $data = $row['status'];
    }
    
    return $data;
}

function inventoryRoomUpdate($updateId, $room, $date,$status){
    global $conDB;
    global $hotelId;
    $oneDay = strtotime('1 day 30 second', 0);
    $nxtDate = date('Y-m-d',strtotime($date) + $oneDay);
    $countTotalBooking = countTotalBooking($updateId, $date, $nxtDate);

    if($countTotalBooking > 0){
        $Bookroom = $countTotalBooking + $room;
        
    }else{
        $Bookroom = $room;
    }

    foreach (getRatePlanArrById($updateId) as $roomDetail) {
        $rdid = $roomDetail['id'];
        foreach(buildRatePlanView($updateId) as $roomList){

            $roomId = $roomList['id'];
            $rdid = $roomList['rdid'];
            
            $reExistQuery = mysqli_query($conDB, "select * from inventory where room_id='$roomId' and room_detail_id='$rdid' and add_date = '$date' ");
            if(mysqli_num_rows($reExistQuery) > 0){
                mysqli_query($conDB, "update inventory set room='$Bookroom',status='$status' where room_id='$updateId' and room_detail_id='$rdid' and add_date = '$date' and hotelId='$hotelId'");
            }else{
                mysqli_query($conDB, "insert into inventory(room_id,room_detail_id,add_date,room,status,hotelId) values('$roomId','$rdid','$date','$Bookroom','$status','$hotelId')");
            }

        }

    }

}

function inventoryRateUpdate($updateId, $updateDId, $price='',$price2='',$date, $child,$adult){
    global $conDB;
    global $hotelId;
    $oneDay = strtotime('1 day 30 second', 0);

    if($price != ''){
        $priceUpade = "price='$price'";
    }

    if($price2 != ''){
        $priceUpade = "price2='$price2'";
    }
  
    $existQuery = mysqli_query($conDB, "select * from inventory where  room_id='$updateId' and room_detail_id='$updateDId'  and add_date = '$date'");
        if(mysqli_num_rows($existQuery) > 0){
            $sql= "update inventory set $priceUpade, eAdult='$adult', eChild='$child' where  room_id='$updateId' and room_detail_id='$updateDId' and add_date = '$date'";
            mysqli_query($conDB,$sql);
        }else{
            $sql= "insert into inventory(room_id,room_detail_id,add_date,price,price2,eAdult,eChild,hotelId) values('$updateId','$updateDId','$date','$price','$price2','$adult','$child','$hotelId')";
            mysqli_query($conDB,$sql);
        }
    
    

}

function buildRatePlanView($rid){
    global $conDB;
    $sql = "SELECT room.*,roomratetype.id as roomDetailID,roomratetype.room_id FROM room, roomratetype where roomratetype.room_id = '$rid' and room.id = roomratetype.room_id";
    $query = mysqli_query($conDB, $sql);
    $data = array();
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[]=[
                'id'=>$row['id'],
                'adult'=>$row['noAdult'],
                'rdid'=>$row['roomDetailID'],
            ];
        }
    }

    return $data;
}

function roomExist($rid,$date='',$date2='',$rdid=''){
    global $conDB;
    $sql ="SELECT * FROM room where id = '$rid'";
    $status = mysqli_fetch_assoc(mysqli_query($conDB,$sql));
    $checkIn = $date;
    $checkOut = $date2;
    if($date == ''){
        $checkIn = $_SESSION['checkIn'];
    }
    
    if($date2 == ''){
        $checkOut = $_SESSION['checkout'];
    }
    
    if(getRoomLowPriceByIdWithDate($rid, $date) > settingValue()['advancePay']){
        $check_sold = countTotalQPBooking($rid, $checkIn);
    }else{
        $check_sold = countTotalBooking($rid, $checkIn);
    }
    
    $check_stock = getTotalRoom($rid, $checkIn);

    $result =  $check_stock - $check_sold;

    if($rdid != ''){
        if(isset($_SESSION['checkIn'])){
            $checkInTime = $_SESSION['checkIn'];
        }
    }

    
    if($result < 0){
        $result = 0;
    }

    return $result;
    
}

function settingValue(){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from setting where id = '1'");
    $row = mysqli_fetch_assoc($sql);
    return $row;
}

function countTotalBooking($rid, $date=''){
    global $conDB;

    $BookSql ="SELECT id FROM booking where payment_status='complete' and checkIn <= '$date' && checkOut > '$date'";
                
    $check_sql = mysqli_query($conDB,$BookSql);
    $roomNo = 0;
    if(mysqli_num_rows($check_sql) > 0){
        while($row = mysqli_fetch_assoc($check_sql)){
            $bId = $row['id'];
            $roomNo += countTotalBookingDetailByBID($bId);
        }
    }

    return $roomNo;
}

function countTotalBookingDetailByBID($bid){
    global $conDB;
    $sql = "select * from bookingdetail where bid = '$bid'";
    $totalRow = mysqli_num_rows(mysqli_query($conDB, $sql));

    return $totalRow;
}

function getTotalRoom($rid, $date,$date2=''){
    global $conDB;
    if($date2 == ''){
        $date2 = $date;
    }
    $room = 0;
    $query = "select room from inventory where room_id  = '$rid' and add_date = '$date'";
    $sql = mysqli_query($conDB, $query );
    if(mysqli_num_rows($sql)>0){
        while($inven_row = mysqli_fetch_assoc($sql)){
            $room=$inven_row['room'];
        }
    }else{
        $query = "select totalroom from room where id  = '$rid' and status = '1'";
        $sql = mysqli_query($conDB, $query);
        while($inven_row = mysqli_fetch_assoc($sql)){
            $room=$inven_row['totalroom'];
        }
    }
    
    return $room;
}

function countTotalQPBooking($rid, $date=''){
    global $conDB;
    $BookSql ="SELECT sum(nOfRoom) as noRoom FROM quickpay where  room = '$rid' and paymentStatus='complete' and checkIn <= '$date' && checkOut > '$date'";
                
    $check_sold_arr = mysqli_fetch_assoc(mysqli_query($conDB,$BookSql));

    $check_sold= $check_sold_arr['noRoom'];
    return $check_sold;
}

function getRatePlanByRoomId($rid){
    global $conDB;
    $data=array();
    $sql = mysqli_query($conDB, "select * from roomratetype where room_id  = '$rid'");
    if(mysqli_num_rows($sql)){
        while($row = mysqli_fetch_assoc($sql)){
            $data[]=$row;
        }
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

function getHotelDetail($slug = ''){
    global $conDB;
    $sql = "select * from hotel where id != ''";
    if($slug != ''){
        $sql .= " and slug = '$slug'";
    }
    $query = mysqli_query($conDB, $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
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

function getFacingDetailById($fid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from facing where id = '$fid'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $data = $row;
    }

    return $data;
}

function getPackageArr(){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from package where status = '1'");
    $data = array();
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $data[] = [
                'id'=> $row['id'],
                'slug'=> $row['slug'],
                'name'=> $row['name'],
                'img'=> $row['img'],
                'duration'=> $row['duration'],
                'description'=> $row['description'],
                'room'=> $row['room'],
                'discount'=> $row['discount'],
                'rdid'=> $row['rdid'],
            ];
        }
    }
    
    return $data;
}

function getRoomIdBySlug($slug){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select id from room where slug = '$slug'"));
    return $sql['id'];
}

function getDataBaseDate2($date){

    $checkInArr = explode('/',$date);
    $checkIn = $checkInArr['2'].'-'.$checkInArr['1'].'-'.$checkInArr['0'];
    return $checkIn;
}

function getAmenitieById($aid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select title from amenities where id = '$aid'"));
    return $sql['title'];
}

function countRoomViewByDate($slug='',$date='',$tab=''){
    global $conDB;
    $sql = "select * from roomnumber where id != ''";
    $bookSql = "select booking.*,bookingdetail.roomId from booking,bookingdetail where booking.id = bookingdetail.bid";
    if($slug != ''){
        $rid = getRoomType('','',$slug)[0]['id'];
        $sql .= " and roomId = '$rid'";
        $bookSql .= " and bookingdetail.roomId = '$rid'";
    }
    if($date != ''){
        $bookSql .= " and checkIn <= '$date' and checkOut >= '$date'";
    }
    $roomExist = mysqli_num_rows(mysqli_query($conDB, $sql));
    $roomBook = mysqli_num_rows(mysqli_query($conDB, $bookSql));


    $data = [
        'exist'=>$roomExist - $roomBook,
        'book'=> $roomBook
    ];

    return $data;
}

function loopRoomExist($rid,$date='',$date2='',$rdid=''){
    
    if(roomExist($rid,$date,$date2,$rdid) > 0){
        $oneDay = strtotime('1 day 30 second', 0);
        
        $datediff = strtotime($date2) - strtotime($date);
        $output = round($datediff / (60 * 60 * 24));
        $data = 1;
        $countTotalBooking = array();
        for($i=1; $i<= $output; $i ++){
            $predate = date('Y-m-d',strtotime($date) + ($oneDay * $i) - $oneDay);
            $countTotalBooking[] = roomExist($rid, $predate, $predate,$rdid);  
        }
        if(in_array('0' ,$countTotalBooking))    {
            $data = 0;
        } 
    }else{
        $data = 0;
    }
    return $data;
}

function roomMaxCapacityById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from room where id = '$rid'"));
    return $sql['roomcapacity'];
}

function getNightCountByDay($date1,$date2){
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime1->diff($datetime2);
    return $interval->format('%a');
}

function SingleRoomPriceCalculator($rid, $rdid, $adult, $child , $nRoom='', $nNight, $roomPrice ='', $childPrice = '', $adultPrice='', $couponCode =''){
    global $conDB;

    $singleRoom = $roomPrice;
    $couponPrice = '';
    if($couponCode != ''){
        $couponPrice = couponActualPrice($couponCode,$roomPrice);
        $roomPrice = $roomPrice - $couponPrice;
    }
    
    $nightPrice = $roomPrice + $adultPrice + $childPrice;

    $totalRoomPrice = ($nightPrice  * $nNight) ;

    $gstper = getGSTPercentage($roomPrice);
    
    $gst = ($totalRoomPrice * $gstper) / 100;
    if($gstper == 0){
        $gst = 0;
    }

    $totalPrice = $totalRoomPrice + $gst;
    $nightPriceHtml = $nightPrice;
    if($nNight > 1){
        $nightPriceHtml = $nightPrice.' * '.$nNight;
    }


    $data = array();
    
    $data[]= [
        'room' => $singleRoom,
        'adultPrint' => $adult,
        'childPrint' => $child,
        'adult' => $adultPrice,
        'child' => $childPrice,
        'noNight' => $nNight,
        'night' => $nightPrice,
        'nightPrice' => $nightPriceHtml,
        'couponCode' => $couponCode,
        'couponPrice' => $couponPrice,
        'gstPer' => $gstper,
        'gst' => $gst,
        'total' => $totalPrice
        ];
    
    return $data;
}

function formatingDate($date){
    return  date("d-M-Y", strtotime($date));
}

function getRoomHeaderById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select header from room where id = '$rid'"));
    return $sql['header'];
}

function totalSessionPrice(){
    $price = 0;
    foreach($_SESSION['room'] as $key=>$val){
        $rdid = explode('-',$key)[0];
        
        $total_price = 0;
        $rid = $_SESSION['room'][$key]['roomId'];
        $child = $_SESSION['room'][$key]['child'];
        $adult = $_SESSION['room'][$key]['adult'];
        $checkInTime = $_SESSION['room'][$key]['checkIn'];
        $checkInOut = $_SESSION['room'][$key]['checkout'];
        $noAdult = $_SESSION['room'][$key]['adult'];
        $noRoom = $_SESSION['room'][$key]['room'];
        $night = $_SESSION['room'][$key]['night'];

        $percentage = settingValue()['PartialPaymentPrice'];

        if(roomExist($rid,$checkInTime) == 0){
            $obj->removeroom($key);
        }

        $roomPrice = getRoomPriceById($rid,$rdid, $adult, $checkInTime);
        $adultPrice = getAdultPriceByNoAdult($adult,$rid,$rdid, $checkInTime);
        $childPrice = getChildPriceByNoChild($child,$rid,$rdid, $checkInTime);
        

        if(isset($_SESSION['couponCode'])){
            $couponCode = $_SESSION['couponCode'];
        }else{
            $couponCode = '';
        }
        
        $nNight = getNightByTwoDates($checkInTime,$checkInOut);
        $singleRoomPriceCalculator = SingleRoomPriceCalculator($rid, $rdid, $adult, $child , $noRoom, $night, $roomPrice, $childPrice , $adultPrice, $couponCode);

        $price += $singleRoomPriceCalculator[0]['total'];
        $gst[$key]=$singleRoomPriceCalculator[0]['gst'];
        $nightPrint[$key]=$singleRoomPriceCalculator[0]['nightPrice'];
        $noNight[$key]=$singleRoomPriceCalculator[0]['noNight'];
        $shortDate[$key]=getDateFormatByTwoDate($_SESSION['room'][$key]['checkIn'],$_SESSION['room'][$key]['checkout']);
        $total[$key]=$singleRoomPriceCalculator[0]['total'];
    }


    $_SESSION['gossCharge'] = $price;
    $_SESSION['roomTotalPrice'] = $price;

    if(isset($_SESSION['pickUp']) && $_SESSION['pickUp'] != ''){
        $pickup = $_SESSION['pickUp'];
        $price += $pickup;
        $_SESSION['roomTotalPrice'] = $price;
    }
    
    if(isset($_SESSION['partial']) && $_SESSION['partial'] == 'Yes'){
        $percentage = settingValue()['PartialPaymentPrice']; 
        $price = $price * $percentage / 100;
        $_SESSION['roomTotalPrice'] = $price;
    }

    $data=[
        'gst'=>$gst,
        'night'=>$nightPrint,
        'price'=>$price,
        'noNight'=>$noNight,
        'shortDateUpdate'=>$shortDate,
        'total'=>$total,
    ];

    
    
    return $data;
}

function calculateTotalBookingPrice(){
    $price = $_SESSION['gossCharge'];
    $result = $price;
    
    
    if(isset($_SESSION['pickUp']) && $_SESSION['pickUp'] != ''){
        $pickup = $_SESSION['pickUp'];
        $result += $pickup;
    }
    
    if(isset($_SESSION['partial']) && $_SESSION['partial'] == 'Yes'){
        $percentage = settingValue()['PartialPaymentPrice']; 
        $result = $result * $percentage / 100;
    }
    
    // $_SESSION['roomTotalPrice'] = $result;
    
    return $result;
}

function getBookingNumber(){
    global $conDB;
    
    $oid = BOOK_GENERATE.unique_id(6);

    return $oid;
}

function checkLive(){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from live where id = '1'"));
    return $sql['status'];
}

function buildSGLView($rid,$rdid){
    global $conDB;
    $sql = "select room.*,roomratetype.*, roomratetype.id as roomDetailID from room,roomratetype where room.id = '$rid'  and roomratetype.room_id = room.id and roomratetype.id='$rdid'";
    $query = mysqli_query($conDB, $sql);
    $data = array();
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $data[]=[
                'id'=>$row['id'],
                'singlePrice'=>$row['singlePrice'],
                'doublePrice'=>$row['doublePrice'],
            ];
        }
    }

    return $data;
}


function getDateByDay($date,$nday){
    $date = strtotime($date);
    $one_day = strtotime('1 day 00 second', 0);
    return date('Y-m-d',$date + ($nday * $one_day));
}


function hotelPolicyEmail(){
    $checkInTime = hotelDetail()["checkIn"];
    $checkOutTime = hotelDetail()['checkOut'];
    $html = "
    <h4 style='background: #cce6cc;padding: 5px 10px;'>IMPORTANT INFORMATION</h4>
    <table style='width:100%; '>
    <tr style='vertical-align: top;'>
        <td>                    
            <h5>POLICY</h5>
            <ul style='list-style: circle;'>
                <li>
                    <span>Check In </span><span>$checkInTime</span>
                </li>
                <li>
                    <span>Check Out </span><span>$checkOutTime</span>
                </li>
            </ul>
            
        </td>
    </tr>
    </table>

    <table style='width:100%; '>

        <tr>
            <td>
                        
                <h5>CANCELLATION POLICY</h5>
                <ul>
                    <li>
                        <p>Visit our website <a href=''>Click Here</a>.</p>
                    </li>
                </ul>
                
            </td>
        </tr>

    </table>

    <table style='width:100%; '>
        <tr>
            <td>
                
                <h4>ID proof</h4>
                <ul style='list-style: circle;'>
                    <li>
                        <span>Voter ID, </span> <span>Aadhar card, </span> <span>DL, </span> <span>Pass Port</span> 
                    </li>
                    <li>
                        <span>Pan Card * Not Acceptable</span>
                    </li>
                </ul>
                
            </td>
        </tr>
    </table>
    ";

    return $html;
}

function getBookingIdById($bid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select bookinId from booking where id = '$bid'"));
    return $sql['bookinId'];
}

function getRoomNameById($rid){
    global $conDB;
    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select header from room where id = '$rid'"));
    return $sql['header'];
}

function getRatePlanByRoomDetailId($rdid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from roomratetype where id  = '$rdid'");
    $row = mysqli_fetch_assoc($sql);
    return $row['title'];
}
function getOrderDetailByOrderId($oid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from booking where id= '$oid'");
    $row = mysqli_fetch_assoc($sql);
    return $row;
}

function getOrderDetailArrByOrderId($oid){
    global $conDB;
    $data=array();
    $sql = "select booking.*, bookingdetail.*, bookingdetail.id as bookindetailId from booking,bookingdetail where booking.id = '$oid' and booking.id = bookingdetail.bid";
    $query = mysqli_query($conDB,$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return $data;
}

function orderEmail($oid){

    $invoiceNo = printBooingId($oid);
    $name = getGuestDetail($oid)[0]['name'];
    $email = getGuestDetail($oid)[0]['email'];
    $phone = getGuestDetail($oid)[0]['phone'];
    $company_name = getGuestDetail($oid)[0]['company_name'];
    $gst = getGuestDetail($oid)[0]['comGst'];
    $bid = $oid;
    $userPay = getBookingDetailById($oid)['userPay'];
    
    
    $price = getBookingDetailById($oid)['userPay'];
    $grossCharge = getBookingDetailById($oid)['totalPrice'];
    $payment_status = getBookingDetailById($oid)['paymentStatus'];
    $payment_id = getBookingDetailById($oid)['paymentId'];
    $add_on = date('d-m-Y g:i A', strtotime(getBookingDetailById($oid)['addOn']));
    

    

    $couponCode = getBookingDetailById($oid)['couponCode'];
    $pickUp = getBookingDetailById($oid)['pickUp'];
    $pickupHtml = '';

    $sitename = SITE_NAME;
    $bookingSite = FRONT_BOOKING_SITE;
    
    $img = FRONT_SITE_IMG.hotelDetail()['logo'];
    
    
    $priceHtml = '';
    $couponCodeHtml = '';
    $buttomBar = '';



    if($payment_status == 'pending'){
        $priceHtml = '<div style="background-color:#ffffff;margin-bottom:6px;padding:20px;max-width:550px;text-align:center;margin-left:auto;margin-right:auto;border-top-width:medium;border-top-style:solid;border-top-color:#b51d0e">
                        <p
                            style="font-family:Trebuchet MS;font-style:normal;font-size:18px;line-height:25px;text-align:center;color:#515978">
                            <strong>₹ '. $price.'</strong>
                            amount has been failed payment on <br/>
                            '.$add_on.'
                        </p>
                    </div>';

        if($partial == 'Yes'){
            $priceHtml = '<div style="background-color:#ffffff;margin-bottom:6px;padding:20px;max-width:550px;text-align:center;margin-left:auto;margin-right:auto;border-top-width:medium;border-top-style:solid;border-top-color:#b51d0e">
                        <p style="font-family:Trebuchet MS;font-style:normal;font-size:18px;line-height:25px;text-align:center;color:#515978">
                            50%, <strong>₹ '. $price.'</strong>
                            amount has been Failed Payment on <br/>
                            '.$add_on.'
                        </p>
                    </div>';
            
        }
    }
    
    
    
    if($payment_status == 'complete'){
        
        $priceHtml = '<div style="background-color:#ffffff;margin-bottom:6px;padding:20px;max-width:550px;text-align:center;margin-left:auto;margin-right:auto;border-top-width:medium;border-top-style:solid;border-top-color:#0eb550">
                        <p style="font-family:Trebuchet MS;font-style:normal;font-size:18px;line-height:25px;text-align:center;color:#515978">
                            <strong>₹ '. $price.'</strong>
                            amount has been Successful Payment <br/> with Payment ID is <b>'.$payment_id.'</b> on <br/>
                            '.$add_on.'
                        </p>
                    </div>';
        
        
        
            if($grossCharge > $price){
                $userPercentage = getPercentageValueByAmount($userPay, $grossCharge);
                $payAtHotel = number_format($grossCharge - $userPay);
                $buttomBar = '
                                <tr>
                                    <td style="width:50%;text-align:left;padding-left:8px;color:#7b8199">'.$userPercentage.'% Paid</td>
                                    <td style="width:50%;text-align:right;padding-left:8px;color:#7b8199">₹ '.$price.'</td>
                                </tr>
                                ';
                                
                $priceHtml = '<div style="background-color:#ffffff;margin-bottom:6px;padding:20px;max-width:550px;text-align:center;margin-left:auto;margin-right:auto;border-top-width:medium;border-top-style:solid;border-top-color:#0eb550">
                                    <p style="font-family:Trebuchet MS;font-style:normal;font-size:18px;line-height:25px;text-align:center;color:#515978">
                                        '.$userPercentage.'%, <strong>₹ '. $price.'</strong>
                                        amount has been Successful Payment <br/> with Payment ID is <b>'.$payment_id.'</b> <br/>
                                        on  '.$add_on.' and <br/> Pay at Hotel Rs <strong>'.$payAtHotel.'</strong>.
                                    </p>
                                </div>';
            }
    }



    

    $html = '
        
            <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>'.$sitename.' || Payment Invoice</title>
                </head>
                <body>
                    <blockquote style="font-family:Trebuchet MS">
                        <div style="background-image:linear-gradient(to bottom,#e54b76 0%,#cc1e4f 200px,#f8f9f9 200px,#f8f9f9 90%);height:100%">

                            <div style="text-align:center;margin-bottom:30px; max-width:588px;margin:auto;">
                                <table style="width:100%; max-width:600px; min-height:90px">
                                    <tr>
                                    <td align="left"><img width="80px" src="'.$img.'"></td>
                                    <td align="right"><strong style="color:#000">Invoice #'.$invoiceNo.'</strong></td>
                                    </tr>
                                </table>
                            </div>
                            ​
                            <div style="max-width:588px;margin:auto">

                                <div style="max-width:588px;margin:auto">
                                    <div
                                    style="background-color:#ffffff;margin-bottom:20px;padding:20px;max-width:550px;text-align:center;margin-left:auto;margin-right:auto">
                                    <table style="width:100%; margin-bottom: 35px; max-width:600px;">
                                        <tr>
                                        <td align="left" style="width:10%">
                                            <div> Hello <b>'.$name.'</b>,</div>
                                            <div> '.$email.'</div>
                                            <div> '.$company_name.'</div>
                                            <div> '.$gst.'</div>
                                        </td>

                                        <td align="right" style="width:70%">
                                            <div><b>'.hotelDetail()['name'].'</b></div>
                                            <div>'.hotelDetail()['pincode'].'</div>
                                            <div>'.ucfirst(hotelDetail()['district']).'</div>
                                            <div>'.ucfirst(hotelDetail()['address']).'</div>
                                            <div>GST:- '.hotelDetail()['gst'].'</div>
                                        </td>
                                        </tr>
                                    </table>
                                    </div>
                                    '.$priceHtml.'
                                </div>
                                ​

                                <div style="max-width:588px;margin:auto">
                                    <div style="background-color:#ffffff;padding:20px 20px 2px 20px;max-width:550px;margin-left:auto;margin-right:auto;margin-top:15px;font-size:15px">
                                        <table style="background-color:white;width:100%;margin-bottom: 20px;">
                                            <tr>
                                                <td style="text-align:left;font-size:17px;padding:15px 0px;border-bottom:1px solid #ebedf2;margin-bottom:20px">Booking details</td>
                                                <td style="text-align:right;font-size:17px;padding:15px 0px;border-bottom:1px solid #ebedf2;margin-bottom:20px;color:#528ff0;">Booking guide</td>
                                            </tr>
                                        </table>';

                                    foreach(getOrderDetailArrByOrderId($oid) as $bidrow){
                                      
                                        $checkIn = $bidrow['checkIn'];
                                        $checkOut = $bidrow['checkOut'];
                                        $roomId = $bidrow['roomId'];
                                        $room_detail_id = $bidrow['roomDId'];

                                        $adult = $bidrow['adult'];
                                        $child = $bidrow['child'];

                                        $room_name = getRoomNameById($roomId);
                                        $rate_plane = getRatePlanByRoomDetailId($room_detail_id);

                                        $checkDate = getDateFormatByTwoDate($checkIn,$checkOut);

                                        $html .= '<table style="background-color:white;width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="color:#7b8199;text-align:left;padding:0px 0px 20px 10px">
                                                            <b>'.$room_name.'</b>
                                                            </td>
                                                            <td style="text-align:right;padding:0px 10px 20px 0px">
                                                            <small>'.$checkDate.'</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color:#7b8199;text-align:left;padding:0px 0px 20px 10px">
                                                                <table>
                                                                    <tr>
                                                                        <td><strong>Adult</strong>: '.$adult.'</td>
                                                                        <td><strong>Child</strong>: '.$child.'</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="text-align:right;padding:0px 10px 20px 0px">
                                                                <strong>'.$rate_plane.'</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p style="font-size:18px;line-height:25px;text-align:center;color:#515978;padding:20px 0px 0px 0px;border-top-style:solid;border-top-color:#ebedf2;border-top-width:2px;background-color:white">
                                                </p>' ;
                                    };

                                    

                            $html .= '

                                    </div>
                                </div>


                                <div style="max-width:588px;margin:auto">
                                    <div
                                    style="background-color:#ffffff;padding:20px 20px 2px 20px;max-width:550px;margin-left:auto;margin-right:auto;margin-top:15px;font-size:15px">
                                    <p
                                        style="font-family:Trebuchet MS;font-style:normal;font-size:18px;line-height:25px;color:#515978;text-align:center;margin-top:0px;border-bottom-style:solid;border-bottom-color:#ebedf2;border-bottom-width:2px;padding-bottom:18px">
                                        Breakup for Payout
                                    </p>
                                    <table style="background-color:white;width:100%;border-spacing:0px">
                                        <thead style="color:#7b8199">
                                        <tr>
                                            <th style="padding:0px 0px 20px 0px;text-align:start;border-bottom:1px solid #ebedf2">
                                            Room Name
                                            </th>
                                            <th style="padding:0px 0px 20px 0px;text-align:center;border-bottom:1px solid #ebedf2">
                                            Amount
                                            </th>
                                            <th style="padding:0px 0px 20px 0px;text-align:center;border-bottom:1px solid #ebedf2">
                                            Adult
                                            </th>
                                            <th style="padding:0px 10px 20px 0px;text-align:center;border-bottom:1px solid #ebedf2">
                                            Child
                                            </th>
                                            <th style="padding:0px 10px 20px 0px;text-align:center;border-bottom:1px solid #ebedf2">
                                            GST
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>';
                                        $total_price = 0;
                                        $gst_price = 0;
                                        $couponBalance =0;
                                        foreach(getOrderDetailArrByOrderId($oid) as $bidrow){
                                            // pr($bidrow);
                                            $rid = $bidrow['roomId'];
                                            $rdid = $bidrow['roomDId'];

                                            $room_name = getRoomNameById($rid);
                                            $rate_plane = getRatePlanByRoomDetailId($rdid);

                                            $adultPrice = 0;
                                            $childPrice = 0;
                                            $adult = $bidrow['adult'];
                                            $child = $bidrow['child'];
                                            $night = 1;
                                            $roomPrice = getRoomPriceById($rid,$rdid, $adult, $checkIn ,$checkOut);
                                            $noRoom = 1;
                                            $couponCode = '';

                                            $singleRoomPriceCalculator = SingleRoomPriceCalculator($rid, $rdid, $adult, $child , $noRoom, $night, $roomPrice, $childPrice , $adultPrice, $couponCode);
                                            // $total_price += $night * (($roomPrice * $no_room) + $extraAdult + $extraChild);
                                            
                                            $gst_price += $singleRoomPriceCalculator[0]['gst'];
                                            $total_price += $singleRoomPriceCalculator[0]['total'];
                                            $couponValue = $singleRoomPriceCalculator[0]['couponPrice'];
                                            if($singleRoomPriceCalculator[0]['couponPrice'] == ''){
                                                $couponValue = 0;
                                            }
                                            $couponBalance += $couponValue;
                                            $html .= '<tr>
                                                        <td style="text-align:start;padding:10px 10px 20px 0px">
                                                        
                                                        <span style="color:gray;font-weight:lighter">
                                                        '.$room_name.'
                                                        </span>
                                                        </td>
                                                        <td style="text-align:center;padding:10px 10px 20px 0px">
                                                        '.$singleRoomPriceCalculator[0]['room'].'
                                                        </td>
                                                        <td style="text-align:center;padding:10px 10px 20px 0px">
                                                        '.$singleRoomPriceCalculator[0]['adultPrint'].'
                                                        </td>
                                                        <td style="text-align:center;padding:10px 10px 20px 0px">
                                                        '.$singleRoomPriceCalculator[0]['childPrint'].'
                                                        </td>
                                                        <td style="text-align:center;padding:10px 10px 20px 0px">
                                                        '.$singleRoomPriceCalculator[0]['gst'].'
                                                        </td>
                                                    </tr>';
                                        }

                                        if($pickUp > 0){
                                            $pickupHtml = '

                                                            <tr>
                                                                <td style="width:50%;text-align:left;padding-left:8px;color:#7b8199">PickUp</td>
                                                                <td style="width:50%;text-align:right;padding-left:8px;color:#7b8199">₹ '.$pickUp.'</td>
                                                            </tr>
                                                            
                                                            ';
                                            $total_price = $total_price + $pickUp;
                                        }

                                        
                                        if($couponCode != ''){
                                           
                                            $couponCodeHtml = '
                                                            <tr>
                                                                <td style="width:50%;text-align:left;padding-left:8px;color:#7b8199">Coupon Code('.$couponCode.')</td>
                                                                <td style="width:50%;text-align:right;padding-left:8px;color:#7b8199">₹ '.$couponBalance.'</td>
                                                            </tr>
                                                            ';
                                        }

                                    $html .=' </tbody>
                                    </table>

                                    <table style="width:100%;border-spacing: 20px">
                                        '.$pickupHtml.'
                                        <tr>
                                            <td style="width:50%;text-align:left;padding-left:8px;color:#7b8199">GST</td>
                                            <td style="width:50%;text-align:right;padding-left:8px;color:#7b8199">₹ '.$gst_price.'</td>
                                        </tr>
                                        '.$couponCodeHtml.'
                                        <tr>
                                            <td style="width:50%;text-align:left;padding-left:8px;color:#7b8199">Total Payout amount</td>
                                            <td style="width:50%;text-align:right;padding-left:8px;color:#7b8199">₹ '.$total_price.'</td>
                                        </tr>
                                        '.$buttomBar.'
                                    </table>
                                    

                                    </div>
                                </div>
                                ​

                                <div style="max-width:588px;margin:auto">
                                    <div style="text-align:center;margin-bottom:16px;margin-top:8px;max-width:588px;margin:auto">
                                    <a href="'.$bookingSite.'" style="color:white;text-decoration:unset" target="_blank">
                                        <div style="padding:15px 0px 15px 0px;background:#ec407a;border-radius:3px;margin:10px 0px;color:white">
                                        View Rooms
                                        </div>
                                    </a>
                                    </div>

                                    <p style="font-size:14px;text-align:center;color:#7b8199">
                                    If you have any issue with the service from '.$sitename.' Software Private Ltd, please raise
                                    your request
                                    <a href=" " target="_blank">here</a>
                                    </p>
                                </div>

                                '.hotelPolicyEmail().'
                            </div>
                        </div>
                    </blockquote>
                </body>
                </html>
  
    
    ';
    
    return $html;
}

function getBookingDetailByBId($bid,$night=''){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from bookingdetail where bid = '$bid'");
    $bookingsql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from booking where id = '$bid'"));
    $coupon = $bookingsql['couponCode'];
    if($coupon == ''){
        $coupon = '';
    }
    $data = array();
    $sellPrice = 0;
    $couponDis = 0;
    $actualPrice = 0;
    $GstPrice = 0;
    $roomPrice = 1200;
    $childPrice = 0;
    $adultPrice = 0;
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
           
            $detail = SingleRoomPriceCalculator($row['roomId'], $row['roomDId'], $row['adult'], $row['child'] , '', $night, $roomPrice, $childPrice, $adultPrice, $coupon);
            $sellPrice += ($detail[0]['room'] + $detail[0]['adult'] + $detail[0]['child'] ) * $detail[0]['noNight'];
            $couponValue = $detail[0]['couponPrice'];
            if($detail[0]['couponPrice'] == ''){
                $couponValue = 0;
            }
            $couponDis += $couponValue * $detail[0]['noNight']; 
            $GstPrice += $detail[0]['gst'];
            
        }
        $data[] = [
            'sellPrice' => $sellPrice,
            'couponDis' => $couponDis,
            'actualPrice' => $sellPrice - $couponDis,
            'GstPrice' => $GstPrice,
        ];
    }
    return $data;
}

function getBookingDetailArrByBId($bid,$date,$night,$coupon=''){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from bookingdetail where bid = '$bid'");
    $bookingsql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from booking where id = '$bid'"));
    $data = array();
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            
            $detail = getSingleRoomPrice($row['roomId'], $row['roomDId'], $row['adult'], $row['child'] ,$date,$night,$coupon );
            // pr($detail);
            $data[] = [
                'id'=>$row['id'],
                'room'=>getRoomHeaderById($row['roomId']),
                'ratePlan'=>getRatePlanByRoomDetailId($row['roomDId']),
                'noAdult'=>$row['adult'],
                'noChild'=>$row['child'],
                'adultPrice'=>0,
                'childPrice'=>0,
                'checkIn'=>'2022-10-08',
                'checkout'=>'2022-10-10',
                'gstPer'=>$detail['gstPer'],
                'gst'=>$detail['gst'],
                'roomPrice'=>1200,
                'totalPrice'=>$detail['total'],
            ];
        }
    }
    return $data;
}

function getBookingVoucher($oid){
    
    $invoiceNo = printBooingId($oid);
    $name = getGuestDetail($oid)[0]['name'];
    $email = getGuestDetail($oid)[0]['email'];
    $phone = getGuestDetail($oid)[0]['phone'];
    $company_name = getGuestDetail($oid)[0]['company_name'];
    $gst = getGuestDetail($oid)[0]['comGst'];
    $payment_status = getBookingDetailById($oid)['paymentStatus'];
    $add_on = date('d-m-Y g:i A', strtotime(getBookingDetailById($oid)['addOn']));
    $oderId = getOrderDetailByOrderId($oid)['bookinId'];
    // $partial = getOrderDetailByOrderId($oid)['partial'];
    $grossCharge = getBookingDetailById($oid)['totalPrice'];
    $userPay = getBookingDetailById($oid)['userPay'];
    
    $checkInTime = hotelDetail()['checkIn'];
    $checkOutTime = hotelDetail()['checkOut'];
  
    $addOn = $add_on;    

    $couponCode = getOrderDetailByOrderId($oid)['couponCode'];
    $pickUp = getOrderDetailByOrderId($oid)['pickUp'];
    $checkIn = getOrderDetailByOrderId($oid)['checkIn'];
    $checkOut = getOrderDetailByOrderId($oid)['checkOut'];
    $couponCode = getOrderDetailByOrderId($oid)['couponCode'];
    $night = getNightByTwoDates($checkIn, $checkOut);
    
    $pickupHtml = '';
    
    $img = FRONT_SITE_IMG.hotelDetail()['logo'];
    
    
    
    $couponCodeHtml = '';
    $couponPrice = 0 ;
    
    
    
    
    if($pickUp > 0){
        $pickupHtml = '
            <tr>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                    <h4>Pickup Charges</h4>
                </td>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($pickUp, 2).'</td>
            </tr>
        ';
    }else{
        $pickupHtml = '';
    } 

    $guestBook = '';
    $roomBackupData = '';
    $roomBackUpRoomName = '';
    $totalRoomBrackupPrice = 0;
    $totalAdultRoomBrackupPrice = 0;
    $totslGstPrice = 0;
    
    foreach(getBookingDetailArrByBId($oid,$checkIn,$night,$couponCode) as $bookingList){
        
        $bookindDetailId = $bookingList['id'];
        $checkInStatus = getBookingData($oid,'','',$bookindDetailId)[0]['checkinstatus'];

        $guestBook .= '
                <tr>
                    <td style="padding: 5px 10px;"> '.$bookingList['room'].' <br/>
                        <strong>'.date('M-d, y', strtotime($bookingList['checkIn'])).'</strong> <br/>
                        <small>Adult '.$bookingList['noAdult'].'</small> <br/>
                        <strong>Night</strong>
                    </td>
                    <td style="padding: 5px 10px;">'.$bookingList['ratePlan'].'<br/>
                            <strong>'.date('M-d, y', strtotime($bookingList['checkout'])).'</strong><br/>
                            <small>Child '.$bookingList['noChild'].'</small> <br/>
                            <strong> '.$night.'</strong> 
                        </td>
                </tr>
        ';

        $roomBackupData .= '<tr> <td colspan="4" style="padding:10px">'. $bookingList['room'] .'</td> </tr> ';
     
        for($i= 0; $i < getNightByTwoDates($bookingList['checkIn'],$bookingList['checkout']); $i++){
            $chilAdult = $bookingList['adultPrice'] + $bookingList['childPrice'];
            $totalRoomBrackupPrice += $bookingList['roomPrice'];
            $totalAdultRoomBrackupPrice += $chilAdult;
            $totslGstPrice += $bookingList['gst'];
            $roomBackupData .= '<tr>
                                    <td style="padding:10px">'.date('d-M-Y', strtotime(getDateByDay($bookingList['checkIn'], $i))).'</td>
                                    <td style="padding:10px; text-align:center">₹ '.$bookingList['roomPrice'].'</td>
                                    <td style="padding:10px;text-align:right">₹ '.$chilAdult.'</td>
                                    <td style="padding:10px;text-align:right">₹ '.$bookingList['gst'].' @ '.$bookingList['gstPer'].' %</td>
                                </tr>';
        }
    }

    $calculateHotelVoucher = getBookingDetailByBId($oid,$night);
    

    if($couponCode != '' && $couponCode != 0){ 
        $couponCodeHtml = '<tr>
                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                                    <h4>Coupon Discount</h4>
                                    <p><small>( '.$couponCode.' )</small></p>
                                </td>
                                <td style="padding: 5px 10px;border-bottom: 1px solid #00000033;text-align: right;">₹ '.number_format($calculateHotelVoucher[0]['couponDis'], 2).'</td>
                            </tr>
                            
                            <tr>
                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                                    <h4>Actual Sell Rates</h4>
                                </td>
                                <td style="padding: 5px 10px;border-bottom: 1px solid #00000033;text-align: right;">₹ '.number_format($calculateHotelVoucher[0]['actualPrice'], 2).'</td>
                            </tr>
                            
                            ';
    }
    
    
    if($checkInStatus == 4){
        
        $actualPrice = $userPay * 100 / 112;
        
    }else{
        
        $actualPrice = $calculateHotelVoucher[0]['actualPrice'];
        
    }
    
    $gstActualPrice = $calculateHotelVoucher[0]['GstPrice'];
    
    $retroCommPrice = $actualPrice * COMM_PRICE / 100 ;
    $commTax = $retroCommPrice * 18 / 100 ;
    
    $tcsPrice = $actualPrice * 1 / 100 ;
    $tdsPrice = $actualPrice * 1 / 100 ;
    
    $totalCommission = $retroCommPrice + $commTax + $tcsPrice + $tdsPrice;
    
    
    $bookingCancleHtml = '';
    
    if($checkInStatus == 4){
        
        $natAmount = $userPay - $totalCommission;
        
        $bookingCancleHtml = '
            <tr>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                    <h4>Booking Status</h4>
                </td>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;background: darkred;text-align: center;color: white;font-weight: 700;">No Show</td>
            </tr>
        ';
        
    }else{
        
        $natAmount = $grossCharge - $totalCommission;
        
    }
    
    
    $hotelPayable = $userPay - $totalCommission;
    $partialStatus = '';
    
    $paymentStatusPrint = '
        <tr>
            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; border-left: 1px solid #00000033;">
                <h4>Hotel Net payment</h4>
            </td>
            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right; background: darkseagreen;color: black;font-weight: 700;">₹ '.number_format($hotelPayable, 2).'</td>
        </tr>
    ';
    
    if($grossCharge > $userPay){
        $userPayPercentage = round(($userPay/$grossCharge) * 100);
        $userHotelPay = $grossCharge - $userPay;
        $userPayAtHotelHtml = '<tr>
                                    <td style="padding: 5px 10px;"><strong style="color:#3f51b5">Pay at hotel</strong></td>
                                    <td style="padding: 5px 10px;"><strong style="color:black">₹ '.$userHotelPay.'</strong></td>
                                </tr>';
        if($userHotelPay == 0){
            $userPayAtHotelHtml = '';
        }
        if($checkInStatus == 4){
            $userPayAtHotelHtml = '
                <tr>
                    <td style="padding: 5px 10px;"><strong style="color:#3f51b5">Pay at hotel</strong></td>
                    <td style="padding: 5px 10px;"><strong style="color:black">₹ 0</strong></td>
                </tr>
            ';
        }
        $partialStatus = '
            <tr>
                <td style="padding: 5px 10px;"><strong style="color:red">Advance Pay('.$userPayPercentage.'%)</strong></td>
                <td style="padding: 5px 10px;"><strong style="color:green">₹ '.$userPay.'</strong></td>
            </tr>

            '.$userPayAtHotelHtml.'
        ';
        
        $paymentStatusPrint = '
            <tr>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; border-left: 1px solid #00000033;">
                    <h4>Hotel Online payment</h4>
                </td>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right; background: darksalmon;color: black;font-weight: 700;">₹ '.number_format($hotelPayable, 2).'</td>
            </tr>
            <tr>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; border-left: 1px solid #00000033;">
                    <h4>Hotel Net payment</h4>
                </td>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right; background: darkseagreen;color: black;font-weight: 700;">₹ '.number_format($natAmount, 2).'</td>
            </tr>
        ';
    }
    
    
    if($payment_status == 'pending'){
        
        $html = '
            <table>
                <tr>
                    <th>Payment Failed!</th>
                </tr>
            </table>
        ';
        
    }else{
        
    
    
    
    $html = '
    
    
        <!DOCTYPE html>
            <html lang="en">
                <head>
                    <title>Web Booking Voucher</title>
                </head>
                <body>
            
                    <table width="100%" style="border-top: 1px solid #00000033;border-left: 1px solid #00000033;border-right: 1px solid #00000033;padding: 10px 20px;">
                        <tr>
                            <td>
                                <h2>Web Booking Voucher</h2> <br/>
                                <p><small>Booking ID</small> <strong> '.$oderId.'</strong></p>
                                <p>Booking Date: '.$addOn.'</p>
                            </td>
                            <td style="text-align:right">
                                <img src="https://retrox.in/logo.png" alt="Logo" style="width: 80px;">
                                <table style="width: 100%;padding: 10px 15px;">
                                    <tr>
                                        <td>
                                            <p><strong>GST No.-</strong> '.RETROD_GST.'</p>
                                            <p><strong>PAN No.-</strong> '.RETROD_PAN.'</p>
                                            <p><strong>TAN No. -</strong> '.RETROD_TAN.'</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    
                    <table style="border-left: 1px solid #00000033;border-right: 1px solid #00000033;padding: 10px 20px; width:100%">
                        <tr>
                            <td >
                                <p><strong>Dear Valuable Partner,</strong></p> <br/>
                            </td>
                        </tr>
                    </table>
                    
                    <table style="border-left: 1px solid #00000033;border-right: 1px solid #00000033;padding: 10px 20px; width:100%">
                        <tr>
                            <td style="padding: 0 20px;">
                                <p>Congratulations, You have got a booking from your Website Please find the details below . Guest Name <strong>'.$name.'</strong></p>
                                <p>The amount payable to hotel for this booking is INR <strong style="color: green;font-size: 21px;"> '.number_format($natAmount,2).'</strong> as per the details below.</p>
                            </td>
                        </tr>
                    </table>
            
                    <table width="100%" style="border-left: 1px solid #00000033;border-right: 1px solid #00000033;padding: 10px 20px;">
                        
                        
            
                        <tr>
                            <td>
                            
                                <table style="padding: 10px 20px; width: 100%; border-collapse: collapse; ">
                                    <tr>
                                        <th style="padding: 10px;border-top: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4; border-left: 2px solid #96D4D4;">BOOKING DETAILS</th>
                                        <th style="padding: 10px;width: 80%; border-top: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4; border-right: 2px solid #96D4D4;border-left: 2px solid #96D4D4;">PAYMENT BREAKUP</th>
                                    </tr>
                                    <tr>
                                    
                                        <td width="40%" style="padding: 20px 20px; vertical-align: top; width: 40%; border-left: 2px solid #96D4D4; border-right: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4;">
                                            
            
                                            <table border="1" style="border-collapse: collapse; text-align:center; border-color: #96D4D4; width: 100%">
                                                <tr>
                                                    <td style="padding: 5px 10px;"><strong>Guest Name</strong></td>
                                                    <td style="padding: 5px 10px;">'.$name.'</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 10px;"><strong>Number</strong></td>
                                                    <td style="padding: 5px 10px;">'.$phone.'</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" style="padding: 5px 10px;"> Night</th>
                                                </tr>
                                                '.$guestBook.'
                                                '.$partialStatus.'
                                            </table>
                                        </td>
                                        
                                        <td width="60%" style="padding: 10px; width: 60%; border-right: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4;">
                                            
                                            <table style="width: 100%;">
                                                <tr style="vertical-align: top;">
                                                   
                                                    <td >
                                                        <table style="border-collapse: collapse;padding: 10px 20px;">
                        
                                                            <tr>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                                                                    <h4>Hotel Sell Price</h4>
                                                                    <p><small>(  Room x  Nights )</small></p>
                                                                </td>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;text-align: right;">₹ '.number_format($calculateHotelVoucher[0]['sellPrice'],2).'</td>
                                                            </tr>
                                                            
                                                            '.$couponCodeHtml.'
                                    
                                                            '. $pickupHtml.'
                                    
                                    
                                                            <tr>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                                                                    <h4>GST @ </h4>
                                                                    <p><small>(Including IGST or (SGST & CGST))</small></p>
                                                                </td>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($gstActualPrice, 2).'</td>
                                                            </tr>
                                    
                                                            
                                                            
                                                            <tr>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                                                                    <h4>Gross Charges</h4>
                                                                </td>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($grossCharge, 2).'</td>
                                                            </tr>
                                                            
                                                            '.$bookingCancleHtml.'
                                                            
                                                            <tr>
                                                                <td style="padding: 5px 10px; ">
                                                                    <h4><strong>Retrod</strong> <small>- Comm ( '.COMM_PRICE.'% )</small></h4>
                                                                    <p><small>(Including Tax (18%))</small></p>
                                                                </td>
                                                                <td style="padding: 5px 10px; text-align: right;">
                                                                    ₹ '.number_format($retroCommPrice, 2).' + <br/> ₹ '.number_format($commTax, 2).'
                                                                    
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td style="padding: 0 0 10px 0; border-bottom: 1px solid #00000033;" colspan="2">
                                                                    
                                                                    <table border="1" style="width:100%; border-collapse: collapse; border-color: gainsboro;">
                                                                    
                                                                        <tr>
                                                                            <td style="padding:5px 10px">TAC including Tax</td>
                                                                            <td style="padding: 5px 10px; text-align: right;">₹ '.number_format($retroCommPrice + $commTax, 2).'</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td style="padding:5px 10px">TCS (1% on Sell Rate)</td>
                                                                            <td style="padding: 5px 10px; text-align: right;">₹ '.number_format($tcsPrice, 2).'</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td style="padding:5px 10px">TDS (1% on Sell Rate)</td>
                                                                            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($tdsPrice, 2).'</td>
                                                                        </tr>
                                                                    
                                                                    
                                                                    </table>
                                                                    
                                                                </td>
                                                                
                                                            </tr>
                                                            
                                                            
                                                            '.$paymentStatusPrint.'
                                                            
                                                            
                                    
                                                        </table>
                                                        
                                                    </td>
                                                    
                                                </tr>
                                            </table>
            
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                    </table>
                    
                    <br/>
                    
                    <h4>Room wise Break up</h4>
                    
                    <table border="1" style="width:100%;border-collapse: collapse;">
                        <tr>
                            <th style="padding:10px;text-align:left">Payment Breakup</th>
                            <th style="padding:10px;text-align:center">Room Charges</th>
                            <th style="padding:10px;text-align:right">Extra Guest/Child</th>
                            <th style="padding:10px;text-align:right">GST</th>
                        </tr>
                        '.$roomBackupData.'
                        ';
                        
                        
                        
                 
                        
                $html .= '
                        <tr>
                            <td style="padding:10px">Total</td>
                            <td style="padding:10px;text-align:center">₹ '.$totalRoomBrackupPrice.'</td>
                            <td style="padding:10px;text-align:right">₹ '.$totalAdultRoomBrackupPrice.'</td>
                            <td style="padding:10px;text-align:right">₹ '.$totslGstPrice.'</td>
                        </tr>
                        
                    
                    </table>
            
                    
                    
                </body>
            </html>
    
    
    ';
    
    
    }
    
    
    
    
    return $html;
}

function getPercentageValueByAmount($actualAmout, $totalAmount){
    $data = 0;
    if($actualAmout != 0 && $totalAmount != 0){
        $data = ($actualAmout / $totalAmount) * 100;
    }
    
    return round($data);
}

function quickPayEmail($qpid){
    global $conDB;
    $sql = mysqli_query($conDB, "select * from quickpay where id = '$qpid'");
    $row = mysqli_fetch_assoc($sql);

    $name = $row['name'];
    $qporderId = $row['orderId'];
    $phone = $row['phone'];
    $email = $row['email'];
    $room = $row['room'];
    $room_id = $row['room_id'];
    $qickPayNote = $row['qickPayNote'];
    $amount = 0;
    $paymentStatus = $row['paymentStatus'];
    $add_on = $row['addOn'];
    $gross = $row['totalAmount'];
    
    $img = FRONT_SITE_IMG.hotelDetail()['logo'];
    
    $totalPrice = $row['amount'];
    
    $payble = $row['amount'];
    
    $userPayPercentage = '';
    $amountPrint = '<strong style="font-size: 14px;"> Total Price : </strong>'.$totalPrice.' Rs ';
                    
    if($gross >= $payble){
        $totalPrice = $gross;
        $userPayPercentage = ' ('. getPercentageValueByAmount($payble , $gross).' %)'; 
        $payAtHotelHtml = '';
        $payAtHotel = $gross - $payble;
        if($payAtHotel > 0){
            $payAtHotelHtml = '<strong style="font-size: 14px;"> Pay at hotel : </strong>'.$payAtHotel.' Rs ';
        }
        $amountPrint = ' 
                    <strong style="font-size: 14px;"> Total Price : </strong>'.$totalPrice.' Rs  <br/> 
                    <strong style="font-size: 14px;"> Pay'.$userPayPercentage.' : </strong>'.$payble.' Rs <br/>
                    '.$payAtHotelHtml.'';
    }
    
    
    
    $checkIn = $row['checkIn'];
    $checkOut = $row['checkOut'];
    $noOfNight = getNightByTwoDates($checkIn,$checkOut);
    
    $buttomBar = '';
    $gstSection = '';
    
    

    $content = '
        
            <tr>
                <td align="left"><strong>01</strong></td>
                <td align="left"><strong>Room</strong></td>
                <td align="right"><strong>'.getRoomNameById($room).'</strong></td>
            </tr>
            
            
            <tr>
                <td align="left"><strong>02</strong></td>
                <td align="left"><strong>Name</strong></td>
                <td align="right"><strong>'.$name.'</strong></td>
            </tr>
            <tr>
                <td align="left"><strong>03</strong></td>
                <td align="left"><strong>Phone</strong></td>
                <td align="right"><strong>'.$phone.'</strong></td>
            </tr>
            <tr>
                <td align="left"><strong>04</strong></td>
                <td align="left"><strong>Email</strong></td>
                <td align="right"><strong>'.$email.'</strong></td>
            </tr>
            <tr>
                <td align="left"><strong>05</strong></td>
                <td align="left"><strong>Check In</strong></td>
                <td align="right"><strong>'.$checkIn.'</strong></td>
            </tr>
            <tr>
                <td align="left"><strong>06</strong></td>
                <td align="left"><strong>Check Out</strong></td>
                <td align="right"><strong>'.$checkOut.'</strong></td>
            </tr>
            
            <tr>
                <td align="left"><strong>07</strong></td>
                <td align="left"><strong>Night</strong></td>
                <td align="right"><strong>'.$noOfNight.'</strong></td>
            </tr>

            <tr>
                <td align="left"><strong>08</strong></td>
                <td align="left"><strong>Request</strong></td>
                <td align="right" style="width: 50%;"><p>'.$qickPayNote.'</p></td>
            </tr>
        
        ';
        
        
                    
        if($paymentStatus == 'complete'){
            $priceStatus = 'Successful Payment';
            $priceHtml = '<tr>
                            <td style="width: 100%;color: #0f5132;background-color: #d1e7dd;border-color: #0f5132;text-align: center;padding: 20px 10px;border-radius: 3px;border: 2px dashed;">
                                <div>
                                    <strong>'.$priceStatus.' </strong> <br/>
                                    '.$amountPrint.'
                                </div>
                            </td>
                        </tr>';
        }else{
            $priceStatus = 'Failed Payment';
            $priceHtml = '<tr><td style="width: 100%;text-align: center;padding: 20px 10px;border-radius: 3px;border: 2px dashed;color: #842029;background-color: #f8d7da;border-color: #d1898f; "><div><strong>'.$priceStatus.' </strong> <br/> <strong style="font-size: 14px;"> <strong>Total Price : '.$payble.' Rs </div></td></tr>';
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
                        <td align="right"><strong>Invoice #'.$qporderId.'</strong></td>
                    </tr>
                </table>
                <hr>

                <table style="width:100%; margin-bottom: 35px; max-width:600px;">
                    <tr>
                        <td align="left">
                            <div> Hello <b>'.$name.'</b>,</div>
                            <div> '.$email.'</div>
                        </td>

                        <td align="right" style="width:50%;">
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
                    
                   '.$content.'
                   
                </table>
                
                <table style="width:70%; margin-bottom: 25px;margin-left: 30%;">
                   
                    
                    <tr align="right">
                        <td><strong>Total:</strong></td>
                        <td><strong>'.$totalPrice.' Rs</strong></td>
                    </tr>
                    
                </table>
                
                '.hotelPolicyEmail().'
                
            </div>
        </div>

    </body>

    </html>
  
    
    ';
    return $html;
}

function getQPVoucher($qpid){
    
    global $conDB;
    $sql = mysqli_query($conDB, "select * from quickpay where id = '$qpid'");
    $row = mysqli_fetch_assoc($sql);

    $qporderId = $row['orderId'];
    $name = $row['name'];
    $phone = $row['phone'];
    $emailId = $row['email'];
    $room = $row['room'];
    $room_id = $row['room_id'];
    $amount = 0;
    $paymentStatus = $row['paymentStatus'];
    $add_on = $row['addOn'];
    $gross = $row['totalAmount'];
    
    $checkIn = date('d-M-y', strtotime($row['checkIn']));
    $checkOut = date('d-M-y', strtotime($row['checkOut']));
    
    $img = FRONT_SITE_IMG.hotelDetail()['logo'];
    
    $totalPrice = $row['amount'];
    
    $payble = $row['amount'];
    $userPayPercentage = '';
    $groosHtml = '';
    $payAtHotel = 0;
    
    $noOfNight = getNightByTwoDates($checkIn,$checkOut);
    
    
        
    $priceSection = '
        <tr>
            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                <h4>Room Price</h4>
            </td>
            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;text-align: right;">₹ '.number_format($amount,2).'</td>
        </tr>
    ';
    
    
    $totalRoomPrice = $gross * 100 / 112;
   
    
    $retroCommPrice = $totalRoomPrice * QPCOMM_PRICE / 100 ;
    $commTax = $retroCommPrice * 18 / 100 ;
    
    $tcsPrice = $totalRoomPrice * 1 / 100 ;
    $tdsPrice = $totalRoomPrice * 1 / 100 ;
    
    
    $natAmount = $payble - ($retroCommPrice + $commTax + $tcsPrice + $tdsPrice);
    $userPayment = '
            <tr>
                <th style="padding: 5px 10px;">Total Price</th>
                <th style="padding: 5px 10px;">₹ '.$payble.'</th>
            </tr>
        ';

    if($gross >= $payble){
        $totalPrice = $gross;
        $userPayPercentage = ' ('. round(($payble / $gross) * 100) .' %)'; 
        $payAtHotel = $gross - $payble;
        if($payAtHotel > 0){
            $groosHtml = '
                <tr>
                    <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                        <h4>Gross Amount</h4>
                    </td>
                    <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($totalPrice, 2).'</td>
                </tr>
        ';
        $displayPayment = '
        
            <tr>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; border-left: 1px solid #00000033;">
                    <h4>Hotel Net payment</h4>
                </td>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right; background: darkseagreen;color: black;font-weight: 700;">₹ '.number_format($natAmount, 2).'</td>
            </tr>
        
        ';
        $userPayment = '
            <tr>
                <th style="padding: 5px 10px;">Total Price</th>
                <th style="padding: 5px 10px;">₹ '.$totalPrice.'</th>
            </tr>
            <tr>
                <th style="padding: 5px 10px;">Pay '.$userPayPercentage.'</th>
                <th style="padding: 5px 10px;">₹ '.$payble.'</th>
            </tr>
            <tr>
                <th style="padding: 5px 10px;">Pay At Hotel</th>
                <th style="padding: 5px 10px;">₹ '.$payAtHotel.'</th>
            </tr>
        ';
        }
    }
    
    
    $displayPayment = '
        
        <tr>
            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; border-left: 1px solid #00000033;">
                <h4>Hotel Net payment</h4>
            </td>
            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right; background: darkseagreen;color: black;font-weight: 700;">₹ '.number_format($natAmount, 2).'</td>
        </tr>
    
    ';


    
    if($gross >= $payble){
        if($payAtHotel > 0){
            $hotelPayble = $natAmount + $payAtHotel;
            
        $displayPayment = '
        
            <tr>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; border-left: 1px solid #00000033;">
                    <h4>Hotel Online payment</h4>
                </td>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right; background: darksalmon;color: black;font-weight: 700;">₹ '.number_format($natAmount, 2).'</td>
            </tr>
            
            <tr>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; border-left: 1px solid #00000033;">
                    <h4>Hotel Net payment</h4>
                </td>
                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right; background: darkseagreen;color: black;font-weight: 700;">₹ '.number_format($hotelPayble, 2).'</td>
            </tr>
        
        ';
        
        $natAmount = $hotelPayble;
        
        }
    }


    $content = '
            
        <tr>
            <td style="padding: 5px 10px;">Name</td>
            <td style="padding: 5px 10px;">'.$name.'</td>
        </tr>
        
        <tr>
            <td style="padding: 5px 10px;">Phone</td>
            <td style="padding: 5px 10px;">'.$phone.'</td>
        </tr>
        
        <tr>
            <td style="padding: 5px 10px;">Room</td>
            <td style="padding: 5px 10px;">'.getRoomHeaderById($room).'</td>
        </tr>
        
        <tr>
            <td style="padding: 5px 10px;" >Check In <br/> <strong>'.$checkIn.'</strong></td>
            <td style="padding: 5px 10px;" >Check Out <br/> <strong>'.$checkOut.'</strong></td>
        </tr>
        
        <tr>
            <td style="padding: 5px 10px;" >Night</td>
            <td style="padding: 5px 10px;" >'.$noOfNight.'</td>
        </tr>
        
        '.$userPayment.'

    ';
    
    if($paymentStatus == 'pending'){
        
        $html = '
            <table>
                <tr>
                    <th>Payment Failed!</th>
                </tr>
            </table>
        ';
        
    }else{
        
    




 
    
    $html = '
    
    
        <!DOCTYPE html>
            <html lang="en">
                <head>
                    <title>Web Quick Pay Voucher</title>
                </head>
                <body>
            
                    <table width="100%" style="border-top: 1px solid #00000033;border-left: 1px solid #00000033;border-right: 1px solid #00000033;padding: 10px 20px;">
                        <tr>
                            <td>
                                <h2>Web Quick Pay Voucher</h2> <br/>
                                <p><small>Booking ID</small> <strong> '.$qporderId.'</strong></p>
                                <p>Booking Date: '.$add_on.'</p>
                            </td>
                            <td style="text-align:right">
                                <img src="https://retrox.in/logo.png" alt="Logo" style="width: 80px;">
                                <table style="width: 100%;padding: 10px 15px;">
                                    <tr>
                                        <td>
                                            <p><strong>GST No.-</strong> '.RETROD_GST.'</p>
                                            <p><strong>PAN No.-</strong> '.RETROD_PAN.'</p>
                                            <p><strong>TAN No. -</strong> '.RETROD_TAN.'</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    
                    <table style="border-left: 1px solid #00000033;border-right: 1px solid #00000033;padding: 10px 20px; width:100%">
                        <tr>
                            <td >
                                <p><strong>Dear Valuable Partner,</strong></p> <br/>
                            </td>
                        </tr>
                    </table>
                    
                    <table style="border-left: 1px solid #00000033;border-right: 1px solid #00000033;padding: 10px 20px; width:100%">
                        <tr>
                            <td style="padding: 0 20px;">
                                <p>Congratulations, You have got a Quick Pay from your Website Please find the details below . Guest Name <strong>'.$name.'</strong></p>
                                <p>The amount payable to hotel for this Quick Pay is INR <strong style="color: green;font-size: 21px;"> '.number_format($natAmount,2).'</strong> as per the details below.</p>
                            </td>
                        </tr>
                    </table>
            
                    <table width="100%" style="border-left: 1px solid #00000033;border-right: 1px solid #00000033;border-bottom: 1px solid #00000033;padding: 10px 20px;">
                        
                        
            
                        <tr>
                            <td>
                            
                                <table style="padding: 10px 20px; width: 100%; border-collapse: collapse; ">
                                    <tr>
                                        <th style="padding: 10px;border-top: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4; border-left: 2px solid #96D4D4;">BOOKING DETAILS</th>
                                        <th style="padding: 10px;width: 80%; border-top: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4; border-right: 2px solid #96D4D4;border-left: 2px solid #96D4D4;">PAYMENT BREAKUP</th>
                                    </tr>
                                    
                                    <tr>
                                    
                                        <td style="padding: 20px 20px; vertical-align: top; width: 40%; border-left: 2px solid #96D4D4; border-right: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4;">
                                            
            
                                            <table border="1" style="border-collapse: collapse; text-align:center; border-color: #96D4D4; width: 100%">
                                                
                                                '.$content.'
                                                
                                            </table>
                                            
                                        </td>
                                        
                                        <td style="padding: 10px; width: 60%; border-right: 2px solid #96D4D4; border-bottom: 2px solid #96D4D4;">
                                            
                                            <table style="width: 100%;">
                                                <tr style="vertical-align: top;">
                                                   
                                                    <td >
                                                        <table style="border-collapse: collapse;padding: 10px 20px;"> 
                                                            
                                                            
                                                            <tr>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                                                                    <h4>Total Amount Paid '.$userPayPercentage.'</h4>
                                                                </td>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($payble, 2).'</td>
                                                            </tr>
                                                            '.$groosHtml.'
                                                            <tr>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033;">
                                                                    <h4>Actual Amount</h4>
                                                                </td>
                                                                <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($totalRoomPrice, 2).'</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td style="padding: 5px 10px; ">
                                                                    <h4><strong>Retrod</strong> <small>- Comm ( '.QPCOMM_PRICE.'% )</small></h4>
                                                                    <p><small>(Including Tax (18%))</small></p>
                                                                </td>
                                                                <td style="padding: 5px 10px; text-align: right;">
                                                                    ₹ '.number_format($retroCommPrice, 2).' + <br/> ₹ '.number_format($commTax, 2).'
                                                                    
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td style="padding: 0 0 10px 0; border-bottom: 1px solid #00000033;" colspan="2">
                                                                    
                                                                    <table border="1" style="width:100%; border-collapse: collapse; border-color: gainsboro;">
                                                                    
                                                                        <tr>
                                                                            <td style="padding:5px 10px">TAC including Tax</td>
                                                                            <td style="padding: 5px 10px; text-align: right;">₹ '.number_format($retroCommPrice + $commTax, 2).'</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td style="padding:5px 10px">TCS (1% on Sell Rate)</td>
                                                                            <td style="padding: 5px 10px; text-align: right;">₹ '.number_format($tcsPrice, 2).'</td>
                                                                        </tr>
                                                                        
                                                                        <tr>
                                                                            <td style="padding:5px 10px">TDS (1% on Sell Rate)</td>
                                                                            <td style="padding: 5px 10px; border-bottom: 1px solid #00000033; text-align: right;">₹ '.number_format($tdsPrice, 2).'</td>
                                                                        </tr>
                                                                    
                                                                    
                                                                    </table>
                                                                    
                                                                </td>
                                                                
                                                            </tr>
                                                            
                                                            
                                                            '.$displayPayment.'
                                                            
                                                            
                                    
                                                        </table>
                                                        
                                                    </td>
                                                    
                                                </tr>
                                            </table>
            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    
                    <br/>
                    
                </body>
            </html>
    
    
    ';
    
    
    }
    
    
    
    
    return $html;
}


function getGuestEmailId($gid='', $grid = ''){
    global $conDB;
    if($gid == ''){
        $sql = "select * from guest_review where id = $grid";
        $row = mysqli_fetch_assoc(mysqli_query($conDB, $sql));
        $gid = $row['guestId'];
    }

    $getGuestDetailArry = getGuestDetail('','',$gid)[0];


    return $getGuestDetailArry['email'];
}



function send_email($email,$gname='',$cc='',$bcc='',$html,$subject){
    include(SERVER_INCLUDE_PATH.'smtp/PHPMailerAutoload.php');
    $hotel_name = hotelDetail()['name'];

    $mail = new PHPMailer;

    $mail->SMTPDebug = 0;                               

    $mail->isSMTP();              
    $mail->Host = 'smtppro.zoho.in';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'noreply@retrod.in';                 
    $mail->Password = 'Retrod@121';  
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;    
       

    $mail->setFrom('noreply@retrod.in',$hotel_name);
    $mail->addAddress("$email", "$gname");
    $mail->addCC("$cc");
    $mail->addBCC("$bcc");

    $mail->isHTML(true);
    $mail->Subject = "$subject";
    $mail->Body    = $html;

   
    
    if($mail->send()) {
        // echo 1;
    } else {
        // echo $mail->ErrorInfo;
    }
}






?>