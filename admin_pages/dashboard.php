<div>
	<h1> <b>DASHBOARD</b></h1>
<section class="Dashboard">
<div class="col-12">
<div class="row">
<div class="col-md-3 card-count  col-lg-3 col-xl-3 col-sm-6  p-1 ">
	<div class="card p-2 mt-2 bg-primary text-white d-flex justify-content-between align-items-center flex-column">
		<i class="fa fa-school"></i>
		<span>Number of School 
		(<?php $select = "SELECT * FROM `dswp`";
        $check = mysqli_query($conn1, $select);
        echo  mysqli_num_rows($check); 
         ?>)</span>
	</div>
</div>
<div class="col-md-3 card-count col-lg-3 col-xl-3 col-sm-6 p-1  ">
	<div class="card p-2 mt-2 bg-danger text-white d-flex justify-content-between align-items-center flex-column">
		<i class="fa fa-users"></i>
		<span>Number of Student (30)</span>
	</div>
</div>
<div class="col-md-3 card-count col-lg-3 col-xl-3 col-sm-6 p-1 text-white">
	<div class="card p-2 mt-2 bg-success d-flex justify-content-between align-items-center flex-column">
		<i class="fa fa-wifi"></i>
		<span>Number of countries (1)</span>
	</div>
</div>
<div class="col-md-3 card-count col-lg-3 col-xl-3 col-sm-6 p-1">
	<div class="card p-2 mt-2 bg-secondary text-white d-flex justify-content-between align-items-center flex-column">
		<i class="fa fa-handshake"></i>
		<span>Number of Staff 
		(<?php $select = "SELECT * FROM `staff`";
        $check = mysqli_query($conn1, $select);
        echo  mysqli_num_rows($check); 
         ?>)</span>
	</div>
</div>
</div>
</div>
</section>
<section class="Dashboard-2 col-12 p-1 sm">
	<div class="row">
		<div class="col-md-7 col-lg-5 col-12 mt-2">
			<div class="card Dashboard-card-2 card-1 p-2 border-secondary">
			<div class='card-title font-weight-900'> <b> STAFF </b></div>
			<ul class="list-group">
			<?php $select = "SELECT * FROM `staff` ORDER BY RAND() LIMIT 8";
                  $check = mysqli_query($conn1, $select);
             while($row =  mysqli_fetch_assoc($check)){ ?>
			<li class="sm list-group-item d-flex justify-content-between align-items-center p-2"> 
			<span class='mr-lg-2 mr-0'>
					<?php if($row['picture'] === ''){?>
    					<img  class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    					<?php }else
    					{?>
    					<img class="main-image0111" src="upload/<?= $row['picture']?>" width="100%" height="100%"> 
   					<?php }?></span> 
			<div class="sm"><?= substr($row['staff_name'], 0, 30) ?>..... </div> 
			<button class="button-staff-get-view-1 btn btn-sm btn-primary" value="<?= $row['staffId']?>">view more</button> 
			</li>
			<?php }?>
			</ul>		
			</div>
		</div>
		<div class="col-md-5 col-lg-7 col-12 mt-2">
			<div class="card Dashboard-card-2 card-2">
			<div class="card Dashboard-card-2 card-1 p-2 border-primary">
			<div class='card-title font-weight-900'> <b> ACTIVITIES </b></div>
			<ul class="list-group">
			<?php $select = "SELECT * FROM `smart picker` ORDER BY id DESC LIMIT 8";
                  $check = mysqli_query($conn1, $select);
             while($row =  mysqli_fetch_assoc($check)){ ?> 
                <li class="sm  list-group-item d-flex justify-content-between align-items-center">  
                <?= $row['activities']?>
                </li>
            <?php }?>
			</ul>			
			</div>
			</div>	
			</div>
		</div>
</section>
</div>
