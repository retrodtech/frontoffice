
// var webUrl = 'https://admin.retrod.in/';
var webUrl = 'http://localhost/pms/';
var loadingGif = 'http://localhost/pms/img/loading.gif';


function error($msg){
    $html = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">';
    $html += '<span class="alert-icon"><i class="fas fa-thumbs-down mr8"></i></span>';
    $html += '<span class="alert-text"><strong>Error! </strong> '+$msg+'</span>';
    $html += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">';
    $html += '   <span aria-hidden="true">&times;</span>';
    $html += '</button>';
    $html += '</div>';
    return $html;
}

function success($msg){
    $html = ' <div class="alert alert-success alert-dismissible fade show" role="alert">';
    $html += '<span class="alert-icon"><i class="ni ni-like-2 mr8"></i></span>';
    $html += '<span class="alert-text"><strong>Success! </strong> '+$msg+'</span>';
    $html += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">';
    $html += '   <span aria-hidden="true">&times;</span>';
    $html += '</button>';
    $html += '</div>';
    return $html;
}

function loadResorvation($rTab='',$search='') {

    var rTab = $rTab;
    var search = $search;

    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'load_resorvation',rTab:rTab,search:search},
        success: function (data) {
            
            $('#resorvationContent').html(data);
            reservationCountNavBar(rTab);
        }
    });

}

function convertArryToJSON($arry){
    var array = $arry;
    $.ajax({
        url: webUrl+'include/ajax/otherDetail.php' ,
        type: 'post',
        data: { type: 'convertArryToJSON', array:array },
        success: function (data) {
            $('#guestContent').html(data);
        }
    });
}

function loadGuest() {
    $.ajax({
        url: webUrl+'include/ajax/guest.php' ,
        type: 'post',
        data: { type: 'loadGuest' },
        success: function (data) {
            $('#guestContent').html(data);
        }
    });

}

function loadRoomView() {
    $.ajax({
        url: webUrl+'include/ajax/roomView.php' ,
        type: 'post',
        data: { type: 'loadRoomView' },
        success: function (data) {
            $('#roomViewContent').html(data);
        }
    });

}

function loadAddResorvation($bid = '',$page='') {
    var bid = $bid;
    var page = $page;
    
    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'load_add_resorvation',bid:bid,page:page },
        success: function (data) {
            $('#loadAddResorvation').html(data);
        }
    });
}

function loadAddGuestData() {
    $.ajax({
        url: webUrl+'include/ajax/guest.php' ,
        type: 'post',
        data: { type: 'load_add_guest' },
        success: function (data) {
            $('#loadAddGuest').html(data);
        }
    });
}

function loadBusinessSource($id){
    var id = $id;
    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'getBusinessSource',  id:id },
        success: function (data) {
            $('#businessSourceId').prop('disabled', false);
            $('#businessSourceId').html(data);
        }
    });
}

function loadRoomDetailByRoomNo(){
    
    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'getRoomDetailByRoomNo' },
        success: function (data) {
            $('#roomDetailId').append(data);
        }
    });
}

function loadReservationPreview(){
    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: $('#addReservationForm').serialize() + {type: 'loadReservationPreview'},
        success: function (data) {
            // 
            $('#loadAddResorvation .insertContrnt').html(data);
        }
    });
}

function getChildData($target,$rid, $adult=''){
    var id = $rid;
    var target = $target;
    var adult = $adult;
    
    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'getChildCountByRIdAndAdult',  id:id, adult:adult },
        success: function (data) {
            target.prop('disabled', false);
            target.html(data);
        }
    });
}

function getRoomNum($target,$rid,$checkIn='',$checkOut = ''){
    var id = $rid;
    var target = $target;
    var checkIn = $checkIn;
    var checkOut = $checkOut;
    
    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'getRoomNumByRID',  id:id, checkIn:checkIn, checkOut:checkOut},
        success: function (data) {
            target.prop('disabled', false);
            target.html(data);
        }
    });
}

function getTotalSingleRoomPrice($target,$rid,$rdid='',$checkIn='',$checkOut='',$adult='',$child='',$couponCode=''){
    var rid = $rid;
    var rdid = $rdid;
    var adult = $adult;
    var child = $child;
    var checkIn = $checkIn;
    var checkOut = $checkOut;
    var couponCode = $couponCode;
    var target = $target;

    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'getTotalSingleRoomPrice',  rid:rid, rdid:rdid, adult:adult, child:child, checkIn:checkIn,checkOut:checkOut,couponCode:couponCode },
        success: function (data) {
            target.val(data);
        }
    });
}

