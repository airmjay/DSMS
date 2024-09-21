<?php
$getdb = $_POST['getdb'];
$conn = mysqli_connect('localhost','root','', $getdb);
$error = [];
function cleanData($conn, $data)
{
	$clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
	return $clean;
}
if(isset($_POST['val_attend']))
{

        $search = cleanData($conn, $_POST['val_attend']);
        $date = new DateTime();
        $time =  $date->format('m/d/20y');
        $select= "SELECT * FROM student WHERE S_id LIKE '%$search%' OR firstName LIKE '%$search%'
        OR id LIKE '%$search%' LIMIT 8";
        $fetch = mysqli_query($conn, $select);
        while($row = mysqli_fetch_array($fetch)){
         ?>
         <tr>
            <td class="sm attend-name-std"><?= $row['firstName']. " ". $row['surName'];?></td>
            <td class="sm attend-time-std"><?= $time ?></td>
            <td class="sm attend-class-std"><?= $row['S_id'] ?></td>
            <?php 
            $id = $row['uniqid_id'];
            $select = "SHOW TABLES LIKE 'attendance_std'";
            $row1 = mysqli_num_rows(mysqli_query($conn,$select));
            if($row1)
            {
                $select = "SELECT * FROM attendance_std WHERE attend_id = '$id' 
                AND attend_time = '$time'";
                if(mysqli_num_rows(mysqli_query($conn,$select)))
                {
                    echo "<td>Marked for today</td>";
                }else
                {
?>
                      <td class="sm">
            
                <input type="checkbox" name="Attendance-list-std" class="Attendance-list-std" value="<?=$row['uniqid_id'] ?>" name="">

                </td>
<?php 
                }
            }else
            {
                echo "<button class='create-attend-std btn btn-sm sm btn-success'> Create Attendance For you first Entry </button>";
            }
            ?>
            
        <?php } ?>
         </tr>
<?php
}
if(isset($_POST['add_teach']))
{
	
	$_POST['add_teach'] = 'active';
	$first = cleanData($conn, $_POST['first']);
	$other = cleanData($conn,$_POST['other']);
	$surname = cleanData($conn, $_POST['surname']);
	$post = cleanData($conn, $_POST['post']);
	$address = cleanData($conn, $_POST['address']);
	$class = cleanData($conn, $_POST['cla']);
	$date = cleanData($conn, $_POST['date']);
	$email = cleanData($conn, $_POST['email']);
	$password = cleanData($conn, $_POST['password']);
	$cpassword = cleanData($conn, $_POST['cpassword']);
    if(preg_match('/^[a-zA-Z0-9\s.]+$/', $address))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found = true;

   }
   if(preg_match('/^(196[0-9]|19[7-9][0-9]|200[0-4])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $date))
         {
         }else
         {
            $error[] = 'Date format not allow only this is allow YYYY-MM-DD example 1999-11-02 and age should not be less than 20years for staff'.PHP_EOL;
            $error_found = true;

   }
   if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character, number and and empty input not allow in first name field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   {
   }else{
      $error[] = 'Special character, number and empty input not allow in other field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^[a-zA-Z\s]+$/', $surname))
   {
   }else{
      $error[] = 'Special character, number and empty input not allow in surname field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^[a-zA-Z0-9\s]+$/', $post))
   {
   }else{
      $error[] = 'Special character, empty input not allow in post field'.PHP_EOL;
      $error_found = true;
   }
    // if(preg_match('/^[a-zA-Z0-9@]+$/', $username))
    //   {
    //      }else{
    //         $error[] = 'username only accept number and @'.PHP_EOL;
    //      }
