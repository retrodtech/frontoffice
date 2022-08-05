<?php

include ('../constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');
include (SERVER_INCLUDE_PATH.'add_to_room.php');
$obj = new add_to_room();
$type = $_POST['type'];

$one_day = strtotime('1 day 00 second', 0);

if($type == 'addDate'){
    $current_date = getDataBaseDate($_POST['date']);
    $time = strtotime($current_date);
}else{
       $current_date = $_SESSION['checkIn'];
}

 
    
    $time = strtotime($current_date);
    $pretime = $time - $one_day;
    $check_in = strtotime($_SESSION['checkIn']);
    for($i=1; $i<=4;$i++){ 
        $present_day = $pretime + ($i * $one_day);
        $next_day = $pretime + ($i * $one_day) - $one_day;
        // echo date('Y-m-d',$present_day);
        // echo '<br>';
        // echo date('Y-m-d',$next_day);
        // echo roomExist($_POST['id'],date('Y-m-d',$next_day),date('Y-m-d',$present_day));
        if(roomExist($_POST['id'],date('Y-m-d',$next_day),date('Y-m-d',$present_day) ) > 0){
            $checkRoomPresent = '<span style="text-align: center;display: block;padding: 10px 0 0;color: black;font-size: 11px;">Available</span>';
        }else{
            $checkRoomPresent = '<span style="text-align: center;display: block;padding: 10px 0 0;color: red;font-size: 11px;">All Rooms Booked</span>';
        }

        if($next_day == $check_in){ 
            
            ?>
            
            <div class="col-md-3">
                <a href="room_detail.php?date=<?php echo date('Y-m-d',$next_day)  ?>" class="col-3">
                            <div class="slide active">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <p class="datefld"><?php echo date('d-m-Y',$next_day)  ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="range">Starts From <span class="pricetxt">Rs. 
                                        
                                        <?php 
                                        
                                        echo getRoomLowPriceByIdWithDate($_POST['id'], date('y-m-d',$next_day),'');
                                         
                                        ?>
                                        
                                        
                                        </span></span> 
                                        <br/><?php echo $checkRoomPresent ?>
                                    
                                    </td>
                                    </tr>
                                </table>
                            </div>
                    </a>
            </div>
            
        <?php }else{ ?>

        <div class="col-md-3">
            <a href="room_detail.php?date=<?php echo date('Y-m-d',$next_day)  ?>" class="col-2">
                        <div class="slide">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <p class="datefld"><?php echo date('d-m-Y',$next_day)  ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="range">Starts From <span class="pricetxt">Rs. 
                                    
                                    <?php 
                                    
                                    echo getRoomLowPriceByIdWithDate($_POST['id'], date('y-m-d',$next_day),'');
                                     
                                    ?>
                                    
                                    </span></span>
                                    <br/><?php echo $checkRoomPresent ?>
                                </td>
                                </tr>
                            </table>
                        </div>
                </a>
        </div>

        <?php  }
        
        }

 


?>