function showGuestDetailPopUp($roomNum = '', $bid='',$id = '',$btn = '',$rTab = ''){
    var roomNum = $roomNum;
    var bId = $bid;
    var id = $id;
    var btn = $btn;
    var rTab = $rTab;

    $('#bookindDetail .content').html('<div class="loadingIcon"><img src="'+loadingGif+'"></div>');
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type : 'post',
        data : {'type': 'showPopUpGuestDetail', roomNum:roomNum,bId:bId,id:id,btn:btn,rTab:rTab},
        success : function(data){
            $('#bookindDetail .content').html(data);
            
        }
    });
}

function loadAddGuestReservationForm($bId = '', $target, $rNum='',$gid = '',$serial='', $gustImg = '', $guestProofImg = ''){
    var bid = $bId;
    var target = $target;
    var rNum = $rNum;
    var gid = $gid;
    var serial = $serial;
    var gustImg = $gustImg;
    var guestProofImg = $guestProofImg;
    $.ajax({
        url : webUrl+'include/ajax/resorvation.php',
        type: 'post',
        data: {'type':'loadAddGuestReservationForm', bid:bid, rNum:rNum,gid:gid,serial:serial,gustImg:gustImg,guestProofImg:guestProofImg},
        success: function (data) {
            $(target).html(data);
        }
    });
}

function loadAddGuestReservationFormSubmit(){
    var formData = new FormData($('#reservationAddGuestForm')[0]);
    $.ajax({
        url : webUrl+'include/ajax/resorvation.php',
        type: 'POST',
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          enctype: 'multipart/form-data',
          processData: false,
        success: function (data) {
            swal("Good job!", "Successfull update guest details.", "success");
        }
    });
}

function closeContent($clickableId, $actionId){
    var clickableId = $clickableId;
    var actionId = $actionId;
    $(document).on('click',clickableId, function(e){
        e.preventDefault;
        $(actionId).hide();
    });
}

$(document).on('click','#configBtn',function(){
    $(this).parent().find('.dropdown-menu').toggleClass('show');
});

$(document).on('change','#roomQuntityNoId', function(){
    var roomNo = $('#roomQuntityNoId').val();
    loadRoomDetailByRoomNo(roomNo);
    loadReservationPreview();
});

$(document).on('click','.quantityMinus',function(e){
    e.preventDefault();
    loadReservationPreview();
    var input = $(this).parent().siblings();
    var value = input.val();
    if (value > 1) {
    value--;
    }
    input.val(value);
    var rowLength = $('#roomDetailId tr').length;
    if(rowLength > 1){
        $('#roomDetailId tr:last-child').remove();
    }
    
});

$(document).on('click','.quantityPlus',function(e){
    e.preventDefault();
    loadReservationPreview();
    var input = $(this).parent().siblings();
    var value = input.val();
    value++;
    input.val(value);
    loadRoomDetailByRoomNo(value);
});

$(document).on('click', '#guestDetail', function(){
    $('#popupBox').addClass('show');
});

$(document).on('click', '#popupBox .closeBox', function(){
    $('#popupBox').removeClass('show');
});

$(document).on('click', '#popupBox .closeContent', function(){
    $('#popupBox').removeClass('show');
});  

$(document).on('change','#bookngSourceId', function(){
    var id = $(this).val();
    loadBusinessSource(id);
});

$(document).on('click','#roomDetailIncBtnId', function(e){
    e.preventDefault();
    loadRoomDetailByRoomNo();
    var value = $('#roomQuntityNoId').val();
    loadReservationPreview();
    
});

$(document).on('change','.selectRoomId', function(){
    var id = $(this).val();
    var target = $(this).parent().parent().siblings().find('.rateTypeId');
    var targetAdult = $(this).parent().parent().siblings().find('.adultSelect');
    var targetChild = $(this).parent().parent().siblings().find('.childSelect');
    var targetRoomNum = $(this).parent().parent().siblings().find('.roomNumSelect');
    var targetPrice = $(this).parent().parent().siblings().find('.totalPriceSection');

    var checkIn = $('#checkIn').val();
    var checkOut = $('#checkOut').val();


    
    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'getRateTypeByRID',  id:id },
        success: function (data) {
            target.prop('disabled', false);
            target.html(data);
            loadReservationPreview();
        }
    });

    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'getAdultCountByRId',  id:id },
        success: function (data) {
            targetAdult.prop('disabled', false);
            targetAdult.html(data);
            loadReservationPreview();
        }
    });
    

    getTotalSingleRoomPrice(targetPrice,id);
    getChildData(targetChild,id);
    loadReservationPreview();
    getRoomNum(targetRoomNum,id,checkIn,checkOut);
});

