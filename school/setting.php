<b>Setting</b>
<div class="card shadow p-3 authorization">
<details class="border-dark mt-2">
	<summary class="btn btn-primary sm">Change School Name</summary>
	<p>
	<form class="p-3 card" id='school_name_form'>
	<label>Enter School Name </label>
        <input type="text" placeholder="enter school name" class="form-control form-control-sm change_school_name_text" name="">
	<input type="button" value="change school name" name="" class="change_school_name btn btn-success mt-2">	
	</form>
	</p>
</details>
<details class="mt-2">
          <?php    
            $conn = mysqli_connect('localhost','root','','school');
            $select = "SELECT * FROM dswp WHERE unique_id = '$random'";
            $row1 = mysqli_query($conn,$select);
            $row = mysqli_fetch_array($row1); ?>
	<summary class="btn btn-success sm">Change School Logo</summary>
	<p class="d-flex align-items-center">
        <div class="picture-div preview"> 
   <?php if($row['picture'] === ''){?>
    <img id="img-to-preview-school" class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="img-to-preview-school" class="main-image0111" src="upload_school/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
 </div>
    <form method="post" enctype="multipart/form-data">
  <label for="upload-preview-school" class="sm" id="image-label">Choose File</label>
  <input class="d-none" accept="image/png,image/jpeg,image/gif" type="file" name="image" id="upload-preview-school" class="image-upload-deploy-school" />
  <input class="d-none" value="<?= $row['unique_id']?>" name='IDstaff'>
  <br>
  <input type="button" id="but_upload_school_img" class="btn btn-success btn-sm sm boder" value="Update Image">
</form>
	 </p>
</details>
<details class="mt-2 authorization">
	<summary class="btn btn-info sm">Change School Information</summary>
	<p class="">
		<div class="card p-2">
			<section class="mt-2 mb-2">
				<b>School Website Status: </b> <span class="text-success">Opened</span>
			</section>
			<div class="btn-group">
				<button class="btn-danger btn-sm sm btn-group-item boder">Close</button>
				<button class="btn-primary btn-sm sm btn-group-item boder">Open</button>
			</div>
		</div>
	</p>
	<p>
	<?php
		$conn = mysqli_connect('localhost','root','', $random);
         $select = "SHOW TABLES LIKE 'blog'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
            ?>
            <!-- image home page -->
            <div class="row pl-3 pr-3">
            <div class="col-lg-12 col-md-12 col-12">Update Home Page Image Slide</div>
            <form id='form_home_image1' class="card col-lg-4 col-md-4 col-6 p-3">
            <div>Home Screen Image 1</div>
            <input type="file" accept="image/png,image/jpeg,image/gif" class='home-screen-1' name="name">
            <button type="button" value='1' class="home-screen-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
         	</form>
             
            <form id='form_home_image2' class="card col-lg-4 col-md-4 col-6 p-3">
            <div>Home Screen Image 2</div>
            <input type="file" class='home-screen-2' name="name">
            <button type="button" value='2' class="home-screen-2-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            <form id='form_home_image3' class="card col-lg-4 col-md-4 col-6 p-3">
            <div>Home Screen Image 3</div>
            <input type="file" class='home-screen-3' name="name">
            <button type="button" value='3' class="home-screen-3-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
         	</div>
            <!-- learning/feature div -->
            <div class="row pl-3 pr-3 mt-1">
            <div class="col-lg-12 col-md-12 col-12">Features Content</div>
            <form id='home-feature-1-upload-form1' class="card col-lg-4 col-md-4 col-6 p-3">
            <div>Content Caption 1</div>
            <input type="text" class='home-feature-1' name="name">
            <button type='button' value='1' class="home-feature-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            <form id='home-feature-1-upload-form2' class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Content Caption 2</div>
            <input type="text" class='home-feature-2' name="name">
            <button type='button' value='2' class="home-feature-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            
            <form id='home-feature-1-upload-form3' class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Content Caption 3</div>
            <input type="text" class='home-feature-3' name="name">
            <button type='button' value="3" class="home-feature-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            </div>
            <!-- About us div -->
            <div class="row pl-3 pr-3 mt-1">
            <div class="col-lg-12 col-md-12 col-12">About us</div>
            <form id='home-about-id-form' class="card col-lg-8  col-md-8 col-6 p-3">
            <div>About Text</div>
            <input type="text" class='home-about-1' name="name">
            <button value='text' type="button" class="home-about-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            <form id='home-about-id-form-1' class="card col-lg-4  col-md-4 col-6 p-3">
            <div>About Video</div>
            <input type="file" class='home-about-2' name="name">
            <button value="video" type='button' class="home-about-2-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            </div>
            <!-- About us div -->
            <div class="row pl-3 pr-3 mt-1">
            <div class="col-lg-12 col-md-12 col-12">ADD COURSES</div>
            <form id='form-course-reset' class="card col-lg-8  col-md-8 col-6 p-3">
            <div>Add Course</div>
            <input type="text" class='home-course-1' name="name">
            <button type='button' class="home-course-1-upload btn-primary btn-sm btn sm mt-2">Add</button>
            </form>
            <form id='delete-course-reg-1' class="card col-lg-4  col-md-8 col-6 p-3">
            <div>DELETE COURSES</div>
            <input type="text" class='home-course-del-1' name="name">
            <button class="home-course-del-1-upload btn-primary btn-sm btn sm mt-2">DELETE</button>
            </form>
            </div>
            <!-- Teacher Quote -->
            <div class="row pl-3 pr-3 mt-1">
            <div class="col-lg-12 col-md-12 col-12">Add Teacher Quote</div>
            <form id="Quote-form1" class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Teacher Caption 1</div>
            <input type="text" class='home-text-teacher-1' name="name">
            <select class='home-id-teacher-1 mt-1'>
            	<option value="">Select Teacher Id</option>
            <?php 	
            $conn = mysqli_connect('localhost','root','',$random);
            $select = "SELECT * FROM teacher";
			$row1 = mysqli_query($conn,$select);
			while($row = mysqli_fetch_array($row1))
			{
				?>
				<option value="<?=$row['uniqid_id']?>"><?=$row['email']?></option>
				<?php 
			}
				?>
            </select>
            <button type='button' value='1' class="home-teacher-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            <form id="Quote-form2" class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Teacher Caption 2</div>
            <input type="text" class='home-text-teacher-2' name="name">
            <select class='home-id-teacher-2 mt-1'>
            	<option value="">Select Teacher Id</option>
            <?php 	
            $conn = mysqli_connect('localhost','root','',$random);
            $select = "SELECT * FROM teacher";
			$row1 = mysqli_query($conn,$select);
			while($row = mysqli_fetch_array($row1))
			{
				?>
				<option value="<?=$row['uniqid_id']?>"><?=$row['email']?></option>
				<?php 
			}
				?>
            </select>
            <button type='button' value='2' class="home-teacher-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            <form id="Quote-form3" class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Teacher Caption 3</div>
            <input type="text" class='home-text-teacher-3' name="name">
            <select class='home-id-teacher-3 mt-1'>
            <option>Select Teacher Id</option>
            <?php 	
            $conn = mysqli_connect('localhost','root','',$random);
            $select = "SELECT * FROM teacher";
			$row1 = mysqli_query($conn,$select);
			while($row = mysqli_fetch_array($row1))
			{
				?>
				<option value="<?=$row['uniqid_id']?>"><?=$row['email']?></option>
				<?php 
			}
				?>
            </select>
            <button type='button' value='3' class="home-teacher-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            </div>
            <!-- blog-->
            <div class="row pl-3 pr-3 mt-1">
            <div class="col-lg-12 col-md-12 col-12">Home Image Slider Content</div>
            <form id="Home-post-id-content-1" class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Home post 1</div>

            <input type="text" placeholder="enter your caption" class='mt-1 home-blog-caption-1' name="name">
            <input type="text" placeholder="enter your Information" class='mt-1 home-blog-information-1' name="name">
            <input type="type" placeholder="content" class='mt-1 home-blog-content-1' name="name">
            <input type="text" placeholder="button of name" class='mt-1 home-blog-comment-1' name="name">
            <button value="1" type="button" class="home-blog-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            <form id="Home-post-id-content-2" class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Home post 2</div>

            <input type="text" placeholder="enter your caption" class='mt-1 home-blog-caption-2' name="name">
            <input type="text" placeholder="enter your Information" class='mt-1 home-blog-information-2' name="name">
            <input type="type" placeholder="content" class='mt-1 home-blog-content-2' name="name">
            <input  type="text" placeholder="button of name" class='mt-1 mt-1 home-blog-comment-2' name="name">
            <button value="2" type="button" class="home-blog-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            <form id="Home-post-id-content-3" class="card col-lg-4  col-md-4 col-6 p-3">
            <div>Home post 3</div>

            <input type="text" placeholder="enter your caption" class='mt-1 home-blog-caption-3' name="name">
            <input type="text" placeholder="enter your Information" class='mt-1 home-blog-information-3' name="name">
            <input type="type" placeholder="content" class='mt-1 home-blog-content-3' name="name">
            <input type="text" placeholder="button of name" class='mt-1 home-blog-comment-3' name="name">
            <button value="3" type="button" class="home-blog-1-upload btn-primary btn-sm btn sm mt-2">Update</button>
            </form>
            </div>
            <?php
            }else
            {
            	echo "<button value='click' class='school_image_home_rec btn-sm btn-success sm'>
            	Setup School Information
            	</button>";
            }?>

      </p>
