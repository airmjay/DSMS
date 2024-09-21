<?php 
$conn = mysqli_connect('localhost','root','', $random);
$select = "SELECT * FROM staff WHERE email = '$email'";
$row = mysqli_fetch_array(mysqli_query($conn, $select));
?>
<b> Profile </b>
<div class="card p-2 shadow">
<div class="row">
	
	<div class="col-lg-3 col-xl-3 col-md-4 col-12">
		<div class="d-flex flex-column justify-items-center align-items-center border-dark">
			<span class="d-block mt-1 sm">Date of Join: 12/12/2012</span>
			<span class="d-block mt-1 sm">Name: <?= $row['firstname'].' '. $row['lastname'];?></span>
			<span class="d-block mt-1 sm">Date of Birth: <?= $row['dateOfBirth'] ?></span>
			<span class="d-block mt-1 sm">Address: <?= 1//$row['']?></span>
			<span class="d-block mt-1 sm">Phone: <?= $row['phone']?></span>
			<span class="d-block mt-1 sm">Email Address: <?= $row['email']?></span>
	
<div class="picture-div preview"> 
   <?php if($row['picture'] === null){?>
    <img id="img-to-preview-profile" class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="img-to-preview-profile" class="main-image0111" src="upload/<?= $random ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
 </div>
<form method="post" enctype="multipart/form-data">
  <label for="image-upload" class="sm" id="image-label">Choose File</label>
  <input class="d-none" accept="image/png,image/jpeg,image/gif" type="file" name="image" id="image-upload" />
  <input class='d-none staff_id_staffy-101000' value="<?= $row['unique_id']?>" name='IDstaff'>
  <br>
  <input type="button" id="but_upload" class="btn btn-success btn-sm sm boder" value="Update Image">
</form>

</script>		 
</div>
	</div>
	<div class="col-lg-9 col-xl-9 col-md-8 col-12">
		<div class="bold">
			Update Information
		</div>
	<div class="card shadow mt-2 p-3 border-dark">
		<form>
			<label>Enter your first name</label>
			<input type="text" value="<?= $row['firstname'] ?>" placeholder="enter your first name" class="outline-none form-control first-profile-name form-control-sm">
			<label>Enter your first lastname</label>
			<input type="text" value="<?= $row['lastname'] ?>" name="" placeholder="enter your last name" class="form-control form-control-sm last-profile-name">
			<label>Enter your Email</label>
			<input type="text" value="<?= $row['email'] ?>" name="" placeholder="enter your Email" class="form-control form-control-sm email-profile-name">
			<label>Enter your Phone</label>
			<input type="text" value="<?= $row['phone'] ?>" name="" placeholder="enter your Phone" class="form-control form-control-sm phone-profile-name">
			<label>Enter your Address</label>
			<input type="text" value="<?= $row['state'] ?>" name="" placeholder="enter your State" class="form-control form-control-sm state-profile-name">
			<label>Enter your Password</label>
			<input type="text"name="" placeholder="enter your State" class="form-control form-control-sm password-profile-name">
			<button type="button" class="btn btn-success mt-2 sm update_staff_profile_last" value='<?= $row['id']?>'>Submit</button>
		</form>
	</div>
	</div>
	
	
</div>
</div>