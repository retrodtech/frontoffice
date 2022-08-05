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
  <title>Jamindars Palace || Blog</title>
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

<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h5>WHAT WE CAN GIVE TO OUR GUESTS</h5>
        <h2>Blog</h2>
        <p class="lead"><a href="<?php echo FRONT_SITE ?>">Home</a> // <a href="">Blog</a></p>
      </div>	  
    </div>
  </div>
  
  <div class="blog_content">
	  <div class="container">
		<div class="row">
			<div class="col-xs-12">
			    
			    <?php
                
            $sql = mysqli_query($conDB, "select * from blog ORDER BY id asc ");
            if(mysqli_num_rows($sql) > 0){
                $num = 0;
                while($rows = mysqli_fetch_assoc($sql)){
                    $num ++;
                    $img = FRONT_SITE_IMG.'post/'.$rows['img'];
                    $titla = $rows['title'];
                    $category = $rows['category'];
                    $description = substr($rows['description'], 0, 105);
                    $url = FRONT_SITE.'/blog-detail.php?id='.$rows['id'];
                    
                    if($num % 2 == 0){ ?>
                    
                        <div class="blog-post text-right">
        					<div class="post-content">
        						<small><?php echo $category ?></small>
        						<h2><a href="<?php echo $url ?>"><?php echo $titla ?></a></h2>
        						<!--<span>APRIL 27, 2017</span>-->
        						<p><?php echo $description ?></p>
        						<a href="<?php echo $url ?>" class="button"><span data-hover="READ MORE">READ MORE</span></a>
        					</div>
        					
        					<figure class="post-image">
        						<img src="<?php echo $img ?>" alt="Image">
        					</figure>
        				
        				</div>
                            
                        <?php }else{ ?>
                            
                            <div class="blog-post text-left">
            					<figure class="post-image">
            						<img src="<?php echo $img ?>" alt="Image">
            					</figure>
            					
            					<div class="post-content">
            						<small><?php echo $category ?></small>
            						<h2><a href="blog-detail.php"><?php echo $titla ?></a></h2>
            						<!--<span>APRIL 27, 2017</span>-->
            						<p><?php echo $description ?></p>
            						<a href="<?php echo $url ?>" class="button"><span data-hover="READ MORE">READ MORE</span></a>
            					</div>
            					
            				</div>
            
            <?php }}}  ?>
            
				
			
				
				
			</div>
			
			<!--<div class="col-xs-12">-->
			<!--	<ul class="pagination">-->
			<!--	<li> <a href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>  PREV</span> </a> </li>-->
			<!--	<li class="hide"><a href="#">1</a></li>-->
			<!--	<li class="active hide"> <span>2 <span class="sr-only">(current)</span></span> </li>-->
			<!--	<li> <a href="#" aria-label="Next"> <span aria-hidden="true">NEXT <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </span> </a> </li>-->
			<!--	</ul>-->
			<!--</div>-->

		</div>
	  </div>
  </div>
</section>

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
  $('.language li a[href$="blog.php"]').parent().addClass('active');
</script>

</body>

</html>