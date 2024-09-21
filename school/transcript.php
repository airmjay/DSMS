<div class="d-flex justify-content-between mb-2 align-items-center">
	<b>Transcript</b> 
	<button class="btn btn-success accept-transcript btn-sm sm">Accept Transcript</button>
</div>
<div class="position-relative">
<div class="card p-3 bg-light">
	<h1 class="text-danger sm">
		<i>
	Note: * Make Sure all the Student Information is Correct Before Sending Transcript Form, student data will Transfer automatic.
		</i>
	</h1>
	<form id='Transcript_form' class="transcript-fill">
		<div class="row">
			<div class="col-xl-6 col-12 col-lg-6">
				<label>Enter Your School Email</label>
				<input type="text" placeholder="Enter School email" name="" class="form-control form-control-sm student-name-transcript">
			</div>
			<div class="col-xl-6 col-12 col-lg-6">
				<label>Enter Student Id</label>
				<input type="text" placeholder="Enter student id" name="" class="form-control form-control-sm student-id-name-transcript">
			</div>
			<div class="col-xl-6 col-12 col-lg-6">
				<label>Select School and Enter The Name To send Transcript</label>
				<div class="d-flex">
				<input type="text" placeholder="Enter For School" name="" class="boder form-control form-control-sm school-text-name-transcript">
				<select class="form-control-sm form-control boder student-select-name-transcript">
					<option value="">Select School to send transcription</option>
					<?php 
      				$conn = mysqli_connect('localhost','root','', 'school');
       				$select = "SHOW TABLES LIKE 'dswp'";
         			$row1 = mysqli_num_rows(mysqli_query($conn,$select));
		         	if($row1){
		            $select = "SELECT * FROM dswp";
		            $fetch = mysqli_query($conn,$select);
		            while($row = mysqli_fetch_array($fetch)){
		         ?>
                <option value="<?= $row['school_name']." ".$row['id'] ?>" class='sm tab'><?= ucfirst($row['school_name'])." ".$row['id'] ?></option>
    
           <?php } }else{ 
            echo "No resources upload";
           }?>
				</select>
				</div>
			</div>
			<div class="col-xl-6 col-12 col-lg-6">
				<label>Reason for Transcript</label>
				<input type="text" name="" class='form-control form-control-sm student-reason-name-transcript'placeholder="reason for transfer than greater than 200 words">
			</div>
			<div class="col-xl-6 col-12 col-lg-6 mt-1">
			<label>Select School Location</label>
			<select class="form-control-sm form-control boder student-location-name-transcript">
					<option value="">Location</option>
					<option>Kaduna</option>
					<option>Kano</option>
					<option>Sokoto</option>
					<option>Zamfara</option>
					<option>Abuja</option>
					<option>Lagos</option>
					<option>Ibadan</option>
					<option>Edo</option>
					<option>Ebonyi</option>
					<option>Jos</option>
					<option>Kebbi</option>
				</select>	
			</div>
			<div class="col-xl-6 col-12 col-lg-6">
			<label>Enter Your School Email</label>
				<input type="text" name="" value="<?=$schoolemail?>" class="form-control student-email-name-transcript" readonly>
			</div>
			<div class="col-xl-6 col-12 col-lg-6 mt-2">
				<button  type="button" name="" class="btn-sm sm btn btn-success School-transcript-run">
					SUBMIT
				</button>
			</div>
		</div>
	</form>
</div>
<div class="transcript-info">
	<div class="transcript-div p-3 card bg-light">
		<div class="d-flex align-items-center justify-content-between mb-2">
			<label><b>ENTER SCHOOL YOU ARE EXPECTING TRANSCRIPT FORM AND ENTER YOUR SCHOOL EMAIL</b></label> 
			<button class="close-transcript btn-sm btn-primary sm">Close</button>
		</div>
		<form id="transcript-identity-form-reset" class="d-flex align-items-center">
			<input value="<?=$schoolemail?>" type="search" name="" class="boder form-control form-control-sm transcript-identity" placeholder="" readonly>
			<input  type="search" name="" class="boder form-control form-control-sm transcript-identity-1" placeholder="Enter School you are expecting transcript form" >
			<button type='button' class="boder btn btn-success btn-sm transcript-search">Search</button>
		</form>
	</div>
</div>
</div>
 <script type="text/javascript">
	$('.close-transcript').click(function()
	{
		$('.transcript-info').slideUp(100);
	})

	$('.accept-transcript').click(function()
	{
		$('.transcript-info').slideDown(100);
	})
</script>