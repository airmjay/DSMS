<?php
session_start();
$db = $_SESSION['loginAdminSessionGet'];
$conn = mysqli_connect('localhost','root','', 'school');
if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}

$perPageCount = 10;
   $val = "";
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $val = "WHERE activities LIKE '%$search%' OR date LIKE '%$search%'";
}
$sql = "SELECT * FROM `smart picker` $val ORDER BY id DESC";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}

$pagesCount = ceil($rowCount / $perPageCount);
$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = " SELECT * FROM `smart picker` $val ORDER BY id DESC limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>
<div class="table-responsive">
<table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm'>#</td>
            <td class='sm'>ACTIVITIES</td>
            <td class='sm'>ID</td>
            <td class='sm'>DATE</td>
        </thead>
        <tbody>
    <?php foreach ($results as $row) { 
    ?>
    <tr>
                <th class='sm' scope='row'><?= $row['id']?></th>
                <td class='sm'><?= $row['activities']?></td>
                <td class='sm'><?= $row['smart_id']?> </td>
                <td class='sm'><?= $row['date']?></td>
            </tr>
    <?php 
}
    ?>
 </tbody>
      </table>   
</div>
<div class="table-responsive">
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
            onclick="showRecordsActives('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
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
</div>