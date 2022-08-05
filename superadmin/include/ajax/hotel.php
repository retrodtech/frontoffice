<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

$type = $_POST['type'];

if($type== 'addHotelForm'){
    $btnAction = 'Add Hotel';
    $hotelName = '';
    $emailId = '';
    $phoneNo = '';
    $website = '';
    $logo = '';
    $commisionCost = '';
    $paymentGetway = '';
    $userId = '';
    $password = '';

    $webBuilder = '';
    $bookingEngine = '';
    $pms = '';

    $wbCheck = '';
    $beCheck = '';
    $pmsCheck = '';
    $disabled = '';
    $imgRequired = 'required';
    $hidHtml = '';

    if(isset($_POST['hid'])){
        $hid = $_POST['hid'];
        $getData = mysqli_fetch_assoc(mysqli_query($conDB, "select * from hotel where id = '$hid'"));
        $btnAction = 'Update Hotel';
        $hotelName = $getData['name'];
        $emailId = $getData['email'];
        $phoneNo = $getData['phone'];
        $website = $getData['website'];
        $logo = $getData['logo'];
        $commisionCost = $getData['commission'];
        $paymentGetway = $getData['paymentGetway'];
        $userId = $getData['userId'];
        $password = $getData['password'];

        $webBuilder = $getData['webBilder'];
        $bookingEngine = $getData['bookingEngine'];
        $pms = $getData['pms'];
        $wbCheck = '';
        $beCheck = '';
        $pmsCheck = '';
        $disabled = 'disabled';
        if($webBuilder == 1){
            $wbCheck = 'checked';
        }

        if($bookingEngine == 1){
            $beCheck = 'checked';
        }

        if($pms == 1){
            $pmsCheck = 'checked';
        }
        $imgRequired = '';
        $hidHtml = "<input type='hidden' value='$hid' name='hid'>";

    }

    echo '
        <div class="card">
            <div class="card-header">
                <div class="dFlex">
                    <a href="javascript:void(0)" id="backAddHotelForm"><i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
            </div>
            <div class="card-body">
                <form id="hotelAddForm" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotelName" class="form-control-label">Hotel Name</label>
                                <input class="form-control" type="text" placeholder="Enter Hotel Name" id="hotelName" name="hotelName" required value="'.$hotelName.'">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailId" class="form-control-label">Email ID</label>
                                <input class="form-control" type="text" placeholder="Enter Email Id" id="emailId" name="emailId" required value="'.$emailId.'">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNo" class="form-control-label">Phone No</label>
                                <input class="form-control" type="text" placeholder="Enter Phone No" id="phoneNo" name="phoneNo" required value="'.$phoneNo.'">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website" class="form-control-label">Website</label>
                                <input class="form-control" type="text" placeholder="Enter Website" id="website" name="website" required value="'.$website.'">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="logo" class="form-control-label">Logo</label>
                                <input class="form-control" type="file"  id="logo" name="logo" accept="image/*" '.$imgRequired.'>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="commisionCost" class="form-control-label">Commission Cost</label>
                                <input class="form-control" type="text" placeholder="Enter Commission Cost" id="commisionCost" name="commisionCost" required value="'.$commisionCost.'"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paymentGetway" class="form-control-label">Payment Getway</label>
                                <select name="paymentGetway" id="paymentGetway" class="form-control">
                                    <option value="hotel">Hotel</option>
                                    <option value="retrod">Retrod</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userId" class="form-control-label">User ID</label>
                                <input class="form-control" type="text" placeholder="Enter User Id" id="userId" name="userId" required value="'.$userId.'">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input class="form-control" type="password" placeholder="Enter Password" id="password" name="password" required value="'.$password.'">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="webBuilder" name="webBuilder" value="wb" '.$wbCheck.'>
                                <label class="form-check-label" for="webBuilder">Web builder</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="bookingEngine" name="bookingEngine" value="be" '.$beCheck.'>
                                <label class="form-check-label" for="bookingEngine">Booking Engine</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="pms" name="pms" value="pms" '.$pmsCheck.'>
                                <label class="form-check-label" for="pms">PMS</label>
                            </div>
                        </div>
                    </div>
                    '.$hidHtml.'
                    <input type="hidden" value="addHotel" name="type">

                    <button class="btn btn-icon btn-3 btn-primary" type="submit">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">'.$btnAction.'</span>
                    </button>

                </form>
            </div>
        </div>
    ';
}

