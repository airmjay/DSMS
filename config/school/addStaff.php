<?php 
require('../conn.php');
$error = [];
$admin = $_POST['getid'];
$db = $_POST['getdb'];
$_POST['checked'] = 'checked';
 if(isset($_POST['loca']))
 {  
	$conn = mysqli_connect('localhost','root','', $db); 	
 	$location = cleanData($conn,$_POST['loca']);
 	$first = cleanData($conn,$_POST['first']);
 	$last = cleanData($conn,$_POST['last']);
 	$password = cleanData($conn,$_POST['password']);
 	$Cpassword = cleanData($conn,$_POST['confirm']);
 	$checked = cleanData($conn,$_POST['checked']);
 	$dob = cleanData($conn,$_POST['date']);
 	$email = cleanData($conn,$_POST['email']);
 	$post = cleanData($conn,$_POST['post']);
 	$tel = cleanData($conn,$_POST['tel']);
 	$state = cleanData($conn, $_POST['state']);
	foreach ($_POST as $key => $value) {
	if ($key != 'email' && $key != 'password' && $key != 'confirm' && $key != 'getid' && $key != 'getdb' && $key != 'date') {

		if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $_POST[$key]))
		{

		$error[] =  'Special character except in password field';
		$error_found = true;
    break;	
		 
		}
	}
	}
	if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow and empty field in last name field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^[a-zA-Z\s]+$/', $state))
   {
   }else{
      $error[] = 'Special character and number not allow and empty field in state name field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^(090|070|081|091)\d{8}$/', $tel))
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
   // if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   // {
   // }else{
   //      // echo "Special character and number not allow in other name field or empty field";
   //    $error[] = 'Special character and number not allow in other name field'.PHP_EOL;
   //    $error_found = true;

   // }
   if(preg_match('/^[a-zA-Z0-9\s.]+$/', $location))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found = true;

   }
   if(preg_match('/^[a-zA-Z\s]+$/', $post))
   {
   }else{
      $error[] = 'Special character and number not and empty allow in post field'.PHP_EOL;
      $error_found = true;
   }
	foreach ($_POST as $key => $value) {	
	
	if(empty($_POST[$key]))
	{
			$error[] = 'All input field is required';
			$error_found = true;
    	break;
	}
	}

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
	} else {
    $error[] =  "Email is not valid";
			$error_found = true;

	}
	if(preg_match('/^(196[0-9]|19[7-9][0-9]|200[0-4])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $dob))
         {
         }else
         {
            $error[] = 'Date format not allow only this is allow YYYY-MM-DD example 1999-11-02 and age should not be less than 20years for staff'.PHP_EOL;
            $error_found = true;

   		}
	$select = "SELECT  `email` FROM staff WHERE email = '$email'";
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
	if($Cpassword != $password)
	{
			$error[] = "Pasword Field is not the same with confirm Password";
			$error_found = true;
	}
	$password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);

	if(count($error) === 0)
	{
	$StaffId = $first.rand();
	$insert = "INSERT INTO `staff`(`firstname`, `lastname`, `phone`, `state`, `dateOfBirth`, `email`, `Post`, `password`,`unique_id`) VALUES ('$first','$last','$tel','$state','$dob','$email','$post','$password','$StaffId')";
	if(mysqli_query($conn,$insert))
	{
	// 	$in = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES ('$rand',
	// 	'Staff have successful added by $admin the email is $email')";
	// mysqli_query($conn1,$in);

	echo "<div class='alert alert-success alert-sm mt-2 p-1'> New Staff have been Successfully added  
	<script>$('#staff_id_print')[0].reset()</script></div>";

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
	// 	echo $error;
	// }
?>
