<?php


$servername = "localhost";
$username = "root";
$password = '';

$sitePath = 'http://localhost/pms';

$guestPhotoSitePath = 'http://localhost/pms/guest-photo.php';

date_default_timezone_set('Asia/Kolkata');
$conDB = mysqli_connect("localhost","$username","$password","pms") or die("Connection Failed");


define('KEY', 'Retrod@123'); 

function str_openssl_dec($data,$iv=''){
    $key = KEY; 
    $cipher = "aes128"; 
    $option = 0; 
    $iv = '1234567891234567';
    return openssl_decrypt($data, $cipher, $key, $option, $iv);
}

$data = $_GET['id'];

$strData = str_openssl_dec($data);

$strArry = explode("-",$data);

$type = $strArry[0];
$gid = $strArry[1];

$sql = "select * from guest where id = '$gid'";

$strGetValue = $_SERVER['QUERY_STRING'];

$query = mysqli_query($conDB, $sql);

$row = mysqli_fetch_assoc($query);
$guestName = $row['name'];
$guestEmail = $row['email'];

if($type == 'guestPhotoProof'){
    $imgName = $row['kyc_file'];
    $path = $sitePath.'/img/guestP/'.$imgName;
}

if($type == 'guestPhoto'){
    $imgName = $row['image'];
    $path = $sitePath.'/pms/img/guest/'.$imgName;
}


if($imgName != ''){
    if(isset($_GET['delete'])){
        $deleteId = $_GET['delete'];
    
        if($type == 'guestPhotoProof'){
            $filepath = $_SERVER['DOCUMENT_ROOT'].'/pms/img/guestP/';
            $oldImg = $row['kyc_file'];
            $fileFirstName = 'guestp';
            $clmName = 'kyc_file';
            $sql = "update guest set kyc_file = '' where id = '$deleteId'";
        }
    
        if($type == 'guestPhoto'){
            $filepath = $_SERVER['DOCUMENT_ROOT'].'/pms/img/guest/';
            $oldImg = $row['image'];
            $fileFirstName = 'guestp';
            $clmName = 'image';
            $sql = "update guest set image = '' where id = '$deleteId'";
        }
    
        // unlink($filepath.'/'.$oldImg);
        mysqli_query($conDB, $sql);
        $redirectPath = $_SERVER['HTTP_REFERER'];
        header("Location:$redirectPath");
    
        
    }
}else{
    // $getValue = $_GET;
    // $strGetValue = $_SERVER['QUERY_STRING'];
    // unset($getValue['delete']);
    // $arryGetValue = $getValue;
    // $strGetValue = explode('=',$arryGetValue);
    
    // echo "<pre>";
    // print_r($strGetValue);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Image Uploader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css">
    
    <style>
        * {
            padding: 0;
            margin: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            background: #ebf2fb;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            min-height: 100vh;
        }

        #fileUpload {
            width: 450px;
            padding: 30px;
            border-radius: 5px;
            background: #fff;
        }

        #fileUpload ul{
            position: relative;
            margin-bottom:30px;
        }

        #fileUpload ul li{
            display: inline-block;
            width: 49%;
            background: #efefef;
            height: 35px;
            text-align: center;
            line-height: 35px;
            border-radius: 2px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
        }

        #fileUpload ul li.active{
            background: #390da0 !important;
            color: #fff !important;
        }

        #fileUpload header {
            color: #390da0;
            font-size: 25px;
            text-align: center;
            margin-bottom: 15px;
        }

        #fileUpload form label {
            height: 160px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-flow: column;
            flex-flow: column;
            margin-bottom: 15px;
            border: 2px dashed #390da0;
            border-radius: 5px;
        }

        .guestInfo {
            position: relative;
            height: 80px;
            background: #f5f5f5;
            margin-bottom: 25px;
        }
        .guestInfo img{
            width: 80px;
            height: 80px;
            object-fit: cover; 
            margin-right: 20px;
        }
        .dFlex{
            display: flex;
            justify-content: start;
        }
        .dFlex.jcsb{
            justify-content: space-between;
        }
        .dFlex.aic{
            align-items: center;
        }

        .guestInfo button {
            width: 25px;
            height: 25px;
            border-radius: 50px;
            border: 1px dashed #b75f69;
            background: #f8d7da;
            color: #721c24;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
        }

        #fileUpload form label i,
        #fileUpload form label p {
            color: #390da0;
        }

        #fileUpload form label i {
            font-size: 50px;
            margin-bottom: 5px;
        }

        #fileUpload form label p {
            font-size: 16px;
        }

        #fileUpload form input {
            opacity: 0;
        }

        #fileUpload .progressArea {
            position: relative;
        }

        #fileUpload .progressArea .row {
            background: #f4f0fe;
            margin-bottom: 10px;
            padding: 15px 20px;
            border-radius: 5px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        #fileUpload .progressArea .row i {
            font-size: 30px;
            color: #390da0;
        }

        #fileUpload .progressArea .row .content {
            width: 100%;
            margin-left: 15px;
        }

        #fileUpload .progressArea .row .content .detail {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 10px;
        }

        #fileUpload .progressArea .row .content .detail span {
            font-size: 16px;
        }

        #fileUpload .progressArea .row .content .detail .name {
            font-size: 21px;
            font-weight: 500;
        }

        #fileUpload .progressArea .row .content .progressBar {
            width: 100%;
            height: 7px;
            border-radius: 50px;
            overflow: hidden;
            background-color: #fff;
        }

        #fileUpload .progressArea .row .content .progressBar .progess {
            width: 0;
            height: 100%;
            background: #390da0;
        }

        #fileUpload .progressArea .complete .content {
            margin-left: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        #fileUpload .progressArea .complete .content .detail {
            margin-left: 15px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
    </style>