</details>
<details class="mt-2 authorization">
	<summary class="btn btn-danger sm">Authentification Access</summary>
	<form id='reset-form-status-code'>
		<div class="card p-3">
			<input type="text" placeholder="Enter Staff Id" class="authenticate_code form-control form-control-sm mb-2" name="">
			<div class="d-flex align-items-center">
				<input class='add-status' value="1" type="radio" id='access1' name="access">  
				<label for="access1">: Level 1 ACCESS </label>
			</div>
			<div class="d-flex align-items-center">
				<input class='add-status' value="2" type="radio" name="access" id='access2'> 
				 <label for="access2">: Level 2 ACCESS </label>
			</div>
			<div class="d-flex align-items-center">
				<input class='add-status' value='3' type="radio" id='access3' name="access">  
				<label for="access3" class="text-danger">: Add All Level of ACCESS </label>
			</div>
         <input type="text" value="" class='hold-status-code d-none' style="display:none;" readonly name="">
			<button type='button' class="btn-primary btn-sm sm Authentification_update">Authenticate</button>
		</div>
	</form>
</details>
<details class="mt-2">
	<summary class="btn btn-danger sm">DELETE USERS</summary>
	<p>
		<div class="card p-3">
         <div class="row">
			<form id='form-del-student-reset' class="card col-lg-3  col-md-3 col-6 p-3">
            <div>Delete Student</div>
            <input type="text" class='student-del-1' name="name">
            <button type='button' class="student-del-button-1-upload btn-primary btn-sm btn sm mt-2">
            Delete</button>
            </form>
            <form id='form-del-parent-reset' class="card col-lg-3  col-md-3 col-6 p-3">
            <div>Delete Parent</div>
            <input type="text" class='parent-del-1' name="name">
            <button type='button' class="parent-del-button-1-upload btn-primary btn-sm btn sm mt-2">
            Delete</button>
            </form>
            <form id='form-del-teacher-reset' class="card col-lg-3  col-md-3 col-6 p-3">
            <div>Delete Teacher</div>
            <input type="text" class='teacher-del-1' name="name">
            <button type='button' class="teacher-del-button-1-upload btn-primary btn-sm btn sm mt-2">Delete</button>
            </form>
            <form id='form-del-staff-reset' class="card col-lg-3  col-md-3 col-6 p-3">
            <div>Delete Staff</div>
            <input type="text" class='staff-del-1' name="name">
            <button type='button' class="staff-del-button-1-upload btn-primary btn-sm btn sm mt-2">Delete</button>
            </form>
		</div>
      </div>
	</p>
