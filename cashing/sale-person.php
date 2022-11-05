<?php

include ('../include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

include (SERVER_PATH.'/cashing/cashing-function.php');

checkLoginAuth();

checkPageBySupperAdmin('pms','sale person', 'sale person');


cashingHtml('Sales Person','sales');

?>


