<?php 
$conn = mysqli_connect('localhost','root','', $random);
$select = "SELECT * FROM teacher WHERE email = '$email'";
$row = mysqli_fetch_array(mysqli_query($conn, $select));
?>
<b> Profile </b>
<div class="card p-2 shadow">
<div class="row">
	
	<div class="col-lg-3 col-xl-3 col-md-4 col-12">
		<div class="d-flex flex-column justify-items-center align-items-center border-dark">
			<span class="d-block mt-1 sm">Date of Join: 12/12/2012</span>
		<span class="d-block mt-1 sm">Name: <?= $row['firstName'].' '. $row['surName'];?></span>
			<!-- <span class="d-block mt-1 sm">Date of Birth: <?= 12 ?></span> -->
			<span class="d-block mt-1 sm">Address: <?= $row['address']?></span>
			<span class="d-block mt-1 sm">Class Teach: <?= $row['T_id']?></span>
			<span class="d-block mt-1 sm text-center">Email Address: <?= $row['email']?></span>
	
<div id="image-preview-teacher" class="picture-div preview"> 
   <?php if($row['picture'] === NULL){?>
    <img id="img" class="main-image111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="img" class="main-image111" src="upload/<?= $random ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
 </div>
<form method="post" enctype="multipart/form-data">
  <label for="image-upload-teacher" class="sm" id="image-label-teacher">Choose File</label>
  <input class="d-none"  accept="image/png,image/jpeg,image/gif" onchange="change()" type="file" name="image" id="image-upload-teacher" />
  <input class="d-none staff_id_teacher" value="<?= $row['uniqid_id']?>" name='IDstaff'>
  <br>
  <input type="button" id="but_upload_teacher" class="btn btn-success btn-sm sm boder" value="Update Image">
</form>
     <script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload-teacher",
    preview_box: "#image-preview-teacher",
    label_field: "#image-label-teacher"
  });
});
function change()
{
   file = $('#image-upload-teacher').val()
   if(file === '')
   {

   }else
   {
      $('.main-image111').css('display', 'none')
   }
}
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
			<input type="text" value="<?= $row['firstName'] ?>" placeholder="enter your first name" class="outline-none form-control first-profile-name form-control-sm">
			<label>Enter your first lastname</label>
			<input type="text" value="<?= $row['surName'] ?>" name="" placeholder="enter your last name" class="form-control form-control-sm last-profile-name">
			<label>Enter your Email</label>
			<input type="text" value="<?= $row['email'] ?>" name="" placeholder="enter your Email" class="form-control form-control-sm email-profile-name">
			<label>Enter your Phone</label>
			<?php 
			$select = "SELECT *  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$random' 
        AND TABLE_NAME = 'teacher' AND COLUMN_NAME = 'phone'";
        if(mysqli_num_rows(mysqli_query($conn, $select)) > 0){

        ?>
        <input type="text" value="<?= $row['phone']?>" name="" placeholder="enter your Phone" class="form-control form-control-sm phone-profile-name">
        
        <?php
        }else{ ?>
        	<input type="text" value="" name="" placeholder="enter your Phone" class="form-control form-control-sm phone-profile-name">
			<?php  } ?>
			<label>Enter your Address</label>
			<input type="text" value="<?= $row['address'] ?>" name="" placeholder="enter your State" class="form-control form-control-sm state-profile-name">
			<label>Enter your Password</label>
			<input type="text"name="" placeholder="enter your password" class="form-control form-control-sm password-profile-name">
			<button type="button" class="btn btn-success mt-2 sm update_staff_profile_last-1" value='<?= $row['id']?>'>Submit</button>
		</form>
	</div>
	</div>
	
	
</div>
</div>