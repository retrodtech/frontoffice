<?php
include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
$_SESSION['ADMIN_ID']=1;

// pr(getOrderDetailByOrderId(1))

// pr(SingleRoomPriceCalculator(1, 1, 2, 0 , 1, 2, 1200, 0, 0))

echo getBookingVoucher(1)


// pr(getBookingDetailById(1))

// pr(SingleRoomPriceCalculator(1, 1, 2, 0 , 1, 1, 5000, 0 , 0));

// pr(getOrderDetailArrByOrderId(1))



?>