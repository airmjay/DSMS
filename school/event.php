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
<button class="btn btn-danger sm add-event add-event-button"> ADD EVENT +</button>
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
			<button class="btn btn-sm btn-primary edit-event-1 sm mb-2" value="<?=$row['id'] ?>">Edit event </button>
		<hr class="mt-0 mb-2 bg-success h1">
<?php } }}else{
?>

	
<?php echo "<div class='mt-2'>No event added yet</div>"; } ?>
<div class="event-div container col-lg-8 col-12  m-auto card bg-light">
		<div class="btn-group mt-2 mb-3">
			<button class="btn-group-item btn btn-success btn-sm sm">PREVIOUS</button>
			<button class="btn-group-item btn btn-info btn-sm sm">NEXT</button>
		</div>

</div>
<div class="info-event">
	<div class="info-event-content bg-light p-3">

		<div class="d-flex align-items-center justify-content-between"><span class="text-dark"> ADD EVENT </span> 
		<button class="btn btn-danger sm info-event-button">Close</button></div>
		<form method="post" id='formRegisterEvent'>
		<label for='event-name'>Enter Event Name</label>
		<input type="text" name="event-name" placeholder="enter event name" class="form-control form-control-sm mb-2" required>
		<label for='event-date'>Enter Event Date</label>
		<input type="text" name="event-date" placeholder="enter event Date Example june 08" class="form-control mb-2 form-control-sm" required>
		<label for="event info">Enter Event Information</label>
		<input type="text" name="event-info" placeholder="Enter info/Event description" class="form-control form-control-sm mb-2" required>
		<input type="button" name="add-event-save" value="Save Event" class="btn btn-primary btn-sm sm mt-3 form-control-sm">
		</form>
		<div class="alert-sm alert-info mt-4 sm p-3 event-message">Status Messages:</div>
	</div>
</div>
</div>

<script type="text/javascript">
	$('.info-event-button').click(function()
	{
		$('.info-event').slideUp(100);
	})
	$('.add-event').click(function()
	{
		$('.info-event').slideDown();
	})
</script>