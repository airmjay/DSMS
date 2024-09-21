<?php 
session_start();
$_SESSION['session'] = 'admin';
$conn1 = mysqli_connect('localhost','root','', 'school');
	$_SESSION['db'] = 'school';
if(isset($_SESSION['loginAdminSessionGet']))
{

	$session = $_SESSION['loginAdminSessionGet'];
   $select = "SELECT * FROM staff_session WHERE session = '$session'";
   $fetch = mysqli_query($conn1, $select);
   if(mysqli_num_rows($fetch))
   {
      $fetch1 = mysqli_fetch_array($fetch);
      $fetchId = $fetch1['userId'];
      $select = "SELECT * FROM staff WHERE staffId = '$fetchId'";
		$row1 = mysqli_query($conn1,$select);
		$row = mysqli_fetch_array($row1);
		if($row['staffId'] === '100')
		{
			?>

			<?php
		}else
		{
			?>
			<style type="text/css">
				.authorization
				{
					display: none;
				}
			</style>
			<?php
		}

   ?>
   <input class="d-none verify_id_get" value="<?= $id = $fetch1['userId'] ?>" >
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
<script type="text/javascript">

</script>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand  text-sm p-1" href="/admin"><b>DSMS</b></a>
  <a class="navbar-brand" style='font-size: 16px; border:2px solid steelblue; padding: 10px;' href="#">DSMS ADMINISTRATOR</a>
  <a class="navbar-brand ml-auto  navbar-image" href="#">
  	<?php if($row['picture'] === ''){?>
    <img  class="main-image0111" src="image/images.png" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image0111" src="upload/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?></a>
  <a class="navbar-brand logout-session" href="#">Logout</a>
</nav>
<section>


	<div class="col-12">
	<div class='row position-relative side-left'>
	<!-- left sidebar -->
		<div class="col-lg-2 col-xm-12 col-sm-12 col-md-12 bg-light border-top sticky-top p-0">
			<div onclick="expand()" class="d-lg-none ml-2 menu-push"><i class="fa fa-bars"></i>
			
		</div>
			<ul class="d-lg-block d-md-bloc d-none list-group-flush p-0 list-group-lg list-group-horizontal-xm list-group-horizontal-sm  list-group-horizontal-md">
				<li onclick="active('Dashboard')" class="fa fa-book list-group-item list-group-item-action list-side active p-2"> Dashboard</li>
				<li onclick="active('Staffs')" class="fa fa-users list-group-item list-group-item-action list-side p-2">
				Staffs</li>
				<li onclick="active('School_managers')" class="fa fa-school list-group-item list-group-item-action list-side p-2"> School Managers
				</li>
				<li onclick="active('Add_pages')" class="fa fa-laptop list-group-item list-group-item-action list-side p-2"> Add Pages
				</li>
				<li onclick="active('message')" class="fa fa-leaf list-group-item list-group-item-action list-side p-2">
				Message
				</li>
				<li onclick="active('Profile')" class="fa fa-user list-group-item list-group-item-action list-side p-2"> Profile
				</li>
				<lni onclick="active('Activities')" class="fa fa-motorcycle list-group-item list-group-item-action list-side p-2"> Activities
				</li>
			</ul>
		</div>
		<!-- end of left sidebar -->
		<!-- right sidebar -->
		<div class="col-lg-10 col-xm-12 col-sm-12 col-md-12 bg-white  pt-2" id='right-sidebar'>
			<section class="Dashboard">
				<?php include('admin_pages/dashboard.php')?>
			</section>
			<section class="Staffs d-none">
				<?php include('admin_pages/staffs.php')?>
			</section>
			<section class="School_managers d-none">
				<?php include('admin_pages/school.php')?>
			</section>
			<section class="Add_pages d-none">
				<?php include('admin_pages/add_pages.php')?>
			</section>
			<section class="message d-none">
				<?php include('admin_pages/message.php')?>
			</section>
			<section class="Profile d-none">
				<?php include('admin_pages/profile.php')?>
			</section>
			<section class="Activities d-none">
				<?php include('admin_pages/activities.php')?>
			</section>
		</div>
		<!-- end sidebar -->
	</div>
	</div>
</section>
<section class="message-div-display bg-light">
	
</section>
<section class="message-div-display-2">
   <div class="display-items-1 bg-light">
   <button class='close-my-custom-alert btn btn-danger btn-sm sm'>Close</button>  
   <div class="detail-div-1">
   	
   </div> 	
   </div>
</section>

<script src='js/custom/printThis.js'></script>
<script src='js/custom/admin-staff-2.js'></script>
<script type="text/javascript" src='js/custom/preview.js'></script>
<script type="text/javascript">	
	let click = document.getElementsByClassName('list-side');
  $('.message-div-display').slideUp();
	
	function active(show)
	{
		for(cl of click)
		{
			cl.classList.remove('active');
			
		}
		event.currentTarget.classList.add('active');
		if(!$('.Dashboard').hasClass('d-none'))
		{
           $('.Dashboard').addClass('d-none')
		}
		if(!$('.Staffs').hasClass('d-none'))
		{
           $('.Staffs').addClass('d-none')
		}
		if(!$('.School_managers').hasClass('d-none'))
		{
            $('.School_managers').addClass('d-none')
		}
		if(!$('.Add_pages').hasClass('d-none'))
		{
           $('.Add_pages').addClass('d-none')
		}
		if(!$('.message').hasClass('d-none'))
		{
            $('.message').addClass('d-none')
		}
		if(!$('.Profile').hasClass('d-none'))
		{
         	$('.Profile').addClass('d-none')        
		}
		if(!$('.Activities').hasClass('d-none'))
		{
            $('.Activities').addClass('d-none')
		}
		$("."+show).removeClass('d-none');
		
	}
	function expand()
	{
		
		$('.list-group-flush').toggleClass('d-none');
	}
</script>
<script src='js\sweatalert.js'></script>

</body>
</html>