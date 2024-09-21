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
$val = "WHERE unique_id != '$db'";
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $val = "WHERE firstname LIKE '%$search%'
     OR id LIKE '%$search%' 
     OR email LIKE '%$search%' 
     ";
}
$sql = "SELECT * FROM staff $val";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}

$pagesCount = ceil($rowCount / $perPageCount);

$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = " SELECT * FROM staff $val limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>
<div class="row p-3">
    <?php foreach ($results as $data) { ?>
  
   <div class="col-lg-3 col-xl-3 col-md-4 col-6 mt-2 shadow p-2">
   <!-- card begin -->
   <div class='picture-div-card card border-muted p-1'>
     <?php if($data['picture'] === NULL){?>
    <img id="img" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="img"  src="upload/<?= $db ?>/<?= $data['picture']?>" width="100%" height="100%"> 
   <?php }?>
   </div>
   <!-- card body -->
   <div class="card-body p-0 m-0">
   <div class="card-title m-0 p-0">
   <?= substr($data['firstname'], 0, 20)." ".substr($data['lastname'], 0, 20);?>...
   </div>
   <!-- card title -->
   <div class="card-text m-0 p-0">
  
  <?= substr($data['email'], 0 , 20)?> ...
   </div>
   <!-- end of card title -->
   </div>
   <!-- card body end  -->
   <!-- card footer -->
   <div class="card-footer p-1">
       <button class="btn-primary btn-sm btn checkStaffProfile mt-2" value="<?= $data['unique_id']?>"> view profile</button>
       <button class="btn-secondary btn-sm btn editStaffProfile authorization mt-2" value="<?= $data['unique_id']?>"> edit profile</button>
   </div>
   <!-- end of card footer -->
   </div>
   
    <?php }
    ?>
</div>

<div style="height: 30px;"></div>
<table width="50%" align="center">
    <tr>

        <td valign="top" align="left"></td>


        <td valign="top" align="center">
 
  <?php
  for ($i = 1; $i <= $pagesCount; $i ++) {
    if ($i == $pageNumber) {
        ?>
        <a href="javascript:void(0);" class="current btn-secondary btn-sm btn"><?php echo $i ?></a>
<?php
    } else {
        ?>
        <a href="javascript:void(0);" class="pages btn-primary btn-sm btn"
            onclick="showRecords('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
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