foreach ($_POST as $key => $value) {
	if ($key != 'password' && $key != 'cpassword' && $key != 'getdb' && $key != 'date') {

		if(preg_match('/[\'£$%&*()}{#~?><>,|=+¬-]/', $_POST[$key]))
		{

		$error[] =  'Special character except in password field';
		$error_found = true;
    break;	
		 
		}
	}
	}
	foreach ($_POST as $key => $value) {	
	if($key != 'other'){
	if(empty($_POST[$key]))
	{
			$error[] =  'All input field is required';
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

	$select = "SELECT  `email` FROM teacher WHERE email = '$email'";
	$CheckStaff = mysqli_query($conn, $select);
	$emailCheckStaff =  mysqli_fetch_assoc($CheckStaff);
	if($emailCheckStaff)
	{
		if($emailCheckStaff['email'] === $email)
		{
			$error[] = "Email already exist";
			$error_found = true;

		}
	}
	if($cpassword != $password)
	{
			$error[] = "Pasword Field is not the same with confirm Password";
			$error_found = true;
	}
	$password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);

	if(count($error) === 0)
	{
	$Teacher = $first.$surname.rand();
	$insert = "INSERT INTO `teacher`(`firstName`, `surName`, `middleName`, `T_id`, `post`, `uniqid_id`, `email`, `address`, `password`) VALUES ('$first','$surname','$other','$class','$post','$Teacher','$email','$address','$password')";
	if(mysqli_query($conn,$insert))
	{
	// 	$in = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES ('$rand',
	// 	'Staff have successful added by $admin the email is $email')";
	// mysqli_query($conn1,$in);

	echo "<div class='alert alert-success alert-sm mt-2 p-1'> New Teacher have been Successfully added  
	<script>$('#Table_id_print')[0].reset()</script></div>";

}else
{
	echo "Unable to create Account for user try again later Thank you!";
}
}
}
if(isset($_POST['unique']))
{
	$id = $_POST['unique'];
	$select = "SELECT * FROM teacher WHERE uniqid_id = '$id'";
	$row = mysqli_fetch_array(mysqli_query($conn, $select));
	?>
	<div class="col-lg-10 col-md-10 col-12 mt-2">
	<div class="picture-div mb-1">
      <?php if($row['picture'] === NULL){?>
    <img id="img"  src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="img" src="upload/<?= $getdb ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>   
    </div>
     <div class="list-card p-1 border-success">
     	<span>Staff Name:</span> <?= $row['firstName']?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Lastname: </span>  <?= $row['surName'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Middle Name:</span>  <?= $row['middleName']?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Staff Email: </span>  <?= $row['email'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Post: </span>  <?= $row['post'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Date of join:</span>  <?=  $row['Date_of_join'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Address: </span>  <?= $row['address'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Status: </span>  <?= $row['status'] ?>
     </div>
     <div class="list-card p-1 border-success">
     	<span>Class: </span>  <?= $row['T_id'] ?>
     </div>
	</div>

<?php 
}
if(isset($_POST['uniquex']))
{
	$id = $_POST['uniquex'];
$select = "SELECT * FROM teacher WHERE uniqid_id = '$id'";
$row1 = mysqli_query($conn,$select);
$row = mysqli_fetch_array($row1);

	?>

<div id="" class="picture-div preview"> 
   <?php if($row['picture'] === NULL){?>
    <img id="image-preview-teacher" class="main-image111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="image-preview-teacher" class="main-image111" src="upload/<?= $getdb ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
 </div>
<form method="post" enctype="multipart/form-data">
  <label for="image-upload-teacher" class="sm" id="image-label-teacher">Choose File</label>
  <input class="d-none"  accept="image/png,image/jpeg,image/gif" type="file" name="image" id="image-upload-teacher" />
  <input class="d-none staff_id_teacher" value="<?= $row['uniqid_id']?>" name='IDstaff'>
  <br>
  <input type="button" id="but_upload_teacher" class="btn btn-success btn-sm sm boder" value="Update Image">
</form>
</div>
	</div>
	<div class="col-lg-10 col-md-10 col-12 mt-2 mb-5">
     <div class="d-flex align-items-center p-1"><span class="mr-2 sm">Firstname:</span> 
     <input class="sm p-3 form-control-sm form-control first-teacher-update" value="<?= $row['firstName']?>"></div>
     <div class="d-flex align-items-center p-1"><span class="mr-2">Lastname: </span> 
      <input class="sm p-3 form-control-sm form-control last-teacher-update" value="<?= $row['surName'] ?>"></div>
      <div class="d-flex align-items-center p-1"><span class="mr-2">Othername: </span> 
      <input class="sm p-3 form-control-sm form-control other-teacher-update" value="<?= $row['middleName'] ?>"></div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Post:</span>  
     	<input class="sm p-3 form-control-sm form-control post-teacher-update" value="<?= $row['post']?>"></div>
     <div class="sm d-flex align-items-center p-1 "><span class="mr-2 sm">Email: </span>  
     	<input class="sm p-3 form-control-sm form-control email-teacher-update" value="<?= $row['email'] ?>"></div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Status: </span> 
      <input class="sm p-3 form-control-sm form-control Status-teacher-update" value="<?= $row['status'] ?>">
   	</div>
   	<div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Address: </span> 
      <input class="sm p-3 form-control-sm form-control address-teacher-update" value="<?= $row['address'] ?>">
   	</div>
   	<div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Class: </span> 
      <input class="sm p-3 form-control-sm form-control class-teacher-update" value="<?= $row['T_id'] ?>">
   	</div>
      <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Password: </span> 
      <input class="sm p-3 form-control-sm form-control Password-teacher-update" value="" placeholder="ENTER YOUR PASSWORD">
      </div>
   	<div>
   		<button class="update-teacher btn btn-success btn-sm sm" value="<?= $row['uniqid_id'] ?>"> UPDATE DETAIL</button>
   	</div>
	</div>
	</div>
	</div>
	</div>
<?php }
if(isset($_POST['single'])){
    $first = cleanData($conn, $_POST['first']);
    $last = cleanData($conn, $_POST['last']);
    $post = cleanData($conn, $_POST['post']);
    $email = cleanData($conn, $_POST['email']);
    $other = cleanData($conn, $_POST['other']);
    $status = cleanData($conn, $_POST['status']);
    $id = cleanData($conn, $_POST['single']);
    $address = cleanData($conn, $_POST['address']);
    $select = "SELECT * FROM teacher WHERE uniqid_id = '$id'";
    $StaffId = mysqli_query($conn, $select);
    $singleId =  mysqli_fetch_assoc($StaffId);
    $password = cleanData($conn, $_POST['password']);
    $class = cleanData($conn, $_POST['clas']);
    $unique_email = $singleId['email'];
    foreach ($_POST as $key => $value) {
    if ($key != 'password' && $key != 'getdb' && $key != 'birth' && $key != 'email') {

        if(preg_match('/[\'£$%&*()}{#~?><>|=+¬-]/', $_POST[$key]))
        {

        $error[] =  'Special character except in password field';
        $error_found = true;
        break;  
         
        }
    }
    }
    if(preg_match('/^[0-2]$/', $status))
         {
         }else
         {
            $error[] = 'status code is between 0 - 2'.PHP_EOL;
            $error_found = true;

         }
    if(preg_match('/^[a-zA-Z\s]+$/', $last))
   {
   }else{
      $error[] = 'Special character and number not allow in last name field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   {
   }else{
        echo "Special character and number not allow in other name field or empty field";
      $error[] = 'Special character and number not allow in other name field'.PHP_EOL;
   }
   if(preg_match('/^[a-zA-Z0-9\s.]+$/', $address))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found = true;

   }
   if(preg_match('/^[a-zA-Z0-9\s]+$/', $class))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found = true;

   }
   if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow in first name field'.PHP_EOL;
   }

   if(preg_match('/^[a-zA-Z\s]+$/', $post))
   {
   }else{
      $error[] = 'Special character and number not allow in post field'.PHP_EOL;
      $error_found = true;
   }
    
    foreach ($_POST as $key => $value) {   
    if ($key != 'password' && $key != 'other' && $key != 'status') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required except only password field';
            $error_found = true;
        break;
    }
    }
    }
    
    if(!empty($_POST['email'])){
    $select = "SELECT  `email` FROM teacher WHERE email = '$email'";
    if(mysqli_num_rows(mysqli_query($conn, $select))){
    $CheckStaff = mysqli_query($conn, $select);
    $emailCheckStaff =  mysqli_fetch_assoc($CheckStaff);
    if($emailCheckStaff['email'] === $unique_email){
    }else{
    if($emailCheckStaff)
    {
        if($emailCheckStaff['email'] === $email)
        {
            $error[] = "Email already exist";
            $error_found = true;

        }
    } 
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    } else {
    $error[] =  "Email is not valid";
            $error_found = true;

    }
    }
    }

    if(count($error) === 0)
    {
    
    $update ="UPDATE `teacher` SET `firstName`='$first',`surName`='$last',`middleName`='$other',`post`='$post',`email`='$email',`address`='$address',`T_id`='$class',`status`='$status' WHERE uniqid_id = '$id'";
    if(mysqli_query($conn,$update))
    {
    
    echo "Staff data have been Successfully Updated";
    if(!empty($password))
    {
    $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
      $update ="UPDATE `teacher` SET `password`='$password' WHERE `uniqid_id`='$id'";
    if(mysqli_query($conn,$update))
    {
     echo " ->along with user Password";   
    }
    }

}else
{
    echo "Unable to create Account for user try again later Thank you!";
}
}
}
if(isset($_POST['del_token']))
{
    $key = $_POST['del_token'];
    $delete = "DELETE FROM `question` WHERE token = '$key'";
    if(mysqli_query($conn,$delete))
    {
        echo "Question has been delete";
    }
}
if(isset($_POST['editDelete1']))
{
    $key = $_POST['editDelete1'];
    $delete = "DELETE FROM `event` WHERE id = '$key'";
    if(mysqli_query($conn,$delete))
    {
        echo "Event has been delete";
    }
}
if(isset($_POST['del_token1']))
{
    $key = $_POST['del_token1'];
    $delete = "DELETE FROM `class` WHERE id = '$key'";
    if(mysqli_query($conn,$delete))
    {
        echo "Class has been delete";
    }
}

if(isset($_POST['val_attend1']))
{
        $search = cleanData($conn, $_POST['val_attend1']);
        $date = new DateTime();
        $time =  $date->format('m/d/20y');
        $select= "SELECT * FROM teacher WHERE id LIKE '%search%' OR email LIKE '%$search%' OR firstName LIKE '%$search%' LIMIT 8";
        $fetch = mysqli_query($conn, $select);
        while($row = mysqli_fetch_array($fetch)){
         ?>
         <tr>
            <td class="sm attend-name"><?= $row['firstName']. " ". $row['surName'];?></td>
            <td class="sm attend-time"><?= $time ?></td>
            <td class="sm attend-class"><?= $row['T_id'] ?></td>
            <?php 
            $id = $row['uniqid_id'];
            $select = "SHOW TABLES LIKE 'attendance'";
            $row1 = mysqli_num_rows(mysqli_query($conn,$select));
            if($row1)
            {
                $select = "SELECT * FROM attendance WHERE attend_id = '$id' 
                AND attend_time = '$time'";
                if(mysqli_num_rows(mysqli_query($conn,$select)))
                {
                    echo "<td>Marked for today</td>";
                }else
                {
?>
                      <td class="sm">
            
                <input type="checkbox" name="Attendance-list" class="Attendance-list" value="<?=$row['uniqid_id'] ?>" name="">

                </td>
<?php 
                }
            }
            ?>
            
        <?php } ?>
         </tr>  
<?php    
}
if(isset($_POST['attendance']))
{
	?>
<div class="table-responsive">
<input type="search" placeholder="search with teacher name" class="search-student-attendance-2 form-control form-control-sm sm mb-3 mt-3" name="">
 <table class="table mt-2">
 	<thead>
 		<tr>
 			<th class="sm">Name</th>
 			<th class="sm">Date</th>
 			<th class="sm">Class</th>
 			<th class="sm">Check</th>
 		</tr>
 	</thead>
 	<tbody class='d-display-student-2'>
 		<?php
       
 		$date = new DateTime();
		$time =  $date->format('m/d/20y');
 		$select= "SELECT * FROM teacher LIMIT 8";
 		$fetch = mysqli_query($conn, $select);
 		while($row = mysqli_fetch_array($fetch)){
 		 ?>
 		 <tr>
 		 	<td class="sm attend-name"><?= $row['firstName']. " ". $row['surName'];?></td>
 		 	<td class="sm attend-time"><?= $time ?></td>
 		 	<td class="sm attend-class"><?= $row['T_id'] ?></td>
 		 	<?php 
            $id = $row['uniqid_id'];
            $select = "SHOW TABLES LIKE 'attendance'";
            $row1 = mysqli_num_rows(mysqli_query($conn,$select));
            if($row1)
            {
                $select = "SELECT * FROM attendance WHERE attend_id = '$id' 
                AND attend_time = '$time'";
                if(mysqli_num_rows(mysqli_query($conn,$select)))
                {
                    echo "<td>Marked for today</td>";
                }else
                {
?>
                      <td class="sm">
            
                <input type="checkbox" name="Attendance-list" class="Attendance-list" value="<?=$row['uniqid_id'] ?>" name="">

                </td>
<?php 
                }
            }
            ?>
            
 		<?php } ?>
 		 </tr>
 
 	</tbody>
 </table>
 <div class="alert alert-sm sm attend-alert alert-info">Status Message:</div>
 <button class="submit-attendance sm btn-primary btn-sm create-attendance">Submit Attendance</button>
 </div>
<?php	
}
if (isset($error_found)) {
    echo $error[0] ;
}





?>