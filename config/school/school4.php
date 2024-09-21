<?php
$getdb = $_POST['getdb'];
$conn = mysqli_connect('localhost','root','', $getdb);
$error = [];
function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
if(isset($_POST['attendance']))
{
    $email = $_POST['emailattend'];
	?>
<div class="table-responsive">
<input type="search" placeholder="search with student first name, id , class" class="search-student-attendance-1 form-control form-control-sm sm mb-3 mt-3" name="">
 <table class="table mt-2">
 	<thead>
 		<tr>
 			<th class="sm">Name</th>
 			<th class="sm">Date</th>
 			<th class="sm">Class</th>
 			<th class="sm">Check</th>
 		</tr>
 	</thead>
 	<tbody class='d-display-student-1'>
 		<?php
        
            $select = "SELECT * FROM teacher  WHERE email = '$email'";
            if(mysqli_num_rows(mysqli_query($conn,$select)))
            {
                $schoolNameGet = mysqli_fetch_array(mysqli_query($conn,$select));
                if(!empty($schoolme = $schoolNameGet['T_id']))
                {
                    $schoolme = $schoolNameGet['T_id'];
                }else
                {

                }
                
            }else
            {
                $schoolme = "";
            }
 		$date = new DateTime();
		$time =  $date->format('m/d/20y');
 		$select= "SELECT * FROM student WHERE S_id = '$schoolme' LIMIT 8";
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
 
 	</tbody>
 </table>
 <div class="alert alert-sm sm attend-alert-std alert-info">Status Message:</div>
 <button class="submit-attendance sm btn-primary btn-sm create-attendance-std">Submit Attendance</button>
 </div>
<?php	
}
if(isset($_POST['single']))
{
    $id = $_POST['single'];
    $date = new DateTime();
    $time =  $date->format('m/d/20y');
    $select = "SHOW TABLES LIKE 'attendance_std'";
    $row = mysqli_num_rows(mysqli_query($conn,$select));
    if($row)
    {
     
    }else
    {
        $create = "CREATE TABLE attendance_std( id int primary key AUTO_INCREMENT,  attend_time varchar(100),  attend_id  varchar(300))";
        if(mysqli_query($conn, $create))
        {
            echo "attendance have be activated for the first time please clicked again <script>location = '/auth';</script>";
        
        }
    }
}
if(isset($_POST['single1']))
{
    $id = $_POST['single1'];
    $date = new DateTime();
    $time =  $date->format('m/d/20y');
    $select = "SHOW TABLES LIKE 'attendance_std'";
    $row = mysqli_num_rows(mysqli_query($conn,$select));
    if($row)
    {
      $insert = "INSERT INTO `attendance_std`(`attend_time`, `attend_id`) VALUES ('$time','$id')";
      if(mysqli_query($conn,$insert))
      {
        echo "attendance have been updated  <script> window.location.reload();</script>";
      }
    }
}
if(isset($_POST['unique']))
{
    $id = $_POST['unique'];
    $select = "SELECT * FROM student WHERE uniqid_id = '$id'";
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
        <span>Gender: </span>  <?= $row['email'] ?>
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
        <span>Id: </span>  <?= $row['id'] ?>
     </div>
     <div class="list-card p-1 border-success">
        <span>Date of birth: </span>  <?= $row['date_of_birth'] ?>
     </div>
     <div class="list-card p-1 border-success">
        <span>Class: </span>  <?= $row['S_id'] ?>
     </div>
    </div>

<?php 
}if(isset($_POST['uniquex']))
{
$id = $_POST['uniquex'];
$select = "SELECT * FROM student WHERE uniqid_id = '$id'";
$row1 = mysqli_query($conn,$select);
$row = mysqli_fetch_array($row1);

    ?>

<div id="" class="picture-div preview"> 
   <?php if($row['picture'] === NULL){?>
    <img id="image-preview-std" class="main-image111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="image-preview-std" class="main-image111" src="upload/<?= $getdb ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
 </div>
<form method="post" enctype="multipart/form-data">
  <label for="image-upload-std" class="sm" id="image-label-std">Choose File</label>
  <input class="d-none"  accept="image/png,image/jpeg,image/gif" onchange="change()" type="file" name="image" id="image-upload-std" />
  <input class="d-none staff_id_std" value="<?= $row['uniqid_id']?>" name='IDstaff'>
  <br>
  <input type="button" id="but_upload_std" class="btn btn-success btn-sm sm boder" value="Update Image">
</form>
</div>
    </div>
    <div class="col-lg-10 col-md-10 col-12 mt-2 mb-5">
     <div class="d-flex align-items-center p-1"><span class="mr-2 sm">Firstname:</span> 
     <input class="sm p-3 form-control-sm form-control first-std-update" value="<?= $row['firstName']?>"></div>
     <div class="d-flex align-items-center p-1"><span class="mr-2">Lastname: </span> 
      <input class="sm p-3 form-control-sm form-control last-std-update" value="<?= $row['surName'] ?>"></div>
      <div class="d-flex align-items-center p-1"><span class="mr-2">Othername: </span> 
      <input class="sm p-3 form-control-sm form-control other-std-update" value="<?= $row['middleName'] ?>"></div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Post:</span>  
        <input class="sm p-3 form-control-sm form-control post-std-update" value="<?= $row['post']?>"></div>
     <div class="sm d-flex align-items-center p-1 "><span class="mr-2 sm">Gender: </span>  
        <input  class="sm p-3 form-control-sm form-control email-std-update" value="<?= $row['email'] ?>"></div>
     <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Date of Birth: </span> 
      <input type='date' class="sm p-3 form-control-sm form-control birth-std-update" value="<?= $row['date_of_birth'] ?>">
    </div>
    <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Address: </span> 
      <input class="sm p-3 form-control-sm form-control address-std-update" value="<?= $row['address'] ?>">
    </div>
    <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Class: </span> 
      <input class="sm p-3 form-control-sm form-control class-std-update" value="<?= $row['S_id'] ?>">
    </div>
      <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Password: </span> 
      <input class="sm p-3 form-control-sm form-control Password-std-update" value="" placeholder="ENTER YOUR PASSWORD">
      </div>
    <div>
        <button class="update-std-profile btn btn-success btn-sm sm" value="<?= $row['uniqid_id'] ?>"> UPDATE DETAIL</button>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php }
if(isset($_POST['parent']))
{
  $first = cleanData($conn, $_POST['first']);
    $surname = cleanData($conn, $_POST['surname']);
    $other = cleanData($conn, $_POST['other']);
    $address = cleanData($conn, $_POST['address']);
    $p_id = cleanData($conn, $_POST['p_id']);
    $email = cleanData($conn, $_POST['email']);
    $password = cleanData($conn, $_POST['password']);
    $cpassword = cleanData($conn, $_POST['cpassword']);
foreach ($_POST as $key => $value) {
    if ($key != 'parent' && $key != 'password' && $key != 'cpassword' && 
        $key != 'getdb' && $key != 'address') {

        if(preg_match('/[\'£$%&*()}{#~?><>|=+¬-]/', $_POST[$key]))
        {

        $error[] = $key. 'Special character except in password field';
        $error_found = true;
    break;  
         
        }
    }
    }
    if(preg_match('/^([1-9]\d*(?:,|$))+$/', $p_id))
         {
         }else
         {
            $error[] = 'child id should be seperated with comma seperated 1,2 or 1'.PHP_EOL;
            $error_found = true;

         }
    if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow in last name field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^[a-zA-Z\s]+$/', $surname))
   {
   }else{
      $error[] = 'Special character and number not allow in last name field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   {
   }else{
        // echo "Special character and number not allow in other name field or empty field";
      $error[] = 'Special character and number not allow in other name field'.PHP_EOL;
      $error_found = true;

   }
   if(preg_match('/^[a-zA-Z0-9\s.]+$/', $address))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found = true;

   }
  
    foreach ($_POST as $key => $value) {    
    if($key != 'other' && $key != 'email'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
        break;
    }
    }
    }

    if(!empty($email)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    } else {
    $error[] =  "Email is not valid";
            $error_found = true;

    }
    $select = "SELECT  `email` FROM parent WHERE email = '$email'";
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
    }
    if($cpassword != $password)
    {
            $error[] = "Pasword Field is not the same with confirm Password";
            $error_found = true;
    }
    $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);

    if(count($error) === 0)
    {
    $prt = $first.$surname.rand();
    $insert = "INSERT INTO `parent`(`firstName`, `surName`, `middleName`, `uniqid_id`, `email`, `address`,`parent_id`,`password`) VALUES ('$first','$surname','$other','$prt','$email','$address','$p_id','$password')";
    if(mysqli_query($conn,$insert))
    {
    //  $in = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES ('$rand',
    //  'Staff have successful added by $admin the email is $email')";
    // mysqli_query($conn1,$in);

    echo "<div class='alert alert-success alert-sm mt-2 p-1'> New parent have been Successfully added  
    <script>$('#Table_id_print_prt')[0].reset()</script></div>";

}else
{
    echo "Unable to create Account for user try again later Thank you!";
}
}  
}
if(isset($_POST['singlex'])){
    $first = cleanData($conn, $_POST['first']);
    $last = cleanData($conn, $_POST['last']);
    $post = cleanData($conn, $_POST['post']);
    $email = cleanData($conn, $_POST['email']);
    $other = cleanData($conn, $_POST['other']);
    $birth = cleanData($conn, $_POST['birth']);
    $id = cleanData($conn, $_POST['singlex']);
    $address = cleanData($conn, $_POST['address']);
    $select = "SELECT * FROM student WHERE uniqid_id = '$id'";
    $StaffId = mysqli_query($conn, $select);
    $singleId =  mysqli_fetch_assoc($StaffId);
    $password = cleanData($conn, $_POST['password']);
    $class = cleanData($conn, $_POST['clas']);
    $unique_email = $singleId['email'];
    if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow and empty field in first name field'.PHP_EOL;
      $error_found1 = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   {
   }else{
        // echo "Special character and number not allow in other name field or empty field";
      $error[] = 'Special character and number not allow in other name field'.PHP_EOL;
      $error_found1 = true;

   }
   // if(preg_match('/^(090|070|081|091)\d{8}$/', $tel))
   // {
   // }else{
   //    $error[] = 'phone number format not accepted'.PHP_EOL;
   //    $error_found = true;
   // }
   if(preg_match('/^[a-zA-Z\s]+$/', $last))
   {
   }else{
      $error[] = 'Special character and number not allow in and empty field surname field'.PHP_EOL;
      $error_found1 = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   {
   }else{
        // echo "Special character and number not allow in other name field or empty field";
      $error[] = 'Special character and number not allow in other name field'.PHP_EOL;
      $error_found1 = true;

   }
   if(preg_match('/^[a-zA-Z0-9\s.]+$/', $address))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found1 = true;

   }
   if(!empty($birth)){
   $p_march  = preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $birth, $matches);
   if($p_march){
   $year = $matches[1];
   $month = $matches[2];
   
   if($year <= 2023)
   {

   }else
   {
    $error[] = 'we don"t take little infant or empty birthday field'.PHP_EOL;
      $error_found1 = true;
   }
    }else
    {
        $error[] = 'Birth field is incorrect'.PHP_EOL;
      $error_found1 = true;
    }
   }else{
    $error[] = 'birthday field required or valid birthday year should be enter'.PHP_EOL;
      $error_found1 = true;
   }
      if(preg_match('/^[a-zA-Z0-9\s]+$/', $class))
   {
   }else
   {
      $error[] = 'Special character not accept and empty input in class'.PHP_EOL;
      $error_found1 = true;

   }
   if(!empty($post))
   {
    if(preg_match('/^[a-zA-Z\s]+$/', $post))
   {
   }else{
      $error[] = 'Special character and number not allow in and empty field post field'.PHP_EOL;
      $error_found1 = true;
   }    
   }
    foreach ($_POST as $key => $value) {
    if ($key != 'password' && $key != 'getdb' && $key != 'birth') {

        if(preg_match('/[\'£$%&*()}{#~?><>,|=+¬-]/', $_POST[$key]))
        {

        $error[] =  'Special character except in password field';
        $error_found1 = true;
        break;  
         
        }
    }
    }
    foreach ($_POST as $key => $value) {   
    if ($key != 'password' && $key != 'other' && $key != 'status') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found1 = true;
        break;
    }
    }
    }

    if(count($error) === 0)
    {
    $update ="UPDATE `student` SET `firstName`='$first',`surName`='$last',`middleName`='$other',
    `post`='$post',`email`='$email',`address`='$address',`S_id`='$class', `date_of_birth` = '$birth' WHERE uniqid_id = '$id'";
    if(mysqli_query($conn,$update))
    {
    
    echo "Student data have been Successfully Updated";
    if(!empty($password))
    {
    $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
      $update ="UPDATE `student` SET `password`='$password' WHERE `uniqid_id`='$id'";
    if(mysqli_query($conn,$update))
    {
     echo " ->along with student Password";   
    }
    }

}else
{
    echo "Unable to create Account for user try again later Thank you!";
}
}
}
if(isset($_POST['uniqueprt']))
{
    $id = $_POST['uniqueprt'];
    $select = "SELECT * FROM parent WHERE uniqid_id = '$id'";
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
        <span>Date of join:</span>  <?=  $row['Date_of_join'] ?>
     </div>
     <div class="list-card p-1 border-success">
        <span>Address: </span>  <?= $row['address'] ?>
     </div>
     <div class="list-card p-1 border-success">
        <span>Id: </span>  <?= $row['id'] ?>
     </div>
     
     <div class="list-card p-1 border-success">
        <span>Children ID: </span>  <?= $row['parent_id'] ?>
     </div>
    </div>

<?php 
}
if(isset($_POST['singlexprt'])){
    $first = cleanData($conn, $_POST['first']);
    $last = cleanData($conn, $_POST['last']);
    $email = cleanData($conn, $_POST['email']);
    $other = cleanData($conn, $_POST['other']);
    $p_id = cleanData($conn, $_POST['p_id']);
    $id = cleanData($conn, $_POST['singlexprt']);
    $address = cleanData($conn, $_POST['address']);
    $select = "SELECT * FROM parent WHERE uniqid_id = '$id'";
    $StaffId = mysqli_query($conn, $select);
    $singleId =  mysqli_fetch_assoc($StaffId);
    $password = cleanData($conn, $_POST['password']);
    $unique_email = $singleId['email'];
    foreach ($_POST as $key => $value) {
    if ($key != 'password' && $key != 'getdb' && $key != 'p_id'&& $key != 'address') {

        if(preg_match('/[\'£$%&*()}{#~?><>,|=+¬-]/', $_POST[$key]))
        {

        $error[] =  'Special character except in password field';
        $error_found1 = true;
        break;  
         
        }
    }
    }
    if(preg_match('/^([1-9]\d*(?:,|$))+$/', $p_id))
         {
         }else
         {
            $error[] = 'child id should be seperated with comma seperated 1,2 or 1'.PHP_EOL;
            $error_found1 = true;

         }
    if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow in last name field'.PHP_EOL;
      $error_found1 = true;
   }
   if(preg_match('/^[a-zA-Z\s]+$/', $last))
   {
   }else{
      $error[] = 'Special character and number not allow in last name field'.PHP_EOL;
      $error_found1 = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   {
   }else{
        // echo "Special character and number not allow in other name field or empty field";
      $error[] = 'Special character and number not allow in other name field'.PHP_EOL;
      $error_found1 = true;

   }
   if(preg_match('/^[a-zA-Z0-9\s.]+$/', $address))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found1 = true;

   }
   if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow in first name field'.PHP_EOL;
      $error_found1 = true;

   }
    foreach ($_POST as $key => $value) {   
    if ($key != 'password' && $key != 'email' && $key != 'other' && $key != 'status') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found1 = true;
        break;
    }
    }
    }
    if(!empty($email)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    } else {
    $error[] =  "Email is not valid";
            $error_found1 = true;

    }
    
    $select = "SELECT  `email` FROM parent WHERE email = '$email'";
    $CheckStaff = mysqli_query($conn, $select);
    $emailCheckStaff =  mysqli_fetch_assoc($CheckStaff);
    if(!empty($emailCheckStaff['email'])){
    if($emailCheckStaff['email'] === $unique_email){
    
    }else
    {
    if($emailCheckStaff)
    {
        if($emailCheckStaff['email'] === $email)
        {
            $error[] = "Email already exist";
            $error_found1 = true;

        }
    }
    }
    }
    }
    if(count($error) === 0)
    {
    $update ="UPDATE `parent` SET `firstName`='$first',`surName`='$last',`middleName`='$other',`email`='$email',`address`='$address',`parent_id`='$p_id' WHERE `uniqid_id` =  '$id'";
    if(mysqli_query($conn,$update))
    {
    
    echo "Parent data have been Successfully Updated";
    if(!empty($password))
    {
    $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
      $update ="UPDATE `parent` SET `password`='$password' WHERE `uniqid_id`='$id'";
    if(mysqli_query($conn,$update))
    {
     echo " ->along with student Password";   
    }
    }

}else
{
    echo "Unable to create Account for user try again later Thank you!";
}
}
}
if (isset($error_found)) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>".$error[0]."</div>" ;
}
if (isset($error_found1)) {
    echo $error[0];
}
if(isset($_POST['uniquexstd']))
{
$id = $_POST['uniquexstd'];
$select = "SELECT * FROM parent WHERE uniqid_id = '$id'";
$row1 = mysqli_query($conn,$select);
$row = mysqli_fetch_array($row1);

    ?>

<div  class="picture-div preview"> 
   <?php if($row['picture'] === NULL){?>
    <img id="image-preview-prt" class="main-image111prt" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="image-preview-prt" class="main-image111prt" src="upload/<?= $getdb ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
 </div>
<form method="post" enctype="multipart/form-data">
  <label for="image-upload-prt" class="sm" id="image-label-prt">Choose File</label>
  <input class="d-none"  accept="image/png,image/jpeg,image/gif" type="file" name="image" id="image-upload-prt" />
  <input class="d-none staff_id_prt" value="<?= $row['uniqid_id']?>" name='IDstaff'>
  <br>
  <input type="button" id="but_upload_prt" class="btn btn-success btn-sm sm boder" value="Update Image">
</form>
</div>
    </div>
    <div class="col-lg-10 col-md-10 col-12 mt-2 mb-5">
     <div class="d-flex align-items-center p-1"><span class="mr-2 sm">Firstname:</span> 
     <input class="sm p-3 form-control-sm form-control first-prt-update" value="<?= $row['firstName']?>"></div>
     <div class="d-flex align-items-center p-1"><span class="mr-2">Lastname: </span> 
      <input class="sm p-3 form-control-sm form-control last-prt-update" value="<?= $row['surName'] ?>"></div>
      <div class="d-flex align-items-center p-1"><span class="mr-2">Othername: </span> 
      <input class="sm p-3 form-control-sm form-control other-prt-update" value="<?= $row['middleName'] ?>"></div>
     <div class="sm d-flex align-items-center p-1 "><span class="mr-2 sm">Email: </span>  
        <input class="sm p-3 form-control-sm form-control email-prt-update" value="<?= $row['email'] ?>"></div>
    <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Address: </span> 
      <input class="sm p-3 form-control-sm form-control address-prt-update" value="<?= $row['address'] ?>">
    </div>
    <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Child: </span> 
      <input class="sm p-3 form-control-sm form-control p_id-prt-update" value="<?= $row['parent_id'] ?>">
    </div>
      <div class="sm d-flex align-items-center p-1"><span class="mr-2 sm">Password: </span> 
      <input class="sm p-3 form-control-sm form-control Password-prt-update" value="" placeholder="ENTER YOUR PASSWORD">
      </div>
    <div>
        <button class="update-prt-profile btn btn-success btn-sm sm" value="<?= $row['uniqid_id'] ?>"> UPDATE DETAIL</button>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php }
