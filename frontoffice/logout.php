<?php

include ('../include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

unset($_SESSION['ADMIN_ID']);
$_SESSION['SuccessMsg'] = "Successfully Logout";
redirect('login.php');

?>
