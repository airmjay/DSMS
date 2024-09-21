<?php
require('conn.php');
if(isset($_POST['id']))
{
$id = $_POST['id'];
$select = "SELECT * FROM staff WHERE staffId = '$id'";
$row1 = mysqli_query($conn1,$select);
$row = mysqli_fetch_array($row1);
echo '<div class="p-2"><button class="btn btn-danger sm close-div mb-2">Close X</button>' ?>
   <div class="card p-2">
	<div class="row">
	<div class="col-lg-2 col-md-10 col-12">
	<div class="picture-div">
<?php if($row['picture'] === ''){?>
    <img  class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img class="main-image0111" src="upload/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
	</div>
	</div>
	<div class="col-lg-10 col-md-10 col-12 mt-2">
     <div class="list-card"><span>Staff Name:</span> <?= $row['staff_name']?></div>
     <div class="list-card"><span>Location: </span>  <?= $row['staff_location'] ?></div>
     <div class="list-card"><span>Post:</span>  <?= $row['staff_post']?></div>
     <div class="list-card"><span>Staff Email: </span>  <?= $row['staff_email'] ?></div>
     <div class="list-card"><span>Date of Birth: </span>  <?= $row['dateOfBirth'] ?></div>
     <div class="list-card"><span>Date of employment</span>  <?=  $row['dateOfJoin'] ?></div>
     <div class="list-card"><span>Username </span>  <?= $row['staff_name'] ?></div>
     <div class="list-card"><span>Status </span>  <?= $row['status'] ?></div>
	</div>
	</div>
	</div>
	</div>
<?php } ?>

