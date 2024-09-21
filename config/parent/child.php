<?php
session_start();
$db = $_SESSION['db'];
$getdb = $db;
$conn = mysqli_connect('localhost','root','', $db);
$error = [];
function cleanData($conn, $data)
{
	$clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
	return $clean;
}
if(isset($_POST['search_val']))
{
    $date = new DateTime();
    $time =  $date->format('m/d/20y');
    $name = $_POST['name'];
    $email = $_POST['getid'];
    
	$id = $_POST['search_val'];
	$select = "SELECT * FROM student WHERE id = '$id'";
	$row = mysqli_fetch_array(mysqli_query($conn,$select));
   
	if($row){
         $uniqueIDE = $row['uniqid_id'];
    $selectNow = mysqli_num_rows(mysqli_query($conn, "SELECT * 
        FROM attendance_std WHERE attend_id = '$uniqueIDE'"));
    $selectRow = mysqli_num_rows(mysqli_query($conn, "SELECT * 
        FROM attendance_std WHERE attend_time = '$time' 
    AND attend_id = '$uniqueIDE'"));
    if($selectRow)
    {
        $today = "Attend Today";
    }else
    {
        $today = "Not Attend";
    }
	?>
<div class='row '>
<div class="col-lg-4 col-md-4 col-12 mb-2 card-profile-color-body">
<!-- div col -->
<div class="card-profile-begin">
   <!-- card begin -->
   <div class='card shadow border-muted'>
   <?php if($row['picture'] === NULL){?>
    <img  class="main-image" alt="student" src="image/images.jpg" width="100%" height="200px">
    <?php }else
    {?>
    <img  class="main-image" src="upload/<?= $getdb ?>/<?= $row['picture']?>" width="100%" height="200px">
<?php }?>
   <!-- card body -->
   <div class="card-body p-2 mt-0">
   <div class="card-text p-0 mt-0">
    <hr class='p-0 bg-dark mt-0'>
    <div class='card-details p-2 text-muted'>
        <span class='text-success h1'>PROFILE's</span>
        <div>POST: <?= $row['post'] ?> </div>
        <div>Class: <?=$class =  $row['S_id'] ?> </div>
        <div>DATE 0F JOIN: <?= $row['Date_of_join'] ?> </div>
        <input type="hidden" value='<?= $row['S_id'] ?>' class='basic'name="">
        <input type="hidden" value='<?= $id ?>' class='basicID'name="">
    </div>
    </div>
    <?php 
   
    $select = "SELECT * FROM paymentbox WHERE made_uniqid_id = '$id' AND msg = '$class' ";
    if(mysqli_num_rows(mysqli_query($conn,$select)))
    {
        $row222 = mysqli_fetch_array(mysqli_query($conn,$select));
        $id = $row222['id'];
        echo "SUCCESS PAYMENT FOR THE TERM 
        <button class='btn sm btn-danger ml-2 btn-sm print-receipt-div-1' 
        value='$id'>Print</button>";
    }else{


    ?>
    <form id="paymentForm" class="card p-3">
    <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" value="<?=$name ?>"  id="first-name" />
    </div>
    <div class="form-submit">
    <button class='btn btn-primary'type="submit" onclick="payWithPaystack()"> Pay Student School Fees </button>
    </div>
    </form>

    <?php } ?>
   <!-- end of card title -->
   </div>
   <!-- card body end  -->
   </div>
   <!-- card end -->
   </div>
</div>
<div class="col-lg-8 col-md-8 col-12">
<div class='row'>
<div class="col-12  mb-2"> 
<div class="card p-4 sm side-design">
    <span class='h1 d-block'><b class='mr-2'><?= $row['firstName']?></b> 
    <span class="side-design"><i class="fa fa-location-arrow text-danger ml-3"></i> <?=  $row['address']?></span>
    </span>
    <i class='text-success'>
    <!-- <span class='h1 side-design d-block'> Product Designer</span> -->
    <span class='h1 d-block side-design'>Student id: <?= $row['id'] ?></span>
    <span class='h1 d-block side-design'>Name: <?= $row['firstName']. " ". $row['surName']. " ". 
    $row['middleName']; ?></span>
    <!-- <span class='h1 d-block side-design'>Post: <?= $row['post'] ?></span> -->
    <span class='h1 d-block side-design'>Number of days Attend: <?=$selectNow ?> </span>
    <span class='h1 d-block side-design'> Today Attendance: <?=$today ?> </span>
    
    </i>
</div>
</div>
<div class="col-12"> 
<div class="card">
<span class='pl-2 pt-2'><i class="fa fa-user"></i> <b>About</b></span>
<hr class='p-0'>
<i class='text-dark p-2'>
    <span class='h1 side-design d-block text-muted'> <b>CONTACT INFORMATION -------------------</b></span>
    <span class='h1 d-block side-design'>PHONE: Parent Tel.</span>
    <span class='h1 d-block side-design'>Address: <?= $row['address'] ?> </span>
    <span class='h1 d-block side-design'>Gender: <?= $row['email'] ?></span>
    <span class='h1 side-design d-block text-muted'><b> BASIC INFORMATION ---------------------</b></span>
    <span class='h1 d-block side-design'>Gender: Male</span>
    <span class='h1 d-block side-design'>Birthday: <?= $row['date_of_birth'] ?></span>
    </i>
</div>
</div>

</div>
</div>
</div>


	<?php
}else
{
	echo "NO DATA FOUND";
}
}
if(isset($_POST['class1']))
{
	$id = $_POST['id'];
	$class1 = $_POST['class1'];
	$term = $_POST['term'];
	$algo = $id."/".$class1."/".$term;
	$conn1 = mysqli_connect('localhost','root', '', 'school');
	$selectSchool = "SELECT * FROM dswp WHERE unique_id = '$getdb'";
	$row1 = mysqli_fetch_array(mysqli_query($conn1,$selectSchool));
	$selectStudent = "SELECT * FROM student WHERE id = '$id'";
	$row4 = mysqli_fetch_array(mysqli_query($conn,$selectStudent));
	$selectResult = "SELECT * FROM result WHERE msg = '$algo'";
	$fetch = mysqli_query($conn,$selectResult);
	$row3 = mysqli_fetch_array($fetch);
    $name = cleanData($conn, $_POST['name']);
	if(mysqli_num_rows($fetch)){
	?>
<table border="1" class="mt-2 table" style="width:100%">
 	<tr>
 		<td colspan="5">
 			<div class="school-name d-flex align-items-center justify-content-between p-2">
 			<div class="logo img-card picture-div mr-2">			
 	<?php if($row4['picture'] === NULL){?>
    <img  class="main-image" alt="student" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image" src="upload/<?= $getdb ?>/<?= $row4['picture']?>" width="100%" height="100%">
<?php }?>
 			</div>
 			<div class="name-school pt-3 sm">
 				<p class="sm m-1"><?= $row1['school_name']?></p>
 				<p class="sm m-1">Afflited to CBSE Afflication Code: <?= $getdb?></p>
 				<p class="sm m-1">MARK SHEET FOR THE EXAMINATION 
 					<?= $row3['parent_id']?>st Term <?php 
 					$pos1 = strpos($row3['msg'], '/')+1;
 					$basic1 = substr($row3['msg'], $pos1);
 					$pos2 = strpos($basic1, '/');
 					echo $basic2 = substr($basic1, 0, $pos2).".";
 					 ?></p>
 				</div>
            <div class="logo img-card picture-div mr-2">
            	<?php if($row1['picture'] === NULL){?>
    <img  class="main-image" alt="student" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image" src="upload_school/<?= $row1['picture']?>" width="100%" height="100%">
<?php }?>
            </div>
 			
 			</div>
 		</td>
 		<tr>
 			<td class="sm">Student Name: <?= $row4['firstName']. " ".$row4['surName']. " ".$row4['middleName'] ?></td>
 			<td class="sm" colspan="4">Admission Number: <?= $row4['id'] ?> </td>
 		</tr>
 		<tr>
 			<td class="sm"> <?php if($name == 'undefined')
            {
             echo "Guardard Name: Danladi John";   
            }else
            {
                echo "Guardard Name: ". $name;
            } ?></td>
 			<td class="sm" colspan="4">Class: <?= $row4['S_id'] ?> </td>
 		</tr>
 		<tr class="p-2">
 					<td><b>SUBJECTS:</b> </td>
 					<td class="p-2 sm">Test</td>
 					<td class="p-2 sm">Exam</td>
 					<td class="p-2 sm"><b>Total</b></td>
 					<td class="p-2 sm">Grade</td>
 		</tr>
 	<?php
 		while($row2 = mysqli_fetch_array($fetch)){
	?>
 		<tr class="">
 					<td class="sm"><?= $row2['Subject_name']?> </td>
 					<td class="sm"><?= $row2['test']?></td>
 					<td class="sm"><?= $row2['exam']?></td>
 					<td class="sm"><?= $row2['grade']?></td>
 					<td> <?php if(($row2['grade']) >= 70 )
 					{
 						echo "A";
 					}elseif($row2['grade'] >= 60)
 					{
 						echo "B";
 					}elseif($row2['grade'] >= 50)
 					{
 						echo "C";
 					}elseif($row2['grade'] >= 45)
 					{
 						echo "D";
 					}elseif($row2['grade'] >= 40) {
 						echo "E";

 					}else {
 						echo "F";
 					}?></td>
 		</tr>
 <?php }?>
 		
 		<tr>
 		<td colspan="5">
 			<div class="school-name d-flex justify-content-between align-items-end p-2">
 			<div class="">
 				<table border="1">
 					<tr>
 						<td class="p-2 sm">Percentage</td>
 						<td class="p-2 sm">Grade</td>
 					</tr>
 					<tr>
 						<td class="p-2 sm">100 - 70</td>
 						<td class="p-2 sm">A</td>
 					</tr>
 					<tr>
 						<td class="p-2 sm">69- 60</td>
 						<td class="p-2 sm">B</td>
 					</tr>
 					<tr>
 						<td class="p-2 sm">59 - 50</td>
 						<td class="p-2 sm">C</td>
 					</tr>
 					<tr>
 						<td class="p-2 sm">49 - 45</td>
 						<td class="p-2 sm">D</td>

 					</tr>
 					<tr>
 					<td class="p-2 sm">44 - 40</td>
 						<td class="p-2 sm">E</td>
 					</tr>
 					<tr>
 					<td class="p-2 sm">39 - 0</td>
 						<td class="p-2 sm">F</td>
 					</tr>
 				</table>
 			</div>
 			<div class="name-school pt-3 sm">
 				<p class="mb-5">Principal Signature:</p>
                <div style='width:200px;height:100px;'>
                    <img src="img/sign.png" width="100%" height="100%">
                </div>
 				<span>___ _ __ __ ___ __ __ __ __ __ __ __ __ __ __ __ __ ___</span>
 				</div>
 			</div>
 		</td>
 	</tr>
 	<tr>
 				<td class="sm">Email: <?= $row1['email']?></td>
 				<td class="sm">Tel: 09227116336</td>
 				<td class="sm">Post: __________</td>
 				<td class="sm">Powered By: Airmjay.com</td>
 				<td class="sm">Time:
                  <?php  
                  $date = new DateTime();
                  echo $date->format('m/d/20y');
                  ?>
                </td>
 	</tr>
 </table>
 <button class="btn btn-primary mt-2 small mb-5 class-print-result d-print-none">Print</button>
</div>
<?php 
}else
{
	echo "NO DATA AVAILABLE";
}



}

  if(isset($_POST['basic']))
{
    $id = $_POST['student_id'];
    $name = $_POST['name'];
    $basic = $_POST['basic'];
    $message =$_POST['message1'];
    $insert = "INSERT INTO `paymentbox`(`Name_of_Made`, `receipt_id`, `made_uniqid_id`, `msg`) VALUES ('$name','$message','$id','$basic')";
    if(mysqli_query($conn,$insert))
    {
        echo "Payment Successfully paid";
    
    }
}
?>