$(document).on('change','.adultSelect', function(){
    var id = $(this).parent().parent().siblings().find('.selectRoomId').val();
    var target = $(this).parent().parent().siblings().find('.childSelect');
    var targetPrice = $(this).parent().parent().siblings().find('.totalPriceSection');
    var adult = $(this).val();
    
    getChildData(target,id,adult);
    getTotalSingleRoomPrice(targetPrice,id,'','','',adult);
    loadReservationPreview();

});

$(document).on('change','.childSelect', function(){ 
    var id = $(this).parent().parent().siblings().find('.selectRoomId').val();
    var child = $(this).val();
    var adult = $(this).parent().parent().siblings().find('.adultSelect').val();
    var targetPrice = $(this).parent().parent().siblings().find('.totalPriceSection');
    
    getTotalSingleRoomPrice(targetPrice,id,'','','',adult,child);
    loadReservationPreview();
});

$(document).on('change', '#guestName', function(){
    loadReservationPreview();
});

$(document).on('click','#backBtnForPoupUpContent', function(e){
    e.preventDefault();
    $('#loadAddResorvation').html('').hide();
}); 

$(document).on('click','#searchBtnReservation',function(e){
    e.preventDefault();
    $('#searchForReservation').css('display','inline-flex');
});

$(document).on('click','#searchForCloseBtn',function(e){
    e.preventDefault();
    $('#searchForReservation').hide();
    $('#searchForReservationValue').val('');
});

$(document).on('click','#excelExport',function(e){
    e.preventDefault();
    var idName = $('.reservationTab.active').prop('id');

    $.ajax({
        url: webUrl+'include/ajax/resorvation.php' ,
        type: 'post',
        data: { type: 'generatrExcelSheet',  sheetType:idName },
        success: function (data) {
            console.log(data);
        }
    });

});

$(document).on('change','#searchForReservationValue', function(e){
    e.preventDefault();
    var searchVal = $(this).val();
    loadResorvation('',searchVal);
});

$(document).on('click','.reservationContent', function(){
    var bookingId = $(this).data('bookingid');
    var rTab = $(this).data('reservationtab');
    
    $('#bookindDetail').addClass('show');
    showGuestDetailPopUp('',bookingId, '','',rTab);

});

$(document).on('submit','#reservationAddGuestForm',function(e){
    e.preventDefault();
    loadAddGuestReservationFormSubmit();
    var bid = $(this).data('bid');
    
    showGuestDetailPopUp('','',bid);
    $('#addGestOnReservation').hide();
});

$(document).on('submit','#reservationUpdateGuestForm',function(e){
    e.preventDefault();
    loadAddGuestReservationUpdateFormSubmit();
    var bid = $(this).data('bid');
    
    showGuestDetailPopUp('','',bid);
    $('#addGestOnReservation').hide();
});

$('#addReservationBtn').click(function(){
    var page = $(this).data('page');
    
    $('#loadAddResorvation').show();
    loadAddResorvation('',page);
    loadBusinessSource(1);
    loadRoomDetailByRoomNo(1);
    loadReservationPreview();
});

$(document).on('click','#addReservationSubmitBtn',function(e){
    e.preventDefault();
    
    $.ajax({
        url: webUrl+'include/ajax/resorvationSubmit.php' ,
        type: 'post',
        data: $('#addReservationForm').serialize() ,
        success: function (data) {
            $('#loadAddResorvation').html('').hide();
            $('#addReservationForm').trigger('reset');
            swal("Good job!", "Successfull Add Reservation.", "success");

            if(data == 'reservation'){
                loadResorvation();
            } 

            if(data == 'stayView'){
                var currentDate = $.datepicker.formatDate('yy-mm-dd', new Date());
                loadStayView(currentDate);
            }

            if(data == 'roomView'){
                loadRoomView();
            }

        }
    });

});

$(document).on('click', '#excelImport', function(){
    $('#popupBox').addClass('show center');
    var html = '<form id="excelImportForm" method="post" enctype="multipart/form-data"><h4>Import CSV File</h4><div class="form-group fileInputSec"><label for="csvFile"><span><i class="fas fa-file-csv"></i></span> <strong class="fileName"></strong></label><input accept=".csv" type="file" id="csvFile" name="csvFile"></div><input class="btn bg-gradient-info excelSubmitBtn" type="submit" value="File Import"><input type="hidden" name="type" value="excelImportSubmit"></form>';
    $('#popupBox .content').html(html);
});

$(document).on('submit', '#excelImportForm', function(e){
    e.preventDefault();
    
    $.ajax({
        url: webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: new FormData($('#excelImportForm')[0]),
        async: false,
          cache: false,
          contentType: false,
          enctype: 'multipart/form-data',
          processData: false,
        success: function(data){
            alert(data);
        }
    });
});

