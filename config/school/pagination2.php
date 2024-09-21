<?php
session_start();
$db = $_SESSION['db'];
$pagesCount = '';
$conn = mysqli_connect('localhost','root','', $db);
if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}
$val = "";
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $val = "WHERE course LIKE '%$search%' OR id LIKE '%$search%' OR tutor LIKE '%$search%'";
}
$sql = "SELECT * FROM staff $val";

$perPageCount = 10;
$select = "SHOW TABLES LIKE 'resources'";
$row1 = mysqli_num_rows(mysqli_query($conn,$select));
if($row1){
$sql = "SELECT * FROM resources WHERE 1";
if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}

$pagesCount = ceil($rowCount / $perPageCount);

$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = " SELECT * FROM resources $val limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>
<div class="table-responsive">
        <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>Book Name</td>
            <td class='sm' scope='row'>Tutor Name</td>
            <td class='sm' scope='row'>Class</td>
            <td class='sm' scope='row'>Click to Download</td> 
            <td class='sm' scope='row'>Edit</td> 
        </thead>
        <tbody>

    <?php foreach ($results as $row) { ?>
        <tr>
                <th class='sm tab'><?= ucfirst($row['course'])?></th>
                <td class='sm'><?= ucfirst($row['tutor'])?></td>
                <td class='sm'><?= ucfirst($row['class_name'])?></td>
                <td class='sm'><a href="upload/<?= $db?>/resources/<?= $row['name']?>" value="" 
                    class="fa fa-folder btn btn-primary btn-sm" download>
                </td>
                <td class='sm'><button value="<?= $row['id']?>"  
                    class="fa fa-edit btn btn-success resources-edit-101 btn-sm"></button>
                </td>
            </tr>

<?php }}else
{
    echo "<button class='btn btn-primary sm mt-2 set-up-resources'>Set up Resources</button>";
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
        <a href="javascript:void(0);" class="current btn btn-success btn-sm"><?php echo $i ?></a>
<?php
    } else {
        ?>
        <a href="javascript:void(0);" class="pages btn btn-primary btn-sm"
            onclick="showRecordsResources('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
<?php
    } // endIf
} // endFor

?>
</td>
        <td align="right" valign="top" class="">
       Page <?php echo $pageNumber; ?> of <?php echo $pagesCount; ?>
  </td>
    </tr>
</table>