if($type == 'addHotel'){
   
   if(isset($_POST['hid'])){
       $hid = $_POST['hid'];
       $checkSql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from hotel where id ='$hid'"));
       $oldLogo = $checkSql['logo'];
   }
    $hotelName = safeData($_POST['hotelName']);
    $emailId = safeData($_POST['emailId']);
    $phoneNo = safeData($_POST['phoneNo']);
    $website = safeData($_POST['website']);
    $commisionCost = safeData($_POST['commisionCost']);
    $paymentGetway = safeData($_POST['paymentGetway']);
    $userId = safeData($_POST['userId']);
    $password = safeData($_POST['password']);
    $webBuilder = '';
    $bookingEngine = '';
    $pms = '';

    $currentDate = date('d-m-Y');
    $addBy = $_SESSION['SUPER_ADMIN_ID'].'_'.$currentDate;

    $hcode = unique_id(5);

    if(isset($_POST['webBuilder'])){
        $webBuilder = 1;
    }

    if(isset($_POST['bookingEngine'])){
        $bookingEngine = 1;
    }

    if(isset($_POST['pms'])){
        $pms = 1;
    }
    $checkHid = "";

    if(isset($hid)){
        $checkHid = " and id != '$hid'";
        $updateAddBy = $checkSql['addBy'].','.$addBy;

    }



    $checkUserSql = mysqli_query($conDB,"select * from hotel where userId = '$userId' $checkHid ");

    $oldUserId = '';
    if(mysqli_num_rows($checkUserSql) > 0){
        $oldUserIdRow = mysqli_fetch_assoc($checkUserSql);
        $oldUserId = $oldUserIdRow['userId'];
    }

    $checkEmailSql = mysqli_query($conDB,"select * from hotel where email = '$emailId' $checkHid ");

    if(mysqli_num_rows($checkEmailSql) > 0){
        $data=[
            'error'=>'true',
            'msg'=>'Already Email Id exist!'
        ];
        echo json_encode($data);
        die();
    }

    $checkPhoneSql = mysqli_query($conDB,"select * from hotel where phone = '$phoneNo' $checkHid ");
    if(mysqli_num_rows($checkPhoneSql) > 0){
        $data=[
            'error'=>'true',
            'msg'=>'Already Phone Number exist!'
        ];
        echo json_encode($data);
        die();
    }
    

    if( $oldUserId == $userId){
        $data=[
            'error'=>'true',
            'msg'=>'Already user id exist!'
        ];
    }else{

        if($_FILES['logo']['name'] != ''){
            $image = $_FILES['logo']['name'];
            $imgTemp = $_FILES['logo']['tmp_name'];
            $extension=array('jpeg','jpg','JPG','png','gif');
            $ext=pathinfo($image,PATHINFO_EXTENSION);
                
            if(in_array($ext,$extension)){
                $hotelNameWithReplace = str_replace(" ","_",$hotelName);
                $newfilename = $hotelNameWithReplace.'_'.rand(100,999).".".$ext;
                move_uploaded_file($imgTemp,SERVER_ADMIN_IMG.'logo/'.$newfilename);

                if(!isset($hid)){
                    $sql = "insert into hotel(hCode,name,email,phone,website,logo,commission,paymentGetway,userId,password,webBilder,bookingEngine,pms,addBy) values('$hcode','$hotelName','$emailId','$phoneNo','$website','$newfilename','$commisionCost','$paymentGetway','$userId','$password','$webBuilder','$bookingEngine','$pms','$addBy')";
                }else{
                    unlink(SERVER_ADMIN_IMG.'logo/'.$oldLogo);
                    $sql = "update hotel set name='$hotelName',email='$emailId',phone='$phoneNo',website='$website',commission='$commisionCost',paymentGetway='$paymentGetway',userId='$userId',password='$password',webBilder='$webBuilder',bookingEngine='$bookingEngine',pms='$pms',logo='$newfilename',addBy='$updateAddBy' where id = '$hid'";
                }

                

            }else{
                $data=[
                    'error'=>'true',
                    'msg'=>'Invalid Image, Please update png or jpg format.'
                ];
            }
        }else{
            if(isset($hid)){
                $sql = "update hotel set name='$hotelName',email='$emailId',phone='$phoneNo',website='$website',commission='$commisionCost',paymentGetway='$paymentGetway',userId='$userId',password='$password',webBilder='$webBuilder',bookingEngine='$bookingEngine',pms='$pms',addBy='$updateAddBy' where id = '$hid'";
            }
        }

        if(isset($sql)){
            if(mysqli_query($conDB, $sql)){
                $data=[
                    'error'=>'false',
                    'msg'=>'Successfully Add Hotel.'
                ];
            }else{
                $data=[
                    'error'=>'true',
                    'msg'=>'Something Wrong!!!'
                ];
            }
        }
        

    }

    


    echo json_encode($data);

}