$(document).on('change','#csvFile', function(e){
    var fileName = e.target.files[0].name;
    $('#excelImportForm .fileName').html(fileName);
});


// Room View start 

$(document).on('click','.roomContent', function(){
    var roomNumber = $(this).data('roomnumber');
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'checkRoomNumber',  roomNumber:roomNumber},
        success: function (data) {
           
            var responce = JSON.parse(data);
            if(responce.type == 'popUp'){
                var roomNum = responce.roomNo;
                
                $('#bookindDetail').addClass('show');
                showGuestDetailPopUp(roomNum);
            }

            if(responce.type == 'false'){
                $('#loadAddResorvation').show();
                loadAddResorvation('','roomView');
            }
        }
    });
});

$(document).on('click', '#bookindDetail .closeContent', function(){
    $('#bookindDetail').removeClass('show');
    $('#bookindDetail .container').html('');
});

// Reservation Btn Start

function guestPopUpBox($bid = '', $serial = '', $gid = '', $type = ''){
    var bid = $bid;
    var serial = $serial;
    var type = $type;
    var gid = $gid;
    
    var html = '<div id="guestPopupFixContent" class="'+type+'">'+
                '<div class="closeGuestPopupFixContent"></div>'+
                '<div class="guestDocContent">'+
                    '<div class="closeContent">x</div>'+
                    '<div class="content">'+
                        '<div class="dFlex jcsb">'+
                            '<div id="guestPhotoWithWebCam" data-bid="'+bid+'" data-serial="'+serial+'" data-gid="'+gid+'" class="leftSide"><i class="fas fa-camera"></i> <span>Webcam</span></div>'+
                            '<div id="guestPhotoWithWebsite" data-bid="'+bid+'" data-serial="'+serial+'" data-gid="'+gid+'" class="rightSide"><i class="fas fa-qrcode"></i> <span>QR Code</span></div>'+
                        '</div>'+
                        '<div class="dFlex">'+
                                '<div class="inputField">'+
                                    '<label for="guestIdProofImg"><span>Choose Guest Proof Image</span></label>'+
                                    '<input type="file" data-bid="'+bid+'" data-gid="'+gid+'" accept="image/gif, image/jpeg, image/png" data-serial="'+serial+'" name="guestIdProofImg" id="guestIdProofImg">'+
                                '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            +'</div>';

    return html;
};

var webcamScript ='https://unpkg.com/webcam-easy/dist/webcam-easy.min.js';

$(document).on('click','#checkInStatus', function(){
    var roomNumber = $(this).data('roomnum');
    var rTab = $(this).data('reservationtab');
    var rBID = $(this).data('bookingid');
    
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'checkRoomCheckIn', roomNumber:roomNumber, rBID:rBID},
        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
            var status = result.status;
            var msg = result.msg;
            if(status == 1){
                swal("Good job!", "Successfull "+msg+" guest.", "success");
                loadResorvation(rTab);
                showGuestDetailPopUp(roomNumber);
            }
        }
    });
}); 

$(document).on('click', '#paymentBtn', function(){
    var roomNumber = $(this).data('roomnum');
    var rTab = $(this).data('reservationtab');
    var rBID = $(this).data('bookingid');

    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'paymentBtnClick', roomNumber:roomNumber, rTab:rTab,rBID:rBID},
        success: function (data) {
            $('#bookingOtherDetail').show();
            $('#bookingOtherDetail').html(data);
            
        }
    });
}); 

$(document).on('click', '#printBtn', function(){
    var roomNumber = $(this).data('roomnum');
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'printBtnClick', roomNumber:roomNumber},
        success: function (data) {
            $('#bookingOtherDetail').show();
            $('#bookingOtherDetail').html(data);
        }
    });
});  

$(document).on('click', '#checkInOutBtn', function(){
    var roomNumber = $(this).data('roomnum');
    var rTab = $(this).data('reservationtab');
    var rBID = $(this).data('bookingid');
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'checkInOutBtnClick', roomNumber:roomNumber,rTab:rTab,rBID:rBID},
        success: function (data) {
            $('#bookingOtherDetail').show();
            $('#bookingOtherDetail').html(data);
        }
    });
});

$(document).on('click', '#roomMoveBtn', function(){
    var roomNumber = $(this).data('roomnum');
    var rTab = $(this).data('reservationtab');
    var rBID = $(this).data('bookingid');
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'roomMoveBtnClick', roomNumber:roomNumber,rTab:rTab,rBID:rBID},
        success: function (data) {
            $('#bookingOtherDetail').show();
            $('#bookingOtherDetail').html(data);
        }
    });
});