</details>
<hr>
 <details class="mt-2">
	<summary class="btn-danger btn sm"> School Details</summary>
	<div class="table-responsive mt-2">
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>School Name</td>
            <td class='sm' scope='row'>Email</td>
            <td class='sm' scope='row'>Date of Join</td>
             
        </thead>
        <tbody>
            <tr>
            <?php 
      $conn = mysqli_connect('localhost','root','', 'school');
       $select = "SHOW TABLES LIKE 'dswp'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
            $select = "SELECT * FROM dswp";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='sm tab'><?= ucfirst($row['school_name'])?></th>
                <td class='sm'><?= ucfirst($row['email'])?></td>
                <td class='sm'><?= ucfirst($row['date_of_join'])?></td>
            </tr>
           <?php } }else{ 
            echo "No resources upload";
           }?>
            
        </tbody>
    </table>
    </div>  
   
</details>
 <details class="mt-2">
    <summary class="btn-success btn sm">ONLINE PAYMENT</summary>
    <div class="table-responsive mt-2">
    <input type="search" placeholder="search with student id" name="" class='paymentbox-search-1 
    form-control form-control-sm sm'>
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>Parent Name</td>
            <td class='sm' scope='row'>receipt</td>
            <td class='sm' scope='row'>Student</td>
            <td class='sm' scope='row'>Student Class</td>
            <td class="sm" scope='row'>Action </td>
        </thead>
        <tbody class="receipt-div-1011">
            <tr>
            <?php 
      $conn = mysqli_connect('localhost','root','', $random);
       $select = "SHOW TABLES LIKE 'paymentbox'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
            $select = "SELECT * FROM paymentbox WHERE status = 0 ORDER BY id DESC LIMIT 4";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='sm tab'><?= ucfirst($row['Name_of_Made'])?></th>
                <td class='sm'><?= ucfirst($row['receipt_id'])?></td>
                <td class='sm'><?= ucfirst($row['made_uniqid_id'])?></td>
                <td class='sm'><?= ucfirst($row['msg'])?></td>
                <td class='sm'><button value="<?= $row['id']?>" class="btn btn-danger btn-sm sm print-receipt-div-1">Print</button>
                </td>
            </tr>
           <?php } }else{ 
            echo "No Payment Made yet";
           }?>
            
        </tbody>
    </table>
    </div>  
   
