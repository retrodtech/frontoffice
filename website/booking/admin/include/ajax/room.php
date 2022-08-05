<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
include (SERVER_INCLUDE_PATH.'add_to_room.php');
$obj = new add_to_room();
if(isset($_POST['type'])){
    $type = $_POST['type'];

    if($type == 'load_checkout_section'){
        if(isset($_SESSION['room'])){            
            foreach($_SESSION['room'] as $key=>$val){
                $room_id = $key;
                $total_price = 0;
                $room_detail_id = $_SESSION['room'][$room_id]['roomdetail'];
                $child_cost = $_SESSION['room'][$room_id]['room'] * $_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id);
                $checkInTime = $_SESSION['checkIn'];
                $noAdult = $_SESSION['room'][$room_id]['adult'];
                $noRoom = $_SESSION['room'][$room_id]['room'];
                ?>
                <div class="booking-summary-box mobile-margin-top" style="overflow:hidden">
                    <div class="room-booking-summary"><br>
                        <div id="day-list">
                            <div class="day-list" style="max-width: 300px;margin: 0 auto;">
                                <div class="row">
                                    <div class="col-md-8 m4">
                                        <ul style="text-align: left;">
                                            <li style="display: inline-block;"><b>Check In:</b> <?php echo formatingDate($_SESSION['checkIn']) ?></li>
                                            <li style="display: inline-block;"><b>Check Out:</b> <?php echo formatingDate($_SESSION['checkout']) ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 m4"><span class="num-day-show flow-text"><input id="nightIncrement" style="width:65px" min="1" max="10" type="number" value="<?php echo $_SESSION['night_stay'] ?>" ><br>Nights</span></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="container-">
                            <div id="room_summary">
                                <div class="room_summary_box">
                                    <p><b><?php echo ucfirst(getRoomHeaderById($room_id)) ?></b></p>
                                    <ul>
                                        <li><span>Room Price: </span> <span>Rs <?php 
                                            if($_SESSION['room'][$room_id]['room'] <= 1){
                                                echo getRoomPriceById($room_detail_id, $checkInTime) ; 
                                            }else{
                                                echo getRoomPriceById($room_detail_id, $checkInTime) .' * '. $noRoom; 
                                            }
                                            
                                            $total_price += getRoomPriceById($room_detail_id, $checkInTime) * $noRoom; ?></span></li>
                                        
                                        <li><span>Adults: <?php echo $_SESSION['room'][$room_id]['adult'] ?></span>  <span>Rs <?php
                                            if($_SESSION['room'][$room_id]['adult'] <= getRoomAdultCountById($room_id)){
                                                echo '0';
                                            }else{
                                                if($_SESSION['room'][$room_id]['room'] > 1){
                                                    echo getAdultPriceByNoAdult($noAdult,$room_id,$room_detail_id) .'*'. $_SESSION['room'][$room_id]['room'];
                                                }else{
                                                    echo getAdultPriceByNoAdult($noAdult,$room_id,$room_detail_id);
                                                }
                                                $total_price += $_SESSION['room'][$room_id]['room'] * getAdultPriceByNoAdult($noAdult,$room_id,$room_detail_id);
                                            }
                                        ?></span></li>
                                        <li><span>Child: <?php echo $_SESSION['room'][$room_id]['child'];  ?></span> <span>Rs <?php
                                        

                                            if($_SESSION['room'][$room_id]['room'] > 1 ){
                                                if($_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id) * $_SESSION['room'][$room_id]['room'] == 0){
                                                    echo 0;
                                                }else{
                                                    echo $_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id) .'*'. $_SESSION['room'][$room_id]['room'] ;
                                                }
                                            }else{
                                                echo $_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id);
                                            }
                                            $total_price += $_SESSION['room'][$room_id]['room'] * $_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id);
                                        
                                         ?></span> </li>
                                        
                                        <?php
                        
                                            if($_SESSION['night_stay'] > 1){
                                                $night = $_SESSION['night_stay'];
                                                $total_number = number_format($total_price, 2);
                                                echo "
                                                    <li>
                                                        <span>Night</span>
                                                        <span>Rs $total_number * $night </span>
                                                    </li>
                                                ";
                                                
                                            }  else{
                                                $night = 1;
                                            }                      
                                            $total_price = $total_price * $night;
                                        ?>
                                        
                                        <li><span>GST:</span> <span>Rs <?php echo $gst = $total_price * (12 / 100); ?></span></li>
                                        <?php $room_total_price = $total_price + $gst ?>
                                        <li id="pickupContent" style="display:none"></li>
                                        <li id="couponInputContent"><div><input id="couponValue" type="text" placeholder="Enter Coupon Code"> <br> <span id="couponCodeError" style="padding: 5px 0;font-size: 12px;color: red;font-weight: 500;"></span></div> <input type="submit" value="Add Coupon" id="add_coupon"></li>
                                        <li id="couponContent" style="position:relative;display:none "></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        
                        <?php  $_SESSION['room_total_price'] = $room_total_price ?>
                        <div class="room-services"><br></div>
                        
                        <div class="room_summary_box row">
                            <div class="col-6">Total Amount</div>
                            <div class="col-6"> <b>Rs <span id="totalPriceValue"><?php echo number_format($room_total_price, 2)  ?></span></b></div>
                        </div>
                        <br/>
                        <div class="room_summary_box">
                            <div style="display: inline-block;margin-bottom: 15px;">
                            <?php
                                $pickUp = settingValue()['pckupDropCaption'];
                                if(settingValue()['pckupDropStatus'] == 1){
                                    echo '<div class="pickup">
                                            <input type="checkbox" name="pickup" id="pickup">
                                            <label for="pickup">Pick & Drop <span class="tool" data-tooltip="'.$pickUp.'">
                                                                                    <i class="far fa-question-circle"></i>
                                                                                </span></label>
                                        </div>';
                                }
                            ?>

                            <?php
                                $partial = settingValue()['partialPaymentCaption'];
                                if(settingValue()['partialPaymentStatus'] == 1){
                                    echo '<div class="partial">
                                            <input type="checkbox" name="partial" id="partial">
                                            <label for="partial">Pay 50% Now<span class="tool" data-tooltip="'.$partial.'">
                                                                                    <i class="far fa-question-circle"></i>
                                                                                </span></label>
                                        </div>';
                                }
                            ?>
                                
                                
                            </div>
                            <div class="btn btn-primary" id="continue_btn"> <span class=""> Continue</span></div>
                        </div>
                    </div>
                </div>
        <?php  }
        }else{
            echo "No Add";
        }
    }
    
    if($type == 'add_room'){
        // pr($_POST);
        $header = $_POST['header'];
        $bedType = $_POST['bedType'];
        $roomCapacity = $_POST['roomCapacity'];
        $amenities = $_POST['amenities'];
        $titlearr = $_POST['title'];
        $roomPrice = $_POST['roomPrice'];
        $image = $_FILES['roomImage']['name'];
        $noAdult = $_POST['noAdult'];
        $noChild = $_POST['noChild'];
        $extraAdultArr = $_POST['extraAdult'];
        $extraChildArr = $_POST['extraChild'];
        $room = $_POST['totalRoom'];
        $mrp = $_POST['mrp'];
        $roomdesc = '';
        $added_on=date('Y-m-d h:i:s');

        mysqli_query($conDB, "insert into room(header,bedtype,roomcapacity,noAdult,noChild,description,add_on,status,totalroom,mrp) values('$header','$bedType','$roomCapacity','$noAdult','$noChild','$roomdesc','$added_on','1','$room','$mrp')");
        $rid = mysqli_insert_id($conDB);
    
        mysqli_query($conDB, "insert into inventory(room_id,type,room) values('$rid','add','$room')");
    
        foreach($amenities as $key=>$val){
            mysqli_query($conDB, "insert into room_amenities(room_id,amenitie_id) values('$rid','$val')");
        }
    
        $extension=array('jpeg','jpg','JPG','png','gif');
        foreach($image as $key=>$val){
            $roomImgName = $_FILES['roomImage']['name'][$key];
            $roomImgTemp = $_FILES['roomImage']['tmp_name'][$key];
            $ext=pathinfo($roomImgName,PATHINFO_EXTENSION);
            
            if(in_array($ext,$extension)){
                $newfilename=rand(100000,999999).".".$ext;
                move_uploaded_file($roomImgTemp, SERVER_ROOM_IMG.$newfilename);
                mysqli_query($conDB, "insert into room_img(room_id,image) values('$rid','$newfilename')");
            }
        }
       
    
        foreach($titlearr as $key=>$val){
            $title = $titlearr[$key];
            $price = $roomPrice[$key];
            $extraAdult = $extraAdultArr[$key];
            $extraChild = $extraChildArr[$key];
            
            mysqli_query($conDB, "insert into room_detail(room_id,title,price,extra_adult,extra_child,status) values('$rid','$title','$price','$extraAdult','$extraChild','1')");
            $rdid = mysqli_insert_id($conDB);
            mysqli_query($conDB, "insert into inventory(room_id,room_detail_id,type,price) values('$rid','$rdid','add2','$price')");
        }

    
    }

    if($type == 'update_room'){
        
        $update_id = $_POST['update_id'];
        $header = $_POST['header'];
        $bedType = $_POST['bedType'];
        $roomCapacity = $_POST['roomCapacity'];  
        $roomdesc = $_POST['roomdesc'];

        $noAdult = $_POST['noAdult'];    
        $noChild = $_POST['noChild'];           
        
        $room = $_POST['totalRoom'];
        $added_on=date('Y-m-d h:i:s');
        $mrp = $_POST['mrp'];
       
        mysqli_query($conDB, "update room set header = '$header', bedtype = '$bedType', totalroom='$room', roomcapacity='$roomCapacity' , noAdult='$noAdult', noChild='$noChild',mrp='$mrp',description='$roomdesc' where id='$update_id'");
        
        mysqli_query($conDB, "update inventory set room='$room' where room_id='$update_id' and type = 'add'");

     
        if(isset($_POST['title'])){
            $titlearr = $_POST['title'];
            $roomPrice = $_POST['roomPrice'];
            $extraAdultArr = $_POST['extraAdult'];
            $extraChildArr = $_POST['extraChild'];
            foreach($titlearr as $key=>$val){
                $title = $titlearr[$key];
                $price = $roomPrice[$key];
                $extraAdult = $extraAdultArr[$key];
                $extraChild = $extraChildArr[$key];
                
                mysqli_query($conDB, "insert into room_detail(room_id,title,price,extra_adult,extra_child,status) values('$update_id','$title','$price','$extraAdult','$extraChild','1')");
               
            }
        }
        $amenities = $_POST['amenities'];
        $amenitiesLoop = getAmenitieIdByRoomId($update_id);
        foreach($amenitiesLoop as $num){
            if (!in_array($num,$amenities)) {
                mysqli_query($conDB, "delete from room_amenities where room_id = '$update_id' and amenitie_id = '$num'");
            } 
        }
        
        foreach($amenities as $key=>$val){
            if(checkAmenitiesById($update_id,$val) == 0){
                mysqli_query($conDB, "insert into room_amenities(room_id,amenitie_id) values('$update_id','$val')");
            }
        }

        $image = $_FILES['roomImage']['name'];
        $extension=array('jpeg','jpg','JPG','png','gif');
        foreach($image as $key=>$val){
            $roomImgName = $_FILES['roomImage']['name'][$key];
            $roomImgTemp = $_FILES['roomImage']['tmp_name'][$key];
            $ext=pathinfo($roomImgName,PATHINFO_EXTENSION);
            if(in_array($ext,$extension)){
                $newfilename=rand(100000,999999).".".$ext;
                move_uploaded_file($roomImgTemp, SERVER_ROOM_IMG.$newfilename);
                mysqli_query($conDB, "insert into room_img(room_id,image) values('$update_id','$newfilename')");
            }
        }
        
        

        $titleUploadArr = $_POST['titleUpload'];
        $roomPriceUploadArr = $_POST['roomPriceUpload'];
        $room_detail_id = $_POST['room_detail_id'];
        $extraAdultUploadArr = $_POST['extraAdultUpload'];
        $extraChildUploadArr = $_POST['extraChildUpload'];
        
        foreach($titleUploadArr as $key=>$val){
            $title = $titleUploadArr[$key];
            $price = $roomPriceUploadArr[$key];
            $detail_id = $room_detail_id[$key];
            $extraAdult = $extraAdultUploadArr[$key];
            $extraChild = $extraChildUploadArr[$key];
            
            mysqli_query($conDB, "update room_detail set title='$title',price='$price',extra_adult='$extraAdult',extra_child='$extraChild' where id='$detail_id'");
            mysqli_query($conDB, "update inventory set price='$price' where room_detail_id='$detail_id' and type = 'add2'");
        }
        $_SESSION['SuccessMsg'] = "Successfull Update record";
    
    }
    
    if($type == 'add_guest_section'){
        $id = $_POST['id']; 
        $room_id = $_POST['room_id']; 
       
        ?>
            <form id="room_guest_select_form" method="POST">
                <div class="row">
                    <div class="col-md-12"><span  style="font-size: 80%;margin-bottom: 6px;display: block;">No. Of Rooms</span></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><select class="form-control" name="room">
                            <?php
                                if(roomExist($room_id) >= 10){
                                    $roomDisplay = 10;
                                }else{
                                    $roomDisplay = roomExist($room_id);
                                }
                                for($i=1;$i<=$roomDisplay;$i++){
                                    if($_SESSION['no_room'] == $i){
                                        echo "<option selected value='$i'>$i</option>";
                                    }else{
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    
                                }
                            
                            ?>
                        </select></div>
                </div> <br/>
                <div class="row">
                    <div class="col-md-2"><span class="room-text">Room</span></div>
                    <div class="col-md-3"><label for="adult-label" class="label-room-booking">Adults</label>
                    <input type="hidden" name="room_id" value="<?php echo $room_id ?>">
                    <select id="adult-label" class="form-control" name="adult">
                            <?php
                            $adultNo = roomMaxCapacityById($room_id);
                                for($i=1; $i <= $adultNo; $i++){
                                    if($i == getRoomAdultCountById($room_id)){
                                        echo "<option selected value='$i'>$i</option>";
                                    }else{
                                        echo "<option value='$i'>$i</option>";
                                    }
                                }
                            
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3"><label for="child-label" class="label-room-booking">(5 - 12 yrs)</label>
                    <select name="kids" id="child-label" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select></div>
                        <input type="hidden" name="room_detail_id" value="<?php echo $id ?>">
                    <div class="col-md-3"><label for="infant-label" class="label-room-booking">(0 &lt; 5yrs)</label>
                    <input type="hidden" value="confirm_room" name="type">
                    <select id="infant-label" class="form-control">
                            <option value="0">0</option>
                        </select></div>
                </div>
                <div class="row btn_row">
                    <div class="col-md-6"><a class="btn btn-light" id="remove_guest_section">CANCEL</a></div>
                    <div class="col-md-6" style="display: flex;justify-content: end;"><input type="submit" class="btn btn-outline-dark" value="Confirm"></div>
                </div>
            </form>
    
        <?php
    }
    
    if($type== 'confirm_room'){
        
        $room = $_POST['room'];
        $adult = $_POST['adult'];
        $kids = $_POST['kids'];
        $rid = $_POST['room_id'];
        $rdid = $_POST['room_detail_id'];
        $night = 1;
        $add_date = '01-02-2022';
    
        if(isset($_SESSION['room'])){
            unset($_SESSION['room']);
            $obj->addroom($rid,$room,$adult,$kids,$night,$rdid,$add_date);
        }else{
            $obj->addroom($rid,$room,$adult,$kids,$night,$rdid,$add_date);
        }
        
    
    
    }
    
    if($type == 'persionCheckout'){
        // pr($_POST);
        $personName = $_POST['personName'];
        $personEmail = $_POST['personEmail'];
        $personPhoneNo = $_POST['personPhoneNo'];
        $companyName = '';
        $companyGst = '';
        $add_on=date('Y-m-d h:i:s');
        
        $night = $_SESSION['night_stay'];
    
        if(isset($_POST['companyName'])){
            $companyName = $_POST['companyName'];
            $companyGst = $_POST['companyGst'];
        }
    
        if(!empty($personName)){
            if(isset($_SESSION['room'])){
            
                foreach($_SESSION['room'] as $key=>$val){
                    $room_id = $key;
                    $room_detail_id = $_SESSION['room'][$room_id]['roomdetail'];
                    $no_room = $_SESSION['room'][$room_id]['room'];
                    $adult = $_SESSION['room'][$room_id]['adult'];
                    $child = $_SESSION['room'][$room_id]['child'];
                    

                    if($_SESSION['room'][$room_id]['adult'] <= getRoomAdultCountById($room_id)){
                        $extra_Adult =  0;
                    }else{
                        if($_SESSION['room'][$room_id]['room'] > 1){
                            $extra_Adult= getAdultPriceByNoAdult($adult,$room_id,$room_detail_id) * $_SESSION['room'][$room_id]['room'];
                        }else{
                            $extra_Adult= getAdultPriceByNoAdult($adult,$room_id,$room_detail_id);
                        }
                    }
    
                    if($_SESSION['room'][$room_id]['room'] > 1 ){
                        if($_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id) * $_SESSION['room'][$room_id]['room'] == 0){
                            $extra_Child =  0;
                        }else{
                            $extra_Child= $_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id) * $_SESSION['room'][$room_id]['room'] ;
                        }
                    }else{
                        $extra_Child= $_SESSION['room'][$room_id]['child'] *  getRoomExtraChildPriceById($room_detail_id);
                    }
        
                }

                $checkIn = $_SESSION['checkIn'];
                $checkout = $_SESSION['checkout'];

                
        
                $price = $_SESSION['room_total_price'];
                
                $room_price = getRoomPriceById($room_detail_id, $checkIn);
                if(isset($_SESSION['partial'])){
                    $partial = $_SESSION['partial'];
                }else{
                    $partial = '';
                }
                if(isset($_SESSION['couponCode'])){
                    $couponCode = $_SESSION['couponCode'];
                }else{
                    $couponCode = '';
                }
                if(isset($_SESSION['pickUp'])){
                    $pickUp = $_SESSION['pickUp'];
                }else{
                    $pickUp = 0;
                }
                           
                                

                $sql = "insert into booking(name,email,phone,company_name,gst,room_id,room_detail_id,no_room,adult,child,night,roomPrice,price,extraAdult,extraChild,payment_status,add_on,checkIn,checkOut,partial,couponCode,pickUp) values('$personName','$personEmail','$personPhoneNo','$companyName','$companyGst','$room_id','$room_detail_id','$no_room','$adult','$child','$night','$room_price','$price','$extra_Adult','$extra_Child','pending','$add_on','$checkIn','$checkout','$partial','$couponCode','$pickUp')";
        
                if(mysqli_query($conDB, $sql)){
                    unset($_SESSION['room']);
                    unset($_SESSION['room_total_price']);
                    $_SESSION['OID']=mysqli_insert_id($conDB);
                    echo 'successfull book';
                }
            }
        }
    
    }
    
    if($type == 'showBookingForm'){
        if(isset($_SESSION['checkIn']) && isset($_SESSION['checkout'])){
            $rid = array_keys($_SESSION['room'])['0'];
            $desc = getRoomHeaderById($rid);
            $data["total"] = $_SESSION['room_total_price'];
            $data['desc'] = $desc;
            $data['error'] = 'false';
        }else{
            $data['error'] = 'true';
        }
        
        echo json_encode($data);
        die();
    }

    if($type == 'couponCode'){
        $couponValu = $_POST['couponValu'];
        $sql = mysqli_query($conDB, "select * from couponcode where status = '1' and coupon_code = '$couponValu'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $coupon_type = $row['coupon_type'];
            $min_value = $row['min_value'];
            $coupon_value = $row['coupon_value'];
            $expire_on = $row['expire_on'];
            
            $checkIn = $_SESSION['checkIn'];
            $checkout = $_SESSION['checkout'];
            
            $totalPrice = $_SESSION['room_total_price'];
            
            $roomArr = $_SESSION['room'];
            $roomId = array_key_first($roomArr);
            $noRoom = $roomArr[$roomId]['room'];
            $room_detail_id = $roomArr[$roomId]['roomdetail'];
            
            $roomPrice = getRoomPriceById($room_detail_id, $checkIn) * $noRoom;
            
            
            if($min_value > $totalPrice){
                $data["type"] = "error";
                $data['msg'] = "Minimum Price is $min_value";
            }elseif(strtotime($expire_on) < strtotime(date('Y-m-d'))){
                $data["type"] = "error";
                $data['msg'] = 'Coupon code is expired';
            }else{
                $_SESSION['couponCode'] = $couponValu;
                if($coupon_type == 'P'){
                    $price = $roomPrice * ($coupon_value / 100);
                    $_SESSION['room_total_price'] = $totalPrice - $price;
                    $data["type"] = "success";
                    $data['msg'] = $price;
                }
                if($coupon_type == 'F'){
                    $price = $coupon_value;
                    $_SESSION['room_total_price'] = $totalPrice - $coupon_value;
                    $data["type"] = "success";
                    $data['msg'] = $price;
                }
            }


        }else{
            $data["type"] = "error";
            $data['msg'] = 'Invalid Coupon Code.';
        }
        echo json_encode($data);
    }

    if($type == 'LoadPrice'){
        echo $_SESSION['room_total_price'];
    }

    if($type == 'pickup'){
        echo $pickupPrice = settingValue()['pckupDropPrice'];
        $_SESSION['room_total_price'] += $pickupPrice;
        $_SESSION['pickUp'] = $pickupPrice;
    }

    if($type == 'removePickup'){
        echo $pickupPrice = settingValue()['pckupDropPrice'];
        $_SESSION['room_total_price'] -= $pickupPrice;
        unset($_SESSION['pickUp']);
    }

    if($type == 'partial'){
        $_SESSION['room_total_price'] = $_SESSION['room_total_price'] / 2;
        $_SESSION['partial'] = 'Yes';
    }

    if($type == 'removePartial'){
        $_SESSION['room_total_price'] = $_SESSION['room_total_price'] * 2;
        unset($_SESSION['partial']);
    }

}





if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    $book_id = getBookingNumberById($_SESSION['OID']);
    mysqli_query($conDB,"update booking set bookinId='$book_id',payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}

if(isset($_POST['night'])){

    $night = $_POST['night'];
    $_SESSION['night_stay'] = $night;

    $check_in = strtotime($_SESSION['checkIn']);

    $check_out = strtotime($_SESSION['checkout']);
    $night_string = strtotime('1 day 00 second', 0);

    $check_out_time = ($check_in) + ($night * $night_string);


    $_SESSION['checkout'] = date('Y-m-d',$check_out_time);
    
}

?>