<?php
include ('include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

$page = explode('/',$_SERVER['PHP_SELF']);
pr(explode('.',end($page))[0]);



?>