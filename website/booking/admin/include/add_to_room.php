<?php

class add_to_room{
    function addroom($rid,$room,$adult,$child,$night,$rdid,$add_date){
        $rid = trim($rid);
        $_SESSION['room'][$rid]['room']=$room;
        $_SESSION['room'][$rid]['adult']=$adult;
        $_SESSION['room'][$rid]['child']=$child;
        $_SESSION['room'][$rid]['night']=$night;
        $_SESSION['room'][$rid]['roomdetail']=$rdid;
        $_SESSION['room'][$rid]['adddate']=$add_date;
    }
    function updateroom($rid,$room){
        if(isset($_SESSION['room'][$rid])){
            $_SESSION['room'][$rid]['room']=$room;
        }
    }
    function removeroom($rid){
        if(isset($_SESSION['room'][$rid])){
            unset($_SESSION['room'][$rid]);
        }
    }
    function emptyroom(){
        unset($_SESSION['room']);
    }
    function totalroom(){
        if(isset($_SESSION['room'])){
            return count($_SESSION['room']);
        }else{
            return 0;
        }
    }
}



?>