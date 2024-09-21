<?php 
require('conn.php');
require('ip.php');
$error = [];
$admin = $_POST['adminID'];

 if($_POST['locationStaff'])
 {  

 	$location = cleanData($conn,$_POST['locationStaff']);
 	$name = cleanData($conn,$_POST['nameCheckSpecial']);
 	$password = cleanData($conn,$_POST['password']);
 	$dob = cleanData($conn,$_POST['birthStaff']);
 	$email = cleanData($conn,$_POST['email']);
 	$post = cleanData($conn,$_POST['postStaff']);
 	$username = cleanData($conn,$_POST['usernameStaff']);
	$password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);

   if(preg_match('/^[a-zA-Z0-9\s.]+$/', $location))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;

   }
   if(preg_match('/^(196[0-9]|19[7-9][0-9]|200[0-4])-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $dob))
         {
         }else
         {
            $error[] = 'Date format not allow only this is allow YYYY-MM-DD example 1999-11-02 and age should not be less than 20years for staff'.PHP_EOL;

   }
   if(preg_match('/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/', $name))
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
	foreach ($_POST as $key => $value) {
		
		if(empty($_POST[$key]))
		{
			echo $key ."=". $value;
			$error[] = 'All input field is required'.PHP_EOL;
		}
	}
	if(count($error) === 0)
	{
	$selectdowcount = "SELECT `id` FROM `staffcount` ORDER BY `id` DESC LIMIT 1";

	$checkCount = mysqli_query($conn1, $selectdowcount);
	$CheckValidCount =  mysqli_fetch_assoc($checkCount);
	if($CheckValidCount)
	{
		$StaffId = $CheckValidCount['id'] + 1;
		if($StaffId)
		{
			$update = "UPDATE `staffcount` SET `id`='$StaffId'";
			mysqli_query($conn1,$update);
		} 

		
	}else
	{
		echo "Unable to create Account for user try again later Thank you!";
	}
	$insert = "INSERT INTO `staff`(`staff_name`, `staff_location`, `staff_post`, `staff_email`, `dateOfBirth`, `password`, `status`, `staff_username`, `staffId`) VALUES ('$name','$location','$post','$email','$dob','$password','1','$username','$StaffId')";
	if(mysqli_query($conn1,$insert))
	{
	$date = new DateTime();
	$rand =  $date->format('mdygia').$StaffId;
	$in = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES ('$rand',
		'Staff have successful added by $admin the email is $email')";
	mysqli_query($conn1,$in);

	echo "All have been Successfully added";
	
}else
{
	echo "Unable to create Account for user try again later Thank you!";
}
}
}
  foreach($error as $error)
	{
		echo $error.PHP_EOL;
	}
?>
