<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

$type = '';

if(isset($_POST['type'])){
    $type = $_POST['type'];
}

if($type == 'load_resorvation'){ 
    // pr($_POST);
    $hotelId = $_SESSION['HOTEL_ID'];
        
    $sql = "select booking.*,bookingdetail.checkinstatus from booking,bookingdetail where booking.id != ''";
    $currentDate = date('y-m-d');
    $search = $_POST['search'];

    $rTabType = $_POST['rTab'];

    $reserveType = $_POST['reserveType'];

    $bookingType = $_POST['bookingType'];

    $currentDate = ($_POST['currentDate'] == '') ? date('Y-m-d') : $_POST['currentDate'];

    if($bookingType == ''){
        $bookingType = 1;
    }



    $sql = reservationReturnQuery($rTabType,$currentDate);

    if($search != ''){        
        $sql = "select booking.*,bookingdetail.checkinstatus,guest.name,guest.email,guest.phone from booking,bookingdetail,guest where guest.bookId= booking.id and guest.name like '%$search%' or guest.email like '%$search%' or guest.phone like '%$search%' or booking.reciptNo like '%$search%' or booking.bookinId like '%$search%' and booking.checkIn >= '$currentDate'";
    }
    
    
    $si = 0;
    $pagination = '';
    
    $limit_per_page = 9;
    
    $page = '';
    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }else{
        $page = 1;
    }
    
    if(isset($_POST['payment_status'])){
        $paymentStatus = $_POST['payment_status'];
        $sql .= " and booking.payment_status= '$paymentStatus'";
    }
    
    $offset = ($page -1) * $limit_per_page;
    
    $sql .= " and booking.id=bookingdetail.bid and booking.hotelId = '$hotelId' and bookingdetail.deleteRec = '1' ";
    
    if($reserveType == 1){
        $sql .= " group by booking.id";
    }

    $sql .= " ORDER BY booking.id DESC ";

    $html = '<div class="row">';


    $query = mysqli_query($conDB, $sql);
    $si = $si + ($limit_per_page *  $page) - $limit_per_page;
   
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            
          $html .= '<div class="col-md-3 col-sm-6 col-xs-12">';
        
            $si ++;

            $bid = $row['id'];
  
            $bookinId = $row['bookinId'];
            $reciptNo = $row['reciptNo'];
            $grossCharge = getBookingDetailById($bid)['totalPrice'];
            $userPay = $row['userPay'];
            $checkIn = $row['checkIn'];
            $checkOut = $row['checkOut'];
            $nroom = $row['nroom'];
            $couponCode = $row['couponCode'];

            $pickUp = $row['pickUp'];
            $payment_status = $row['payment_status'];
            $payment_id = $row['payment_id'];
            $bookingSource = $row['bookingSource'];
            $add_on = $row['add_on'];
            $bookingDetailMainId = '';
            if(isset($row['bookingDetailMainId'])){
                $bookingDetailMainId = $row['bookingDetailMainId'];
            }
                        

            $addBy = explode(',',$row['addBy']);
            $maxAddBy = count($addBy);
            $addByValue = $addBy[$maxAddBy -1];
            $addByValueArr = explode('_',$addByValue);
            
            $gname = getGuestDetail('','',getBookingDetailById($bid,'',$bookingDetailMainId)['name'])[0]['name'];
            $nAdult = getBookingDetailById($bid)['totalAdult'];
            $nChild = getBookingDetailById($bid)['totalChild'];
           
            
            $html .= reservationContent($bookinId,$reciptNo,$gname,$checkIn,$checkOut,$add_on,$nAdult,$nChild,$grossCharge,$userPay,'yes',$rTabType,$bookingDetailMainId);

            $html .= '</div>';

        }
    }else{
        $html .= 'No Data';
    }

    $html .= '</div>';

    echo $html;
}

if($type == 'getBusinessSource'){
    $bid = safeData($_POST['id']);
    $bs = getCashiering('',$bid);
    $html = '';
    if(count($bs) != 0){
        foreach($bs as $key=>$bsList){
            $select = '';
            if($key == 0){
                $select = 'selected';
            }
            $id = $bsList['id'];
            $name = ucfirst($bsList['name']);
            $html .= "<option value='$id' $select>$name</option>";
        }
    }else{
        $html .= "<option value='0' selected>No Data</option>";
    }
    echo $html;
}