</head>

<body>

    <section id="fileUpload">

        <ul>
            <?php
            
                $tabBtn = ['Guest Image', 'Guest Proof Image'];

                if($type == 'guestPhoto'){
                    foreach($tabBtn as $key=>$tabList){
                        if($key == 0){
                            echo '<li class="active">'.$tabList.'</li>';
                        }else{
                            echo '<li>'.$tabList.'</li>';
                        }
                        
                    }
                }

                if($type == 'guestPhotoProof'){
                    foreach($tabBtn as $key=>$tabList){
                        if($key == 1){
                            echo '<li class="active">'.$tabList.'</li>';
                        }else{
                            echo '<li>'.$tabList.'</li>';
                        }
                    }
                }


                
            ?>
        </ul>

        
        <?php 
        
        if($imgName != ''){
            
            echo '<div class="guestInfo dFlex jcsb"> 
                    <div class="dFlex">
                        <img src="'.$path.'" alt="">
                        <div class="guestCaption dFlex aic">
                            <h4>'.$guestName.'</h4>
                            <h6>'.$guestEmail.'</h6>
                        </div>
                    </div>
                    <div class="dFlex aic" style="margin-right: 10px;"><a href="'.$guestPhotoSitePath.'?'.$strGetValue.'&delete='.$gid.'"><button>X</button></a></div>
                </div>';
        }
        
        ?> 

        <header>Guest Image Uploader </header>
        <form id="uploadFrom" action="" method="post">
            <label for="file">
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Browse File Upload</p>
            </label>
            <input type="file" name="file" id="file">
            <input type="hidden" name="type" value="<?= $type ?>">
            <input type="hidden" name="gid" value="<?= $gid ?>">
        </form>
        <div class="progressArea">


        </div>
    </section>


    <script>
        
    const form = document.querySelector('form'),
        formInput = form.querySelector('#file'),
        progressArea = document.querySelector('.progressArea');


    formInput.onchange = ({
        target
    }) => {
        let file = target.files[0];
        if (file) {
            let fileName = file.name;
            uploadFile(fileName);
        }

    }

    function uploadFile(fName) {
        var xhr = new XMLHttpRequest(); // Create Xhr obj
        xhr.open('post', 'guest-photo-upload.php'); // send Post Req
        xhr.upload.addEventListener('progress', ({
            loaded,
            total
        }) => {
            let fileLoad = Math.floor((loaded / total) * 100); //Get Percentage 
            let fileTotal = Math.floor(total / 1000); //Get File Size 
            let fileSize;
            (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) +
                " MB";
            var proHtml = `
                                <div class="row">
                                    <i class="fas fa-file-alt"></i>
                                    <div class="content">
                                        <div class="detail">
                                            <span class="name">${fName}</span>
                                            <span class="percentage">${fileLoad}%</span>
                                        </div>
                                        <div class="progressBar">
                                            <div class="progess" style="width:${fileLoad}%"></div>
                                        </div>
                                    </div>
                                </div>
                `;
            progressArea.innerHTML = proHtml;
            if (loaded == total) {
                var completeHtml = `
                                    <div class="row complete">
                                        <div class="content">
                                            <i class="fas fa-file-alt"></i>
                                            <div class="detail">
                                                <span class="name">${fName}</span>
                                                <span class="size">${fileSize}</span>
                                            </div>
                                        </div>
                                        <i class="fas fa-check"></i>
                                    </div>
                    `;
                progressArea.innerHTML = completeHtml;
            }
        });
        let formData = new FormData(form); //formData store in obj
        xhr.send(formData); // sending data
    }

    </script>
</body>

</html>