<?php

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

function str_openssl_dec($data,$iv){
    $key = KEY; 
    $cipher = "aes128"; 
    $option = 0; 
    return openssl_decrypt($data, $cipher, $key, $option, $iv);
}

function str_openssl_enc($data,$iv){
    $key = KEY; 
    $cipher = "aes128"; 
    $option = 0; 
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
        $output = "<div class='alert success_box'><i class='ti-face-smile'></i>";
        $output .= $_SESSION['SuccessMsg'];
        $output .= "</div>";
        $_SESSION['SuccessMsg'] = null;
        return $output;
    }
}

function unique_id($l = 8){
    $better_token = md5(uniqid(rand(), true));
    $rem = strlen($better_token)-$l;
    $unique_code = substr($better_token, 0, -$rem);
    $uniqueid = $unique_code;
    return $uniqueid;

}

function getSuperAdmin($said = ''){
    global $conDB;
    $sql = "select * from superadmin";

    if($said != ''){
        $sql .= " where id='$said'";
    }

    $query = mysqli_query($conDB, $sql);

    $row = array();
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
    }

    return $row;
}

?>