if($type == 'getRateTypeByRID'){
    $rid = safeData($_POST['id']);
    $rt = getRateType($rid);
    $html = '';
    if(count($rt) != 0){
        foreach($rt as $key=>$rtList){
            $select = '';
            if($key == 0){
                $select = 'selected';
            }
            $id = $rtList['id'];
            $name = ucfirst($rtList['title']);
            $html .= "<option value='$id' $select>$name</option>";
        }
    }else{
        $html .= "<option value='0' selected>No Data</option>";
    }
    echo $html;
}

if($type == 'getAdultCountByRId'){
    global $conDB;
    $rid = safeData($_POST['id']);
    $rt = getMaxAdultCountByRId($rid);
    $nAdult = getNoAdultCountByRId($rid);
    $html = '';
    
    if($rt != 0){
        for($i=1; $i<=$rt; $i++){
            $select = '';
            if($i == $nAdult){
                $select = 'selected';
            }
            $html .= "<option value='$i' $select>$i</option>";
        }
    }else{
        $html .= "<option value='0' >0</option>";
    }
    
    
    echo $html;
}

if($type == 'getChildCountByRIdAndAdult'){
    $rid = safeData($_POST['id']);
    $adult = safeData($_POST['adult']);
    $rt = getCountChildData($rid,$adult);


    $html = "<option value='0' >0</option>";
    
    if($rt != 0){
        for($i=1; $i<=$rt; $i++){            
            $html .= "<option value='$i' >$i</option>";
        }
    }
    
    
    
    echo $html;
}

if($type == 'getTotalSingleRoomPrice'){
    $rid = safeData($_POST['rid']);
    $rdid = safeData($_POST['rdid']);
    $adult = safeData($_POST['adult']);
    $child = safeData($_POST['child']);
    $date = safeData($_POST['checkIn']);
    $date2 = safeData($_POST['checkOut']);
    $couponCode = safeData($_POST['couponCode']);

    

    if($rdid == ''){
        $rdid = getRateType($rid,'',1)[0]['id'];
    }

    if($adult == ''){
        $adult = getNoAdultCountByRId($rid);
    }

    if($child == ''){
        $child = 0;
    }

    if($date == ''){
        $date = date('Y-m-d');
    }

    if($date2 == ''){
        $date2 = date("Y-m-d", strtotime("$date +1 day"));
    }
    
    
    $nNight = getNightByTwoDates($date,$date2);

    $result = getSingleRoomPrice($rid, $rdid, $adult, $child ,$date, $nNight,$couponCode);

    $totalPrice = $result['total'];
    
    echo number_format($totalPrice,2);
}

if($type == 'getRoomDetailByRoomNo'){
    $nRoom = 1;
     
    $html = '';
    for($i = 0; $i<$nRoom; $i++){
        $room = '';
        
        foreach(getRoomType('',1) as $key=>$getRoomTypeList){
                                    
            $id = $getRoomTypeList['id'];
            $name = ucfirst($getRoomTypeList['header']);
            $room .=  "<option value='$id'>$name</option>";
        }

        $html .= '
            <tr>
                <td class="pr10">
                    <div class="form-group">
                        <select class="form-control selectRoomId" name="selectRoom[]" data-rno="'.$i.'">
                            <option value="" selected>-Select Room</option>
                            '.$room.'
                        </select>

                    </div>
                </td>
                <td class="pr10">
                    <div class="form-group">
                        <select class="form-control rateTypeId" name="selectRateType[]" disabled data-rno="'.$i.'">
                            <option value="" selected>-Select</option>
                        </select>

                    </div>
                </td>
                <td class="pr10">
                    <div class="form-group">
                        <select class="form-control adultSelect" name="selectAdult[]" disabled>
                            <option value="" selected>1</option>
                        </select>

                    </div>
                </td>
                <td class="pr10">
                    <div class="form-group">

                        <select class="form-control childSelect" name="selectChild[]" disabled>
                            <option value="" selected>0</option>
                        </select>

                    </div>
                </td>

                <td class="pr10">
                    <div class="form-group">

                        <select class="form-control roomNumSelect" name="roomNum[]" disabled>
                        </select>

                    </div>
                </td>

                <td>
                    <div class="form-group">
                        <input type="text" value="0.00" class="form-control totalPriceSection" disabled>
                    </div>
                </td>
            </tr>
        ';

        
    }
    echo $html;
}

