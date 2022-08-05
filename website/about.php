<?php

include ('booking/admin/include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jamindars Palace || About Us</title>
  <?php include(SERVER_SCREEN_PATH.'head.php') ?>
</head>

<body>
<div class="preloader">
  <div class="table">
    <div class="inner">
      <h5 class="preloader-text">LOADING PLEASE WAIT</h5>
      <img src="images/preloader.gif" alt="Image" class="preloader-img"> </div>
   
  </div>
</div>

<?php include(SERVER_SCREEN_PATH.'sidebar.php') ?>

<header class="int-header">
  <?php include(SERVER_SCREEN_PATH.'navbar.php') ?>
</header>

<section class="intro">
  <div class="linedot"></div>
  <div class="headerbg"></div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
        <h2>The Jamindars <br/> Palace</h2>
        <p class="lead">Jamindar Palace is one among the best luxury sea view hotel in Puri and has stunning views of the ocean from various parts of the property. Being absolutely one in all the pleasant luxury sea view hotel in Puri, the accommodation right here includes rooms, Family room, and suites.</p> </div>
    </div>
  </div>
</section>

<section class="quarto-intro">
		<div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
      <p class="lead">Beautiful trees aesthetically dot the seaside front lodge and you could listen the waves crashing into the shore from all corners of it. There is a stunning pool that goes thoroughly with the ethos of the hotel’s overall design.</p>
		</div>
     <!-- end col-6 -->
      <div class="col-md-6 col-sm-6 col-xs-12">
      <p>The satisfactory luxury sea view hotel in Puri is located proper on popular Puri Beach, most effective a brief even as faraway from the sacred pilgrimage site of Jagannath Temple. The dining alternatives at Jamindar Palace, Puri gift you with range as well as quality.</p>
		</div>
      <!-- end col-6 -->
    </div>
    <!-- end row --> 
  </div>
</section>

<div class="quarto-full-image" data-stellar-background-ratio="0.5">
</div>

<section class="core-values">
<div class="container">
    <div class="row">

      <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
      	  <p>There is a beautiful restaurant serving proper and great local meals in Puri and tremendous Bengali meals, one of the fine multi-cuisine restaurant in Puri and a fantastic conference hall.</p>
          
      </div>
      
    </div>
  </div>
</section>

<!-- <section class="board-members">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
      <h5>ABOUT THE ROYAL </h5>
      <h2>Our Board Members</h2>
    </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
      	<div class="row inner">
      		<div class="col-md-4 col-sm-4 col-xs-12">
      		<figure class="member-box">
      			<img src="images/member1.jpg" alt="Image">
      			<figcaption>
      				<h4>Jack Hughman</h4>
      				<small>SENIOR PARTNER</small>
      			</figcaption>
      		</figure>
      		</div>
        <div class="col-md-4 col-sm-4 col-xs-12">
      		<figure class="member-box">
      			<img src="images/member2.jpg" alt="Image">
      			<figcaption>
      				<h4>Jenny Porland</h4>
      				<small>JUNIOR PARTNER</small>
      			</figcaption>
      		</figure>
      		</div>
      		<div class="col-md-4 col-sm-4 col-xs-12">
      		<figure class="member-box">
      			<img src="images/member3.jpg" alt="Image">
      			<figcaption>
      				<h4>John Soleil</h4>
      				<small>SENIOR PARTNER</small>
      			</figcaption>
      		</figure>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</section> -->

<?php include(SERVER_SCREEN_PATH.'footer.php') ?>


<script src="js/jquery.min.js"></script> 
<script type="text/javascript">
(function($) {
	$(window).load(function(){
		$("body").addClass("page-loaded");	
	});
})(jQuery)
</script> 

<?php include(SERVER_SCREEN_PATH.'script.php') ?>

<script>
  $('.language li').removeClass('active');
  $('.language li a[href$="about.php"]').parent().addClass('active');
</script>

</body>

</html>