<?php
$db = $_POST['getdb'];
$conn = mysqli_connect('localhost','root','', $db);
function cleanData($conn, $data)
{
$clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
return $clean;
}
if(isset($_POST['displayuser']))
{
$id = $_POST['displayuser'];
$select = "SELECT * FROM staff WHERE unique_id = '$id'";
$row1 = mysqli_query($conn,$select);
$row = mysqli_fetch_array($row1);

?>
<div class="col-lg-10 col-md-10 col-12 mt-2">
	<div class="picture-div mb-1">
      <?php if($row['picture'] === ''){?>
    <img id="img"  src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="img" src="upload/<?= $db ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>   
    </div>
     <div class="list-card p-1 border-success">
     	<span>Staff Name:</span> <?= $row['firstname']?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Lastname: </span>  <?= $row['lastname'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Phone:</span>  <?= $row['phone']?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Staff Email: </span>  <?= $row['email'] ?>
     </div>
     <div class="list-card p-1 border-success">
        <span>Unique ID: </span>  <?= $row['unique_id'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Date of Birth: </span>  <?= $row['dateOfBirth'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Date of employment:</span>  <?=  $row['dateOfJoin'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Staff Post: </span>  <?= $row['post'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Status: </span>  <?= $row['status'] ?>
     </div>
	</div>
<?php
}
if(isset($_POST['Edituser']))
{
$id = $_POST['Edituser'];
$select = "SELECT * FROM staff WHERE unique_id = '$id'";
$row1 = mysqli_query($conn,$select);
$row = mysqli_fetch_array($row1);

	?>

<div class="picture-div preview"> 
   <?php if($row['picture'] === ''){?>
    <img id="image-preview" class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="image-preview" class="main-image0111" src="upload/<?= $db ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
 </div>
<form method="post" enctype="multipart/form-data">
  <label for="image-upload" class="sm" id="image-label">Choose File</label>
  <input class="d-none"  accept="image/png,image/jpeg,image/gif" type="file" name="image" id="image-upload" />
  <input class="d-none staff_id_staffy-101000" value="<?= $row['unique_id']?>" name='IDstaff'>
  <br>
  <input type="button" id="but_upload" class="btn btn-success btn-sm sm boder" value="Update Image">
</form>
    
</div>
	</div>
	<div class="col-lg-10 col-md-10 col-12 mt-2 mb-5">
        <div class="sticky-message"></div>
     <div class="d-flex align-items-center p-1"><span class="mr-2 sm">Firstname:</span> 
     <input class="sm p-3 form-control-sm form-control first-staffy-update" value="<?= $row['firstname']?>"></div>
     <div class="d-flex align-items-center p-1"><span class="mr-2">Lastname: </span> 
      <input class="sm p-3 form-control-sm form-control last-staffy-update" value="<?= $row['lastname'] ?>"></div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Post:</span>  
     	<input class="sm p-3 form-control-sm form-control post-staffy-update" value="<?= $row['post']?>">
     </div>
     <div class="sm d-flex align-items-center p-1 "><span class="mr-2 sm">Email: </span>  
     	<input class="sm p-3 form-control-sm form-control email-staffy-update" value="<?= $row['email'] ?>"></div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Birth: </span>  
     	<input type="date" class="sm p-3 form-control-sm form-control birth-staffy-update" value="<?= $row['dateOfBirth'] ?>"></div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Status: </span> 
      <input class="sm p-3 form-control-sm form-control Status-staffy-update" value="<?= $row['status'] ?>">
   	</div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Phone: </span> 
      <input class="sm p-3 form-control-sm form-control Phone-staffy-update" value="<?= $row['phone'] ?>">
    </div>
      <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Password: </span> 
      <input class="sm p-3 form-control-sm form-control Password-staffy-update" value="" placeholder="ENTER YOUR PASSWORD">
      </div>
   	<div>
   		<button class="update-staffy btn btn-success btn-sm sm" value="<?= $row['unique_id'] ?>"> UPDATE DETAIL</button>
   	</div>
	</div>
	</div>
	</div>
	</div>
<?php 
}
$error = [];
if(isset($_POST['email']))
{
    $first = cleanData($conn, $_POST['first']);
    $last = cleanData($conn, $_POST['last']);
    $post = cleanData($conn, $_POST['post']);
    $email = cleanData($conn, $_POST['email']);
    $birth = cleanData($conn, $_POST['birth']);
    $status = cleanData($conn, $_POST['status']);
    $id = cleanData($conn, $_POST['single']);
    $phone = cleanData($conn, $_POST['phone']);
    $select = "SELECT * FROM staff WHERE unique_id = '$id'";
    $StaffId = mysqli_query($conn, $select);
    $singleId =  mysqli_fetch_assoc($StaffId);
    $password = cleanData($conn, $_POST['password']);
    $unique_email = $singleId['email'];
    if(preg_match('/^[0-2]$/', $status))
         {
         }else
         {
            $error[] = 'status code is between 0 - 2'.PHP_EOL;
            $error_found = true;

            }
    if(preg_match('/^(196[0-9]|19[7-9][0-9]|200[0-4])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $birth))
         {
         }else
         {
            $error[] = 'Date format not allow only this is allow YYYY-MM-DD example 1999-11-02 and age should not be less than 20years for staff'.PHP_EOL;
            $error_found = true;

        }
    if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow and empty field in last name field'.PHP_EOL;
      $error_found = true;
   }
   
   if(preg_match('/^(090|070|081|091)\d{8}$/', $phone))
   {
   }else{
      $error[] = 'phone number format not accepted'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^[a-zA-Z\s]+$/', $last))
   {
   }else{
      $error[] = 'Special character and number not allow in and empty field last name field'.PHP_EOL;
      $error_found = true;
   }
    foreach ($_POST as $key => $value) {
    if ($key != 'email' && $key != 'password' && $key != 'getid' && $key != 'getdb' && $key != 'birth') {

        if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $_POST[$key]))
        {

        $error[] =  'Special character except in password field';
        $error_found = true;
        break;  
         
        }
    }
    }
    foreach ($_POST as $key => $value) {   
    if ($key != 'password') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required except only password field';
            $error_found = true;
        break;
    }
    }
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    } else {
    $error[] =  "Email is not valid";
            $error_found = true;

    }
    
    $select = "SELECT  `email` FROM staff WHERE email = '$email'";
    if(mysqli_num_rows(mysqli_query($conn, $select))){
    $CheckStaff = mysqli_query($conn, $select);
    $emailCheckStaff =  mysqli_fetch_assoc($CheckStaff);
    if($emailCheckStaff['email'] === $unique_email){
    
    }else
    {
    if($emailCheckStaff)
    {
        if($emailCheckStaff['email'] === $email)
        {
            $error[] = "Email already exist";
            $error_found = true;

        }
    }
    }
    }else
    {
     
    }

    if(count($error) === 0)
    {
    $update ="UPDATE `staff` SET `firstname`='$first',`lastname`='$last',`phone`='$phone',`dateOfBirth`='$birth',`email`='$email',`Post`='$post' WHERE `unique_id`='$id'";
    if(mysqli_query($conn,$update))
    {
    
    echo "<div class='alert alert-success alert-sm mt-2 p-1'> Staff data have been Successfully Updated </div>";
    if(!empty($password))
    {
    $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
      $update ="UPDATE `staff` SET `password`='$password' WHERE `unique_id`='$id'";
    if(mysqli_query($conn,$update))
    {
     echo "<div class='alert alert-success alert-sm mt-2 p-1'> along with user Password</div>";   
    }
    }

}else
{
    echo "Unable to create Account for user try again later Thank you!";
}
}
}
if (isset($error_found)) {
    echo '<div class="alert alert-danger alert-sm mt-2 p-1">' . $error[0] . '</div>';
}
 //  foreach($error as $error)
    // {
    //  echo $error;
    // }
?>
<?php 
?>