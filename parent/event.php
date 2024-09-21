<div class="position-relative">
<div class="d-flex justify-content-between align-items-center">
<select class="d-block mb-2">
	<option>Select Month for view Event</option>
	<option>January</option>
	<option>Febuary</option>
	<option>March</option>
	<option>April</option>
	<option>May</option>
</select> 
<i class="text-danger sm"> Get prepared </i>
</div>
<?php 
$conn = mysqli_connect('localhost','root','',$random);
	$select = "SHOW TABLES LIKE 'event'";
     $row1 = mysqli_num_rows(mysqli_query($conn,$select));
     if($row1)
    {
    $select = "SELECT * FROM `event` LIMIT 8";
    $row1 = mysqli_query($conn, $select);
    if(mysqli_num_rows($row1)){
    ?>

	<div class="event-div container col-lg-8 col-12  m-auto card bg-light">
	<div class="row">
		<div class="col-4 font-weight-900 pt-3">
			BE READY AND BE PREPARE
			<hr class="mt-3 mb-2 bg-success h1">
		</div>
		<div class="col-8 font-weight-900 ml-auto text-left d-block pt-3">
			<span class="big"> UPCOMING EVENTS </span>
		</div>
	</div>
		<div class="event-list-group p-0 m-0">
    <?php while ($row = mysqli_fetch_array($row1)) {
		?>
		<div class="event-list d-flex align-items-center">
			<span class="mr-3 ml-2 border-round mb-1 d-block p-3 bg-success text-white">
				<?= $row['event_time']?></span> 
			<span class=""><span class="text-success"><?= $row['event_title']?></span> 
			<br><?=$row['event_content']?>.</span>
		</div>
		<hr class="mt-0 mb-2 bg-success h1">
<?php } }}else{
?>

<div class="event-div container col-lg-8 col-12  m-auto card bg-light">
	<div class="row">
		<div class="col-4 font-weight-900 pt-3">
			BE READY AND BE PREPARE 
			<hr class="mt-3 mb-2 bg-success h1">
		</div>
		<div class="col-8 font-weight-900 ml-auto text-left d-block pt-3">
			<span class="big"> UPCOMING EVENTS </span>
		</div>
	</div>
		<div class="event-list-group p-0 m-0">
		<div class="event-list d-flex align-items-center">
			<span class="mr-3 ml-2 border-round mb-2 d-block p-3 bg-success text-white">JUNE 01</span> 
			<span class=""><span class="text-success">FIREWORKS SHOWS</span> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
		</div>
		<hr class="mt-0 mb-2 bg-success h1">
		<div class="event-list d-flex align-items-center">
			<span class="mr-3 ml-2 border-round mb-2 d-block p-3 bg-primary text-white">JUNE 10</span> 
			<span class=""><span class="text-success">MEET & GREET</span> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
		</div>
		<hr class="mt-0 mb-2 bg-success h1">
		<div class="event-list d-flex align-items-center">
			<span class="mr-3 ml-2 border-round mb-2 d-block p-3 bg-info text-white">JUNE 15</span> 
			<span class=""><span class="text-success">CHARRITY EVENT</span> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
		</div>
		<hr class="mt-0 mb-2 bg-success h1">
		<div class="event-list d-flex align-items-center">
			<span class="mr-3 ml-2 border-round mb-2 d-block p-3 bg-success text-white">JUNE 22</span> 
			<span class=""><span class="text-success">FEED THE HOMELESS</span> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
		</div>
		<hr class="mt-0 mb-2 bg-success h1">
		<div class="event-list d-flex align-items-center">
			<span class="mr-3 ml-2 border-round mb-2 d-block p-3 bg-secondary text-white">JUNE 26</span> 
			<span class=""><span class="text-success">HOW TO BETTER MUSLIM</span> <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span>
		</div>
	
		
<?php } ?>
		<div class="btn-group mb-3">
			<button class="btn-group-item btn btn-success btn-sm sm">PREVIOUS</button>
			<button class="btn-group-item btn btn-info btn-sm sm">NEXT</button>
		</div>
		</div>
</div>