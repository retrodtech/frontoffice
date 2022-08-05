<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
include (SERVER_INCLUDE_PATH.'add_to_room.php');
$obj = new add_to_room(); 
// pr($_POST);
if(!empty($_POST['datepicker'])){
    // $current_date = strtotime(date('y-m-d'));
    $date = $_POST['datepicker'];
    $dateArr = explode('/',$date);
    $dateStr = $dateArr['2'].-$dateArr['0'].-$dateArr['1'];
    $current_date = strtotime($dateStr);

}else{
    $current_date = strtotime(date('y-m-d'));
}
$oneDay = strtotime('1 day 30 second', 0);




if($_POST['inventoryAction'] == 'rate'){
    
?>

<ul class="accordion">

    <table>
        <tr>
            <th>Sl.</th>
            <th width="200">Rate Plan</th>
            <?php
            
                $oneDay = strtotime('1 day 30 second', 0);

                for($i=1;$i<=10;$i++){
                    $day = $current_date + ($i * $oneDay) - $oneDay;
                    $inDay = date('y-m-d', $day);
                    $inDay = date('d-M', $day);
                    echo "
                        <th>$inDay</th>
                    ";
                }

            ?>
        </tr>
        </table>
        
        <?php
            $si = 0;
            $sql = mysqli_query($conDB, "select * from room");
            $rowCount = 0;
            if(mysqli_num_rows($sql)>0){
                while($row = mysqli_fetch_assoc($sql)){
                    $rowCount ++;
                    $room_id = $row['id'];
                    $si++; 
                    $getRatePlanByRoomId = getRatePlanByRoomId($room_id);
                   if($rowCount == 1){
                       $show = 'show';
                       $display = 'style="display: block"';
                   }else{
                    $show = '';
                    $display = '';
                   }; ?>

                   
                   <li>
                       <a class="toggle" href=#><?php echo $si." ". $row['header'] ?></a>
                       <div class="inner <?php echo $show ?>" <?php echo $display ?>> 
                        <table class="table_hover">
                       <?php 
                       $sl2 =0;
                       foreach($getRatePlanByRoomId as $key=>$val){
                           $sl2++;
                            $rdid = $getRatePlanByRoomId[$key]['id'];
                            
                            ?>
                            <tr>
                                <td class="center">
                                   <b> <?php echo $sl2 ?></b>
                                    
                                </td>
                                <td width="200">
                                    <span style="margin-bottom: 5px;"><?php echo $getRatePlanByRoomId[$key]['title'] ?></span>
                                    <span>
                                        <img class="rate_update in_btn edit" data-id="<?php echo $rdid ?>" data-rid="<?php echo $room_id ?>" src="<?php echo FRONT_SITE_IMG.'/icon/edit.png' ?>" alt="">
                                        <img class="reload_rate in_btn remove" data-id="<?php echo $rdid ?>" data-rid="<?php echo $room_id ?>" src="<?php echo FRONT_SITE_IMG.'/icon/reload.png' ?>" alt="">
                                    </span>
                                </td>
                                <?php
                                
                                

                                
                                for($i=1;$i<=10;$i++){
                                    $day = $current_date + ($i * $oneDay) - $oneDay;
                                    $active = 1;
                                    $price = getRoomPriceById($rdid,date('y-m-d',$day),date('y-m-d',$day));
                                    echo "
                                        <td class='center'>
                                            <span>$price</span>
                                        </td>
                                    ";
                                } 
                            
                                
                                ?>

                            </tr>

                    <?php  } ?> </table>
                       </div>
                       </p>
                   </li> <?php

                }

            }
        ?>
   

    </ul>


<?php }else{ ?>

    <table class="table_hover">
        <tr>
            <th>Sl.</th>
            <th>Room</th>
            <?php
            

                for($i=1;$i<=10;$i++){
                    
                    $day = $current_date + ($i * $oneDay) - $oneDay;
                    $inDay = date('d-M', $day);
                    echo "
                        <th>$inDay</th>
                    ";
                }

            ?>
        </tr>
        <?php
            $si = 0;
            $sql = mysqli_query($conDB, "select * from room");
            if(mysqli_num_rows($sql)>0){
                while($row = mysqli_fetch_assoc($sql)){
                    $room_id = $row['id'];
                    $si++; ?>
                        <tr>
                        <td class="center">
                            <span><b><?php echo $si ?></b></span>
                            
                        </td>
                        <td>
                            <span class="mb5"><?php echo $row['header'] ?></span>
                            <span>
                                <img class="room_update in_btn edit" data-id="<?php echo $room_id ?>" src="<?php echo FRONT_SITE_IMG.'/icon/edit.png' ?>" alt="">
                                <img class="room_reload in_btn remove" data-id="<?php echo $room_id ?>" src="<?php echo FRONT_SITE_IMG.'/icon/reload.png' ?>" alt="">
                            </span>
                        </td>
                        <?php
                        
                        $oneDay = strtotime('1 day 30 second', 0);
                        for($i=1;$i<=10;$i++){
                            $day = $current_date + ($i * $oneDay) - $oneDay;
                            $room = roomExist($room_id,date('Y-m-d',$day),date('Y-m-d',$current_date + ($i * $oneDay)));
                            $active = 1;
                            $countBookRoom = countTotalBooking($room_id,date('Y-m-d',$day),date('Y-m-d',$current_date + ($i * $oneDay)));
                            $bookRoom = "<span class='bookRoom'>".$countBookRoom."</span>";
                            if($countBookRoom == ''){
                                $bookRoom = '';
                            }
                            echo "
                                <td class='center'>
                                    <span>$room</span>
                                    $bookRoom
                                </td>
                            ";
                        }
                        
                        ?>
                    </tr>
                <?php }
            }
        ?>
    </table>


<?php } ?>