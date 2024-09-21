<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/auth.css">
</head>
 <body>
 <!-- As a link -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#"><img width="50px" height="50px" src="img/D1.png"></a>
  <a class="navbar-brand text-sm p-1" href="/">Home</a>
</nav>
<section class="mt-5 container">
	 	<div class='width m-auto card p-2 shadow'>
		    <label for="Register">Register School</label>
	 		<form id='formRegister' class="form-sm text-muted" method='post' action="">
		  <div class="form-group">
		    <label for="Email">Email address</label>
		    <input type="email" name='email' class="form-control form-control-sm" id="Email" aria-describedby="emailHelp" placeholder="Enter email" required>
		    <small id="email_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="school_name">School Name</label>
		    <input type="text"  name='school' class="form-control form-control-sm" id="School_name" aria-describedby="emailHelp" placeholder="Enter School name" required>
		    <small id="school_name_error" class="form-text text-muted"></small>
		  	</div>
		  <div class="form-group">
		    <label for="Password">Password</label>
		    <input type="password" name='passsword' class="form-control form-control-sm" id="Password" placeholder="Password" required>
		    <small id="password_error" class="form-text text-muted"></small>
		  </div>
		  	<div class="form-group">
		    <label for="confirm_password">Confirm Password</label>
		    <input type="password" name='confirm_password' class="form-control form-control-sm" id="Confirm_password" placeholder="Password" required>
		    <small id="confirm_password_error" class="form-text text-muted"></small>
		  	</div>
		  <div class="form-check">
		    <input name='checkbox' type="checkbox" class="form-check-input" id="Check">
		    <label  class="form-check-label text-muted text-sm" for="exampleCheck" required>Accept Terms & Conditions</label>
		    <small id="condition_error" class="form-text text-muted"></small>
		  </div>
		  <div class="d-flex align-items-center justify-content-between">
  		<input type="submit" value="submit" id='register_button' class="btn btn-primary btn-sm">
		  	<a class='text-muted' href='/login'>Login</a>
		  	</div>
</form>
	 	</div>
 	</div>
<script  src="js/custom/register.js"></script>
 </section>
  </body>