<?php
$getdb = $_POST['getdb'];
$conn = mysqli_connect('localhost','root','', $getdb);
$error = [];

function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
if(isset($_POST['val_search_receipt']))
{
	  $val = cleanData($conn, $_POST['val_search_receipt']);
       $select = "SHOW TABLES LIKE 'paymentbox'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
            $select = "SELECT * FROM `paymentbox` WHERE status = 1 AND made_uniqid_id LIKE '%$val%'";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
            	echo "<tr>";
         ?>
                <th class='sm tab'><?= ucfirst($row['Name_of_Made'])?></th>
                <td class='sm'><?= ucfirst($row['receipt_id'])?></td>
                <td class='sm'><?= ucfirst($row['made_uniqid_id'])?></td>
                <td class='sm'><?= ucfirst($row['msg'])?></td>
                <td class='sm'><button value="<?= $row['id']?>" class="btn btn-danger btn-sm sm">Print</button>
                </td>
            </tr>
           <?php } }else{ 
            echo "No Payment Made yet";
           }?>
 <?php
}
if(isset($_POST['val_search_receipt_1']))
{
	  $val = cleanData($conn, $_POST['val_search_receipt_1']);
       $select = "SHOW TABLES LIKE 'paymentbox'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
            $select = "SELECT * FROM `paymentbox` WHERE status = 0 AND made_uniqid_id LIKE '%$val%'";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
            	echo "<tr>";
         ?>
                <th class='sm tab'><?= ucfirst($row['Name_of_Made'])?></th>
                <td class='sm'><?= ucfirst($row['receipt_id'])?></td>
                <td class='sm'><?= ucfirst($row['made_uniqid_id'])?></td>
                <td class='sm'><?= ucfirst($row['msg'])?></td>
                <td class='sm'><button value="<?= $row['id']?>" class="btn btn-danger btn-sm sm">Print</button>
                </td>
            </tr>
           <?php } }else{ 
            echo "No Payment Made yet";
           }?>
 <?php
}
if(isset($_POST['print_1']))
{
     $id = cleanData($conn, $_POST['print_1']);
     $select = "SELECT * FROM `paymentbox` WHERE  id = '$id'";
     $fetch = mysqli_query($conn,$select);
     $row = mysqli_fetch_array($fetch);
     $conn1 = mysqli_connect('localhost','root', '', 'school');
     $select1 = "SELECT * FROM dswp";
     $row1 = mysqli_query($conn1,$select1);
     $row2 = mysqli_fetch_array($row1); ?>
         <div class="card p-3 mt-2">
            <div><h1 class='font-weight-bold'> <?= $row2['school_name'] ?></h1></div>
            <div class="row p-3">
                <h1>PAYMENT RECEIPT</h1><HR><br>
                <h4>PAID DATE: <?= $row['Date_of_add'] ?></h4>
                <div class="col-12 mt-2">
                <img width="100px" height="100px" src="upload_school/<?= $row2['picture']?>" width="100%" height="100%">
                </div>
                <div class="col-6 mt-2">Name of recipient: <?= $row['Name_of_Made']?></div>
                <div class="col-6 mt-2">receipt ID: <?= $row['receipt_id']?></div>
                <div class="col-6 mt-2">Student ID: <?= $row['Name_of_Made']?></div>
                <div class="col-6 mt-2">Class: <?= $row['msg']?></div>
                <div class="col-6 mt-2 text-secondary">Status: PAID</div>
                <div class="col-6 mt-2">Amount: N100,000</div>
            </div>
        </div>
    <?php
}
if(isset($_POST['add_payment']))
{
   $student_class = cleanData($conn, $_POST['student_class']);
   $student_id = cleanData($conn, $_POST['student_id']);
   $id_receipt = cleanData($conn, $_POST['id_receipt']);
   $parent = cleanData($conn, $_POST['parent']);
   foreach ($_POST as $key => $value) {   
    if ($key != 'T_name') { 
    if(empty($_POST[$key]))
    {
            $error[] = "All input field is required";
            $error_found = true;
        break;
    }
    }
    }
if(count($error) === 0){
   $insert = "INSERT INTO `paymentbox`(`Name_of_Made`, `receipt_id`, `made_uniqid_id`, `msg`, `status`) VALUES ('$parent','$id_receipt','$student_id','$student_class',1)";
   if(mysqli_query($conn,$insert))
    {
    	echo "<div class='alert alert-success sm alert-sm'> Payment Have been Submit Successfully </div> 
    	<script> $('#paymentForm')[0].reset();</script>";
    }

}

}
if (isset($error_found)) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>".$error[0]."</div>" ;
}




?>