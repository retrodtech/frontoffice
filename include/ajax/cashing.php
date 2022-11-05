<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
// pr($_POST);
$hotelId = $_SESSION['HOTEL_ID'];

$type = $_POST['type'];

$cashingType = isset($_POST['cashingType']) ? $_POST['cashingType']:'';

$cashingTitleArry = [
    'cashiering'=>'Cashiering center',
    'company'=>'Company',
    'sales'=>'Sales Person',
    'travel'=>'Travel person',
]; 


$cashingTitle = $cashingTitleArry[$cashingType];

function cashingAddForm($rnid = ''){
    global $conDB;
    global $cashingType;
    global $cashingTitle;
    
    $formId = 'addCashingForm';
    $salesNameValue =  '';
    $roomNumBtn = "Add $cashingType";
    $updateSalesHtml = '';

    $contactPersonName = '';
    $contactPersonEmail = '';
    $contactPersonNumber = '';

    $bseOption = '';
    foreach(getBookingSource() as $bsList){
        $name = $bsList['name'];
        $id = $bsList['id'];
        $img = $bsList['img'];
        $bseOption .= "<option value='$id'>$name</option>";
    }

    if($rnid != ''){
        $row = mysqli_fetch_assoc(mysqli_query($conDB, "select * from cashiering where id = '$rnid'"));
        $formId = 'updateCashingForm';       
        $salesNameValue = $row['name'];
        $roomNumBtn = "Update $cashingType";
        $updateSalesHtml = '<input type="hidden" name="salesId" value="'.$rnid.'" required>';

        $contactPersonName = $row['contactPerson'];
        $contactPersonEmail = $row['phone'];
        $contactPersonNumber = $row['email'];
    }

    $html ='
        <form action="" method="post" id="'.$formId.'">
            <div class="form-group">
                <label for="salePersonName">'.$cashingTitle.' Name</label>
                <input type="text" class="form-control" name="salePersonName" id="salePersonName" value="'.$salesNameValue.'" required>
            </div>
            '.$updateSalesHtml.'
            <div class="form-group">
                <label for="bs">Booking Source</label>
                <select class="form-control" name="bs" id="bs">
                    '.$bseOption.'
                </select>
            </div>
            
            <h4>Contact Persion Detail</h4>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="contactPersonName">Contact Person Name</label>
                    <input type="text" class="form-control" name="contactPersonName" placeholder="Enter Name" id="contactPersonName" value="'.$contactPersonName.'">
                </div>
                <div class="col-md-4">
                    <label for="contactPersonEmail">Contact Person Email</label>
                    <input type="text" class="form-control" name="contactPersonEmail" placeholder="Enter Email Id" id="contactPersonEmail" value="'.$contactPersonEmail.'">
                </div>
                <div class="col-md-4">
                    <label for="contactPersonNumber">Contact Person Number</label>
                    <input type="text" class="form-control" name="contactPersonNumber" placeholder="Enter Number" id="contactPersonNumber" value="'.$contactPersonNumber.'">
                </div>
            </div>

            <button type="submit" class="btn bg-gradient-primary">'.$roomNumBtn.'</button>
        </form>
    ';

    return $html;
}

function formDataInsert($bs,$salePersonName,$contactPersonName,$contactPersonNumber,$contactPersonEmail,$cashingType,$addBy, $cId = ''){
   
    global $conDB;
    global $cashingType;
    global $cashingTitle;
    $hId = $_SESSION['HOTEL_ID'];
    
    if($cId != ''){
        $sql = "update cashiering set bookingSource = '$bs', name='$salePersonName',contactPerson='$contactPersonName',phone='$contactPersonNumber',email='$contactPersonEmail',type='$cashingType',addBy='$addBy' where id = '$cId'";
    }else{
        $sql = "insert into cashiering(hotelId,bookingSource,name,contactPerson,phone,email,type,addBy) values('$hId','$bs','$salePersonName','$contactPersonName','$contactPersonNumber','$contactPersonEmail','$cashingType','$addBy')";
    }
    
    
    if(mysqli_query($conDB, $sql)){
        echo 1;
    }else{
        echo 0;
    }

}


