<div class='header'>
 <div class="mb-2">
    <div class="d-flex align-items-center">
    <span>Sort: </span>
<?php $conn= mysqli_connect('localhost', 'root', '', $random);
    $row = "SELECT * FROM student WHERE id = '$fetchId'";
    $query = mysqli_query($conn, $select);
    $fetch = mysqli_fetch_array($query);
?>
<input type="text" value="<?= $fetch['id']?>" class='d-none child_id_get' name="" readonly>
 
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