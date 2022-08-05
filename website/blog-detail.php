<?php

include ('booking/admin/include/constant.php');
include (SERVER_INCLUDE_PATH.'db.php');
include (SERVER_INCLUDE_PATH.'function.php');



$blogId = $_GET['id'];
$sql = mysqli_query($conDB, "select * from blog where id = '$blogId'");

if(mysqli_num_rows($sql)>0){
  $rows = mysqli_fetch_assoc($sql);
  $img = FRONT_SITE_IMG.'post/'.$rows['img'];
  $titla = $rows['title'];
  $cat = $rows['category'];
  $description = $rows['description'];
}else{
  $_SESSION['ErrorMsg'] = "Blog not exist";
  redirect('blog.php');
  die();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jamindars Palace || Blog Details</title>
  <?php include(SERVER_SCREEN_PATH.'head.php') ?>
</head>

<body>
<div class="preloader">
  <div class="table">
    <div class="inner">
      <h5 class="preloader-text">LOADING PLEASE WAIT</h5>
      <img src="images/preloader.gif" alt="Image" class="preloader-img"> </div>
    <!-- end inner --> 
  </div>
  <!-- end table --> 
</div>

<?php include(SERVER_SCREEN_PATH.'sidebar.php') ?>

<header class="int-header">
  <?php include(SERVER_SCREEN_PATH.'navbar.php') ?>
</header>

<!-- end header -->
<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
        <h2>Blog</h2>
        <p class="lead"><a href="<?php echo FRONT_SITE ?>">Home</a> // <a href="">Blog Details</a></p>
      </div>
    </div>
  </div>
	<div class="blog_detail_content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="blog-post detail text-left">
						<figure class="post-image">
							<img src="<?php echo $img ?>" alt="<?php echo $titla ?> Image">
						</figure>
						
						<div class="post-content">
							<small><?php echo $cat ?></small>
							<h2><?php echo $titla ?></h2>
							<!--<span>APRIL 27, 2017</span>-->
							<p><?php echo $description ?></p>
							</div>
						
						<!--<div class="post-comment">-->
						<!--<h3>Comment</h3>-->
						<!--	<form>-->
						<!--		<div class="form-group">-->
						<!--	<label>Your Name</label>-->
						<!--	<input type="text" placeholder="Type your name">-->
						<!--</div>-->
						
						<!--<div class="form-group">-->
						<!--	<label>Your E-mail</label>-->
						<!--	<input type="text" placeholder="Type your e-mail">-->
						<!--</div>-->
						
						<!--<div class="form-group">-->
						<!--	<label>Your Comment</label>-->
						<!--	<textarea placeholder="Type your comment"></textarea>-->
						<!--</div>-->
						
						<!--<div class="form-group">-->
						<!--	<button type="submit"><span data-hover="COMMENT">COMMENT</span></button>-->
						<!--</div>-->
						
						<!--	</form>-->
						<!--</div>-->
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>




<?php include(SERVER_SCREEN_PATH.'footer.php') ?>

<!-- JS FILES --> 
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
  $('.language li a[href$="blog.php"]').parent().addClass('active');
</script>

</body>

</html>