if($type == 'loadCashing'){
    global $conDB;
    

    $html = '<table class="table align-items-center mb-0 tableLine" ><tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sl</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Person</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
            </tr>';

   
    
            $si = 0;
       
            $sql = mysqli_query($conDB, "select * from cashiering where deleteRec = '1' and hotelId = '$hotelId' and type = '$cashingType'");
            if(mysqli_num_rows($sql) > 0){
                while($row = mysqli_fetch_assoc($sql)){
                    $si++;
                    $id = $row['id'];

                    $name = $row['id'];
                    $time = formatingDate($row['addOn']);

                    if($row['status'] == 1){
                        $status = "<a class='tableIcon status bg-gradient-success deactive' href='javascript:void(0)' data-rnid='$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Deactive'><i class='far fa-eye'></i></a>";
                    }else{
                        $status = "<a class='tableIcon status bg-gradient-warning  active' href='javascript:void(0)' data-rnid='$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Active'><i class='far fa-eye-slash'></i></a>";
                    }

                    $delete = "<a class='tableIcon delete bg-gradient-danger' href='javascript:void(0)' data-rnid='$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                    $update = "<a class='tableIcon update bg-gradient-info' href='javascript:void(0)' data-rnid='$id' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Edit'><i class='far fa-edit'></i></a>";
                    
                    $html .= "<tr>

                                <td class='center mb-0 bold'>{$si}</td>
                                <td class='center mb-0 bold'>{$row['name']}</td>
                                <td class='center mb-0 bold'>{$row['contactPerson']} <br/> {$row['phone']} <br/> {$row['email']}</td>
                                <td>
                                    <div class='tableCenter'>
                                        <span class='tableHide'><i class='fas fa-ellipsis-h'></i></span>
                                        <span class='tableHoverShow'>
                                            $status
                                            $update
                                            $delete
                                        </span>
                                    </div>
                                    
                                </td>
                            </tr>";
                }
            }else{
                $html .= "
                    
                <tr>
                    <td calspan='7'>No Data</td>
                </tr>
            
            ";
            }

            $html .= "</table>";

            echo $html;
}


if($type == 'addCashingForm'){
    echo cashingAddForm();
}


if($type == 'submitCashing'){
    
    $salePersonName = $_POST['salePersonName'];
    $bs = $_POST['bs'];
    
    $aId = $_SESSION['ADMIN_ID'];

    $contactPersonName = $_POST['contactPersonName'];
    $contactPersonEmail = $_POST['contactPersonEmail'];
    $contactPersonNumber = $_POST['contactPersonNumber'];

    $currentDate = date('d-m-Y');
    $addBy = $aId.'_'.$currentDate;
    
    formDataInsert($bs,$salePersonName,$contactPersonName,$contactPersonNumber,$contactPersonEmail,$cashingType,$addBy);
    
} 


if($type == 'statusUpdate'){
    $sid = $_POST['rnid'];

    $sql = mysqli_fetch_assoc(mysqli_query($conDB, "select * from cashiering where id='$sid'"));
    if($sql['status'] == 1){
        $query = "update cashiering set status = '0' where id='$sid'";
    }else{
        $query = "update cashiering set status = '1' where id='$sid'";          
    }

    if(mysqli_query($conDB, $query)){
        echo 1;
    }else{
        echo 0;
    }

}

if($type == 'deleteRoomNumber'){
    $did = $_POST['rnid']; 
    $sql = "update cashiering set deleteRec = '0' where id='$did'";
    if (mysqli_query($conDB, $sql)) {
        echo 1;
    }else{
        echo 0;
    }
}

if($type == 'editCashingForm'){
    $hid = $_POST['rnid'];
    echo cashingAddForm($hid);
}


if($type == 'updateCashing'){

    $salePersonName = $_POST['salePersonName'];
    $bs = $_POST['bs'];
    $hId = $_SESSION['HOTEL_ID'];
    $aId = $_SESSION['ADMIN_ID'];

    $contactPersonName = $_POST['contactPersonName'];
    $contactPersonEmail = $_POST['contactPersonEmail'];
    $contactPersonNumber = $_POST['contactPersonNumber'];

    $salesId = $_POST['salesId'];

    $currentDate = date('d-m-Y');
    $addBy = $aId.'_'.$currentDate;
    
    formDataInsert($bs,$salePersonName,$contactPersonName,$contactPersonNumber,$contactPersonEmail,$cashingType,$addBy,$salesId);
    
} 


?>