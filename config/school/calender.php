<?php 
  $getdb = $_POST['getdb']; 
$conn= mysqli_connect('localhost', 'root', '', $getdb );
if(isset($_POST['calender']))
{	
	$getid =  $_POST['getid'];
	$select = "SHOW TABLES LIKE 'calender'";
	$row = mysqli_num_rows(mysqli_query($conn,$select));
	if($row)
	{
		?>
		<div>
			<div class="Calender_info mt-2"></div>
			<form id="Calender_form">
			<div class="d-flex justify-content-between mb-2">
			<div>CREATE CALENDER</div><button type='button' class="drop-calender btn btn-danger sm btn-sm">Drop old Calender </button>
			</div>
			<span class="sm">Select the Term:</span>
			<div class="btn-group">
				<button type='button' value="First term" class="btn-group-item btn btn-sm sm btn-success init term-click">First Term</button>
				<button type='button' value="Second term" class="btn-group-item btn btn-sm sm btn-primary init term-click">Second Term</button>
				<button type='button' value="Third term" class="btn-group-item btn btn-sm sm btn-danger final term-click">Third Term</button>
			</div>
		<div>
			<small class="sm text-danger mt-1 d-flex justify-content-between align-items-center">
				<span class="d-block">*ACTIVITIES:</span> 
				<input type="" name="" class="term-selected form-control sm form-control-sm" 
				value="" readonly> 
			</small>

			 <hr>
			<label>Month/Date: e.g: Janaury 1st 2014 - February 2nd 1st 2014</label>
			<input type="text" name="" class="Calender-month form-control form-control-sm sm" 
			placeholder="enter Month and date">
			<label>Activities: e.g: Lectures/Revisions</label>
			<input type="text" name="" class="form-control Calender-activities form-control-sm sm" 
			placeholder="enter Activities">
			<small class="sm text-danger d-block mt-2">* SUMMARY: 
				<span class="term-selected">No term selected</span> 
			</small>

			 <hr>
			<label>Summary: e.g 12week - Lectures</label>
			<input type="text" name="" class="calender-summary form-control form-control-sm sm" 
			placeholder="eg: 12 - Lectures "> 
			<button type='button' class="d-block btn-sm sm btn-primary btn mt-1 more-calender">ADD/ ADD MORE+</button>
			<span class="third-check sm d-block mt-1 text-danger"> Note: Before clicking on fininsh in Third term to Setup 
			<span class="sm"> *please enter all term to avoid errors</span>
			</span>
		</div>
		</form>
		</div>
		<?php
	}else
	{
		$create = "CREATE TABLE calender( id int primary key AUTO_INCREMENT, Month varchar(100), term varchar(100), type varchar(100), activities varchar(300), summary varchar(200))";
		if(mysqli_query($conn, $create))
		{
			$create = "CREATE TABLE calender_status( id int primary key AUTO_INCREMENT, status tinyint(1))";
		if(mysqli_query($conn, $create))
		{
			echo "<script> alert('calender have been set for entry');  window.location = '/auth';</script>";
		}
		}
		}
}
$error = [];
if(isset($_POST['calenderCreate']))
{	
	$conn= mysqli_connect('localhost', 'root', '', $getdb );
	$_POST['calenderCreate'] = 'create';
	function cleanData($conn, $data)
	{
	$clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
	return $clean;
	}
	$active = cleanData($conn, $_POST['active']);
    $month = cleanData($conn, $_POST['month']);
    $getdb = cleanData($conn, $_POST['getdb']);
    $term = cleanData($conn, $_POST['term']);
   	$summary = cleanData($conn, $_POST['summary']);
    foreach ($_POST as $key => $value) {
    if(empty($_POST[$key]))
    {
         $error[] = "<div class='alert alert-danger sm alert-sm'> All input field is required</div>";
			$error_found = true;
    	break;
    }
   	}

	if(count($error) === 0){

   	$insert = "INSERT INTO `calender`(`Month`, `term`,`activities`,`summary`) VALUES ('$month','$term','$active', '$summary')";
   	$select = "SELECT * FROM calender_status";
   	$row = mysqli_fetch_array(mysqli_query($conn, $select));
   	if(empty($row['status']))
   	{

   		$row = mysqli_num_rows(mysqli_query($conn, $select));
   		if($row === 0){
   		mysqli_query($conn,$insert);
   		$insert = "INSERT INTO `calender_status`(`status`) VALUES ('1')";
   		if(mysqli_query($conn, $insert)){
   		echo "<div class='alert alert-success sm alert-sm'> Activity added to calender for $term 
   		<script>$('#Calender_form')[0].reset()</script></div>";
   		
   		}
   		}
   	}else
   	{
   	$insert = "INSERT INTO `calender`(`Month`, `term`,`activities`,`summary`) VALUES ('$month','$term','$active', '$summary')";
   	$select = "SELECT * FROM calender_status";
   	$row = mysqli_fetch_array(mysqli_query($conn, $select));
   		if($row['status'] == 2){
   		echo "<div class='alert alert-danger sm alert-sm'>Calender Already Updated you have to Drop Calender to change to new Calender</div>";
   		}elseif($row['status'] == 1)
   		{
   		mysqli_query($conn,$insert);
   		$insert = "UPDATE `calender_status` SET status = '1'";
   		if(mysqli_query($conn, $insert)){
   		echo "<div class='alert alert-success sm alert-sm'>Another Activity added to calender for $term 
   		<script>$('#Calender_form')[0].reset()</script></div>";
   		}
   	}
   }
}
}

if(isset($_POST['verify']))
{
		$insert = "UPDATE `calender_status` SET status = '2'";
   		if(mysqli_query($conn, $insert)){
   		echo "Calender Have been Setup";
   		}else
   		{
   			echo "error occur";
   		}
  }
 if(isset($_POST['drop']))
 {
 	$turn = "TRUNCATE TABLE calender";
 	$turn1 = "TRUNCATE TABLE calender_status";
 	if(mysqli_query($conn,$turn))
 	{
 		echo "Calender Successfully Drop";
 		mysqli_query($conn,$turn1);

 	}else
 	{
 		echo "Unable to delete calender";
 	}
 }

if (isset($error_found)) {
    echo  $error[0];
}

?>