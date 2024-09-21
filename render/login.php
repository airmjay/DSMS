<?php
session_start();
if(isset($_SESSION['session'])){
switch(isset($_SESSION['session'])){
case ($_SESSION['session'] == 'admin'):

	if(isset($_SESSION['loginAdminSessionGet'])){
	header('location: /admin');
	}
  break;

case ($_SESSION['session'] == 'teacher'):
 if(isset($_SESSION['TeacherloginSchoolSessionPost'])){
	header('location: /tcr');
	}
  break;
	case ($_SESSION['session'] == 'school'):

	if(isset($_SESSION['loginSchoolSessionPost'])){
		header('location: /auth');
		} 
   break;
  case ($_SESSION['session'] == 'parent'):
	if(isset($_SESSION['ParentloginSchoolSessionPost'])){
		header('location: /prt');
 
	}
	break;
 case ($_SESSION['session'] == 'student'):

	if(isset($_SESSION['StudentloginSchoolSessionPost'])){
	header('location: /std');
	}
	break;
 default:
 $_SESSION['session'] = '';
 break;
}
}
?>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/auth.css">
<style type="text/css">
.auth
{
	width: 50%;
}
@media   (max-width: 490px)
{
.auth
{
width: 80%;	

}
}
</style>
</head>
 <body>
 <!-- As a link -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#"><img width="50px" height="50px" src="img/D1.png"></a>
  <a class="navbar-brand  text-sm p-1" href="/">Home</a>
</nav>
 	<div class="container mt-4 ">
		 	<div class='auth    m-auto card p-2  shadow'>
		 	<form class="form-sm" id='formRegister' method="post">
		    <label for="login">Login</label>
		  	<div class="form-group">
		    <label for="login-email">Enter Your Login Id</label>
		    <input type="email" class="form-control form-control-sm email-gen" id="login-email" aria-describedby="emailHelp" placeholder="Enter email" required>
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  	</div>
		  	<div class="form-group">
		    <label for="login-password">Password</label>
		    <input type="password" class="form-control form-control-sm password-gen" id="login-password" aria-describedby="emailHelp" placeholder="Enter Password" required>
		   	</div>
		    <small id="MessageDiv" class="form-text text-danger mb-2"></small>
		  	<div class="d-flex justify-content-between align-items-center">
		  	<button type="button" class="btn-sm btn btn-primary login-gen">Submit</button>
		  	
		  	<a class='text-muted text-sm' href='/register'>Register</a>
		  	</div>
			</form>
		 	</div>
</section>
<div class="">
	
</div>
<script  src="js/custom/login.js"></script>
<script src='js\sweatalert.js'></script>
 </section>
 </body>