if($type == 'load_add_resorvation'){
    $bid = $_POST['bid'];
    if($bid != ''){
        
    }
    
    $pageHtml = '';
    if(isset($_POST['page'])){
        $page = $_POST['page'];
        $pageHtml = "<input type='hidden' value='$page' name='page'>";
    }
    $bookingSource = '';
    $reservationType = '';
    foreach(getReservationType() as $key=>$reservationTypeList){
        $select = '';
        if($key == 0){
            $select = 'selected';
        }
        $id = $reservationTypeList['id'];
        $name = ucfirst($reservationTypeList['name']);
        $reservationType .=   "<option value='$id' $select>$name</option>";
    }

    foreach(getBookingSource() as $key=>$getBookingSourceList){
        $select = '';
        if($key == 0){
            $select = 'selected';
        }
        $id = $getBookingSourceList['id'];
        $name = ucfirst($getBookingSourceList['name']);
        $bookingSource .=   "<option value='$id' $select>$name</option>";
    }

    $paymentMethodHtml = '';
    foreach(getPaymentTypeMethod('',1) as $paymentMethodList){
        $paymentName = $paymentMethodList['name'];
        $paymentId = $paymentMethodList['id'];
        $paymentMethodHtml .= "<option value='$paymentId'>$paymentName</option>";
    }

    $couponCodeHtml = "<option value='0'>No Coupon</option>";
    foreach(getCouponList(1,1) as $couponList){
        $code = $couponList['coupon_code'];
        $value = $couponList['coupon_value'];
        $couponCodeHtml .= "<option value='$code'>$code</option>";
    }

    $html ='
            <form action="" method="post" id="addReservationForm">
                <div class="row">

                    <div class="col-md-8">
                        <div class=""> 
                            
                                
                                <input type="hidden" value="loadReservationPreview" name="type">
                                '.$pageHtml.'
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-area1">
                                            <button id="backBtnForPoupUpContent">
                                                <i>
                                                    <svg version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 152.3 98.8" style="enable-background:new 0 0 152.3 98.8;" width="15px" height="15px">
                                                        <style type="text/css">
                                                            .leftArrowLine{fill:none;stroke:#000000;stroke-width:12;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                                                        </style>
                                                        <g>
                                                            <line class="leftArrowLine" x1="138" y1="50.4" x2="13.1" y2="50.4"/>
                                                            <line class="leftArrowLine" x1="48.4" y1="15" x2="13" y2="50.3"/>
                                                            <line class="leftArrowLine" x1="48.4" y1="85.7" x2="13" y2="50.3"/>
                                                        </g>
                                                    </svg>
                                                </i> 
                                                <h4>Reservation</h4> 
                                            </button>
                                        </div>
                                        <br />
                                        <div class="row">

                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="">
                                                        Checkin
                                                    </label>

                                                    <div class="dFlex jcsb aic">
                                                        <div class="form-group w100 mb0">
                                                            <input type="date" id="checkIn" placeholder="4/6/22" class="form-control" name="checkIn" />
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mb0">
                                                    <label for="">
                                                        Check out
                                                    </label>

                                                    <div class="dFlex jcsb aic">
                                                        <div class="form-group w100">
                                                            <input type="date" id="checkOut" class="form-control" name="checkOut" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group mb0">
                                                    <label for="couponCode">Coupon Code</label>
                                                    
                                                    <div class="couponContent">
                                                        <select name="couponCode" class="form-control" id="couponCode">
                                                        '.$couponCodeHtml.'
                                                        </select>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group mb0">
                                                    <label for="">
                                                        Reservation type

                                                    </label>
                                                    <select class="form-control" name="reservationType" id="reservationType">
                                                        
                                                        '.  $reservationType .'

                                                    </select>


                                                </div>
                                            </div>

                                        </div>
                                        <br/>
                                        <div class="row">

                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="">
                                                        Booking Source

                                                    </label>


                                                    <select class="form-control" name="bookinSource" id="bookngSourceId">
                                                        '. $bookingSource .'

                                                    </select>

                                                </div>

                                            </div>

                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <label for="">Business Source</label>

                                                    <select class="form-control" name="businessSource" id="businessSourceId" disabled>
                                                        <option value="" selected>-Select-</option>
                                                    </select>

                                                </div>

                                            </div>

                                        </div>
                                        <br/>
                                        <hr/>

                                        <div class="dFlex jcsb aic">
                                            <div class="dFlex aic" style="width:20%">
                                                <div class="form-group mr10">
                                                    <h6>Rate offer:</h6>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="contact" disabled>
                                                    <label for="contact"><span>Contact</span></label>

                                                </div>
                                            </div>
                                            <div class="dFlex jcsb aic" style="width:60%">
                                                <div class="form-group">
                                                    <input type="checkbox" id="Book Available room" name="bookAvailable">
                                                    <label for="Book Available room"><span>Book Available
                                                            room</span></label>

                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="Quick group booking" name="quickGroupBook">
                                                    <label for="Quick group booking">Quick group booking</label>

                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="Complementary room" name="complementRoom">
                                                    <label for="Complementary room">Complementary room</label>

                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-12">
                                                <table width="100%" id="roomDetailTable">
                                                    <thead>
                                                        <tr>
                                                            <th width="35%" class="py10">Room Type</th>
                                                            <th width="25%" class="py10">Rate Type</th>
                                                            <th width="10%" class="py10">Adult</th>
                                                            <th width="10%" class="py10">Child</th>
                                                            <th width="10%" class="py10">RN</th>
                                                            <th width="20%" class="py10">Rate(Rs)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="roomDetailId">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            

                                        </div>
                                        <br/>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="" class="btn btn-outline-primary" id="roomDetailIncBtnId">Add Room</a>
                                            </div>
                                        </div>
                                        
                                        

                                        <br/>
                                        <hr/>
                                        <div class="s15"></div>
                                        <div class="row">
                                            <div class="form-group3">
                                                <div class="col-md-12">
                                                    <h4> Guest Imformation :</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="s15"></div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Guest Name</label>
                                                    <div class="form-group">
                                                            <input type="text" placeholder="Name" class="form-control" name="guestName" id="guestName">
                                                            <div class="iconBox">
                                                                <a href="javascript:void(0)" class="iconCon">
                                                                    <i class="far fa-address-card"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="iconCon" id="guestDetail">
                                                                    <i class="far fa-user"></i>
                                                                </a>
                                                            </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Mobile</label>
                                                    <input type="number" placeholder="Mobile No" class="form-control" name="guestMobile">

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" placeholder="Email Id" class="form-control" name="guestEmail">

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" placeholder="Address" class="form-control" name="guestAddress">

                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Cuntry</label>
                                                    <select class="form-control" name="guestCuntry" id="">
                                                        <option value="" selected>-Select Cuntry-</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">State</label>
                                                    <input type="text" placeholder="State" class="form-control" name="guestState">

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">City</label>
                                                    <input type="text" placeholder="City" class="form-control" name="guestCity">

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Zip</label>
                                                    <input type="text" placeholder="zip" class="form-control" name="guestZip">

                                                </div>
                                            </div>


                                        </div>
                                        
                                        <div class="s15"></div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4><i class="fas fa-caret-right"></i> Other Imformation</h4>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="s5"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="checkbox" id="bookingVoucher" name="bookingVoucher">
                                                    <label for="bookingVoucher">Email Booking Voucher</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="checkbox" id="emailCheckOut" name="emailCheckOut">
                                                    <label for="emailCheckOut">Send Email check out</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="checkbox" id="accessGuestPortal" name="accessGuestPortal">
                                                    <label for="accessGuestPortal">Access to guest portal</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="checkbox" id="registrationCard" name="registrationCard">
                                                    <label for="registrationCard">Supress rate on registration card</label>
                                                </div>

                                            </div>
                                        </div>
                                        

                                    </div>

                                </div>
                                <br/>
                                <hr/>
                                <div class="dFlex jce">
                                    <button class="btn btn-outline-secondary mr10">cancel</button>
                                    <button class="btn bg-gradient-info" id="addReservationSubmitBtn" type="submit" name="reservationSubmit">Save</button>
                                </div>

                            

                        </div>


                    </div>

                    <div class="col-md-4">
                        <div class="form-area">


                            <div class="row insertContrnt">
                        
                            </div>

                            <div class="row ">
                                <div class="col-md-6">

                                    <div class="form">
                                        <label for="paymentMethod">Payment Method</label>


                                        <select name="paymentMethod" id="paymentMethod" class="form-control">
                                            <option value="" selected>-Select-</option>
                                            '.$paymentMethodHtml.'
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-6">


                                    <div class="form">
                                        <label for="paidAmount">Paid Amount</label>
                                        <input name="paidAmount" id="paidAmount" class="form-control" placeholder="Enter Amount"/>

                                    </div>



                                </div>
                            </div>

                        </div>


                    </div>


                </div>
            </form>
    ';

    echo $html;
}

if($type == 'loadReservationPreview'){
    // pr($_POST);
    if(isset($_SESSION['reservatioId']) && $_SESSION['reservatioId'] !=''){
        $bid = $_SESSION['reservatioId'];
    }else{
        $bid = BOOK_GENERATE.unique_id(6);
        $_SESSION['reservatioId'] = $bid;
    }
    $reciptNo = generateRecipt();

    $gname = '';
    $checkIn = '';
    $checkOut = '';
    $selectRoom = '';
    $selectRateType = '';
    $selectAdult = '';
    $selectChild = '';

    if(isset($_POST['guestName'])){
        $gname = safeData($_POST['guestName']);
    }

    $checkIn = date('Y-m-d');
    $checkOut = date("Y-m-d", strtotime("1 day", strtotime(date('Y-m-d'))));

    if(isset($_POST['checkIn']) && $_POST['checkIn'] != ''){
        $checkIn = safeData($_POST['checkIn']);
    }

    if(isset($_POST['checkOut']) && $_POST['checkOut'] != ''){
        $checkOut = safeData($_POST['checkOut']);
    }
    
    if(isset($_POST['selectRoom'])){
        $selectRoom = $_POST['selectRoom'];
    }

    if(isset($_POST['selectRateType'])){
        $selectRateType = $_POST['selectRateType'];
    }

    if(isset($_POST['selectAdult'])){
        $selectAdult = $_POST['selectAdult'];
    }

    if(isset($_POST['selectChild'])){
        $selectChild = $_POST['selectChild'];
    }

  
    
    $bDate = date('Y-m-d');

    $countNight = getNightByTwoDates($checkIn, $checkOut);
    
    $nAdult = 0;
    $nChild = 0;
    $totalPrice = 0;
    $total = '';
    $paid = '';
    $couponCode = '';
    
    if(isset($_POST['selectRateType']) && !empty($_POST['selectRateType'])){
        foreach($_POST['selectRateType'] as $key=>$val){
            $rateType = $val;
            $roomId = $selectRoom[$key];
            $adult = $selectAdult[$key];
        
            $child = 0;
            if(isset($selectChild[$key])){
                $child = $selectChild[$key];
            }
            
            $nAdult += $adult;
            $nChild += $child;

            $totalPrice += getSingleRoomPrice($roomId, $rateType, $adult, $child ,$checkIn, $countNight,$couponCode)['total'];
        }
    }

    



    $html = reservationContent($bid,$reciptNo,$gname,$checkIn,$checkOut,$bDate,$nAdult,$nChild,$totalPrice,$paid,'','','','no');

    echo $html;
}

if($type == 'generatrExcelSheet'){

    $sheetType = $_POST['sheetType'];
    $currentDate = date('y-m-d');
    
    if($sheetType == 'reservationBtn'){
        $sql = "select booking.*,bookingdetail.checkinstatus from booking,bookingdetail where bookingdetail.checkinstatus = '1'";
    }

    if($sheetType == 'ariveBtn'){
        $sql = "select booking.*,bookingdetail.checkinstatus from booking,bookingdetail where booking.checkIn = '$currentDate'";
    }

    if($sheetType == 'failedBtn'){
        $sql = "select booking.*,bookingdetail.checkinstatus from booking,bookingdetail where booking.payment_status = 'pending'";
    }

    if($sheetType == 'inHouseBtn'){
        $sql = "select booking.*,bookingdetail.checkinstatus from booking,bookingdetail where bookingdetail.checkinstatus = '2'";
    }
    $sql .= " and booking.id=bookingdetail.bid ORDER BY booking.id DESC ";
    $query = mysqli_query($conDB, $sql);

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){

            $bid = $row['id'];
            $bookinId = $row['bookinId'];
            $reciptNo = $row['reciptNo'];
            $grossCharge = getBookingDetailById($bid)['totalPrice'];
            $userPay = $row['userPay'];
            $checkIn = $row['checkIn'];
            $checkOut = $row['checkOut'];
            $nroom = $row['nroom'];
            $couponCode = $row['couponCode'];
            $payment_status = $row['payment_status'];
            $payment_id = $row['payment_id'];
            $bookingSource = $row['bookingSource'];
            $add_on = $row['add_on'];
            
        }
    }

    echo $sql;
}

