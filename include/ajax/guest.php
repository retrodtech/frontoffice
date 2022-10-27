<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

$type = '';

if(isset($_POST['type'])){
    $type = $_POST['type'];
}

if($type == 'loadGuest'){
  
    $si = 0;
    $pagination = '';
    
    $sql = "select * from guest where id != ''";
        
    
    $limit_per_page = 15;
    
    $page = '';
    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }else{
        $page = 1;
    }
    
    
    $offset = ($page -1) * $limit_per_page;
    
    // $sql .= " ORDER BY id DESC ";
    $sql .= " ORDER BY id DESC limit {$offset}, {$limit_per_page}";
    
    $html = '<table class="table">
                <thead>
                    <tr>
                        <th>Guest name</th>
                        <th>Counrty</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>';

    $query = mysqli_query($conDB, $sql);
    $si = $si + ($limit_per_page *  $page) - $limit_per_page;
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $si ++;
            $gid = $row['id'];
            $bookId = $row['bookId'];
            $name = ucfirst($row['name']);
            $email = $row['email'];
            $phone = $row['phone'];
            $company_name = $row['company_name'];
            $comGst = $row['comGst'];
            $country = $row['country'];
            $guestImg = ($row['image'] == '') ? FRONT_SITE_IMG.'demo/person-icon.png' : FRONT_SITE_IMG.'guest/'.$row['image'] ;
            $html .= '<tr id="guestNameCheckRow'.$si.'" class="guestCheckRow">
                            <td> <input type="checkbox" name="guestNameCheck[]" id="guestNameCheck'.$si.'"> <label for="guestNameCheck'.$si.'"><img width="50px" src="'.$guestImg.'"> '.$name.' </label></td>
                            <td>'.$country.'</td>
                            <td>'.$email.'</td>
                            <td>'.$phone.'</td>
                            <td class="iconCon ">
                                <div class="tooltipCon"> 
                                    <i class="fas fa-ellipsis-v"></i>
                                    
                                    <ul class="tooltipBody">
                                        <li><a class="editGuestOnGuestPage" data-gid="'.$gid.'" href="javascript:void(0)" data-tooltip-top="Edit"><i class="far fa-edit"></i></a></li>
                                        <li><a class="" data-gid="'.$gid.'" href="javascript:void(0)" data-tooltip-top="Delete"><i class="far fa-trash-alt"></i></a></li>
                                        <li><a class="" data-gid="'.$gid.'" href="javascript:void(0)" data-tooltip-top="Detail Log"><i class="fas fa-info"></i></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>';
            

        }
    }else{
       
    }

    $html .= '</table>';

    echo $html;
}

if($type == 'load_add_guest'){
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

    $html ='
            <div class="card">
                <div class="card-body">
                    <form action="">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-area1">
                                    <h4><i class="fas fa-caret-right"></i> Add Guest</h4>
                                </div>
                                <br />



                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="guestImgUpload">
                                            <label for="guestImg"><span>Upload</span></label>
                                            <input type="file" name="guestImg" id="guestImg">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form">
                                            <label for="">Name</label>
                                            <input type="text" placeholder="Name" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form">
                                                    <label for="">EMail</label>
                                                    <input type="text" placeholder="Mail" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form">
                                            <label for="">Phone</label>
                                            <input type="text" placeholder="Phone" class="form-control">
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form">
                                                    <label for="">Gender</label>
                                                    <div class="text-area">
                                                        <input type="radio" name="gender" value="male" id="male"> <label for="male">male</label>
                                                        <input type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
                                                        <input type="radio" name="gender" value="other" id="other"> <label for="other">Other</label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form">
                                            <label for="">Mobile</label>
                                            <input type="text" placeholder="Name" class="form-control">
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form">
                                            <label for="">Address</label>
                                            <input type="text" placeholder="Contact" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form">
                                            <label for="">Counrty</label>
                                            <select class="form-control" name="" id="">
                                                <option value="" selected>Select country</option>
                                                <option value="">India</option>
                                                <option value="">Pk</option>
                                                <option value="">Uk</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form">
                                            <label for="">State</label>
                                            <input type="text" placeholder="India" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form">
                                            <label for="">City</label>
                                            <input type="text" placeholder="India" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-12">
                                <h4> <i class="fas fa-caret-right"></i>Other Imformation</h4>
                                <br />
                                <div class="form-1">
                                    <button class="btn btn-outline-dark">Clear</button>
                                    <button class="btn bg-gradient-primary">Save</button>
                                </div>
                            </div>

                        </div>
                        </form>
                </div>
            </div>
    ';

    echo $html;
}