$(document).on('click', '#cancleReservation', function(){
    var roomNumber = $(this).data('roomnum');
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this room record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            function deleteRoomNumber(){
                $.ajax({
                    url: 'include/ajax/room.php',
                    type: 'post',
                    data: {type: 'deleteRoomRecord', roomNumber : roomNumber},
                    success: function (data) {
                        if(data == 1){
                            loadResorvation();
                            swal("Poof! Your room record has been deleted!", {
                                icon: "success",
                            });
                        }else {
                            swal("Your room record is safe!");
                        }
                    }
                });
            }
            
            if (willDelete) {
                deleteRoomNumber();
            } else {
                swal("Your room number record is safe!");
            }
            
        });
});

$(document).on('change', '#chooseRoomForMove', function(){
    var roomId = $(this).val();
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'chooseRoomForMoveClick', roomId:roomId},
        success: function (data) {
            $('#chooseRoomTypeForMove').html(data);
        }
    });

    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: { type: 'chooseRAtePlaneForMoveClick', roomId:roomId},
        success: function (data) {
            $('#chooseRatePlaneForMove').html(data);
        }
    });
});

$(document).on('submit', '#paymentBtnClickForm', function(e){
    e.preventDefault();
    var roomNum = $('#guestRoomNum').val();
    var rTab = $('#reservationtab').val();

    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: $('#paymentBtnClickForm').serialize(),
        success: function (data) {

            if(data == 1){
                swal("Good job!", "Successfull add amount.", "success");

                $('#bookindDetail').removeClass('show');
                loadResorvation(rTab);
                loadRoomView();
            }
            if(data == 0){
                var alertData = error('Something Error');
            }

            $('#alertCon').html(alertData);
        }
    });

});

$(document).on('submit', '#checkInOutBtnClickForm', function(e){
    e.preventDefault();
    var roomNum = $('#checkInRoomNum').val();
    var rTab = $('#rTabType').val();
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: $('#checkInOutBtnClickForm').serialize(),
        success: function (data) {
            if(data == 1){
                swal("Good job!", "Successfull update stay date.", "success");
                $('#bookindDetail').removeClass('show');
                loadResorvation(rTab);
                loadRoomView();
            }
            if(data == 0){
                var alertData = error('Something Error');
            }

            $('#alertCon').html(alertData);
        }
    });

});

$(document).on('submit', '#roomMoveBtnClickForm', function(e){
    e.preventDefault();
    var roomNum = $('#moveRoomNum').val();
    var rTab = $(this).data('reservationtab');
    $.ajax({
        url : webUrl+'include/ajax/roomView.php',
        type: 'post',
        data: $('#roomMoveBtnClickForm').serialize(),
        success: function (data) {
            if(data == 1){
                swal("Good job!", "Successfull remove room.", "success");
                $('#bookindDetail').removeClass('show');
                loadResorvation(rTab);
                loadRoomView();
            }
            if(data == 0){
                var alertData = error('Something Error');
            }

            $('#alertCon').html(alertData);
        }
    });

});

$(document).on('click', '.removeRoomView', function(){
    $('.bookingOtherDetail').html('').hide();
});

$(document).on('click','#addGustBtn', function(){
    $('#addGestOnReservation').show();
     var bid = $(this).data('bookingid');
     var rNum = $(this).data('roomnum');
    
    loadAddGuestReservationForm(bid,'#addGestOnReservation .content',rNum);

});

$(document).on('click','.editGuest',function(){
    var roomNum = $(this).data('roomnum');
    var bid = $(this).data('bid');
    var gid = $(this).data('id');
    $('#addGestOnReservation').show();
    loadAddGuestReservationForm(bid,'#addGestOnReservation .content',roomNum,gid);
    
});

$(document).on('click','#addGestOnReservation .closeContent', function(){
    $('#addGestOnReservation').hide();
});

$(document).on('click','#addGestOnReservation .closeGuestSec', function(){
    $('#addGestOnReservation').hide();
});

$(document).on('click', '.guestProofImgSec', function(){
    var bid = $(this).data('bid');
    var serial = $(this).data('serial');
    var gid = $(this).data('gid');
    
    var html = guestPopUpBox(bid, serial,gid, 'proof');
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = webcamScript;
    $("head").append(s);
    $('body').append(html);
});

