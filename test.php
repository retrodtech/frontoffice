<?php
include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
$_SESSION['ADMIN_ID']=1;
echo SuccessMsg();
pr($_SESSION)



?>