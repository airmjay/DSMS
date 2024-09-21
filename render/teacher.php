<?php 
session_start();
$conn1 = mysqli_connect('localhost','root','', 'school');
$conn11 = mysqli_connect('localhost','root','', 'school');
$_SESSION['session'] = 'teacher';
if(isset($_SESSION['TeacherloginSchoolSessionPost']))
{
	$session = $_SESSION['TeacherloginSchoolSessionPost'];
	$random = $_SESSION['TeacherloginSchoolSessionPostrandomdb'];
	$_SESSION['db'] = $random;
	
   $select = "SELECT * FROM staff_session WHERE session = '$session'";
   $fetch = mysqli_query($conn1, $select);
   if(mysqli_num_rows($fetch))
   {
      $fetch1 = mysqli_fetch_array($fetch);
      $fetchId = $fetch1['userId'];
			$conn1 = mysqli_connect('localhost','root','', $random);
      $select = "SELECT * FROM teacher WHERE email = '$fetchId'";
		$row1 = mysqli_query($conn1,$select);
		$row = mysqli_fetch_array($row1);
		$email = $row['email'];
		// echo $row['firstname'];
   ?>
   <input class="d-none verify_id_get" value="<?= $id = $row['email'] ?>" >
   <input class="d-none verify_id_db" value="<?= $random?>" >
   <?php
   $select = "SELECT * FROM dswp WHERE unique_id = '$random'";
	if(mysqli_num_rows(mysqli_query($conn11,$select)))
	{
		$schoolNameGet = mysqli_fetch_array(mysqli_query($conn11,$select));
		$schoolme = $schoolNameGet['school_name'];
	}
	?>


	<?php
   }else{
		header("Location: /login");

   }
	}else{
	header("Location: /login");
}
?>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/school_owner.css">

</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand p-1" href="/auth"><?= $schoolme ?></a>
  <a class="navbar-brand" style='font-size: 16px; border:2px solid steelblue; padding: 10px;' href="#">TEACHER</a>
    <a class="navbar-brand ml-auto  navbar-image" href="#">
  	<?php if($row['picture'] === NULL){?>
    <img  class="main-image0111" src="image/images.png" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image0111" src="upload/<?= $random?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?></a>
  <a class="navbar-brand logout-session-2" href="#">Logout</a>
</nav>
<section>
	<div class="col-12">
	<div class='row position-relative side-left'>
	<!-- left sidebar -->
		<div class="col-lg-2 col-xm-12 col-sm-12 col-md-12 bg-light border-top p-0">
			<div onclick="expand()" class="d-lg-none ml-2 menu-push btn btn-success mb-1 mt-1"><i class="fa fa-bars"></i>
			
		</div>
			<ul class="d-lg-block d-md-bloc d-none list-group-flush p-0 list-group-lg list-group-horizontal-xm list-group-horizontal-sm  list-group-horizontal-md">
				<li  onclick="hidediv('Dashboard')" class="list-group-item list-group-item-action list-side active p-1">
					<i class="fa fa-coffee"></i> Dashboard
				</li>
				<li onclick="hidediv('Calender')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-calendar"></i>
					Calender
				</li>
				<li onclick="hidediv('Teachers')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-id-badge"></i>
					Teachers
				</li>
				<li onclick="hidediv('Events')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-paw"></i>
				Events
				</li>
				<li onclick="hidediv('Results')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-clone"></i>
				 Results
				</li>
				<li onclick="hidediv('Resources')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-cloud"></i>
					Resources
				</li>
				<li onclick="hidediv('Print')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-desktop"></i>
					Print E-paper
				</li>
				<li onclick="hidediv('Students')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-child"></i>
					Students
				</li>
				<li onclick="hidediv('Messages')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-envelope"></i>
					Messages
				</li>
				<li onclick="hidediv('Parents')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-cubes"></i>
					Parents
				</li>
				</li>
				<li onclick="hidediv('Profile')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-address-book"></i>
					Profile
				</li>
			</ul>
		</div>
		<!-- end of left sidebar -->
		<!-- right sidebar -->
		<div class="col-lg-10 col-xm-12 col-sm-12 col-md-12 bg-white  pt-2" id='right-sidebar'>
			<section class="Dashboard divhide">
				<?php include('teacher/dashboard.php')?>
			</section>
			<section class="Calender d-none divhide">
				<?php include('teacher/calender.php')?>
			</section>
			<section class="Teachers d-none divhide">
				<?php include('teacher/teacher.php')?>
			</section>
			<section class="Events d-none divhide">
				<?php include('teacher/event.php')?>
			</section>
			<section class="Results d-none divhide">
				<?php include('teacher/Result.php')?>
			</section>
			<section class="Print d-none divhide">
				<?php include('teacher/print.php')?>
			</section>
			<section class="Messages d-none divhide">
				<?php include('teacher/message.php')?>
			</section>
			<section class="Parents d-none divhide">
				<?php include('teacher/parent.php')?>
			</section>
			<section class="Students d-none divhide">
				<?php include('teacher/student.php')?>
			</section>
			<section class="Resources d-none divhide">
				<?php include('teacher/resource.php')?>
			</section>
			<section class="Profile d-none divhide">
				<?php include('teacher/profile.php')?>
			</section>
		</div>
		<!-- end sidebar -->
	</div>
	</div>
</section>
<section class="message-div-display bg-light">
	
</section>
<section class="message-div-display-2 mb-3">
   <div class="display-items-1 bg-light">
   <button class='close-my-custom-alert btn btn-danger btn-sm sm'>Close</button>  
   <div class="detail-div-1">
 
   </div> 	
   </div>
</section>
<script src="js/custom/school_function.js"></script>
<script src="js/custom/school_function2.js"></script>
<script src="js/custom/school_function3.js"></script>
<script src="js/custom/school_function4.js"></script>
<script src='js/custom/printThis.js'></script>
<script type="text/javascript" src='js/custom/preview.js'></script>
<script type="text/javascript">	
  $('.message-div-display').slideUp();
	let click = document.getElementsByClassName('list-side');
	let hides = document.getElementsByClassName('divhide');

	function hidediv(para)
	{
		
		for(hide of hides)
		{
			hide.classList.add('d-none');	
		}
		$('.'+para).removeClass('d-none');

		for(cl of click)
		{
			cl.classList.remove('active');
			
		}
		event.currentTarget.classList.add('active');


	}
	function expand()
	{
		
		$('.list-group-flush').toggleClass('d-none');
	}
</script>
<script src='js\sweatalert.js'></script>

</body>
</html>