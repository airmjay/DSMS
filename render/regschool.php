<link rel="stylesheet" href="css/bootstrap.css">
<style type="text/css">
.message-div-display-2 
{
	display: none;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	width: 100%;
	padding: 0px;
	min-height: 70%;
	z-index: 1000;
}
.display-items-1
{
	width: 50%;
	height: 70vh;
	margin: auto;
	padding: 10px;
	margin-top: 100px;
}
</style>
</head>

<?php 
session_start();

if(isset($_SESSION['reguserschool.com']))
{
$id = $_SESSION['reguserschool.com'];
}else
{
echo "<script> window.location = '/login'; $('#formRegister').trigger('reset'); </script>";	
}
if(isset($_POST['dob']))
{
	$conn = mysqli_connect('localhost', 'root', '', 'school');
	$select = "SELECT * FROM dswp WHERE unique_id = '$id'";
	$fetch = mysqli_query($conn,$select);
	$row = mysqli_fetch_array($fetch);
	$status = $row['status'];
	$password = $row['password'];
	$email = $row['email'];
	$unique = $row['unique_id'];
	$school = $row['school_name'];
	function cleanData($conn, $data)
	{
	$clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
	return $clean;
	}
	$error = [];
	$firstname = cleanData($conn,$_POST['firstname']);
	$second = cleanData($conn, $_POST['secondName']);
	$state = cleanData($conn, $_POST['state']);
	$location = cleanData($conn, $_POST['loca']);
	$dob = cleanData($conn, $_POST['dob']);
	$phone = cleanData($conn, $_POST['phone']);
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
            $error[] = 'Date format not allow only this is allow YYYY-MM-DD example 1999-11-02 and age should not be less than 20years for school owner'.PHP_EOL;

   }
   if(preg_match('/^(090|070|081|091)\d{8}$/', $phone))
   {
   }else{
      $error[] = 'phone number format not accepted'.PHP_EOL;
      $error_found = true;
   }
   if(preg_match('/^[a-zA-Z\s]+$/', $state))
   {
   }else{
      $error[] = 'Special character , number , empty input not allow in state field'.PHP_EOL;
   }
   if(preg_match('/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/', $firstname))
   {
   }else{
      $error[] = 'Special character, number, empty input not allow in firstname field'.PHP_EOL;
   }
   if(preg_match('/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/', $second))
   {
   }else{
      $error[] = 'Special character, number, empty input not allow in firstname field'.PHP_EOL;
   }

	foreach ($_POST as $key => $value) {
		
		if(empty($_POST[$key]))
		{
				$error[] = "<div class='alert alert-danger alert-sm mt-2'>All input field is required</div>";

		}else if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $_POST[$key]))
		{
			if($key == 'dob')
			{
				if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬]/', $_POST[$key]))
				{
					$error[] = "<div class='alert alert-danger alert-sm mt-2'>Special character not allow in input</div>".PHP_EOL;

				}else
				{
					continue;
				}
			}
			$error[] = "<div class='alert alert-danger alert-sm mt-2'>Special character not allow in input</div>".PHP_EOL;
		}

	}
	if(count($error) === 0)
		{

			$conn = mysqli_connect('localhost', 'root', '', "$id");
			$select = "staff";
			$table = "SHOW TABLES LIKE '$select'";
			if(!mysqli_num_rows(mysqli_query($conn,$table))){
						$add = "CREATE table staff(id int primary key AUTO_INCREMENT, firstname varchar(200), lastname varchar(200), phone varchar(100), state varchar(200),  dateOfBirth date, email varchar(200), post varchar(200), password varchar(200), status smallInt DEFAULT 1, unique_id varchar(100),  dateOfJoin DATETIME DEFAULT CURRENT_TIMESTAMP, picture varchar(200))";
			
			if(mysqli_query($conn, $add))
			{
				
				$_SESSION['gmailmaileruser'] = $email;
				$date = new DateTime();
				$time =  $date->format('mdygia');
				$rand =  "schoolunitialwithid".rand().$time;
			$conn1 = mysqli_connect('localhost', 'root', '', 'school');
			$update = "UPDATE dswp SET status = 1";
         mysqli_query($conn1,$update);

				 $smart = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES
                ('$rand','School is on the run now with the name $school')";
                mysqli_query($conn1,$smart);
				?>
				<script> window.location = '/auth'; $('#formRegister').trigger("reset"); </script>
				<?php
				$insert = "INSERT INTO `staff`(`firstname`, `lastname`, `phone`, `state`, `dateOfBirth`, `email`, `password`, `status`, `unique_id`) VALUES ('$firstname','$second','$phone','$state','$dob','$email','$password','1','$unique')";
			if(mysqli_query($conn, $insert)){

				echo "<div class='alert alert-success alert-sm mt-2'>Your Account is successfully setup
				</div>".PHP_EOL;

			}else
			{
				echo "<div class='alert alert-danger alert-sm mt-2'>Sorry something went wrong!</div>".PHP_EOL;

			}
			}else
			{
				echo "<div class='alert alert-danger alert-sm mt-2'>Sorry something went wrong!</div>".PHP_EOL;
			}
		
		}else
	{
		echo "<script>location='/login'</script>";
	}
	}

	foreach($error as $error)
	{
		echo "<div class='alert alert-info mt-2'>".$error."</div>".PHP_EOL;
		exit();
	}
}else
{
	?>
<body class="position-relative">
<div class="card container mt-5 p-3">
	<h3 class="text-success">Register Yourself as Administrator </h3>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12">
        <label for="SchoolName">First Name</label>
			<input type="text"  name="" class="name-reg-first-name form-control form-control-sm">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
        <label for="last">Last Name</label>
			<input type="text"  name="" class="name-reg-last-name form-control form-control-sm">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
        	<label for="phone">Phone</label>
			<input type="number"  name="" class="name-reg-phone form-control form-control-sm">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
        	<label for="Location">State</label>
			<input type="text"  name="" class="name-reg-state form-control form-control-sm">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
        	<label for="Location">Location</label>
			<input type="text"  name="" class="name-reg-location form-control form-control-sm">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
        	<label for="Location">Date of Birth</label>
			<input type="date"  name="" class="name-reg-birth form-control form-control-sm">
		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 mt-2">
        	<button type="button" class='btn btn-primary btn-sm name-activate-button'>Activate Account</button>
        	
		</div>
	</div>
</div>
<section class="message-div-display-2">
   <div class="display-items-1 bg-light">
   <button class='close-my-custom-alert btn btn-danger btn-sm sm'>Close</button>  
   <div class="detail-div-1">
   	
   </div> 	
   </div>
</section>
<script type="text/javascript">
$('.message-div-display-2').slideUp();
</script>
<script type="text/javascript" src='js/custom/school.js'>
</script>
</body>
<?php 
}?>