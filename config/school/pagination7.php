<?php
session_start();
$db = $_SESSION['db'];
$conn = mysqli_connect('localhost','root','', $db);
if (! (isset($_GET['pageNumber']))) {
    $pageNumber = 1;
} else {
    $pageNumber = $_GET['pageNumber'];
}

$perPageCount = 10;

$sql = "SELECT * FROM class WHERE 1";

if ($result = mysqli_query($conn, $sql)) {
    $rowCount = mysqli_num_rows($result);
    mysqli_free_result($result);
}else
{
  echo "<div class='mt-2 alert-success alert-sm p-3'>NO CLASS ADD YET</div>";
}

$pagesCount = ceil($rowCount / $perPageCount);
$lowerLimit = ($pageNumber - 1) * $perPageCount;

$sqlQuery = " SELECT * FROM class WHERE 1 limit " . ($lowerLimit) . " ,  " . ($perPageCount) . " ";
$results = mysqli_query($conn, $sqlQuery);

?>
<div class="table-responsive mt-2">
        <table class="table table-sm table-striped table-hover">
        <thead class=''>
            <td class='' scope='row'>CLASS NAME</td>
            <td class='' scope='row'>CLASS TEACHER</td>
            <td class='' scope='row'>Student Count</td>
            <td class='' scope='row'>Edit</td> 
        </thead>
        <tbody> 
    <?php foreach ($results as $row) { ?>
        <tr>
       <td class='sm' ><?= $row['name']  ?></td>
                        <?php 
                        $rowid = $row['uniqid_id'];
                        $selectT = "SELECT * FROM `teacher` WHERE uniqid_id = '$rowid '";
                        if(mysqli_num_rows(mysqli_query($conn, $selectT))){
                        $rowT = mysqli_fetch_array(mysqli_query($conn, $selectT));
                         $dis = $rowT['firstName']. ' '. $rowT['surName'];  ?>
                        <td class='sm' ><?=  $dis;  ?></td> 
                       <?php 
                        $rowid = $row['uniqid_id'];
                        $class = $row['name'];
                        $selectT = "SELECT * FROM `student` WHERE S_id = '$class'";
                        $rowNumber = mysqli_num_rows(mysqli_query($conn, $selectT));
                           ?>   
                        <td class='sm' ><?= $rowNumber ?></td>    
                        <?php }else
                        {
                         ?>
                         <td> NULL</td>
                         <td> NULL</td>
                         <?php 
                        } ?>
                        <td class='sm'>
                            <button  value="<?=$row['id']?>" class="class-edit-101 fa fa-edit btn btn-default btn-sm"></button>
                        </td> 
                        </tr> 
                          
                    <?php  }
    ?>
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
            onclick="showRecordsClass('<?php echo $perPageCount;  ?>', '<?php echo $i; ?>');"><?php echo $i ?></a>
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