<?php
require('conn.php');
if(isset($_POST['adminID']))
{
   $admin = $_POST['adminID'];
}
if(isset($_POST['id']))
{
$id = $_POST['id'];
$select = "SELECT * FROM dswp WHERE unique_id = '$id'";
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
    <img class="main-image0111" src="upload_school/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>   
	</div>
	</div>
	<div class="col-lg-10 col-md-10 col-12 mt-2">
     <div class="list-card"><span>Staff Name:</span> <?= $row['school_name']?></div>
     <div class="list-card"><span>Location: </span>  <?= $row['email'] ?></div>
     <div class="list-card"><span>Date of Join:</span>  <?=  $row['date_of_join'] ?></div>
     <div class="list-card"><span>Status </span>  <?= $row['status'] ?></div>
     <div class="list-card"><span>School ID: </span>  <?= $row['id'] ?></div>
	</div>
	</div>
	</div>
	</div>
<?php } ?>
<?php
if(isset($_POST['idEdit']))
{
$idEdit = $_POST['idEdit'];
$select = "SELECT * FROM dswp WHERE unique_id = '$idEdit'";
$row1 = mysqli_query($conn1,$select);
$row = mysqli_fetch_array($row1);
echo '<div class="p-2"><button class="btn btn-danger sm close-div mb-2">Close X</button>' ?>
   <div class="card p-2">
	<div class="row">
	<div class="col-lg-2 col-md-10 col-12">
	<div id="image-preview120" class="picture-div preview"> 
   <?php if($row['picture'] === ''){?>
    <img  class="main-image011121" id='school-img-preview' src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image011121" id='school-img-preview' src="upload_school/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
   </div>
   <div >
  <form method="post" enctype="multipart/form-data">
  <label for="image-upload121" class="sm" id="image-labelSchool">Choose File</label>
  <input class="d-none"  accept="image/png,image/jpeg,image/gif" onchange="change()" type="file" name="image" id="image-upload121" />
  <input class="d-none school_id_change" value="<?= $row['unique_id']?>" name='IDschool'/>
  <br>
  <input type="button" id="but_upload_get" class="btn btn-success btn-sm sm boder" value="Update Image"></form>
</div>
	</div>
	<div class="col-lg-10 col-md-10 col-12 mt-2">
     <div class="list-card d-flex"><span class="mr-2 sm">Name:</span> 
     <input type="text" class="form-control-sm form-control name-school-dswp" value="<?= $row['school_name']?>"></div>
     <div class="list-card d-flex"><span class="mr-2">Email: </span>  
     	<input type="email" class="form-control-sm form-control email-school-dswp" value="<?= $row['email'] ?>"></div>
     <div class="list-card d-flex"><span class="mr-2">Status: </span> 
      <input type="number" class="form-control-sm form-control Status-school-dswp" value="<?= $row['status'] ?>">
   	</div>
   	<div class="list-card d-flex"><span class="mr-2">Password: </span> 
      <input type="password" class="form-control-sm form-control password-school-dswp" placeholder="Enter a new password or leave it blank so Password will not be updated!">
   	</div>
   	<div>
   		<button class="update-dswp btn btn-success btn-sm" value="<?= $row['unique_id'] ?>"> UPDATE DETAIL</button>
   	</div>
	</div>
	</div>
	</div>
	</div>
<?php }


if(isset($_POST['update_dswp']))
    	{ $error = [];
    		$id = cleanData($conn1,$_POST['update_dswp']);
    		$email = cleanData($conn1,$_POST['email']);
    		$name = cleanData($conn1,$_POST['schoolName']);
    		$password = cleanData($conn1,$_POST['password']);
    		$status = cleanData($conn1,$_POST['statusInt']);
    		$passwordCheck = cleanData($conn1,$_POST['passwordCheck']);
    		$password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
   	$selectSchoolName1 = "SELECT `school_name` FROM `dswp` WHERE unique_id = '$id'";
	$checkName1 = mysqli_query($conn1, $selectSchoolName1);
	$NameCheck1 =  mysqli_fetch_assoc($checkName1);
	$NameCheckMatch = $NameCheck1['school_name'];
	$select1 = "SELECT  `email` FROM dswp WHERE unique_id = '$id'";
	$check1 = mysqli_query($conn1, $select1);
	$emailCheck1 =  mysqli_fetch_assoc($check1);
	$emailCheckMatch = $emailCheck1['email'];
	if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $name))
	{
		$error[] = "<div class='p-1 alert-sm alert-danger mt-2'>
		Special character not allow in school name".PHP_EOL;
	}
	
	$select = "SELECT  `email` FROM dswp WHERE email = '$email'";
	$check = mysqli_query($conn1, $select);
	$emailCheck =  mysqli_fetch_assoc($check);
	if($emailCheckMatch !== $email)
	{
	if($emailCheck)
	{
		if($emailCheck['email'] === $email)
		{
			$error[] = "Email already Exist you can create another branch in existing account please?";
		}
	}
	}
	$selectSchoolName = "SELECT `school_name` FROM `dswp` WHERE school_name = '$name'";
	$checkName = mysqli_query($conn1, $selectSchoolName);
	$NameCheck =  mysqli_fetch_assoc($checkName);
	if($NameCheckMatch !== $name)
	{
	if($NameCheck)
	{
		if($NameCheck['school_name'] === $name)
		{
			$error[] = "School name already exist you can add a number to make it unique or use another school name please edit and try again";
		}
	}
	}
	if(count($error) === 0){
    		if($passwordCheck == 'change')
    		{
    		$row1  = "UPDATE `dswp` SET `password`='$password' WHERE unique_id ='$id'";
    		if(mysqli_query($conn1, $row1))
    		{
    			echo "<div class='alert alert-success p-1 mt-1'>Password Updated and </div>";
				$date = new DateTime();
    			$rand = rand().$date->format('mdygia')."activitiesUpatestaff".$name;
         $smart = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES
                ('$rand','School profile and password edited by $admin with id $id:')";
                mysqli_query($conn1,$smart);
    		}

    		}
    		$row1  = "UPDATE `dswp` SET `status` = '$status',`school_name`='$name',`email`='$email' WHERE unique_id ='$id'";
    		if(mysqli_query($conn1, $row1))
    		{
    			echo "<div class='p-1 alert-sm alert-success mt-1'>School Detail Sucessfully Updated</div>";
    			$date = new DateTime();
				$rand =  $date->format('mdygia');
    			$rand = rand().$rand."activitiesUpatestaff".$name;
         $smart = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES
                ('$rand','School profile edited by $admin with id $id:')";
                mysqli_query($conn1,$smart);
                ?> 
                <script>
                   $(document).click(function()
                   {
                     location.reload(true);
                   })
                </script>
         <?php
    		}else
    		{
    			echo "<div class='p-1 alert-sm alert-danger mt-2'>Some Error occur try again later!</div>";
    		}
    }

    foreach($error as $error)
	{
		echo "<div class='sm alert-sm alert-danger mt-2'> $error</div>";
		break;
	}
    	}


    ?>