</details>
<details class="mt-2">
    <summary class="btn-primary btn sm">DIRECT PAYMENT</summary>
    <div class="p-2 card mt-2">
        <i class="text-danger">* Be careful when creating receipt. </i>
        <form id="paymentForm">
            <label>Parent name</label>
            <input type="text" placeholder="enter parent name" class="parent-name-receipt form-control form-control-sm" name="">
            <label>reciept id</label>
            <input type="text" class="form-control form-control-sm parent-id-receipt" readonly value="<?="direct".rand()?>" placeholder="auto" name="">
            <label>Student id</label>
            <input type="number" class="form-control form-control-sm student-id-receipt" placeholder="enter student id" name="">
            <label>Student class</label>
            <input type="text" class="form-control form-control-sm student-class-receipt" placeholder="enter student class" name="">
            <button type="button" class="btn btn-primary sm btn-sm mt-2 add-payment-reciept">
            Add Payment</button>
        </form>
    </div>
</details>
<details class="mt-2">
    <summary class="btn-info btn sm">API MANAGEMENT</summary>
    <div class="row mt-2 mb-2 p-3">
            <form id='form-del-api-reset' class="card col-lg-3  col-md-3 col-6 p-3">
            <div>PAYMENT API</div>
            <textarea type="text" class='api-del-1' name="name"> </textarea>
            <button type='button' class="api-del-button-1-upload btn-primary btn-sm btn sm mt-2">
            ADD PAYMENT API</button>
            </form>
            <form id='form-del-api-reset-1' class="card col-lg-3  col-md-3 col-6 p-3">
            <div>MESSAGE API</div>
            <textarea type="text" class='api-del-2' name="name"> </textarea> 
            <button type='button' class="api-del-button-2-upload btn-primary btn-sm btn sm mt-2">
            ADD PAYMENT API</button>
            </form>
        </div>
</details>  
<details class="mt-2">
    <summary class="btn-info btn sm">CASH PAYMENT</summary>
    <div class="table-responsive mt-2">
    <input type="search" placeholder="search with student id or receipt id" name="" 
    class='paymentbox-search 
    form-control form-control-sm sm'>
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>Parent Name</td>
            <td class='sm' scope='row'>receipt id</td>
            <td class='sm' scope='row'>Student id</td>
            <td class='sm' scope='row'>Student Class</td>
            <td class="sm" scope='row'>Action </td>
        </thead>
        <tbody class='receipt-div-101'>
            <tr>
            <?php 
      $conn = mysqli_connect('localhost','root','', $random);
       $select = "SHOW TABLES LIKE 'paymentbox'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
            $select = "SELECT * FROM paymentbox WHERE status = 1 ORDER BY id DESC LIMIT 4";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='sm tab'><?= ucfirst($row['Name_of_Made'])?></th>
                <td class='sm'><?= ucfirst($row['receipt_id'])?></td>
                <td class='sm'><?= ucfirst($row['made_uniqid_id'])?></td>
                <td class='sm'><?= ucfirst($row['msg'])?></td>
                <td class='sm'><button value="<?= $row['id']?>" class="btn btn-danger btn-sm sm print-receipt-div-1">Print</button>
                </td>
            </tr>
           <?php } }else{ 
            echo "No Payment Made yet";
           }?>
            
        </tbody>
    </table>
    </div>  
   
</details>  
<div class=""></div>
</div>