if($type == 'loadAddGuestReservationForm'){
    // pr($_POST);
    $bid = safeData($_POST['bid']);
    $bdid = safeData($_POST['bdid']);
    $gid = safeData($_POST['gid']);
    $serial = safeData($_POST['serial']);
    $gustImg = safeData($_POST['gustImg']);
    $guestProofImg = safeData($_POST['guestProofImg']);
    $rTab = safeData($_POST['rTab']);
    $page = safeData($_POST['page']);
   
    if($serial == ''){
        $lstKey = array_key_last(getGuestDetail($bid,'','',$bdid));
        $serial = getGuestDetail($bid,'','',$bdid)[$lstKey]['serial'] + 1;
    }

    $title = 'Add Guest';
    $guestName = '';
    $guestEmail = '';
    $guestPhone = '';
    $guestCountry = '';
    $guestState = '';
    $guestCity = '';
    $guestZip = '';
    $guestGender = '';
    $guestImage = '';
    $guestKycFile = '';
    $guestKycNumber = '';
    $guestKycType = '';
    $guestImgHtml  = '';
    $guestPImgHtml = '';
    $guestSerialNum ='';
    $actionBtn = 'reservationAddGuestForm';
    $guestArray = array();
    if($gid != '' && !empty(getGuestDetail($bid,'',$gid))){
        $guestArray = getGuestDetail($bid,'',$gid)[0];
        $actionBtn = 'reservationAddGuestForm';
        // $actionBtn = 'reservationUpdateGuestForm';
    }

    // if($serial != '' && !empty(getGuestDetail($bid,$serial))){
    //     $guestArray = getGuestDetail($bid,$serial)[0];
    // }
    // pr($guestArray);
    if(!empty($guestArray)){
        $title = 'Edit Guest';
        $guestName = $guestArray['name'];
        $guestEmail = $guestArray['email'];
        $guestPhone = $guestArray['phone'];
        $guestCountry = $guestArray['country'];
        $guestState = $guestArray['state'];
        $guestCity = $guestArray['city'];
        $guestZip = $guestArray['zip'];
        $guestGender = $guestArray['gender'];
        $guestImage = $guestArray['image'];
        $guestKycFile = $guestArray['kyc_file'];
        $guestKycNumber = $guestArray['kyc_number'];
        $guestSerialNum = $guestArray['serial'];
        $guestKycType = $guestArray['kyc_type'];
        
        

        
    }

    $idProofHtml = '';
    foreach(getGuestIdProofData(1) as $idPList){
        $id = $idPList['id'];
        $name = $idPList['name'];
        if($id == $guestKycType){
            $idProofHtml .= "<option selected value='$id'>$name</option>";
        }else{
            $idProofHtml .= "<option value='$id'>$name</option>";
        }
    }

    
    if(!empty($guestArray) || $gustImg != '' || $guestProofImg != ''){

        ($gustImg == '') ? '' : $guestImage = $gustImg;
        ($guestProofImg == '') ? '' : $guestKycFile = $guestProofImg;

        $guestImgUrl = FRONT_SITE_IMG.'guest/'.$guestImage;
        $guestPImgUrl = FRONT_SITE_IMG.'guestP/'.$guestKycFile;

        ($guestImage == '') ? '' : $guestImgHtml = "<img width='80' data-img='$guestImage' src='$guestImgUrl' />"  ;
        ($guestKycFile == '') ? '' : $guestPImgHtml =  "<img width='80' data-img='$guestKycFile' src='$guestPImgUrl' />" ;
        
    }
    


    $gender = ['male','female','other'];
    $genderHtml = '';
    
    foreach($gender as $genderList){
        $genderName = ucfirst($genderList);
        if($genderList == $guestGender){
            $genderHtml .= "<input type='radio' checked name='gender' value='$genderList' id='$genderList'><label class='mr5' for='$genderList'>$genderName</label>";
        }else{
            $genderHtml .= "<input type='radio' name='gender' value='$genderList' id='$genderList'><label class='mr5' for='$genderList'>$genderName</label>";
        }
        
    }

    $html = '
            <form date-page="'.$page.'" data-rTab="'.$rTab.'" data-bid="'.$bid.'" data-bdid="'.$bdid.'" id="'.$actionBtn.'" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-head">
                        <h4>'.$title.'</h4>
                        <a class="closeGuestSec" href="javascript:void(0)">X</a>
                        <input type="hidden" name="type" value="loadAddGuestReservationFormSubmit"/>
                        <input type="hidden" name="guestId" value="'.$gid.'"/>
                        <input type="hidden" name="bookingId" value="'.$bid.'"/>
                        <input type="hidden" name="bookingDId" value="'.$bdid.'"/>
                    </div>
                    <div class="card-body">
                        
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="guestImgSec" data-bid="'.$bid.'" data-gid="'.$gid.'" data-serial="'.$guestSerialNum.'">
                                            '.$guestImgHtml.'
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="guestName" placehold="Enter Name" class="form-control" value="'.$guestName.'">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" name="guestPhone" placehold="Enter Phone Number" class="form-control" value="'.$guestPhone.'">
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="guestEmail" placehold="Enter Email Id" class="form-control" value="'.$guestEmail.'">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label> <br/>
                                                '.$genderHtml.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Country</label>
                                        <input type="text" name="guestCountry" class="form-control" placeholder="Enter Address" value="'.$guestCountry.'">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">State</label>
                                        <input type="text" name="guestState" class="form-control" placeholder="Enter Address" value="'.$guestState.'">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <input type="text" name="guestCity" class="form-control" placeholder="Enter Address" value="'.$guestCity.'">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Zip</label>
                                        <input type="text" name="guestZip" class="form-control" placeholder="Enter Address" value="'.$guestZip.'">
                                    </div>
                                </div>


                            </div>

                            <hr>
                            <h4>Other Information</h4>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="guestProofImgSec" data-bid="'.$bid.'" data-gid="'.$gid.'" data-serial="'.$guestSerialNum.'">
                                            '.$guestPImgHtml.'
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">ID Number</label>
                                                <input type="text" name="guestIdNumber" placehold="Enter ID Number" class="form-control" value="'.$guestKycNumber.'">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">ID Type</label>
                                                <select name="guestIdType" id="" class="form-control">
                                                    <option value="">-Select-</option>
                                                    '.$idProofHtml.'
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                        

                                    </div>
                                </div>
                            </div>

                            <hr/>
                            <div class="card-foot">
                                <a href="javascript:void(0)" class="btn btn-outline-secondary closeGuestSec">Close</a>
                                <button  style="margin-bottom:0" type="submit" class="btn bg-gradient-info">Save</button>
                            </div>
                        
                    </div>
                    
                </div>
            </form>
    ';


    echo $html;
}

