<?php 
$getdb = $_POST['getdb']; 
$conn= mysqli_connect('localhost', 'root', '', $getdb );
$error = [];
function cleanData($conn, $data)
{
	$clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
	return $clean;
}
if(isset($_POST['single']))
{
	$id = $_POST['single'];
	$date = new DateTime();
	$time =  $date->format('m/d/20y');
	$select = "SHOW TABLES LIKE 'attendance'";
	$row = mysqli_num_rows(mysqli_query($conn,$select));
	if($row)
	{
      $insert = "INSERT INTO `attendance`(`attend_time`, `attend_id`) VALUES ('$time','$id')";
      if(mysqli_query($conn,$insert))
      {
      	echo "attendance have been upload  <script> window.location = '/auth'</script>";
      }
	}else
	{
		$create = "CREATE TABLE attendance( id int primary key AUTO_INCREMENT,  attend_time varchar(100),  attend_id  varchar(300))";
		if(mysqli_query($conn, $create))
		{
			echo "attendance have be activated for the first time please clicked again";
		
		}
	}
}
if(isset($_POST['validate']))
{
	$select = "SHOW TABLES LIKE 'event'";
	$row = mysqli_num_rows(mysqli_query($conn,$select));
	if($row)
	{
		echo "event is ready";
	}else
	{
	$create = "CREATE TABLE event( id int primary key AUTO_INCREMENT,  event_time varchar(100),  event_title  varchar(300), event_content  varchar(300))";
		if(mysqli_query($conn, $create))
		{
			echo "event have be activated for the first time!";
		
		}	
	}
}
if(isset($_POST['addEvent']))
{

	$event_name = cleanData($conn,$_POST['event_name']);
	$event_date = cleanData($conn,$_POST['event_date']);
	$event_content = cleanData($conn,$_POST['event_content']);
	foreach ($_POST as $key => $value) {	
	if(empty($_POST[$key]))
	{
			$error[] = $key. '  field is required';
			$error_found = true;
    	break;
	}
	}

	if(count($error) === 0)
	{
		$insert = "INSERT INTO `event`(`event_time`, `event_title`, `event_content`) VALUES ('$event_date','$event_name','$event_content')";
		if(mysqli_query($conn, $insert))
		{
			echo "Event added <script>$('#formRegisterEvent')[0].reset()</script>";
		}
	}
}
if(isset($_POST['addEvent1']))
{

	 $id = $_POST['addEvent1'];
	 $event_name = cleanData($conn,$_POST['event_name1']);
	 $event_date = cleanData($conn,$_POST['event_date1']);
	$event_content = cleanData($conn,$_POST['event_content1']);
	foreach ($_POST as $key => $value) {	
	if(empty($_POST[$key]))
	{
			$error[] = 'All are field is required';
			$error_found = true;
    	break;
	}
	}

	if(count($error) === 0)
	{
		$insert = "UPDATE `event` SET `event_time`='$event_date',`event_title`='$event_name',`event_content`='$event_content' WHERE id ='$id'";
		if(mysqli_query($conn, $insert))
		{
			echo "<script>alert('Event Updated'); location = '/auth'</script>";
		}
	}
}
if(isset($_POST['editEvent'])){
	$id = $_POST['editEvent'];
	$select= "SELECT * FROM event WHERE id='$id'";
 		$fetch = mysqli_query($conn, $select);
 		$row = mysqli_fetch_array($fetch)

?>
<div class="card mt-2 p-5">
	<h4>Edit Event</h4>
	<form method="post" id='formRegisterEvent-1'>
		<label for='event-name-1'>Enter Event Name</label>
		<input type="text" value='<?= $row['event_title']?>' name="event-name-1" placeholder="enter event name" class="form-control form-control-sm mb-2" required>
		<label for='event-date-1'>Enter Event Date</label>
		<input type="text" value='<?= $row['event_time']?>' name="event-date-1" placeholder="enter event Date Example june 08" class="form-control mb-2 form-control-sm" required>
		<label for="event info-1">Enter Event Information</label>
		<input type="text" value='<?= $row['event_content']?>' name="event-info-1" placeholder="Enter info/Event description" class="form-control form-control-sm mb-2" required>
		<button type="button" name="add-event-save-1" value="<?= $row['id']?>" class="btn btn-primary btn-sm sm mt-3 form-control-sm">Save event</button>
		<button type="button"  value="<?= $row['id']?>" class="add-event-save-211 btn btn-danger btn-sm sm mt-3 form-control-sm">Delete event</button>
		</form>
		<div class="alert-sm alert-info mt-4 sm p-3 event-message-1">Status Messages:</div>

</div>
	<?php 
}
if(isset($_POST['save']))
{
	
	$first = cleanData($conn, $_POST['first']);
	$surname = cleanData($conn, $_POST['surname']);
	$other = cleanData($conn, $_POST['other']);
	$address = cleanData($conn, $_POST['address']);
	$birth = cleanData($conn, $_POST['birth']);
	$email = cleanData($conn, $_POST['email']);
	$password = cleanData($conn, $_POST['password']);
	$cpassword = cleanData($conn, $_POST['cpassword']);
	$post = cleanData($conn, $_POST['post']);
	$class = cleanData($conn, $_POST['classy']);
	if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow and empty field in last name field'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $other))
   {
   }else{
        // echo "Special character and number not allow in other name field or empty field";
      $error[] = 'Special character and number not allow in other name field'.PHP_EOL;
      $error_found = true;

   }
   // if(preg_match('/^(090|070|081|091)\d{8}$/', $tel))
   // {
   // }else{
   //    $error[] = 'phone number format not accepted'.PHP_EOL;
   //    $error_found = true;
   // }
   if(preg_match('/^[a-zA-Z\s]+$/', $surname))
   {
   }else{
      $error[] = 'Special character and number not allow in and empty field surname field'.PHP_EOL;
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
   if(!empty($birth)){
   preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $birth, $matches);
   $year = $matches[1];
   $month = $matches[2];
   
   if($year <= 2023)
   {

   }else
   {
   	$error[] = 'we don"t take little infant or empty birthday field'.PHP_EOL;
      $error_found = true;
   }
   }else{
   	$error[] = 'birthday field required'.PHP_EOL;
      $error_found = true;
   }
      if(preg_match('/^[a-zA-Z0-9\s]+$/', $class))
   {
   }else
   {
      $error[] = 'Special character not accept and empty input in class'.PHP_EOL;
      $error_found = true;

   }
   if(!empty($post))
   {
	if(preg_match('/^[a-zA-Z\s]+$/', $post))
   {
   }else{
      $error[] = 'Special character and number not allow in and empty field post field'.PHP_EOL;
      $error_found = true;
   }   	
   }
foreach ($_POST as $key => $value) {
	if ($key != 'save' && $key != 'password' && $key != 'cpassword' && 
		$key != 'getdb' && $key != 'birth') {

		if(preg_match('/[\'£$%&*()}{#~?><>,|=+¬-]/', $_POST[$key]))
		{

		$error[] =  'Special character except in password field';
		$error_found = true;
    break;	
		 
		}
	}
	}
	foreach ($_POST as $key => $value) {	
	if($key != 'other' && $key != 'email' && $key != 'post'){
	if(empty($_POST[$key]))
	{
			$error[] =  'All input field is required';
			$error_found = true;
    	break;
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
	$student = $first.$surname.rand();
	$insert = "INSERT INTO `student`(`firstName`, `surName`, `middleName`, `post`, `uniqid_id`, `email`, `address`, `S_id`, `password`,`date_of_birth`) VALUES ('$first','$surname','$other','$post','$student','$email','$address','$class','$password','$birth')";
	if(mysqli_query($conn,$insert))
	{
	// 	$in = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES ('$rand',
	// 	'Staff have successful added by $admin the email is $email')";
	// mysqli_query($conn1,$in);

	echo "<div class='alert alert-success alert-sm mt-2 p-1'> New Student have been Successfully added  
	<script>$('#Table_id_print_std')[0].reset()</script></div>";

}else
{
	echo "Unable to create Account for user try again later Thank you!";
}
}

}

if (isset($error_found)) {
    echo $error[0] ;
}



?>