if($type == 'load_hotel'){
  
    $si = 0;
    $pagination = '';
    
    echo '
    <div class="card">
        <div class="card-header">
            <div class="dFlex">
                <h4>Hotel Database</h4>
                <button class="btn btn-outline-primary" type="button" id="addHotel">
                <span class="btn-inner--icon mr8"><i class="ni ni-building"></i></span>
                <span class="btn-inner--text">Add Hotel</span>
                </button>
            </div>
        </div>
        <div class="card-body">
    <div class="table table-responsive">
        <table border="1" class="table align-items-center mb-0 tableLine">
        <tr>
            <th style="width:5%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
            <th style="width:10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
            <th style="width:10%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail</th>
            <th style="width:20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Website</th>
            <th style="width:20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Add By</th>
            <th style="width:20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Active</th>
            <th style="width:20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
        </tr>

        <tbody>
    ';
    $sql = "select * from hotel where id != ''";
        
    
    $limit_per_page = 10;
    
    $page = '';
    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }else{
        $page = 1;
    }
    
    if(isset($_POST['paymentStatus'])){
        $paymentStatus = $_POST['paymentStatus'];
        $sql .= " and booking.payment_status= '$paymentStatus'";
    }
    
    $offset = ($page -1) * $limit_per_page;
    
    $paginationSql = $sql." ORDER BY id DESC ";
    $sql .= " ORDER BY id DESC limit {$offset}, {$limit_per_page}";
    
   

    $query = mysqli_query($conDB, $sql);
    $si = $si + ($limit_per_page *  $page) - $limit_per_page;
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
          
            
            $si ++;

            $hid = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $website = $row['website'];
            $logo = $row['logo'];
            $commission = $row['commission'];
            $paymentGetway = $row['paymentGetway'];
            $webBilder = $row['webBilder'];
            $bookingEngine = $row['bookingEngine'];
            $pms = $row['pms'];

            $userId = $row['userId'];
            $password = $row['password'];
            $beLink = FO_FRONT_SITE;

            $addBy = explode(',',$row['addBy']);
            $maxAddBy = count($addBy);
            $addByValue = $addBy[$maxAddBy -1];
            $addByValueArr = explode('_',$addByValue);
            
            
            $addByHtml = getSuperAdmin($addByValueArr['0'])['name'];
            
            $imgPath = FRONT_SITE_IMG.'logo/'.$logo;

            $webBilderHtml='';
            if($webBilder == 1){
                $webBilderHtml = 'checked';
            }

            $bookingEngineHtml='';
            if($bookingEngine == 1){
                $bookingEngineHtml = 'checked';
            }

            $pmsHtml='';
            if($pms == 1){
                $pmsHtml = 'checked';
            }

            $HotelLogInUrl = $beLink.'/login.php?username='.$userId.'&pass='.$password;

            if($row['status'] == 1){
                $status = "<a class='tableIcon statusActive bg-gradient-success mr8 toolTip' href='javascript:void(0)' data-hid='$hid' data-tooltip='Deactive'><i class='far fa-eye'></i></a>";
            }else{
                $status = "<a class='tableIcon statusActive bg-gradient-warning  toolTip mr8' href='javascript:void(0)' data-hid='$hid' data-tooltip='Active'><i class='far fa-eye-slash'></i></a>";
            } 
            $update = "<a class='tableIcon updateRecord bg-gradient-info mr8 toolTip' href='javascript:void(0)' data-hid='$hid' data-tooltip='Edit'><i class='far fa-edit'></i></a>";
            
            $websiteLogin = "<a class='tableIcon login bg-gradient-secondary mr8 toolTip' href='$HotelLogInUrl' target='_black' data-hid='$hid' data-tooltip='Login'><i class='fas fa-sign-in-alt'></i></a>";
            

            
            echo "

                <tr>
                
                    <td style='text-align:center'> 
                        <span class='no_box' data-hid='$hid'> <img width='40' src='$imgPath'></span>                        
                    </td>
                    <td class='mb-0 text-sm'> $name </td>
                    <td class='mb-0 text-sm'> $email <br/> $phone </td>
                    
                    <td class='mb-0 text-sm'> $website </td>

                    <td class='mb-0 text-sm'> $addByHtml </td>
                    
                    <td class='mb-0 text-sm'> 
                    
                        <div class='form-check form-switch'>
                            <input class='form-check-input' type='checkbox' id='webBuilder' name='webBuilder' value='wb' $webBilderHtml data-hid='$hid'>
                            <label class='form-check-label' for='webBuilder'>Web builder</label>
                        </div>

                        <div class='form-check form-switch'>
                            <input class='form-check-input' type='checkbox' id='bookingEngine' name='bookingEngine' value='be' $bookingEngineHtml data-hid='$hid'>
                            <label class='form-check-label' for='bookingEngine'>Booking Engine</label>
                        </div>

                        <div class='form-check form-switch'>
                            <input class='form-check-input' type='checkbox' id='pms' name='pms' value='pms' $pmsHtml data-hid='$hid'>
                            <label class='form-check-label' for='pms'>PMS</label>
                        </div>

                    </td>
                    
                    <td class='mb-0 text-sm'> <div class='flexCenter' style='width:125px'>$status $update $websiteLogin</div> </td>
                    
                    
                   
                    
                
                </tr>
            
            ";
        }
    }else{
        echo "

                <tr>
                
                    <td colspan='13'> No Data </td>
                
                </tr>
            
            ";
    }


    $pagination = '';
    $query = mysqli_query($conDB, $paginationSql);
    $total_row = mysqli_num_rows($query);
    $total_page = ceil($total_row / 10);
    
    for($i=1;$i<=$total_page;$i++){
        
        if($page == $i){
            $pagination .= "<li class='page-item active'>
                                <a class='page-link' href='javascript:;'>$i</a>
                            </li>";
        }else{
            $pagination .= "<li class='page-item'>
                                <a class='page-link' href='javascript:;'>$i</a>
                            </li>";
        }
    }

    echo '
        </tbody>
        </table> </div>
        <div class="s25"></div>
        <ul id="pagination" class="pagination pagination-sm pagination-primary">
            '.$pagination.'
        </ul>
        </div>
        </div>
    ';
}