$(document).on('click', '.proof #guestPhotoWithWebCam', function(){

    var html = '<div id="webCamPopupFixContent">'+
                '<div class="closeGuestPopupFixContent"></div>'+
                '<div class="guestDocContent">'+
                    '<div class="closeContent">x</div>'+
                    '<div class="content">'+
                        '<div class="webCamContent">'+
                            '<video id="webcam" autoplay playsinline height="250px"></video>'+
                            '<canvas id="canvas" class="d-none"></canvas>'+
                            '<audio id="snapSound" src="audio/snap.wav" preload="auto"></audio>'+
                        '</div>'+
                    
                        '<div class="btnGroup">'+
                            '<button id="startWebCamBtn" class="pinkBtn">Sart Cam</button>'+
                            '<button id="captureWebCamBtn" class="disabled greenBtn">Capture</button>'+
                            '<button id="SaveWebCamBtn" class="disabled yellowBtn">Save Image</button>'+
                            '<button id="stopWebCamBtn" class="disabled redBtn">stop</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            +'</div>';

    $('body').append(html);
});

$(document).on('click', '.proof #startWebCamBtn', function(){
    const webcamElement = document.getElementById("webcam");
    const canvasElement = document.getElementById("canvas");
    const snapSoundElement = document.getElementById("snapSound");
    const webcam = new Webcam(
    webcamElement,
    "user",
    canvasElement,
    snapSoundElement
    );
    $('#captureWebCamBtn').removeClass('disabled');
    $('#stopWebCamBtn').removeClass('disabled');
    webcam.start().then((result) => {
              console.log("webcam started");
            }).catch((err) => {
              console.log(err);
            });

});

$(document).on('click', '.proof #captureWebCamBtn', function(){
    if($(this).hasClass('disabled')){
        alert('Please start the webcam');
    }else{
        const webcamElement = document.getElementById("webcam");
        const canvasElement = document.getElementById("canvas");
        const snapSoundElement = document.getElementById("snapSound");
        const webcam = new Webcam(
            webcamElement,
            "user",
            canvasElement,
            snapSoundElement
            );
            $('#SaveWebCamBtn').removeClass('disabled');
        webcam.snap();
    }
    
});

$(document).on('click', '.proof #SaveWebCamBtn', function(){
    if($(this).hasClass('disabled')){
        alert('Please Capture Image.');
    }else{
        const webcamElement = document.getElementById("webcam");
        const canvasElement = document.getElementById("canvas");
        const snapSoundElement = document.getElementById("snapSound");
        const webcam = new Webcam(
            webcamElement,
            "user",
            canvasElement,
            snapSoundElement
            );
        var canvas = document.getElementById("canvas");
        image = canvas
        .toDataURL("image/png", 1.0)
        .replace("image/png", "image/octet-stream");
        var link = document.createElement("a");
        link.download = "my-image.png";
        link.href = image;
        link.click();
    }
    
});

$(document).on('click', '.proof #stopWebCamBtn', function(){
    if($(this).hasClass('disabled')){
        alert('Please start the webcam');
    }else{
        const webcamElement = document.getElementById("webcam");
        const canvasElement = document.getElementById("canvas");
        const snapSoundElement = document.getElementById("snapSound");
        const webcam = new Webcam(
                webcamElement,
                "user",
                canvasElement,
                snapSoundElement
            );
        webcam.stop();
    }
    
});

$(document).on('click','#webCamPopupFixContent .closeContent', function(){
    $('#webCamPopupFixContent').remove();
    $('head script[src*="'+webcamScript+'"]').remove();
});

$(document).on('click','#webCamPopupFixContent .closeGuestPopupFixContent', function(){
    $('#webCamPopupFixContent').remove();
    $('head script[src*="'+webcamScript+'"]').remove();
});

$(document).on('click','#guestPopupFixContent .closeContent', function(){
    $('#guestPopupFixContent').remove();
});

$(document).on('click','#guestPopupFixContent .closeGuestPopupFixContent', function(){
    $('#guestPopupFixContent').remove();
});

$(document).on('click', '#guestPhotoWithWebsite', function(){
    var bid = $(this).data('bid');
    var serial = $(this).data('serial');

    $.ajax({
        url : webUrl+'include/ajax/resorvation.php',
        type: 'post',
        data: { type: 'guestPhotoProofeWithWebsite', bid:bid, serial:serial},
        success: function (data) {
            $('body').append(data);
        }
    });
    
});