if($type == 'loadAddGuestReservationFormSubmit'){

  
    $guestName = safeData($_POST['guestName']);
    $guestPhone = safeData($_POST['guestPhone']);
    $guestEmail = safeData($_POST['guestEmail']);
    $guestCountry = safeData($_POST['guestCountry']);
    $guestZip = safeData($_POST['guestZip']);
    $guestIdNumber = safeData($_POST['guestIdNumber']);
    $guestIdType = safeData($_POST['guestIdType']);

    $guestIdState = safeData($_POST['guestState']);
    $guestIdcity = safeData($_POST['guestCity']);

    $hotelId = $_SESSION['HOTEL_ID'];
    $bookId = safeData($_POST['bookingId']);
    // $roomnum = safeData($_POST['bookingDId']);
    $bookingDId = safeData($_POST['bookingDId']);

    $guestImgSec ='';
    $guestProofImgSec = '';

    if(isset($_POST['guestImgSec'])){
        $guestImgSec = safeData($_POST['guestImgSec']);
    }
    if(isset($_POST['guestProofImgSec'])){
        $guestProofImgSec = safeData($_POST['guestProofImgSec']);
    }

    $addBy = 1;

    isset($_FILES['guestImg']) ? $guestImg = $_FILES['guestImg'] : $guestImg['name'] = '';
    isset($_FILES['guestIdProofImg']) ? $kycImg = $_FILES['guestIdProofImg'] : $kycImg['name'] = '';


    $guestImage = '';
    $guestKycFile = '';

    if($_POST['guestId'] != ''){
        $gId = $_POST['guestId'];
        $guestArray = getGuestDetail('','',$gId)[0];
        $guestImage = $guestArray['image'];
        $guestKycFile = $guestArray['kyc_file'];
    }

    $guestImgStr = '';
    $guestProofStr = '';
    $guestImgStrSql = '';
    $guestProofStrSql = '';

    if($guestImg['name'] != ''){
        $guestImgStr = imgUploadWithData($guestImg,'guest',$guestImage)['img'];
        $guestImgStrSql = ",image='$guestImgStr'" ;
    }

    
    if($kycImg['name'] != ''){
        $guestProofStr = imgUploadWithData($kycImg,'guestP',$guestKycFile)['img'];
        $guestProofStrSql = ",kyc_file='$guestProofStr'"; 
    }

    if(!empty(getGuestDetail($bookId))){
        $lastKey = array_key_last(getGuestDetail($bookId));
        $getSerialNo = getGuestDetail($bookId)[$lastKey]['serial'];
        $serialNo = $getSerialNo + 1;
    }else{
        $serialNo = 1;
    }


    $sql = "insert into guest(hotelId,bookId,bookingdId,name,email,phone,country,state,city,zip,image,kyc_file,kyc_number,kyc_type,addBy,serial) values('$hotelId','$bookId','$bookingDId','$guestName','$guestEmail','$guestPhone','$guestCountry','$guestIdState','$guestIdcity','$guestZip','$guestImgSec','$guestProofImgSec','$guestIdNumber','$guestIdType','$addBy','$serialNo')";

    if($_POST['guestId'] != ''){
        
        $sql = "update guest set name='$guestName',email='$guestEmail',phone='$guestPhone',country='$guestCountry',state='$guestIdState',city='$guestIdcity',zip='$guestZip',kyc_number='$guestIdNumber',kyc_type='$guestIdType',addBy='$addBy' $guestImgStrSql $guestProofStrSql where id = '$gId'";
    }


    if(mysqli_query($conDB, $sql)){
        echo 1;
    }else{
        echo 0;
    }
    
}

