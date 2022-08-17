<?php

include ('../include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

$current_date = strtotime(date('Y-m-d'));
$one_day = strtotime('1 day 00 second', 0);
$_SESSION['no_room'] = 1;
$_SESSION['no_guest'] = 2;
$_SESSION['night_stay'] = 1;
$_SESSION['checkIn'] = date('Y-m-d',$current_date);
$_SESSION['checkout'] = date('Y-m-d',$current_date + (1 * $one_day));

$live = checkLive();

$hotelArry = getHotelDetail($_GET['name']);

$hotelId = $hotelArry['id'];
$hotelName = $hotelArry['name'];
$hotelEmail = $hotelArry['email'];
$hotelPhone = $hotelArry['phone'];
$hotelLogo = $hotelArry['logo'];


?>


<?php

if($live == 1){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $hotelName ?></title>
  <?php include(WS_SERVER_SCREEN_PATH.'head.php') ?>
</head>

<body>

  <?php include(WS_SERVER_SCREEN_PATH.'sidebar.php') ?>

  <header class="header">

    <?php include(WS_SERVER_SCREEN_PATH.'navbar.php') ?>

    <!--<div class="offerContent">-->
    <!--    <div class="content">-->
    <!--        <h4>Enjoy 30% Off</h4>-->
    <!--        <a target="blank" href="<?php echo FRONT_BOOKING_SITE ?>">Book Now</a>-->
    <!--    </div>-->
    <!--</div>-->

    <div id="rev_slider_1061_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="creative-freedom"
      data-source="gallery" style="background-color:#1f1d24;padding:0px;">
      <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
      <div id="rev_slider_1061_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
        <ul>
          <!-- SLIDE  -->
          <li data-index="rs-2978" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0"
            data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000"
            data-thumb="images/hero1.jpg" data-rotate="0" data-saveperformance="off" data-title="Creative"
            data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
            data-param8="" data-param9="" data-param10="" data-description="">
            <!-- MAIN IMAGE -->
            <img src="images/hero1.jpg" alt="Image" data-bgposition="center center" data-bgfit="cover"
              data-bgparallax="3" class="rev-slidebg" data-no-retina>
            <!-- LAYERS -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-2978-layer-1"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
              data-fontweight="['100','100','400','400']" data-width="full" data-height="full" data-whitespace="nowrap"
              data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off"
              data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 5;text-transform:left;background-color:rgba(18, 12, 20, 0.75);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>
            <!-- LAYER NR. 2 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2978-layer-4"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-148','-148','-138','-111']" data-width="1"
              data-height="50" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
              data-responsive="off"
              data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 6;text-transform:left;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>

            <!-- LAYER NR. 3 -->
            <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-2978-layer-3"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-91','-91','-81','-64']"
              data-fontsize="['14','14','14','12']" data-lineheight="['14','14','14','12']" data-width="none"
              data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
              data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
              data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
              data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 7; white-space: nowrap;text-transform:left;"> PURI'S MOST BEAUTIFUL RETREAT</div>

            <!-- LAYER NR. 4 -->
            <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1" id="slide-2978-layer-2"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','-10','-10']"
              data-fontsize="['70','70','50','40']" data-lineheight="['70','70','55','45']"
              data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap" data-type="text"
              data-responsive_offset="on"
              data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
              data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
              data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 8; white-space: nowrap;text-transform:left;">In Puri<br />
              Best Hotel Ever</div>

            <!-- LAYER NR. 5 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2978-layer-5"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['107','107','89','70']" data-width="1"
              data-height="50" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
              data-responsive="off"
              data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 9;text-transform:left;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>
          </li>
          <!-- SLIDE  -->
          <li data-index="rs-2979" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0"
            data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000"
            data-thumb="images/hero2.jpg" data-rotate="0" data-saveperformance="off" data-title="Quality"
            data-param1="02" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
            data-param8="" data-param9="" data-param10="" data-description="">
            <!-- MAIN IMAGE -->
            <img src="images/hero2.jpg" alt="Image" data-bgposition="center center" data-bgfit="cover"
              data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
            <!-- LAYERS -->

            <!-- LAYER NR. 7 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-2979-layer-1"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full"
              data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide"
              data-responsive_offset="off" data-responsive="off"
              data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 11;text-transform:left;background-color:rgba(18, 12, 20, 0.75);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>

            <!-- LAYER NR. 8 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2979-layer-4"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-148','-148','-138','-111']" data-width="1"
              data-height="50" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
              data-responsive="off"
              data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 12;text-transform:left;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>

            <!-- LAYER NR. 9 -->
            <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-2979-layer-3"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-91','-91','-81','-64']"
              data-fontsize="['14','14','14','12']" data-lineheight="['14','14','14','12']" data-width="none"
              data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
              data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
              data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
              data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 13; white-space: nowrap;text-transform:left;">Beautiful, comfortable rooms</div>

            <!-- LAYER NR. 10 -->
            <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1" id="slide-2979-layer-2"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','-10','-10']"
              data-fontsize="['70','70','50','40']" data-lineheight="['70','70','55','45']"
              data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap" data-type="text"
              data-responsive_offset="on"
              data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
              data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
              data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 14; white-space: nowrap;text-transform:left;">Amazing interior<br />
              to stay comfortable. </div>

            <!-- LAYER NR. 11 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2979-layer-5"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['107','107','89','70']" data-width="1"
              data-height="50" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
              data-responsive="off"
              data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 15;text-transform:left;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>
          </li>
          <!-- SLIDE  -->
          <li data-index="rs-2980" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0"
            data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="2000"
            data-thumb="images/hero3.jpg" data-rotate="0" data-saveperformance="off" data-title="Concept"
            data-param1="03" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
            data-param8="" data-param9="" data-param10="" data-description="">
            <!-- MAIN IMAGE -->
            <img src="images/hero3.jpg" alt="Image" data-bgposition="center center" data-bgfit="cover"
              data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
            <!-- LAYERS -->

            <!-- LAYER NR. 13 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-2980-layer-1"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full"
              data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide"
              data-responsive_offset="off" data-responsive="off"
              data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":150,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power2.easeInOut"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 17;text-transform:left;background-color:rgba(18, 12, 20, 0.75);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>

            <!-- LAYER NR. 14 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2980-layer-4"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-148','-148','-138','-111']" data-width="1"
              data-height="50" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
              data-responsive="off"
              data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 18;text-transform:left;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>

            <!-- LAYER NR. 15 -->
            <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-2980-layer-3"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-91','-91','-81','-64']"
              data-fontsize="['14','14','14','12']" data-lineheight="['14','14','14','12']" data-width="none"
              data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
              data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2350,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
              data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
              data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 19; white-space: nowrap;text-transform:left;">EXPLORE NEW CONCEPT WORLDS </div>

            <!-- LAYER NR. 16 -->
            <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1" id="slide-2980-layer-2"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','-10','-10']"
              data-fontsize="['70','70','50','40']" data-lineheight="['70','70','55','45']"
              data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap" data-type="text"
              data-responsive_offset="on"
              data-frames='[{"from":"y:50px;opacity:0;","speed":1500,"to":"o:1;","delay":2550,"ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"to":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","ease":"Power3.easeInOut"}]'
              data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
              data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 20; white-space: nowrap;text-transform:left;">Amazing<br />
              Interior View </div>

            <!-- LAYER NR. 17 -->
            <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-2980-layer-5"
              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['107','107','89','70']" data-width="1"
              data-height="50" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
              data-responsive="off"
              data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2900,"ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
              data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
              data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
              style="z-index: 21;text-transform:left;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);border-width:0px;">
            </div>

          </li>
        </ul>
      </div>
    </div>

  </header>

  <section class="intro">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="imgContent">
            <div class="imgBox">
              <img src="images/about/01.jpg" alt="jamindars palace room">
            </div>
            <div class="imgBox">
              <img src="images/about/02.jpg" alt="jamindars palace room">
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-6">
          <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
          <h2>Welcome To Jamindars Palace</h2>
          <p class="lead">Jamindar Palace is one among the best luxury sea view hotel in Puri and has stunning views of
            the ocean from various parts of the property. Being absolutely one in all the pleasant luxury sea view hotel
            in Puri,</p>
          <a href="<?php echo FRONT_SITE ?>/about.php"><span data-hover="LEARN MORE">LEARN MORE</span></a>
        </div>
      </div>
    </div>
  </section>

  <section class="highlight-rooms">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title">
          <h5 style="text-transform: uppercase;font-size: 12px;">Jamindars Palace Rooms</h5>
          <h2>Best Sea View Rooms</h2>
          <a href="<?php echo FRONT_BOOKING_SITE ?>" class="button" target="blank"><span data-hover="SEE ALL ROOMS">GO
              TO BOOKING</span></a>
          </div>
        </div>

        <div class="col-md-12">
          <div class="row">

            <?php
                
                $sql = mysqli_query($conDB, "select room.*,roomratetype.id as rdid from room,roomratetype where room.id=roomratetype.room_id group by(room.id) ORDER BY `roomratetype`.`price` asc limit 6");
                if(mysqli_num_rows($sql) > 0){
                    while($room_rows = mysqli_fetch_assoc($sql)){
                        $img = WS_FRONT_SITE_IMG.'room/'.getImageById($room_rows['id'])[0];
                        $url = FRONT_BOOKING_SITE."/room/{$room_rows['slug']}";
                        
                        $price = getRoomPriceById($room_rows['id'],$room_rows['rdid'] ,2, date('Y-m-d'));
                        $header = $room_rows['header'];
                        
                        if($price >= 7499 ){
                            $html = "
                                    <h4 class='card-explore__title'>$header</h4>
                                    <div class='dFlex'>
                                    <a href='https://jamindarspalace.com/contact.php' class='contact_btn card-explore__link'><span data-hover='Contact Us'>Contact Us</span></a>
                                    <a href='https://jamindars.retrox.in/quick-pay' target='_blank'><span class='room-price card-explore__link'>Pay Advance </span> </a>
                                    </div>";
                        }else{
                             $html = "

                                    <h4 class='card-explore__title' target='_blank'><a href='$url'>$header</a></h4>
                                    <h3 class='card-explore__price'>Rs $price,00<sub>/ Per Night</sub></h3>
                                    <a class='card-explore__link target='_blank'' href='$url'>Book Now <i class='fa fa-long-arrow-right'></i></a>
                                    
                                    ";
                        }
                        ?>

            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card card-explore">
                <div class="card-explore__img">
                  <img class="card-img" src="<?php echo $img ?>" alt="">
                </div>
                <div class="card-body">
                  <?php echo $html ?>
                </div>
              </div>
            </div>

            <?php
                                                
              }
                }
                                
            ?>


          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="offefSection">
    <div class="container">
      <div class="row"
        style="background:#fff;justify-content: center;align-items: center;display: flex;    flex-wrap: wrap;">
        <div class="col-md-6 col-sm-12">
          <?php

          $sql = mysqli_query($conDB, "select * from offersection where id ='1'");
          while($row = mysqli_fetch_assoc($sql)){
              $otitle = $row['title'];
              $price = $row['price'];
              $image = $row['img'];
              $percentage = $row['percentage'];
              $code = $row['code'];
              $offerimg_path = FRONT_SITE_IMG.$image;
              ?>

          <div class="content">
            <h2>
              <?php echo $otitle ?>
            </h2>
            <span class="price"><small style="font-size: 20px;">Start from</small> Rs.
              <?php echo $price ?>
            </span>
            <div style="display: flex;">
              <ul>
                <li>
                  <div class="icon"><img src="<?php echo FRONT_SITE_IMG ?>icon/wifi.png" alt=""></div>
                  <div class="text">Free WiFi</div>
                </li>
                <li>
                  <div class="icon"><img src="<?php echo FRONT_SITE_IMG ?>icon/Breakfast.png" alt=""></div>
                  <div class="text">Breakfast</div>
                </li>

              </ul>
              <ul>
                <li>
                  <div class="icon"><img src="<?php echo FRONT_SITE_IMG ?>icon/Television.png" alt=""></div>
                  <div class="text">Television</div>
                </li>
                <li>
                  <div class="icon"><img src="<?php echo FRONT_SITE_IMG ?>icon/pool.png" alt=""></div>
                  <div class="text">Pool</div>
                </li>
              </ul>
            </div>
          </div>

          <?php }

?>
        </div>
        <div class="col-md-6 col-sm-12" style="padding-right: 0;">
          <img src="<?php echo $offerimg_path ?>" alt="" style="width: 100%;height: 500px;object-fit: cover;">
        </div>
      </div>
      <div class="pecentage_content">
        <h4>Get Upto<span>
            <?php echo $percentage ?>%
          </span> Off</h4>
        <span>Use Code:
          <?php echo $code ?>
        </span>
      </div>
    </div>
  </section>

  <section class="trailer-video" id="counter">
    <div class="video-bg">
      <video src="videos/video.mp4" loop muted autoplay></video>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="video-image"> <img src="images/gallery9.jpg" alt="Image"> <a href="videos/video.mp4"><i
                class="flaticon-play-button"></i></a> </div>

          <h2>Best Sea View Rooms</h2>
          <!--<span class="odometer" id="1">00</span><span class="text">hr</span> <span class="odometer"-->
          <!--  id="2">00</span><span class="text">mi</span> <span class="odometer" id="3">00</span><span-->
          <!--  class="text">se</span>-->
        </div>

      </div>

    </div>

  </section>


  <section class="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-5 col-xs-12">
          <h5>OUR TESTIMONIALS</h5>
          <h2>What Client Thinks</h2>
          <a href="<?php echo FRONT_SITE ?>/about.php" class="button"><span data-hover="ABOUT US">ABOUT US</span></a>
        </div>
        <!-- end col-4 -->
        <div class="col-md-8 col-sm-7 col-xs-12">
          <div class="owl-slide">
            <div class="testimonial-box">
              <blockquote class="testimonial">
                Reached with my family quite early owing to the train timings and the check-in was really smooth & well
                before timing. Throughout our stay staff were polite, courteous, and helpful
              </blockquote>
              <img src="images/logo-tripadvisor.jpg" alt="Image" class="ta-logo">
              <div class="rate">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
              </div>

              <img src="images/testimonial_1.png" alt="Image" class="headshot">
              <span class="name">Prajna</span>
            </div>


            <div class="testimonial-box">
              <blockquote class="testimonial">
                Jamindar's palace is very well located on the golden beach which is one of the blue flag certified beach
                in India. One can directly access the magnificent beach from hotel.
                The staff arranges the tickets to go to beach on request.
              </blockquote>
              <img src="images/logo-tripadvisor.jpg" alt="Image" class="ta-logo">
              <div class="rate">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
              </div>

              <img src="images/testimonial_2.png" alt="Image" class="headshot">
              <span class="name">Jaidev Solanki</span>
            </div>

            <div class="testimonial-box">
              <blockquote class="testimonial">
                The hotel is located in a very good location adjacent to Panthanivas on one side and Mayfair on the
                other. The access to beach is through the Panthanivas side on payment of 20/- per head. Daily one pass
                per guest is being issued by hotel.
              </blockquote>
              <img src="images/logo-tripadvisor.jpg" alt="Image" class="ta-logo">
              <div class="rate">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
              </div>

              <img src="images/testimonial_3.png" alt="Image" class="headshot">
              <span class="name">Siddhartha Barooah</span>
            </div>





          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="facilities" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h5>GET THE PREMIUM TREATMENT</h5>
          <h2>Facilities</h2>
          <p class="lead">Who are in extremely love with the eco-friendly system?</p>
        </div>
        <!-- end col-12 -->
        <div class="col-xs-12">
          <ul>
            <li>24-hour reception</li>
            <li>Check in possible after 10.00</li>
            <li>Latest check out by 8.00</li>
            <li>Breakfast buffet from 7.30-10.30</li>
            <li>Lunch from 12.30 to 15.30</li>
            <li>Dinner from 19.30 to 22.30</li>
            <li>Bar & Restaurant</li>
            <li>Room service</li>
            <li>Allergy friendly rooms</li>
            <li>Rooms With Private Balcony</li>
            <li>Air conditioning in all rooms</li>
            <li>Coffee and tea facilities in all rooms</li>
            <li>Free WiFi in all rooms</li>
          </ul>
        </div>
        <!-- end col-12 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>


  <section class="quarto-activities">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
          <h2>Blogs</h2>
        </div>

        <?php
                
            $sql = mysqli_query($conDB, "select * from blog ORDER BY id asc limit 3");
            if(mysqli_num_rows($sql) > 0){
                $num = 0;
                while($rows = mysqli_fetch_assoc($sql)){
                    $num ++;
                    $img = FRONT_SITE_IMG.'post/'.$rows['img'];
                    $titla = $rows['title'];
                    $category = $rows['category'];
                    $description = substr($rows['description'], 0, 65);
                    $url = FRONT_SITE.'/blog-detail.php?id='.$rows['id'];
                    
                    
                echo '
                
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="activity-box">
                        <figure class="image"> <img src="'.$img.'" alt="'.$titla.' Image"></figure>
                        <div class="content"> <small>'.$category.'</small>
                          <a href="'.$url.'"><h4>'.$titla.'</h4></a>
                          <p style="margin: 0 0 30px;">'.$description.'</p>
                        </div>
                      </div>
                    </div>
                
                
                '; 
            
            
        }}  ?>


      </div>
    </div>
  </section>


  <section class="ftco-section bg-light" style="padding: 30px 0;">
    <div class="container-xl">
      <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0&appId=1728412797490592&autoLogAppEvents=1"
        nonce="lCnu3Clk"></script>
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-4 heading-section" data-aos="fade-up" data-aos-duration="1000" style="padding-top: 50px;">
            <h2 class="mb-2" style="margin-bottom: 20px;">Social Activities</h2>
            <p class="mb-5" style="margin-bottom: 50px;">Get the Social Updates From Jmaindars</p>
            <p><a href="https://jamindars.retrox.in" target="_blank" class="btn btn-primary py-3 px-4">Book Your Room
                Now</a></p>
          </div>
          <div class="col-md-8 heading-section text-center fb_content" data-aos="fade-up" data-aos-duration="1000">
            <div id="fb-root"></div>
            <div class="fb-page" data-href="https://www.facebook.com/jamindarspalacepuriodisha" data-tabs="timeline"
              data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
              data-hide-cover="false" data-show-facepile="true">
              <blockquote cite="https://www.facebook.com/jamindarspalacepuriodisha" class="fb-xfbml-parse-ignore"><a
                  href="https://www.facebook.com/jamindarspalacepuriodisha">Jamindars Palace</a></blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include(WS_SERVER_SCREEN_PATH.'footer.php') ?>

  <!-- JS FILES -->
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript">
    (function ($) {
      $(window).load(function () {
        $("body").addClass("page-loaded");
      });
    })(jQuery)
  </script>

  <?php include(WS_SERVER_SCREEN_PATH.'script.php') ?>

</body>


</html>
<?php }else{ ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Website Live </title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Teko:wght@300;400&amp;display=swap'>
  <link rel="stylesheet" href="css/live.css">

</head>

<body style="display: flex;justify-content: center;align-items: center;height: 100vh;">
  <!-- partial:index.partial.html -->
  <a class="btn btn-gold" href="javascript:void(0)" id="liveBtn"
    style="width: 94px;margin-top: 0;padding: 10px 15px;font-weight: 500;">Live Now</a>
  <div class="congrats">
    <div class="el ang-a animated d-none" data-in="zoomOut"></div>
    <div class="el ang-b animated d-none" data-in="zoomOut"></div>
    <div class="el glow animated d-none" data-in="fadeIn"></div>
    <div class="el bg bg-1 animated d-none" data-in="fadeIn" data-out="zoomOut"></div>
    <div class="el dots animated d-none"> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i>
      <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i>
      <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i>
      <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i> <i></i></div>
    <div class="el bg bg-2 animated d-none" data-in="zoomIn" data-out="bounceOut"></div>
    <div class="el ang-c animated d-none" data-in="zoomOut"></div>
    <div class="el shine animated d-none" data-in="shineIn" data-out="fadeOut"></div>
    <div class="el text animated d-none" data-in="zoomOutIn" data-out="zoomOutLeft">CONGRATULATIONS</div>
  </div>
  <!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
  <script src="js/live.js"></script>

  <script>
    $('#liveBtn').on('click', function () {
      $.ajax({
        url: 'js/liveQuery.php',
        type: 'post',
        success: function (data) {
          setTimeout(function () {
            window.location.href = 'index.php';
          }, 2000);
        }
      });
    });
  </script>

</body>

</html>


<?php }

?>