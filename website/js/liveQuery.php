<?php

include ('../booking/admin/include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');


 mysqli_query($conDB, "update live set status = '1' where id = '1'");






?>