if($type == 'statusUpdate'){
    $hid = safeData($_POST['hid']);

    $getQuery = mysqli_fetch_assoc(mysqli_query($conDB, "select * from hotel where id = '$hid'"));
    $getStatus = $getQuery['status'];

    if($getStatus == 1){
        $sql = "update hotel set status = '0' where id = '$hid'";
    }else{
        $sql = "update hotel set status = '1' where id = '$hid'";
    }

    if(mysqli_query($conDB,$sql)){
        echo 1;
    }else{
        echo 0;
    }
}

if($type == 'webBuilderUpdate'){
    $hid = safeData($_POST['hid']);

    $getQuery = mysqli_fetch_assoc(mysqli_query($conDB, "select * from hotel where id = '$hid'"));
    $getStatus = $getQuery['webBilder'];

    if($getStatus == 1){
        $sql = "update hotel set webBilder = '0' where id = '$hid'";
    }else{
        $sql = "update hotel set webBilder = '1' where id = '$hid'";
    }

    if(mysqli_query($conDB,$sql)){
        echo 1;
    }else{
        echo 0;
    }
}

if($type == 'bookingEngineUpdate'){
    $hid = safeData($_POST['hid']);

    $getQuery = mysqli_fetch_assoc(mysqli_query($conDB, "select * from hotel where id = '$hid'"));
    $getStatus = $getQuery['bookingEngine'];

    if($getStatus == 1){
        $sql = "update hotel set bookingEngine = '0' where id = '$hid'";
    }else{
        $sql = "update hotel set bookingEngine = '1' where id = '$hid'";
    }

    if(mysqli_query($conDB,$sql)){
        echo 1;
    }else{
        echo 0;
    }
}

if($type == 'pmsUpdate'){
    $hid = safeData($_POST['hid']);

    $getQuery = mysqli_fetch_assoc(mysqli_query($conDB, "select * from hotel where id = '$hid'"));
    $getStatus = $getQuery['pms'];

    if($getStatus == 1){
        $sql = "update hotel set pms = '0' where id = '$hid'";
    }else{
        $sql = "update hotel set pms = '1' where id = '$hid'";
    }

    if(mysqli_query($conDB,$sql)){
        echo 1;
    }else{
        echo 0;
    }
}


?>