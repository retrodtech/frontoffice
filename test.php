<?php
include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
$_SESSION['ADMIN_ID']=1;
echo SuccessMsg();
pr(getRoomNumber('', '1', 1, '2022-08-24', '2022-08-26','res'))



?>