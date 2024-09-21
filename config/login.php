<?php

$error = [];
require('conn.php');
$admin = 'admin';
if(isset($_POST['login']))
{
	$_POST['login'] = 'login';
	$password = cleanData($conn,$_POST['password']);
	$username = cleanData($conn,$_POST['email']);
	foreach ($_POST as $key => $value) {
		
		if(empty($_POST[$key]))
		{
			echo  $value;
			$error[] = 'All input field is required, '.PHP_EOL;
			break;
		}
		}
		if(count($error) === 0){
		$getCatUser = strpos($username, "/");
		// first string user exp: category
		$catchCat = substr($username, 0, $getCatUser);
		$getAdd = $getCatUser += 1;
		// reminder string exp: idschool/userId
		  $remider = substr($username, $getAdd);
		// schoolId 
		$schoolId = strpos($remider, "/");
		$catchSchool = substr($remider, 0, $schoolId);
		// userId
		 $getAdd = $schoolId += 1;
		$catchUserId =  substr($remider, $schoolId);
		if( $catchCat == 'S' )
		{
			// check maybe is school owner

			$select = "SELECT * FROM dswp WHERE id = '$catchSchool' AND email = '$catchUserId' ";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row) > 0){
			$fetch = mysqli_fetch_array($row);
			$passwordVerify = $fetch['password']; 
			$idSession = $fetch['unique_id'];
			if(password_verify($password, $passwordVerify))
			{
			$status = $fetch['status'];
			if($status == 0){
				session_start();
				$_SESSION['reguserschool.com'] = $idSession;
				?>
				<script> window.location = '/regschool'; $('#formRegister').trigger("reset"); </script>
			<?php
			}else{
			$select = "SELECT * FROM dswp WHERE id = '$catchSchool' ";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row) > 0){
			$fetch = mysqli_fetch_array($row);
			$id = $fetch['unique_id'];
			$select = "SELECT * FROM staff WHERE email = '$catchUserId'";
			$conn1 = mysqli_connect('localhost', 'root', '', $id);
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row)){
			 $fetchNewDb = mysqli_fetch_array($row);
			 $passwordVerify = $fetchNewDb['password'];
			if(password_verify($password, $passwordVerify))
			{
				session_start();
				$_SESSION['loginSchoolSessionPostrandomdb'] = $id;
				$date = new DateTime();
				$rand =  rand().$date->format('mdygia').$catchUserId;
				$_SESSION['loginSchoolSessionPost'] = $rand;
			$conn1 = mysqli_connect('localhost', 'root', '', 'school');
				$delete = "DELETE FROM `staff_session` WHERE userId = '$catchUserId'";
				$insert = 
				"INSERT INTO `staff_session`(`userId`, `session`) VALUES ('$catchUserId','$rand')";
				if(mysqli_query($conn1, $delete))
				{
				mysqli_query($conn1, $insert);

				}else
				{
				mysqli_query($conn1, $insert);
					
				} ?>
				<script> window.location = '/auth'; $('#formRegister').trigger("reset"); </script>	
		<?php	}else{
			echo "Invalid Credentials";
			}
		}else
		{
			echo "Invalid Credentials";

		}

		}else
		{
			echo "Invalid Credentials";

		}

		}
	}else{
			echo "Invalid Credentials";
	}
	 }else{
			$select = "SELECT * FROM dswp WHERE email = '$catchUserId' AND id = 'catchSchool'";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row) > 0){
			$fetch = mysqli_fetch_array($row);
			$id = $fetch['unique_id'];
			$select = "SELECT * FROM staff WHERE email = '$catchUserId'";
			$conn1 = mysqli_connect('localhost', 'root', '', $id);
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row)){
			 $fetchNewDb = mysqli_fetch_array($row);
			 $passwordVerify = $fetchNewDb['password'];
			if(password_verify($password, $passwordVerify))
			{
				session_start();
				$_SESSION['loginSchoolSessionPostrandomdb'] = $id;
				$date = new DateTime();
				$rand =  rand().$date->format('mdygia').$catchUserId;
				$_SESSION['loginSchoolSessionPost'] = $rand;
				$conn1 = mysqli_connect('localhost', 'root', '', 'school');
				$delete = "DELETE FROM `staff_session` WHERE userId = '$catchUserId'";
				$insert = 
				"INSERT INTO `staff_session`(`userId`, `session`) VALUES ('$catchUserId','$rand')";
				if(mysqli_query($conn1, $delete))
				{
				mysqli_query($conn1, $insert);

				}else
				{
				mysqli_query($conn1, $insert);
					
				} ?>
				<script> window.location = '/auth'; $('#formRegister').trigger("reset"); </script>	
		<?php	}else{
			echo "Invalid Credentials";
			}
		}else
		{
			echo "Invalid Credentials";

		}

		}else
		{
			$select = "SELECT * FROM dswp WHERE email = '$catchUserId'";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row))
			{
				if($fetch = mysqli_fetch_array($row))
				{
					$id = $fetch['id'];
					echo "Your id is : S/". $id."/".$catchUserId. " please Correct it.";
				}
				
			}else
			{
			echo "Invalid Credentials";

			}

		}
	}
		}else if($catchCat == 'P')
		{
			$select = "SELECT * FROM dswp WHERE id = '$catchSchool'";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row) > 0){
			$fetch = mysqli_fetch_array($row);
			$id = $fetch['unique_id'];
			$select = "SELECT * FROM parent WHERE id = '$catchUserId'";
			$conn1 = mysqli_connect('localhost', 'root', '', $id);
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row)){
			 $fetchNewDb = mysqli_fetch_array($row);
			 $passwordVerify = $fetchNewDb['password'];
			if(password_verify($password, $passwordVerify))
			{
				session_start();
				$_SESSION['ParentloginSchoolSessionPostrandomdb'] = $id;
				$date = new DateTime();
				$rand =  rand().$date->format('mdygia').$catchUserId;
				$_SESSION['ParentloginSchoolSessionPost'] = $rand;
				$conn1 = mysqli_connect('localhost', 'root', '', 'school');
				$delete = "DELETE FROM `staff_session` WHERE userId = '$catchUserId'";
				$insert = 
				"INSERT INTO `staff_session`(`userId`, `session`) VALUES ('$catchUserId','$rand')";
				if(mysqli_query($conn1, $delete))
				{
				mysqli_query($conn1, $insert);

				}else
				{
				mysqli_query($conn1, $insert);
					
				} ?>
				<script> window.location = '/prt'; $('#formRegister').trigger("reset"); </script>	
		<?php	}else{
			echo "Invalid Credentials";
			}
		}else
		{
			echo "Invalid Credentials";

		}

		}else
		{
			echo "Invalid Credentials";

		}	

		}else if($catchCat == 'C')
		{
			$select = "SELECT * FROM dswp WHERE id = '$catchSchool'";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row) > 0){
			$fetch = mysqli_fetch_array($row);
			$id = $fetch['unique_id'];
			$select = "SELECT * FROM student WHERE id = '$catchUserId'";
			$conn1 = mysqli_connect('localhost', 'root', '', $id);
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row)){
			 $fetchNewDb = mysqli_fetch_array($row);
			 $passwordVerify = $fetchNewDb['password'];
			if(password_verify($password, $passwordVerify))
			{
				session_start();
				$_SESSION['StudentloginSchoolSessionPostrandomdb'] = $id;
				$date = new DateTime();
				$rand =  rand().$date->format('mdygia').$catchUserId;
				$_SESSION['StudentloginSchoolSessionPost'] = $rand;
				$conn1 = mysqli_connect('localhost', 'root', '', 'school');
				$delete = "DELETE FROM `staff_session` WHERE userId = '$catchUserId'";
				$insert = 
				"INSERT INTO `staff_session`(`userId`, `session`) VALUES ('$catchUserId','$rand')";
				if(mysqli_query($conn1, $delete))
				{
				mysqli_query($conn1, $insert);

				}else
				{
				mysqli_query($conn1, $insert);
					
				} ?>
				<script> window.location = '/std'; $('#formRegister').trigger("reset"); </script>	
		<?php	}else{
			echo "Invalid Credentials";
			}
		}else
		{
			echo "Invalid Credentials";

		}

		}else
		{
			echo "Invalid Credentials";

		}	

		}else if($catchCat == 'T')
		{

			$select = "SELECT * FROM dswp WHERE id = '$catchSchool'";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row) > 0){
			$fetch = mysqli_fetch_array($row);
			$id = $fetch['unique_id'];
			$select = "SELECT * FROM teacher WHERE email = '$catchUserId'";
			$conn1 = mysqli_connect('localhost', 'root', '', $id);
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row)){
			 $fetchNewDb = mysqli_fetch_array($row);
			 $passwordVerify = $fetchNewDb['password'];
			if(password_verify($password, $passwordVerify))
			{
				session_start();
				$_SESSION['TeacherloginSchoolSessionPostrandomdb'] = $id;
				$date = new DateTime();
				$rand =  rand().$date->format('mdygia').$catchUserId;
				$_SESSION['TeacherloginSchoolSessionPost'] = $rand;
				$conn1 = mysqli_connect('localhost', 'root', '', 'school');
				$delete = "DELETE FROM `staff_session` WHERE userId = '$catchUserId'";
				$insert = 
				"INSERT INTO `staff_session`(`userId`, `session`) VALUES ('$catchUserId','$rand')";
				if(mysqli_query($conn1, $delete))
				{
				mysqli_query($conn1, $insert);

				}else
				{
				mysqli_query($conn1, $insert);
					
				} ?>
				<script> window.location = '/tcr'; $('#formRegister').trigger("reset"); </script>	
		<?php	}else{
			echo "Invalid Credentials";
			}
		}else
		{
			echo "Invalid Credentials";

		}

		}else
		{
			echo "Invalid Credentials";

		}	

		}else if($catchCat == 'A')
		{
			if($catchSchool == '11'){
			$select = "SELECT * FROM staff WHERE staffId = '$catchUserId'";
			$row = mysqli_query($conn1,$select);
			if(mysqli_num_rows($row) > 0){
			$fetch = mysqli_fetch_array($row);
			$passwordVerify = $fetch['password'];
			$date = new DateTime();
			$rand =  rand().$date->format('mdygia').$catchUserId;
			if(password_verify($password, $passwordVerify))
			{

				session_start();
				$_SESSION['loginAdminSessionGet'] = $rand;
				$delete = "DELETE FROM `staff_session` WHERE userId = '$catchUserId'";
				$insert = 
				"INSERT INTO `staff_session`(`userId`, `session`) VALUES ('$catchUserId','$rand')";
				if(mysqli_query($conn1, $delete))
				{
				mysqli_query($conn1, $insert);

				}else
				{
				mysqli_query($conn1, $insert);

				}
				
				

?>    
		    <script> window.location = '/admin'; $('#formRegister').trigger("reset"); </script>
		   <?php
			}else
			{
				echo "Invalid Credential";
			}
		}else
		{
				echo "Invalid Credential";

		}
		}else
		{
			echo "Invalid Credential";
		}

		}else{
			echo "Invalid Credential";
		}
	
	}
	
	foreach($error as $error)
	{
		echo $error;
	}
}



?>