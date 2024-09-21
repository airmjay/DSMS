<?php
require('conn.php');
$error = [];
if(isset($_POST['adminID']))
{
   $admin = $_POST['adminID'];
}
array_map('trim', $_POST);
if(isset($_POST['idEdit']))
{
$idEdit = $_POST['idEdit'];
$select = "SELECT * FROM staff WHERE staffId = '$idEdit'";
$row1 = mysqli_query($conn1,$select);
$row = mysqli_fetch_array($row1);
echo '<div class="p-2"><button class="btn btn-danger sm close-div mb-2">Close X</button>' ?>
   <div class="card p-2">
	<div class="row">
	<div class="col-lg-2 col-md-10 col-12">
	<div id="image-preview" class="picture-div preview"> 
   <?php if($row['picture'] === ''){?>
    <img id="img-admin-preview" class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>

    <img id="img-admin-preview" class="main-image0111" src="upload/<?= $row['picture']?>" width="90%" height="100%"> 
   <?php }?>
   </div>
   <div >
  <form method="post" enctype="multipart/form-data">
  <label for="image-upload" class="sm" id="image-label">Choose File</label>
  <input class="d-none"  accept="image/png,image/jpeg,image/gif" onchange="change()" type="file" name="image" id="image-upload" />
  <input class="d-none staff_id_staffy" value="<?= $row['staffId']?>" name='IDstaff'/>
  <br>
  <input type="button" id="but_upload" class="btn btn-success btn-sm sm boder" value="Update Image"></form>
</div>
	</div>
	<div class="col-lg-10 col-md-10 col-12 mt-2">
     <div class="list-card d-flex align-items-center p-1"><span class="mr-2 sm">Name:</span> 
     <input class="sm p-3 form-control-sm form-control name-staffy" value="<?= trim($row['staff_name'])?>"></div>
     <div class="list-card d-flex align-items-center p-1"><span class="mr-2">Location: </span> 
      <input class="sm p-3 form-control-sm form-control location-staffy" value="<?= trim($row['staff_location']) ?>"></div>
     <div class="list-card d-flex align-items-center p-1"><span class="mr-2">Post:</span>  
     	<input class="sm p-3 form-control-sm form-control post-staffy" value="<?= trim($row['staff_post'])?>"></div>
     <div class="list-card d-flex align-items-center p-1 "><span class="mr-2">Email: </span>  
     	<input class=" sm p-3 form-control-sm form-control email-staffy" value="<?= trim($row['staff_email']) ?>"></div>
     <div class="list-card d-flex align-items-center p-1"><span class="mr-2">Birth: </span>  
     	<input type='date' class="sm p-3 form-control-sm form-control birth-staffy" value="<?= trim($row['dateOfBirth']) ?>"></div>
     <div class="d-none"><span class="mr-2">DateOfJoin:</span>  
     	<input class="sm p-3 form-control-sm form-control join-staffy" value="<?=  trim($row['dateOfJoin']) ?>"></div>
     <div class="list-card d-flex align-items-center p-1"><span class="mr-2">Username: </span> 
     	<input class="form-control-sm form-control name-staffy-2" value="<?= trim($row['staff_username']) ?>"></div>
     <div class="list-card d-flex align-items-center p-1"><span class="mr-2">Status: </span> 
      <input class="sm p-3 form-control-sm form-control Status-staffy" value="<?= trim($row['status']) ?>">
   	</div>
      <div class="list-card d-flex align-items-center p-1"><span class="mr-2">Password: </span> 
      <input class="sm p-3 form-control-sm form-control Password-staffy" value="" placeholder="ENTER YOUR PASSWORD">
      </div>
   	<div>
   		<button class="update-staffy btn btn-success btn-sm" value="<?= $row['staffId'] ?>"> UPDATE DETAIL</button>
   	</div>
	</div>
	</div>
	</div>
	</div>
<?php }
$error = [];

