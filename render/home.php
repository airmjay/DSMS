<link rel="stylesheet" href="css/style.css">
</head>
<header>
	<a href="/"><h1>DSMS<span> .NG</span></h1></a>
	<i onclick="slide('bars')" id='bars' class="fa fa-bars"></i>
	<nav id='nav'>
		<ul>
			<li><a onclick="active()" href="#home" class="active nav">Home</a></li>
			<li><a onclick="active()" href="#service" class="nav">Service</a></li>
			<li><a onclick="active()" href="#portifolio" class="nav">Portifolio</a></li>
			<li><a onclick="active()" href="#contact"  class="nav">Contact</a></li>
			<?php
session_start();
if(isset($_SESSION['loginAdminSessionGet']))
{?>
       <li><a onclick="active()" href="/admin"  class="nav">Management</a></li>
       <li><a onclick="active()" value='logout'  href="#" class="nav logout-session">Logout</a></li>
<?php

}else{
?>
            <li><a onclick="active()" href="/register"  class="nav">Join</a></li>
            <li><a onclick="active()" href="/login"  class="nav">Login</a></li>
			<i onclick="slide('bars')" class="fa fa-times"></i>
<?php } ?>
		</ul>
			
	</nav>
</header>
<section id='home'class="home section">
	<div class='home-1'>
		<h1>Distributed School Management System </h1>
		<p>
			Learning and engagement made easy for Nigeria/Global schools
			A single platform to connect, communicate, and collaborate with parents, teachers, students, and your broader school community.  

			Distrubuted School is a platform to support the development of the whole student; their academic growth, extracurricular involvement and wellbeing. 
		</p> 
		<div>
			<a href="#" class='home-button'>Contact Me</a> 
			<a href="#" class='home-button'>Download User Guide</a>
		</div>
	</div>
	<div class="home-2">
		
	</div>
	<i class="fab fa-github"></i>
</section>
<section id='service' class="service section">
	<div class="service-1">
		<h1>Services Offered by the Distributed School Website Platform:</h1>
		<p>Streamlined Processes: Eliminate paperwork and fragmented records with features like attendance tracking, progress monitoring, and data management tools.</p>
	</div>
	<div class="service-2">
		<div><i class="fab fa-adn"></i>
		<p>Real-time Updates</p>
		</div>
		<div><i class="fab fa-drupal"></i>
		<p>User-friendly platform</p>
		</div>
		<div><i class="fab fa-edge"></i>
		<p>Unlocking Potential</p>
		</div>
		<div><i class="fab fa-safari"> </i>
		<p>Regular platform updates and maintenance</p>
		</div>
	</div>
</section>
<section id='portifolio'class="portifolio section">
	<div class="portifolio-1">
	<h1>Our Website Environment</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. 
		</p>
	</div>
	<div class="portifolio-2">
		<div>
			<img src="img/D2.jpeg">
		</div>
		<div>
		<img src="img/D3.jpeg">
		</div>
		<div>
		<img src="img/D4.jpeg">
		</div>
		<div>
		<img src="img/D5.jpeg">
		</div>
		<div>
		<img src="img/D6.jpg">
		</div>
		<div>
		<img src="img/D7.jpeg">
		</div>
	</div>
</section>
<section id='contact'class="contact section">
	<div class="contact-1">
		<h1>Contact Me</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. 
		</p>
	</div>
	<div class="contact-2">
		<ul>
			<li><a href=""><i class="fas fa-envelope"></i> Gmail</a></li>
			<li><a href=""></a><i class="fab fa-whatsapp"></i> WhatsApp</li>
			<li><a href=""></a><i class="fab fa-twitter"></i> Twitter</li>
			<li><a href=""></a><i class="fab fa-skype"></i> Skype</li>
		</ul>
	</div>

</section>
<div class="footer"> <p>Copyright &copy by <span>Airmjay_matic</span> check my twitter page to get inspire @airmay_matic </p></div>
<script type="text/javascript">
	let click = document.getElementsByClassName('nav');
	let nav = document.querySelector('nav');
	let bar = document.querySelector('.fa-bars');
	function active()
	{
		for(cl of click)
		{
			cl.classList.remove('active');
		}
		event.currentTarget.classList.add('active');
	}
	function slide(idname)
	{
		
				bar.classList.toggle('show');
				nav.classList.toggle('show');		
	
	}
	$('.logout-session').click(function()
{
  logout = $(this).val();
  $.post('config/logout.php',{logout:logout},function(data)
  {

  })
  alert("You have been logout out");
  location = '/';  
})
	
</script>
</body>
</html>