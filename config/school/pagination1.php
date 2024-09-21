<?php
session_start();
$db = $_SESSION['db'];
$conn = mysqli_connect('localhost','root','', $db);
if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}

$perPageCount = 4;
   $val = "";
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $val = "WHERE firstName LIKE '%$search%' OR id LIKE '%$search%' OR email LIKE '%$search%'";
}
$sql = "SELECT * FROM teacher $val";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}

$pagesCount = ceil($rowCount / $perPageCount);
$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = " SELECT * FROM teacher $val limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>
<div class="row"> 
    <?php foreach ($results as $row) { ?>
     <div class="col-lg-3 col-xl-3 col-md-4 col-12 mt-2">
   <!-- card begin -->
   <div class='card shadow border-muted p-1'>
    <div class="image-bordered m-0 p-0" class="card-img-top w-100">
     <?php if($row['picture'] === NULL){?>
    <img  class="main-image001121" alt="teacher" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image001121" src="upload/<?= $db ?>/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>  
</div>
   <!-- card body -->
   <div class="card-body m-0 p-0">
   <div class="card-title m-0 p-0 sm">
   <?= substr($row['firstName'],0, 15)." ".substr($row['surName'],0, 15). ".."?>
   </div>
   <!-- card title -->
   <div class="card-text m-0 p-0 sm">
  
  <?php  if($row['email'] == NULL)
  {
    echo "no@gmail.com";
  }else
  {
    echo substr($row['email'],0, 30);
  } ?>
   </div>
   <!-- end of card title -->
   </div>
   <!-- card body end  -->
   <!-- card footer -->
   <div class="card-footer p-1">
       <button class="btn-primary button-teacher-get-view-2" value="<?= $row['uniqid_id']?>"> view profile</button>
       <button class="btn-secondary authorizationT button-teacher-edit-view-2" value="<?= $row['uniqid_id']?>"> edit profile</button>
   </div>
   <!-- end of card footer -->
   </div>
   <!-- card end -->
   </div>

    <?php }
    ?>
   <!-- div col begin -->
   </div>
    <?php 
    ?>

<div style="height: 30px;"></div>
<table width="50%" align="center">
    <tr>

        <td valign="top" align="left"></td>


        <td valign="top" align="center">
 
  <?php
  for ($i = 1; $i <= $pagesCount; $i ++) {
    if ($i == $pageNumber) {
        ?>
        <a href="javascript:void(0);" class="current btn btn-success btn-sm"><?php echo $i ?></a>
<?php
    } else {
        ?>
        <a href="javascript:void(0);" class="pages btn btn-primary btn-sm"
            onclick="showRecordsTeacher('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
<?php
    } // endIf
} // endFor

?>
</td>
        <td align="right" valign="top">
       Page <?php echo $pageNumber; ?> of <?php echo $pagesCount; ?>
  </td>
    </tr>
</table>