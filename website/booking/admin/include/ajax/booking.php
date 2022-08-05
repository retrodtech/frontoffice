<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
include (SERVER_INCLUDE_PATH.'add_to_room.php');
$obj = new add_to_room();

$type = $_POST['type'];


if($type == 'load_book'){
    $si = 0;
    $sql = "select * from booking where id !=''";
    if(isset($_POST['date'])){
        $date = $_POST['date'];
        $dateArr = explode('/',$date);
        $dateStr = $dateArr['2'].-$dateArr['0'].-$dateArr['1'];
        $sql .= " and checkIn<='{$dateStr}' and checkOut>='{$dateStr}'";
    }
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $sql .= " and name LIKE '%$search%' or email LIKE '%$search%' or bookinId LIKE '%$search%' or payment_id LIKE '%$search%'";
    }
    
    
    
    $limit_per_page = 10;
    $page = '';
    if(isset($_POST['page_no'])){
        $page = $_POST['page_no'];
    }else{
        $page = 1;
    }
    
    $offset = ($page -1) * $limit_per_page;
    
    $sql .= " ORDER BY `id` DESC limit {$offset}, {$limit_per_page}";
 
    $query = mysqli_query($conDB, $sql);
// echo $sql;
//     die();
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $bookId = getBookingNumberById($row['id']);
            $si ++;
            $time = formatingDate($row['checkIn']);
            if($row['payment_status'] == 'complete'){
                $pay_status = '<span class="success btn2">Success</span>';
            }else{
                $pay_status = '<span class="failed btn2">Failed</span>';
            }
            $url = FRONT_BOOKING_SITE."/admin/booking.php?remove={$row['id']}";
            
            if($row['status'] == '0'){
                $remove = 'class="remove"';
            }else{
                $remove = '';
            }
            
            if($row['payment_status'] == 'complete'){
                $remove_book = '';
                $email = "<a href='$invoice_email'><img style='padding: 2px;display: block;width: 20px;' src='img/icon/email2.png' ></a>";
            }else{
                if($row['status'] == '1'){
                    $remove_book = "<a href='$url'>
                    <img style='width:25px;padding: 10px 0px;' src='img/icon/delete.png'></a>";
                }else{
                    $remove_book = '';
                }
                $email = '';
            }
            $room_name = getRoomNameById($row['room_id']);
            $rate_plane = getRatePlanByRoomDetailId($row['room_detail_id']);
            $invoice = FRONT_BOOKING_SITE .'/download_invoice.php?oid='.  $row['id'] ;
            $invoice_email = FRONT_BOOKING_SITE .'/email_send.php?oid='.  $row['id'] ;
            if($row['company_name'] == ''){
                $company = 'N/A';
            }else{
                $company= $row['company_name'];
            }
            if($row['gst'] == ''){
                $gst = 'N/A';
            }else{
                $gst= $row['gst'];
            }
            echo "

                <tr $remove>
                
                    <td style='text-align:center'> 
                        <span class='no_box'><b>$si</b></span> 
                        <span style='display: flex;padding: 10px 0 0;'>
                            <a href='$invoice'><img style='display: block;width: 20px;' src='img/icon/pdf.png'></a>
                            $email
                        </span>
                    </td>
                    <td class='center'> $bookId $remove_book </td>
                    <td class='center'> {$row['name']} </td>
                    <td class='center'> {$row['email']} </td>
                    <td class='center'> {$row['phone']} </td>
                     <td class='center'> $company </td>
                      <td class='center'> $gst </td>
                    <td class='center'> $room_name </td>
                    <td class='center'> $rate_plane </td>
                    <td class='center'> {$row['no_room']} </td>
                    <td class='center'> {$row['adult']} </td>
                    <td class='center'> {$row['child']} </td>
                    <td class='center'> {$row['night']} </td>
                    <td class='center'> {$row['checkIn']} </td>
                    <td class='center'> {$row['checkOut']} </td>
                    <td class='center'> {$row['price']} </td>
                    <td class='center'> $pay_status </td>
                    <td class='center'> {$row['payment_id']} </td>
                
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
}

?>