if($type == 'guestPhotoProofeWithWebsite'){
    $bid = $_POST['bid'];
    $serial = $_POST['serial'];
    $type = 'guestPhotoProof';
    $prameter = $type.'-'.$bid.'-'.$serial;
    $prmtr = str_openssl_enc($prameter);
    $link = GUEST_QR_CODE.'?id='.$prmtr;
    $url = 'https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl='.$link.'';
    $html = '<div id="webCamPopupFixContent">
                 <div class="closeGuestPopupFixContent"></div>
                 <div class="guestDocContent" style="max-width: 500px;">
                     <div class="closeContent">x</div>
                     <div class="content">

                         <div class="websiteContent">
                             <div class="form-group" style="display: flex;align-items: center;justify-content: center;border: 1px solid #d2d6da;border-radius: .3rem;">
                             <img src="'.$url.'">
                             </div>
                         </div>

                     </div>
                 </div>
             </div>';

    echo $html;
}

if($type == 'guestIdProofImgSubmit'){
    $file = $_FILES['file'];
    $post = $_POST;
    $bid = $post['bid'];
    $gid = $post['gid'];
    
    (getGuestDetail($bid,'', $gid)[0]['kyc_file'] == '') ? $oldImg = getGuestDetail($bid,'', $gid)[0]['kyc_file'] : $oldImg ='';


    (file_exists(SERVER_IMG.'/guestP/'.$oldImg) == 1) ? $guestImgStr = imgUploadWithData($file,'guestP',$oldImg)['img'] : $guestImgStr = imgUploadWithData($file,'guestP')['img'];
    
    if($gid != ''){
        $sql = "update guest set kyc_file = '$guestImgStr' where id = '$gid' ";
        mysqli_query($conDB, $sql);
    }   


    $data = [
        'name'=>$guestImgStr,
        'msg'=>'Successfull update guest image',
    ];

    echo json_encode($data);
}

if($type == 'guestPhotoWithWebsite'){
    $bid = $_POST['bid'];
    $serial = $_POST['serial'];
    $type = 'guestPhoto';
    $prameter = $type.'-'.$bid.'-'.$serial;
    $prmtr = str_openssl_enc($prameter);
    $link = GUEST_QR_CODE.'?id='.$prmtr;
    $url = 'https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl='.$link.'';
    $html = '<div id="webCamPopupFixContent">
                 <div class="closeGuestPopupFixContent"></div>
                 <div class="guestDocContent" style="max-width: 500px;">
                     <div class="closeContent">x</div>
                     <div class="content">

                         <div class="websiteContent">
                             <div class="form-group" style="display: flex;align-items: center;justify-content: center;border: 1px solid #d2d6da;border-radius: .3rem;">
                             <img src="'.$url.'">
                             </div>
                         </div>

                     </div>
                 </div>
             </div>';

    echo $html;
}

if($type == 'guestIdImgSubmit'){
    $file = $_FILES['file'];
    $post = $_POST;
    $bid = $post['bid'];
    $gid = $post['gid'];

    (getGuestDetail($bid,'', $gid)[0]['image'] == '') ? $oldImg = getGuestDetail($bid,'', $gid)[0]['image'] : $oldImg ='';
    

    (file_exists(SERVER_IMG.'/guest/'.$oldImg) == 1) ? $guestImgStr = imgUploadWithData($file,'guest',$oldImg)['img'] : $guestImgStr = imgUploadWithData($file,'guest')['img'];
    
   
    if($gid != ''){
        $sql = "update guest set image = '$guestImgStr' where id = '$gid'";
        mysqli_query($conDB, $sql);
    }

    $data = [
        'name'=>$guestImgStr,
        'msg'=>'Successfull update guest image',
    ];

    echo json_encode($data);
}




?>