if(isset($_POST['email_staffy']))
    	{
    		$update_staff = cleanData($conn1,$_POST['update_staff']);
    		$email = cleanData($conn1,$_POST['email_staffy']);
    		$name = trim(cleanData($conn1,$_POST['name_staffy']));
    		$location = trim(cleanData($conn1,$_POST['location_staffy']));
    		$post = cleanData($conn1,$_POST['post_staffy']);
    		$birth = cleanData($conn1,$_POST['birth_staffy']);
    		$Date = cleanData($conn1,$_POST['email_staffy']);
    		$username = cleanData($conn1,$_POST['username_staffy']);
         $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
    	   $status  = (string) cleanData($conn1,$_POST['status_staffy']);
         if(preg_match('/^[0-2]$/', $status))
         {
         }else
         {
            $error[] = 'status code is between 0 - 2'.PHP_EOL;

         }
         if(preg_match('/^[a-zA-Z0-9\s.]+$/', $location))
         {
         }else
         {
            $error[] = 'Address is invalid'.PHP_EOL;

         }

         if(preg_match('/^[a-zA-Z\s]+$/', $name))
         {
         }else{
            $error[] = 'Special character and number not allow in name field'.PHP_EOL;
         }
         if(preg_match('/^[a-zA-Z\s]+$/', $post))
         {
         }else{
            $error[] = 'Special character and number not allow in post field'.PHP_EOL;
         }
         if(preg_match('/^[a-zA-Z0-9@]+$/', $username))
      {
         }else{
            $error[] = 'username only accept number and @'.PHP_EOL;
         }
         $selectCheck = "SELECT  * FROM staff WHERE staffId = '$update_staff'";
         $Verify = mysqli_query($conn1, $selectCheck);
         $fetchverify =  mysqli_fetch_assoc($Verify);
         if($_POST['passwordCheck'] === 'Not Chage')
         {
           $_POST['password'] = 'Password';
         }else
         {
            $update = "UPDATE staff SET password = '$password'";
            if(mysqli_query($conn1,$update))
            {
               echo "<div class='alert sm mt-2 alert-success alert-sm mb-1'>Staff Password Updated</div>";
            }else
            {
               echo "<div class='alert sm mt-2 alert-danger alert-sm mb-1'>Staff Password Not Updated</div>";

            }
         }
         if(preg_match('/^(196[0-9]|19[7-9][0-9]|200[0-4])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $birth))
         {
         }else
         {
            $error[] = 'Date format not allow only this is allow YYYY-MM-DD example 1999-11-02 and age should not be less than 20years for staff'.PHP_EOL;

         }
         if(filter_var($email, FILTER_VALIDATE_EMAIL))
         {

         }else
         {
           $error[] = 'Please check your email'.PHP_EOL; 
         }
         if($fetchverify['staff_email'] === $email)
         {
         }else{
         $select = "SELECT  `staff_email` FROM staff WHERE staff_email = '$email'";
         $CheckStaff = mysqli_query($conn1, $select);
         $emailCheckStaff =  mysqli_fetch_assoc($CheckStaff);
         if($emailCheckStaff)
         {
            if($emailCheckStaff['staff_email'] === $email)
            {
         $error[] = "Email already exist";
            }
         }
         }
         if($fetchverify['staff_username'] === $username)
         {

         }else{
         $select1 = "SELECT  `staff_username` FROM staff WHERE staff_username = '$username'";
         $checkUsername = mysqli_query($conn1, $select1);
         $CheckUsername =  mysqli_fetch_assoc($checkUsername);
         if($CheckUsername)
         {
            if($CheckUsername['staff_username'] === $username)
            {
            $error[] = "User already exist";
         }
         }
         }
         foreach ($_POST as $key => $value) {
         if(empty($_POST[$key]))
         {
         $error[] =  'All input field is required except password field'.PHP_EOL;
         }
         
         }
         if(count($error)  === 0){
    		$row1  = "UPDATE `staff` SET `staff_name`='$name',`staff_location`='$location',`staff_post`='$post',`staff_email`='$email',`dateOfBirth`='$birth',`status`='$status',`staff_username`='$username' WHERE staffId = '$update_staff'";
    		if(mysqli_query($conn1, $row1))
    		{
    			echo "<div class='alert alert-success sm alert-sm mt-2'> Staff Detail Sucessfully Updated</div>";
            $date = new DateTime();
            $rand =  $date->format('mdygia');
            $rand = rand().$rand."activitiesUpatestaff".$username;
         $smart = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES
                ('$rand','staff profile edited by $admin with id $update_staff:')";
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
    			echo "Some Error occur try again later!";
    		}
      }
foreach($error as $error)
{
   echo "<div class='alert alert-danger alert-sm sm mt-1 mb-0'>".$error."</div>";
}
    	} ?>
