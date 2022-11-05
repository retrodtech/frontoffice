<?php


    $servername = "localhost";
    $username = "root";
    $password = '';

    date_default_timezone_set('Asia/Kolkata');
    $conDB = mysqli_connect("localhost","$username","$password","pms") or die("Connection Failed");


    $type = $_POST['type'];
    $gid = $_POST['gid'];

    $sql = "select * from guest where id = '$gid'";

    $query = mysqli_query($conDB, $sql);

    $row = mysqli_fetch_assoc($query);

    if($type == 'guestPhotoProof'){
        $path = $_SERVER['DOCUMENT_ROOT'].'/pms/img/guestP/';
        $oldImg = $row['kyc_file'];
        $fileFirstName = 'guestp';
        $clmName = 'kyc_file';
    }

    if($type == 'guestPhoto'){
        $path = $_SERVER['DOCUMENT_ROOT'].'/pms/img/guest/';
        $oldImg = $row['image'];
        $fileFirstName = 'guest';
        $clmName = 'image';
    }

    unlink($path.'/'.$oldImg);

    $fName = $_FILES['file']['name'];
    $fTemp = $_FILES['file']['tmp_name'];
    $ext = pathinfo($fName, PATHINFO_EXTENSION);
    $fNew = $fileFirstName.'_'.rand(100000,999999).".".$ext;
    mysqli_query($conDB, "update guest set $clmName = '$fNew', file_upload_type = 'qr' where id = '$gid'");
    move_uploaded_file($fTemp, $path.$fNew);

    echo 1;

?>