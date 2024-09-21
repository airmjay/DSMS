<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>
  <?= $row['school_name']; ?>
    </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="menu/assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="menu/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="menu/assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="menu/assets/css/slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="menu/assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="menu/assets/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="menu/assets/css/style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.course-display
{
  height: 200px;
  position: relative;
  overflow: hidden;
}
.course-display-2
{
  position: absolute;
  bottom: 0;
  width: 100%;

}
</style>
  </head>
  <body> 
<?php 
        $conn = mysqli_connect('localhost','root','','school');
        $requestId = strpos($request, '/')+1;
        $getid = substr($request, $requestId);
        $select = "SELECT * FROM dswp WHERE id = '$getid'";
        $row = mysqli_fetch_array(mysqli_query($conn,$select));
        // echo $row['school_name'];
      ?>
  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span><?=$row['email'] ?></span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(568) 986 652</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand text-sm" href="/<?= $row['id']?>"><i class="fa fa-university"></i><span><?=$row['school_name']?></span></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
    
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="/29">Home</a></li>            
                <li><a href="#mu-about-us">About Us</a></li>                
                <li><a href="#mu-our-teacher">Our Features</a></li>                
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Join/Login<span class="fa fa-angle-down"></span></a>
<?php
if(isset($_SESSION['loginAdminSessionGet']))
{
?>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Meeting The school to register</a></li>                
<li><a href="/admin">Go Back</a></li>                
</ul>

<?php  
}elseif(isset($_SESSION['loginSchoolSessionPost']))
{
   ?>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Meeting The school to register</a></li>                
<li><a href="/auth">Go Back</a></li>                
</ul>

<?php
}elseif(isset($_SESSION['TeacherloginSchoolSessionPost'])){
  ?>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Meeting The school to register</a></li>                
<li><a href="/tcr">Go Back</a></li>                
</ul>

<?php
}elseif(isset($_SESSION['ParentloginSchoolSessionPost'])){
 ?>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Meeting The school to register</a></li>                
<li><a href="/prt">Go Back</a></li>                
</ul>

<?php
}elseif(isset($_SESSION['StudentloginSchoolSessionPost'])){
?>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Meeting The school to register</a></li>                
<li><a href="/std">Student</a></li>                
</ul>

<?php
}else
{
    ?>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Meeting The school to register</a></li>                
<li><a href="/login">Login</a></li>                
</ul>
  <?php
}
?>       
            </li>            
            <li><a href="#mu-our-teacher">Our Teachers</a></li>
            <li><a href="#mu-testimonial">Quotes</a></li>               
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
   <!-- End search box -->
  <!-- Start Slider -->
  <section id="mu-slider">
    <?php 
    $select = "SELECT * FROM blog WHERE id = 1";
    if(mysqli_num_rows(mysqli_query($conn1, $select))){
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_fetch_array($fetch);
    $row1 = "SELECT * FROM image_div";
    $fetch1 = mysqli_fetch_array(mysqli_query($conn1, $row1));  
    ?>
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure style="width:100%;">
          <img width="100%" height="500px" src="upload/<?= $db ?>/<?= $fetch1['image_div1'] ?>" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4><?= $row['image'] ?></h4>
        <span></span>
        <h2><?= $row['caption']?></h2>
        <p><?= $row['number_comment'] ?></p>
        <a href="#" class="mu-read-more-btn"><?= $row['content'] ?></a>
      </div>
    </div>    
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <?php 
    }
    $select = "SELECT * FROM blog WHERE id = 2";
    if(mysqli_num_rows(mysqli_query($conn1, $select))){
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_fetch_array($fetch);
    $row1 = "SELECT * FROM image_div";
    $fetch1 = mysqli_fetch_array(mysqli_query($conn1, $row1));  
    ?>
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure style="width:100%;">
          <img width="100%" height="500px" src="upload/<?= $db ?>/<?= $fetch1['image_div2'] ?>" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4><?= $row['image'] ?></h4>
        <span></span>
        <h2><?= $row['caption']?></h2>
        <p><?= $row['number_comment'] ?></p>
        <a href="#" class="mu-read-more-btn"><?= $row['content'] ?></a>
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
<?php
  }
   $select = "SELECT * FROM blog WHERE id = 3";
   if(mysqli_num_rows(mysqli_query($conn1, $select))){
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_fetch_array($fetch);
    $row1 = "SELECT * FROM image_div";
    $fetch1 = mysqli_fetch_array(mysqli_query($conn1, $row1));  
    ?>
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure style="width:100%;">
          <img width="100%" height="500px" src="upload/<?= $db ?>/<?= $fetch1['image_div3'] ?>" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4><?= $row['image'] ?></h4>
        <span></span>
        <h2><?= $row['caption']?></h2>
        <p><?= $row['number_comment'] ?></p>
        <a  class="mu-read-more-btn"><?= $row['content'] ?></a>
      </div>
    </div>
  <?php } ?>
    <!-- Start single slider item -->    
  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">

        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <?php
       $select = "SELECT * FROM feature";
        $fetch = mysqli_query($conn1, $select);
       while($row = mysqli_fetch_array($fetch)){
    ?>
            <!-- Start single service -->
            <div style="height:200px;overflow:hidden;" class="mu-service-single">
              <span class="fa fa-book"></span>
              <p> <?= $row['content']?></p>
            </div>
          <?php } ?>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>About Us</h2>              
                  </div>
    <?php
    $select = "SELECT * FROM about_us WHERE type = 'text'";
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_fetch_array($fetch);
    if($row){
    
    ?>
                  <!-- End Title -->
                  <p> <?= $row['content']?></p>
                </div>
              </div>
    <?php
    $select = "SELECT * FROM about_us WHERE type = 'video'";
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_fetch_array($fetch);
    
    ?>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-right">                            
                <a id="mu-abtus-video" href="upload/<?= $db?>/<?= $row['content']?>" target="mutube-video">
                  <video  src="upload/<?= $db?>/<?= $row['content']?>" height='100%' width='100%'></video>
                </a>                
                </div>
              </div>
      <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

  <!-- Start about us counter -->
  <section id="mu-abtus-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-abtus-counter-area">
            <div class="row">
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-book"></span>
                  <h4 class="counter">
<?php
    $select = "SELECT * FROM course";
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_num_rows($fetch);
    echo $row;
?>
                  </h4>
                  <p>Subjects</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter">
<?php
    $select = "SELECT * FROM student";
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_num_rows($fetch);
    echo $row;
?>                    
                  </h4>
                  <p>Students</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-flask"></span>
                  <h4 class="counter">
<?php
    $select = "SELECT * FROM staff";
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_num_rows($fetch);
    echo $row;
?>
                  </h4>
                  <p>Staffs</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="mu-abtus-counter-single no-border">
                  <span class="fa fa-user-secret"></span>
                  <h4 class="counter">
<?php
    $select = "SELECT * FROM teacher";
    $fetch = mysqli_query($conn1, $select);
    $row = mysqli_num_rows($fetch);
    echo $row;
?>
                  </h4>
                  <p>Teachers</p>
                </div>
              </div>
              <!-- End counter item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->

  <!-- Start features section -->
  <section id="mu-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-features-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Our Features</h2>
              <p>
<?php
$select = "SELECT * FROM blog";
$fetch = mysqli_query($conn1, $select);
$row = mysqli_fetch_array($fetch);
if($row){
echo $row['number_comment'];
?>    
              </p>
            </div>
            <!-- End Title -->
            <!-- Start features content -->
            <div class="mu-features-content">
              <div class="row">
 <?php
$select = "SELECT * FROM feature";
$fetch = mysqli_query($conn1, $select);
while($row = mysqli_fetch_array($fetch)){
    ?>
                <div class="col-lg-4 col-md-4  col-sm-6">
                  <div class="mu-single-feature">
                    <span class="fa fa-book"></span>
                    <h4>FEATURES</h4>
                    <p><?= $row['content']?></p>
                    <a href="#">Read More</a>
                  </div>
                </div>
  <?php } } ?>
              </div>
            </div>
            <!-- End features content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End features section -->

  <!-- Start latest course section -->
  <section id="mu-latest-courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Latest Courses</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsa ea maxime mollitia, vitae voluptates, quod at, saepe reprehenderit totam aliquam architecto fugiat sunt animi!</p>
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">
<?php 
$select = "SELECT * FROM course order by RAND() LIMIT 6";
$fetch = mysqli_query($conn1, $select);
while($row = mysqli_fetch_array($fetch)){
?>
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single position-relative">
                  <div class="mu-latest-course-img course-display">
                    <a href="#" class="text-center h1 p-3"><?= $row['content']?></a>
                    <div class="mu-latest-course-imgcaption course-display-2">
                      <a href="#"><?= $row['content']?></a>
                      <span><i class="fa fa-clock-o"></i>Lastest Course</span>
                    </div>
                  </div>
                </div>
              </div>
<?php }?>
            </div>
            <!-- End latest course content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest course section -->

  <!-- Start our teacher -->
  <section id="mu-our-teacher">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2>Our Teachers</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, repudiandae, suscipit repellat minus molestiae ea.</p>
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher-content">
              <div class="row">
<?php 
$select = "SELECT * FROM teacher order by RAND() LIMIT 4";
$fetch = mysqli_query($conn1, $select);
while($row = mysqli_fetch_array($fetch)){
?>
                <div class="col-lg-3 col-md-3  col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <?php 
                      if($row['picture'] === NULL)
                      {
                        ?>
                      <img src="menu/assets/img/teachers/teacher-01.png" alt="teacher img">
                        <?php 
                      }else
                      {
                        ?>
                      <img width="260px" height="265px" src="upload/<?= $db?>/<?=$row['picture'] ?>" alt="teacher img">

                       <?php  
                      }
                      ?>
                      <div class="mu-our-teacher-social">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-linkedin"></span></a>
                        <a href="#"><span class="fa fa-google-plus"></span></a>
                      </div>
                    </figure>                    
                    <div class="mu-ourteacher-single-content">
                      <h4><?= $row['firstName']. " ". $row['surName']?></h4>
                      <span><?= $row['post']?></span>
                    </div>
                  </div>
                </div>
<?php }?>
            </div> 
            <!-- End our teacher content -->           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our teacher -->

  <!-- Start testimonial -->
  <section id="mu-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">
              <!-- start testimonial single item -->
<?php 
$select = "SELECT * FROM teacher_comment order by RAND() LIMIT 3";
$fetch = mysqli_query($conn1, $select);
if(mysqli_fetch_array($fetch)){
while($row = mysqli_fetch_array($fetch)){
$id = $row['teacher_id'];
$select1 = "SELECT * FROM teacher WHERE uniqid_id = '$id'";
$fetch1 = mysqli_query($conn1, $select1);
$row1 = mysqli_fetch_array($fetch1);
?>
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p><?= $row['comment'] ?></p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <?php if($row1['picture'] === NULL){ ?>
                  <img  src="menu/assets/img/testimonial-1.png" alt="img">
                  <?php }else
                  {
                    ?>
                  <img width="80px" height="80px" src="upload/<?=$db?>/<?=$row1['picture'] ?>" alt="img">
                    <?php 
                  } ?>

                </div>
                <div class="mu-testimonial-info">
                  <h4><?= $row1['firstName']." ". $row1['surName'] ?></h4>
                  <span>Happy Teacher</span>
                </div>
              </div>
<?php }} ?>
  
              <!-- end testimonial single item -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->
  <!-- End from blog -->

  <!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Information</h4>
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="">Features</a></li>
                  <li><a href="">Course</a></li>
                  <li><a href="">Event</a></li>
                  <li><a href="">Sitemap</a></li>
                  <li><a href="">Term Of Use</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Student Help</h4>
                <ul>
                  <li><a href="">Get Started</a></li>
                  <li><a href="#">My Questions</a></li>
                  <li><a href="">Download Files</a></li>
                  <li><a href="">Latest Course</a></li>
                  <li><a href="">Academic News</a></li>                  
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>News letter</h4>
                <p>Get latest update, news & academic offers</p>
                <form class="mu-subscribe-form">
                  <input type="email" placeholder="Type your Email">
                  <button class="mu-subscribe-btn" type="submit">Subscribe!</button>
                </form>               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contact</h4>
                <address>
                  <p>P.O. Box 320, kaduna, Mahuta 9495, Nigeria</p>
                  <p>Phone: (415) 453-1568 </p>
                  <p>Website: www.dswp.mj</p>
                  <p>Email: info@abdulmajeedaliyu</p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; All Right Reserved. Designed and Powered by <a href="#">Abdulmajeed Aliyu</a> </p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  
  <!-- jQuery library -->
  <script src="menu/assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="menu/assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="menu/assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="menu/assets/js/waypoints.js"></script>
  <script type="text/javascript" src="menu/assets/js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="menu/assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="menu/assets/js/jquery.fancybox.pack.js"></script>
  
  
  <!-- Custom js -->
  <script src="menu/assets/js/custom.js"></script> 

  </body>
</html>