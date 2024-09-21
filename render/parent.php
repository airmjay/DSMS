<?php 
session_start();
$_SESSION['session'] = 'parent';
$conn1 = mysqli_connect('localhost','root','', 'school');
$conn11 = mysqli_connect('localhost','root','', 'school');
if(isset($_SESSION['ParentloginSchoolSessionPost']))
{
	$session = $_SESSION['ParentloginSchoolSessionPost'];
	$random = $_SESSION['ParentloginSchoolSessionPostrandomdb'];
	
	$_SESSION['db'] = $random;
   $select = "SELECT * FROM staff_session WHERE session = '$session'";
   $fetch = mysqli_query($conn1, $select);
   if(mysqli_num_rows($fetch))
   {
      $fetch1 = mysqli_fetch_array($fetch);
      $fetchId = $fetch1['userId'];
			$conn1 = mysqli_connect('localhost','root','', $random);
      $select = "SELECT * FROM parent WHERE id = '$fetchId'";
		$row1 = mysqli_query($conn1,$select);
		$row = mysqli_fetch_array($row1);
		$email = $row['email'];
		$name = $row['firstName']. " ".$row['surName'];
		// echo $row['firstname'];
   ?>
   <?php
   $select = "SELECT * FROM dswp WHERE unique_id = '$random'";
	if(mysqli_num_rows(mysqli_query($conn11,$select)))
	{
		$schoolNameGet = mysqli_fetch_array(mysqli_query($conn11,$select));
		$schoolme = $schoolNameGet['school_name'];
	}
	?>
   <input class="d-none verify_id_get" value="<?= $id = $row['email'] ?>" >
   <input class="d-none verify_id_db" value="<?= $random?>" >
   <input class="d-none verify_id_name" value="<?= $name?>" >



	<?php
   }else{
		header("Location: /login");
   	// echo "hello";
   }
	}else{
	header("Location: /login");
}
?>


<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="css/school_owner.css">
<link rel="stylesheet" href="css/parent.css">

</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand  text-sm p-1" href="/admin"><?= $schoolme?></a>
  <a class="navbar-brand" style='font-size: 16px; border:2px solid steelblue; padding: 10px;' href="#">PARENT</a>
   <a class="navbar-brand ml-auto  navbar-image" href="#">
  	<?php if($row['picture'] === ''){?>
    <img  class="main-image0111" src="image/images.png" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image0111" src="upload/<?=$random?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?></a>
  <a class="navbar-brand logout-session" href="#">Logout</a>
</nav>
<section>
	<div class="col-12">
	<div class='row position-relative side-left'>
	<!-- left sidebar -->
		<div class="col-lg-2 col-xm-12 col-sm-12 col-md-12 bg-light border-top p-0">
			<div onclick="expand()" class="d-lg-none ml-2 menu-push btn btn-success mb-1 mt-1"><i class="fa fa-bars"></i>
			
		</div>
			<ul class="d-lg-block d-md-bloc d-none list-group-flush p-0 list-group-lg list-group-horizontal-xm list-group-horizontal-sm  list-group-horizontal-md">
				<li  onclick="hidediv('Profile')" class="list-group-item list-group-item-action list-side active p-1">
					<i class="fa fa-coffee"></i> Profile
				</li>
				<li onclick="hidediv('Cprofile')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-users"></i> Child Profile
				</li>
				<li onclick="hidediv('Calender')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-calendar"></i>
					Child Result
				</li>
				<li onclick="hidediv('Messages')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-id-badge"></i>
					Message
				</li>
				<li onclick="hidediv('Resources')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-paw"></i>
				Resources
				</li>
				<li onclick="hidediv('Events')" class="list-group-item list-group-item-action list-side p-1">
					<i class="fa fa-paw"></i>
				Event
				</li>
				
			</ul>
		</div>
		<!-- end of left sidebar -->
		<!-- right sidebar -->
		<div class="col-lg-10 col-xm-12 col-sm-12 col-md-12 bg-white  pt-2" id='right-sidebar'>
			<section class="divhide">
				<div class="text-center mt-1 card p-4 shadow boder pb-5">
				<h1>DASHBOARD</h1><hr>
<section>
<div class='p-2'>
     <?php
    $conn = mysqli_connect('localhost','root','', $random);
    $select = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM student"));
    $select1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM teacher"));
    $select2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM staff"));
    // $select = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM "));
    ?>
			  <h1 class="text-success">WELCOME <?= strtoupper($name)?></h1>
    <div class='row'>
        <div class="col-4 p-2">
            <div style="height:100px;" class='bg-primary card text-center text-white p-2 pt-4 pb-4 big'>
                Number of Student (<?= $select ?>) 
            </div> 
        </div>
        <div class="col-4 p-2">
        <div style="height:100px;" class='bg-success card text-center text-white p-2 pt-4 pb-4 big'>
            Number of Teachers (<?= $select1 ?>)
        </div>

        </div>
        <div class="col-4 p-2">
        <div style="height:100px;" class='bg-info card text-center text-white p-2 pt-4 pb-4 big'>
            Number of Staff (<?= $select2 ?>)
        </div>
        </div>
    </div>

</div>
</section>
			  </div>
			</section>
			<section class="d-none Profile divhide">
				<?php include('parent/profile.php')?>
			</section>
			<section class="Cprofile d-none divhide">
				<?php include('parent/childProfile.php')?>
			</section>
			<section class="Calender d-none divhide">
				<?php include('parent/result.php')?>
			</section>
			<section class="Messages d-none divhide">
				<?php include('parent/message.php')?>
			</section>
			<section class="Resources d-none divhide">
				<?php include('parent/resources.php')?>
			</section>
			<section class="Events d-none divhide">
				<?php include('parent/event.php')?>
			</section>
			
		</div>
		<!-- end sidebar -->
	</div>
	</div>
</section>
<div class="receipt-div-print-click d-none d-print-block">
	
</div>
<script src="js/custom/school_function.js"></script>
<script src="js/custom/parent/parent.js"></script>
<script src='js/custom/printThis.js'></script>
<script type="text/javascript">	
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
$('.logout-session').click(function()
{
  logout3 = $(this).val();
  $.post('config/logout.php',{logout3:logout3},function(data)
  {
    $('body').html(data);
  })
    
})
</script>
</body>
</html>