$(document).on('change', '.proof #guestIdProofImg', function(){

    var property = document.getElementById('guestIdProofImg').files[0];
    var image_name = property.name;
    var image_extension = image_name.split('.').pop().toLowerCase();
    var url = 'include/ajax/resorvation.php';
    if (jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1) {
        $('#msg').html('Invalid image file');
        return false;
    }
    var form_data = new FormData();
    var bid = $(this).data('bid');
    var serial = $(this).data('serial');
    var gid = $(this).data('gid');
    form_data.append("file", property);
    form_data.append("type", 'guestIdProofImgSubmit');
    form_data.append("bid", bid);
    form_data.append("serial", serial);
    form_data.append("gid", gid);

    $.ajax({
        url: url,
        method: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#msg').html('Loading......');
        },
        success: function(data) {

        $result = JSON.parse(data);
        var guestPImg = $result.name;
        $('#guestPopupFixContent').remove();
        var guestImg = $('.guestImgSec img').data('img');
        loadAddGuestReservationForm(bid,'#addGestOnReservation .content','',gid,serial,guestImg, guestPImg);

        }
    });
    
});

$(document).on('click', '.guestImgSec', function(){
    var bid = $(this).data('bid');
    var serial = $(this).data('serial');
    var gid = $(this).data('gid');
  
    var html = guestPopUpBox(bid, serial,gid, 'guestImg');
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = webcamScript;
    $("head").append(s);
    $('body').append(html);
});

$(document).on('click', '.guestImg #guestPhotoWithWebCam', function(){

    var html = '<div id="webCamPopupFixContent">'+
                '<div class="closeGuestPopupFixContent"></div>'+
                '<div class="guestDocContent">'+
                    '<div class="closeContent">x</div>'+
                    '<div class="content">'+
                        '<div class="webCamContent">'+
                            '<video id="webcam" autoplay playsinline height="250px"></video>'+
                            '<canvas id="canvas" class="d-none"></canvas>'+
                            '<audio id="snapSound" src="audio/snap.wav" preload="auto"></audio>'+
                        '</div>'+
                    
                        '<div class="btnGroup">'+
                            '<button id="startWebCamBtn" class="pinkBtn">Sart Cam</button>'+
                            '<button id="captureWebCamBtn" class="disabled greenBtn">Capture</button>'+
                            '<button id="SaveWebCamBtn" class="disabled yellowBtn">Save Image</button>'+
                            '<button id="stopWebCamBtn" class="disabled redBtn">stop</button>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            +'</div>';

    $('body').append(html);
});

$(document).on('click', '.guestImg #startWebCamBtn', function(){
    const webcamElement = document.getElementById("webcam");
    const canvasElement = document.getElementById("canvas");
    const snapSoundElement = document.getElementById("snapSound");
    const webcam = new Webcam(
    webcamElement,
    "user",
    canvasElement,
    snapSoundElement
    );
    $('#captureWebCamBtn').removeClass('disabled');
    $('#stopWebCamBtn').removeClass('disabled');
    webcam.start().then((result) => {
              console.log("webcam started");
            }).catch((err) => {
              console.log(err);
            });

});

$(document).on('click', '.guestImg #captureWebCamBtn', function(){
    if($(this).hasClass('disabled')){
        alert('Please start the webcam');
    }else{
        const webcamElement = document.getElementById("webcam");
        const canvasElement = document.getElementById("canvas");
        const snapSoundElement = document.getElementById("snapSound");
        const webcam = new Webcam(
            webcamElement,
            "user",
            canvasElement,
            snapSoundElement
            );
            $('#SaveWebCamBtn').removeClass('disabled');
        webcam.snap();
    }
    
});

$(document).on('click', '.guestImg #SaveWebCamBtn', function(){
    if($(this).hasClass('disabled')){
        alert('Please Capture Image.');
    }else{
        const webcamElement = document.getElementById("webcam");
        const canvasElement = document.getElementById("canvas");
        const snapSoundElement = document.getElementById("snapSound");
        const webcam = new Webcam(
            webcamElement,
            "user",
            canvasElement,
            snapSoundElement
            );
        var canvas = document.getElementById("canvas");
        image = canvas
        .toDataURL("image/png", 1.0)
        .replace("image/png", "image/octet-stream");
        var link = document.createElement("a");
        link.download = "my-image.png";
        link.href = image;
        link.click();
    }
    
});

$(document).on('click', '.guestImg #stopWebCamBtn', function(){
    if($(this).hasClass('disabled')){
        alert('Please start the webcam');
    }else{
        const webcamElement = document.getElementById("webcam");
        const canvasElement = document.getElementById("canvas");
        const snapSoundElement = document.getElementById("snapSound");
        const webcam = new Webcam(
                webcamElement,
                "user",
                canvasElement,
                snapSoundElement
            );
        webcam.stop();
    }
    
});

$(document).on('click', '.guestImg #guestPhotoWithWebsite', function(){
    var bid = $(this).data('bid');
    var serial = $(this).data('serial');

    $.ajax({
        url : webUrl+'include/ajax/resorvation.php',
        type: 'post',
        data: { type: 'guestPhotoWithWebsite', bid:bid, serial:serial},
        success: function (data) {
            $('body').append(data);
        }
    });

    

    
    
});

