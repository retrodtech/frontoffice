<?php
$servername = "localhost";
$username = "retroxbe_jamindars";
$password = 'XMIjmR)f4$V2';

date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION)) { 
  session_start(); 
} 
$conDB = mysqli_connect("localhost","$username","$password","retroxbe_jamindars") or die("Connection Failed");


?>