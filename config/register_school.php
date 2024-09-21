<?php 
$error = [];
$add = [];
require('conn.php');
require('ip.php');
$ip = getIpAddress();
// $admin = $_POST['adminID'];
if(isset($_POST['schoolName']))
{
	//button:button,schoolName:schoolName,email:email,password:password
	$schoolName = cleanData($conn,$_POST['schoolName']);
	$email = cleanData($conn, $_POST['email']);
	$password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);

	if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $schoolName))
	{
		$error[] = 'Special character not allow in school name'.PHP_EOL;
	}
	
	$select = "SELECT  `email` FROM dswp WHERE email = '$email'";
	$check = mysqli_query($conn1, $select);
	$emailCheck =  mysqli_fetch_assoc($check);
	if($emailCheck)
	{
		if($emailCheck['email'] === $email)
		{
			$error[] = "Email already Exist you can create another branch in existing account please?";
		}
	}
	$selectSchoolName = "SELECT `school_name` FROM `dswp` WHERE school_name = '$schoolName'";
	$checkName = mysqli_query($conn1, $selectSchoolName);
	$NameCheck =  mysqli_fetch_assoc($checkName);
	if($NameCheck)
	{
		if($NameCheck['school_name'] === $schoolName)
		{
			$error[] = "School name already exist you can add a number to make it unique or use another school name please edit and try again";
		}
	}
	foreach ($_POST as $key => $value) {
		
		if(empty($_POST[$key]))
		{
			echo $key ."=". $value;
			$error[] = 'All input field is required'.PHP_EOL;
		}
	}
	
	if(count($error) === 0){
	
	$date = new DateTime();
	$time =  $date->format('mdygia');
	$rand =  "DB".rand().$time;
	$check1 = "INSERT INTO `dswp`(`school_name`, `email`, `unique_id`,`password`,`IP_address`) VALUES 
	('$schoolName','$email','$rand','$password', '$ip')";
	if(mysqli_query($conn1, $check1)){

	$check2 = "CREATE DATABASE $rand";

	if(mysqli_query($conn,$check2))
	{
		echo "Account Successfully created".PHP_EOL;
		$add[] = "CREATE table parent(id int primary key AUTO_INCREMENT,firstName varchar(100), surName varchar(100), middleName varchar(100), uniqid_id varchar(100), email varchar(300), address varchar(300), parent_id varchar(100), picture varchar(100), password varchar(100),Date_of_join DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
		$add[] = "CREATE table teacher(id int primary key AUTO_INCREMENT,firstName varchar(100), surName varchar(100), middleName varchar(100),class_id int(10),post varchar(300),uniqid_id varchar(100), email varchar(300), address varchar(300), T_id varchar(100), picture varchar(100), password varchar(100),Date_of_join DATETIME DEFAULT CURRENT_TIMESTAMP,status smallInt DEFAULT 0)";
		$add[] = "CREATE table student(id int primary key AUTO_INCREMENT, firstName varchar(100), surName varchar(100), middleName varchar(100), class_id int(10),post varchar(300), uniqid_id varchar(100), email varchar(300), address varchar(300), S_id varchar(100), picture varchar(100), password varchar(100),Date_of_join DATETIME DEFAULT CURRENT_TIMESTAMP, date_of_birth varchar(100))"; 
		$add[] = "CREATE table class(id int primary key AUTO_INCREMENT,name varchar(100), class_id int(10),uniqid_id varchar(100), status smallInt DEFAULT 0)";
		$add[] = "CREATE table messageBox(id int primary key AUTO_INCREMENT,sender varchar(300), reciever varchar(300), message varchar(300), uniqid_id varchar(100),status smallInt DEFAULT 0)"; 
		$add[] = "CREATE table paymentBox(id int primary key AUTO_INCREMENT, Name_of_Made varchar(300), receipt_id varchar(100), made_uniqid_id varchar(100), msg varchar(300),status smallInt DEFAULT 0,Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP)";
		$add[] = "CREATE table Result(id int(10) primary key AUTO_INCREMENT, Subject_name varchar(300), grade varchar(100), test int(10), exam int(10),student_id varchar(100), msg varchar(300), parent_id varchar(100), status smallInt DEFAULT 0)";
		$conn = mysqli_connect('localhost','root','', $rand);
		$str = implode(';', array_map(fn($m)=>"$m", $add));
		$okay = [];
		foreach($add as $add)
		{

			if(mysqli_query($conn, $add))
			{
			   $okay[] = $add;	
			}
		}
			if(count($okay) > 0){
			$select = "SELECT * FROM dswp WHERE email = '$email'";
			$row = mysqli_query($conn1, $select);
			if(mysqli_num_rows($row)){
			 $row = mysqli_fetch_array($row);
			 		echo "Your id is:  S/".$row['id']."/".$email.PHP_EOL;
					echo "everything is now setup".PHP_EOL;
					$smart = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES
					 ('$rand','New School $schoolName have just be added with $email')";
					 mysqli_query($conn1,$smart);

			}	 
			}else
			{
				echo "some setup unable to run try again later Thank you".PHP_EOL;
			}
	}  
	}else
	{
	 echo "Some setup unable to run try again later Thank you".PHP_EOL;	
	}
	}
	
foreach($error as $error)
	{
		echo $error;
	}
}













?>