$(document).on('change', '.guestImg #guestIdProofImg', function(){

    var property = document.getElementById('guestIdProofImg').files[0];
    var image_name = property.name;
    var image_extension = image_name.split('.').pop().toLowerCase();
    var url = 'include/ajax/resorvation.php';
    if (jQuery.inArray(image_extension, ['jpg', 'jpeg', 'png']) == -1) {
        $('#msg').html('Invalid image file');
        return false;
    }
    var form_data = new FormData();
    var bid = $(this).data('bid');
    var serial = $(this).data('serial');
    var gid = $(this).data('gid');
    form_data.append("file", property);
    form_data.append("type", 'guestIdImgSubmit');
    form_data.append("bid", bid);
    form_data.append("serial", serial);
    form_data.append("gid", gid);

    $.ajax({
        url: url,
        method: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#msg').html('Loading......');
        },
        success: function(data) {
            $result = JSON.parse(data);
            var guestImg = $result.name;
            $('#guestPopupFixContent').remove();
            var guestPImg = $('.guestProofImgSec img').data('img');
            loadAddGuestReservationForm(bid,'#addGestOnReservation .content','',gid,serial,guestImg,guestPImg);
            
        }
    });
    
});


// Room View end


// Stay View Start


function loadStayView($date) {
    var date = $date;
    $.ajax({
        url: webUrl+'include/ajax/stayView.php' ,
        type: 'post',
        data: { type: 'loadStayView', date:date },
        success: function (data) {
            $('#stayViewContent').html(data);
        }
    });

}

$(document).on('mouseover','#stayViewContent .roomNum td',function(){
    $('thead th').css('background','white');
    var className = $(this).attr('class');
    $('#'+className).css('background','#fff0bb');
});

$(document).on('click', '.guestOnStayView', function(){
    var bookId = $(this).data('bid');
    $('#bookindDetail').addClass('show');
    showGuestDetailPopUp('','',bookId);
});



// Stay View End


// Review section start


function loadReview() {
    $.ajax({
        url: webUrl+'include/ajax/review.php' ,
        type: 'post',
        data: { type: 'loadReview' },
        success: function (data) {
            $('#reviewContent').html(data);
        }
    });

}

$(document).on('click', '.showReplayOnReview', function(){
    var rid = $(this).data('rid');
    $.ajax({
        url: webUrl+'include/ajax/review.php' ,
        type: 'post',
        data: { type: 'showReplay', rid:rid },
        success: function (data) {
            $('#sideBox .content').html(data);
            $('#sideBox').show();
        }
    });
    
});

$(document).on('click','#sideBox .closeContent', function(){
    $('#sideBox').hide();
});


// Review section end





// Nav bar fixed


var num = 50;

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('#topNavBar').addClass('blur shadow-blur left-auto');
    } else {
        $('#topNavBar').removeClass('blur shadow-blur left-auto');
    }
});


// Toggle btn iconSidenav

$(document).on('click','#iconNavbarSidenav',function(){ 
    $('body').toggleClass('g-sidenav-pinned');
    $('#sidenav-main').toggleClass('bg-white');
});


// Confirm Model iconSidenav

function Confirm(title, msg, $true, $false,$data, $dataValue, $link='') { 
    var $content =  "<div class='dialog-ovelay'>" +
                    "<div class='dialog'><header>" +
                     " <h3> " + title + " </h3> " +
                     "<i class='fa fa-close'></i>" +
                 "</header>" +
                 "<div class='dialog-msg'>" +
                     " <p> " + msg + " </p> " +
                 "</div>" +
                 "<footer>" +
                     "<div class='controls'>" +
                         " <button class='button button-danger doAction'>" + $true + "</button> " +
                         " <button class='button button-default cancelAction'>" + $false + "</button> " +
                     "</div>" +
                 "</footer>" +
              "</div>" +
            "</div>";
     $('body').prepend($content);
    $('.doAction').click(function () {
        if($link != ''){
            window.open($link, "_blank"); 
        }else{
            var obj = {
                name:  'name',
                totalScore: 'totalScore',
                gamesPlayed: 'gamesPlayed'
              };
              console.log(obj);
        }
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
        $(this).remove();
        });
    });

    $('.cancelAction, .fa-close').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
        $(this).remove();
        });
    });
  
}



$('#popUpBox .closeBox').on('click',function(){
    $('#popUpBox').removeClass('show');
});

$('#popUpBox .closeBtn').on('click',function(){
    $('#popUpBox').removeClass('show');
});