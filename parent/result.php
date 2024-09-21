<div class='header'>
 <div class="">
 	<div class="d-flex align-items-center">
 	<span>Sort: </span>
 <select class="mt-2 mb-2 mr-1 child_id_get"> 
<option value="">Select Child Id</option>
<?php $conn= mysqli_connect('localhost', 'root', '', $random);
    $select = "SELECT * FROM parent WHERE id = '$fetchId'";
    $query = mysqli_query($conn, $select);
    while($row = mysqli_fetch_array($query))
    {
        

    $row = $row['parent_id'];
    $arr = explode(',', $row);
// Convert the array to a comma-separated string
    for($i = 0; $i < count($arr); $i++)
    {
        echo "<option value='$arr[$i]'>".$arr[$i]."</option>";
    }
}
 ?>
</select>
 	<select class="mr-1 class_id_get">
 <?php $conn= mysqli_connect('localhost', 'root', '', $random);
    $select = "SELECT * FROM class";
    $query = mysqli_query($conn, $select);
    while($row = mysqli_fetch_array($query))
    {
     
    ?>
    <option value="<?= $row['name'] ?>"> <?= $row['name'] ?></option>
    <?php }?>	
 	</select>
 	<select class="mr-1 term_id">
 		<option value="">Select Term</option> 		
 		<option value="1">First Term</option>
 		<option value="2">Second Term</option>
 		<option value="3">Third Term</option>
 	</select>
 	<button class="btn btn-success btn-sm sm mr-1 parent-result-search">Search</button>
 	</div>
 </div>
 <div class="x-card m-auto table-responsive result_table_algo card p-3 mb-3 result-printer" style="width:90%">
  REVIEW STUDENT RESULT
</div>