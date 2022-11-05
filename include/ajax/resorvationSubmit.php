<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
// pr($_POST);
$page = $_POST['page'];

if(isset($_SESSION['reservatioId']) && $_SESSION['reservatioId'] !=''){
    $bookId = $_SESSION['reservatioId'];
}else{
    $bookId = BOOK_GENERATE.unique_id(6);
    $_SESSION['reservatioId'] = $bid;
}
        
$checkIn = safeData($_POST['checkIn']);
$checkOut = safeData($_POST['checkOut']);
// $roomQuntity = safeData($_POST['roomQuntity']);
$reservationType = safeData($_POST['reservationType']);
$bookinSource = safeData($_POST['bookinSource']);
$businessSource = safeData($_POST['businessSource']);
$couponCode = safeData($_POST['couponCode']);
// $bookAvailable = safeData($_POST['bookAvailable']);

$selectRoom = $_POST['selectRoom'];
$selectRateType = $_POST['selectRateType'];
$selectAdult = $_POST['selectAdult'];
$selectChild = $_POST['selectChild'];
$roomNumArry = $_POST['roomNum'];

$guestName = safeData($_POST['guestName']);
$guestMobile = safeData($_POST['guestMobile']);
$guestEmail = safeData($_POST['guestEmail']);
$guestAddress = safeData($_POST['guestAddress']);
$guestCuntry = safeData($_POST['guestCuntry']);
$guestState = safeData($_POST['guestState']);
$guestCity = safeData($_POST['guestCity']);
$guestZip = safeData($_POST['guestZip']);

$paymentMethod = safeData($_POST['paymentMethod']);
$paidAmount = safeData($_POST['paidAmount']);

$reciptNo = generateRecipt();

$addBy = $_SESSION['ADMIN_ID'];
$hotrlId = $_SESSION['HOTEL_ID'];



mysqli_query($conDB, "insert into booking(bookinId,hotelId,reciptNo,checkIn,checkOut,payment_status,bookingSource,bussinessSource,paymethodId,userPay,couponCode,addBy) values('$bookId','$hotrlId','$reciptNo','$checkIn','$checkOut','$reservationType','$bookinSource','$businessSource','$paymentMethod','$paidAmount','$couponCode','$addBy')");

$lastId = mysqli_insert_id($conDB);



if(isset($selectRoom)){
    foreach($selectRoom as $key=> $val){
        $room = $val;
        $rateType = $selectRateType[$key];
        $adult = $selectAdult[$key];
        $child = $selectChild[$key];
        $roomNum = $roomNumArry[$key];

        $roomPrice = getRoomPriceById($room,$rateType,$adult,$checkIn);
        $adultPrice = getAdultPriceByNoAdult($adult,$lastId,$room,$checkIn);
        $childPrice = getChildPriceByNoChild($child,$lastId,$room,$checkIn);

            mysqli_query($conDB, "insert into bookingdetail(bid,roomId,roomDId,adult,child,room_number) values('$lastId','$room','$rateType','$adult','$child','$roomNum')");
            $lastBookingDetailId = mysqli_insert_id($conDB);
            mysqli_query($conDB, "insert into guest(hotelId,bookId,bookingdId,serial,name,email,phone,country) values('$hotrlId','$lastId','$lastBookingDetailId','1','$guestName','$guestEmail','$guestMobile','$guestCuntry')");
    }
}


$guestLastId = mysqli_insert_id($conDB);

unset($_SESSION['reservatioId']);
echo $page;

?>