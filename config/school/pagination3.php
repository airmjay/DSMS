<?php
session_start();
$db = $_SESSION['db'];
$conn = mysqli_connect('localhost','root','', $db);
$pagesCount = '';
if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}

$perPageCount = 10;
$select = "SHOW TABLES LIKE 'question'";
// WHERE class LIKE '%$val%'
   $val = "";
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $val = "WHERE class LIKE '%$search%' OR tutor LIKE '%$search%' OR token LIKE '%$search%'";
}
$row1 = mysqli_num_rows(mysqli_query($conn,$select));
if($row1){
$sql = "SELECT DISTINCT * FROM question $val GROUP BY token";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}else
{
    ?>

  <?php   
}

$pagesCount = ceil($rowCount / $perPageCount);

$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = "SELECT DISTINCT * FROM question $val GROUP BY token limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>
<div class="table-responsive mt-2">
        <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='' scope='row'>Document name </td>
            <td class='' scope='row'>Upload By</td>
            <td class='' scope='row'>Date of Add</td>
            <td class='' scope='row'>Copy Token</td>
            <td class='' scope='row'>Print</td> 
            <td class='' scope='row'>Delete</td> 
        </thead>
       <tbody>

    <?php 

    foreach ($results as $row) { ?>
            <tr>
                <th class='sm'><?= $row['class']?></th>
                <td class='sm'><?= $row['tutor']?></td>
                <td class='sm'><?= $row['Date_of_add']?></td>
                <td class='sm'>
                <button class="fa fa-copy btn-default btn  token-get-copy" value="<?= $row['token']?>"> <?= $row['token']?> </button></td>
                <td class='sm'><button value="<?= $row['token'] ?>" class="far fa-file btn btn-default text-danger print-question-get btn-sm"></button></td>
                <td class='sm'><button value="<?= $row['token'] ?>" href='#'class="fa del-token-print-1 fa-edit btn btn-default btn-sm"></button></td>
            </tr>
            
        
    <?php }

    }else
    {
        echo "<button class=' mb-2 create-question-11 btn-sm btn btn-primary'>
        Create Question For the First entry</button>";
    } ?>

</tbody>
    </table>
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
            onclick="showRecordsPrint('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
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