if($type == 'getRoomNumByRID'){
    $id = $_POST['id'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];

    $html ='';
    $roomNumArry = getRoomNumber('', '1', $id, $checkIn, $checkOut,'res');
    foreach($roomNumArry as $roomNumList){
        $rn = $roomNumList['roomNo'];
        
        $html .= "<option value='$rn'>$rn</option>";
    }

    echo $html;
}

if(isset($_POST['submitStatus'])){
    if($_POST['submitStatus'] == 'addReservationSubmit'){
        
        
        $bookId = BOOK_GENERATE.unique_id(5);
        
        $checkIn = safeData($_POST['checkIn']);
        $checkOut = safeData($_POST['checkOut']);
        $roomQuntity = safeData($_POST['roomQuntity']);
        $reservationType = safeData($_POST['reservationType']);
        $bookinSource = safeData($_POST['bookinSource']);
        $businessSource = safeData($_POST['businessSource']);
        // $bookAvailable = safeData($_POST['bookAvailable']);
    
        $selectRoom = $_POST['selectRoom'];
        $selectRateType = $_POST['selectRateType'];
        $selectAdult = $_POST['selectAdult'];
        $selectChild = $_POST['selectChild'];
    
        $guestName = safeData($_POST['guestName']);
        $guestMobile = safeData($_POST['guestMobile']);
        $guestEmail = safeData($_POST['guestEmail']);
        $guestAddress = safeData($_POST['guestAddress']);
        $guestCuntry = safeData($_POST['guestCuntry']);
        $guestState = safeData($_POST['guestState']);
        $guestCity = safeData($_POST['guestCity']);
        $guestZip = safeData($_POST['guestZip']);
    
        $paymentMethod = safeData($_POST['paymentMethod']);
        $paidAmount = safeData($_POST['paidAmount']);
    
        $reciptNo = generateRecipt();
    
        $hotrlId = $_SESSION['ADMIN_ID'];
    
    
    
        mysqli_query($conDB, "insert into booking(bookinId,hotelId,reciptNo,checkIn,checkOut,payment_status,bookingSource,bussinessSource,paymethodId,userPay) values('$bookId','$hotrlId','$reciptNo','$checkIn','$checkOut','$reservationType','$bookinSource','$businessSource','$paymentMethod','$paidAmount')");
    
        $lastId = mysqli_insert_id($conDB);
    
        mysqli_query($conDB, "insert into guest(hotelId,bookId,serial,name,email,phone,country) values('$hotrlId','$lastId','1','$guestName','$guestEmail','$guestMobile','$guestCuntry')");
        $guestLastId = mysqli_insert_id($conDB);
        
        if(isset($selectRoom)){
            foreach($selectRoom as $key=> $val){
                $room = $val;
                $rateType = $selectRateType[$key];
                $adult = $selectAdult[$key];
                $child = $selectChild[$key];
    
                $roomPrice = getRoomPriceById($room,$rateType,$adult,$checkIn);
                $adultPrice = getAdultPriceByNoAdult($adult,$lastId,$room,$checkIn);
                $childPrice = getChildPriceByNoChild($child,$lastId,$room,$checkIn);
                if(isset(getRoomNumber('','',1,$room,$checkIn)[0])){
                    $roomNum = getRoomNumber('','',1,$room,$checkIn)[0]['roomNo'];
                    mysqli_query($conDB, "insert into bookingdetail(bid,roomId,roomDId,adult,child,room_number) values('$lastId','$room','$rateType','$adult','$child','$roomNum')");
                }
            }
        }
    }
}



?>