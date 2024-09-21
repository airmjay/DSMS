<?php
    $conn= mysqli_connect('localhost', 'root', '', $random);
     $select = "SHOW TABLES LIKE 'calender'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
    $sql = "SELECT * FROM calender as c inner join calender_status as cs on c.term ='First term' AND cs.status = 2";
    $fetch= mysqli_query($conn, $sql);
     $sql = "SELECT * FROM calender WHERE term ='First term'";
     $fetch= mysqli_query($conn, $sql);


 ?>
 <?php    
            $conn = mysqli_connect('localhost','root','','school');
            $select = "SELECT * FROM dswp WHERE unique_id = '$random'";
            $row1 = mysqli_query($conn,$select);
            $row = mysqli_fetch_array($row1); ?>
 <div class="d-flex justify-content-between">
    <b>Calender</b> <button class="sm btn btn-success adjust-calender">Adjust Calender</button>
</div>
<div class='table-responsive sm card container w-calender p-3' id='print-div-calender'>
    <h1><img height="50px"  width="50px" src="upload_school/<?= $row['picture']?>"></h1>
    <i class="under text-uppercase center sm">ACADEMIC CALENDER</i>
    <div><b class="under text-uppercase center sm mt-0"> First Term</b></div>
    <div class="table-responsive">
    <table class="table table-sm table-striped table-hover mb-0 bg-light text-black">
        <thead class='sm'>
            <td class='sm'>#</td>
            <td class='sm'>ACTIVITIES</td>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($fetch)){ ?>

            <tr>
                <td class='sm'><?= $row['Month'] ?></td>
                <td class='sm'><?= $row['activities'] ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    </div>
    <br>
    <b class="text-decoration-dark under sm">SUMMARY</b>
    <ul class="sm">
    <?php 
    $conn= mysqli_connect('localhost', 'root', '', $random);
    $sql = "SELECT * FROM calender WHERE term = 'First term'";
    $fetch= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($fetch)){ 

    ?>
        <li class="sm"> <?= $row['summary']?> </li>
    <?php }?>
    </ul>
    <hr class="mb-3">
    <?php  
    $conn= mysqli_connect('localhost', 'root', '', $random);
    $sql = "SELECT * FROM calender WHERE term = 'Second term'";
    $fetch= mysqli_query($conn, $sql);
    ?>
    <div class="table-responsive">
    <b class="under text-uppercase center sm">Second Term</b>
    <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm'>#</td>
            <td class='sm'>activities</td>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($fetch)){?>
            <tr>
                <td class='sm'><?= $row['Month'] ?> </td>
                <td class='sm'><?= $row['activities']?></td>
            </tr>
        <?php }?>
            
        </tbody>
        <br>
    </table>
    </div>
    <b class="text-decoration-dark under sm">SUMMARY</b>
    <ul class="sm">
    <?php
    $conn= mysqli_connect('localhost', 'root', '', $random);
    $sql = "SELECT * FROM calender WHERE term = 'Second term'";
    $fetch= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($fetch)){ 

    ?>
        <li class="sm"> <?= $row['summary']?> </li>
    <?php }?>
    </ul>
    <hr class="mb-3">
    <?php 
    $conn= mysqli_connect('localhost', 'root', '', $random);
    $sql = "SELECT * FROM calender WHERE term = 'Third term'";
    $fetch = mysqli_query($conn, $sql);
    ?>
    <b class="under text-uppercase center sm">Third Term</b>
    <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm'>#</td>
            <td class='sm'>ACTIVITIES</td>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($fetch)){?>
            <tr>
                <td class='sm'><?= $row['Month']?> </td>
                <td class='sm'><?= $row['activities']?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <b class="text-decoration-dark under sm">SUMMARY</b>
    <ul class="sm">
     <?php
    $conn= mysqli_connect('localhost', 'root', '', $random);
    $sql = "SELECT * FROM calender WHERE term = 'Third term'";
    $fetch= mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($fetch)){ 

    ?>
        <li class="sm"> <?= $row['summary']?> </li>
    <?php }?>
    </ul>
    <hr class="mb-3">
    <button class="btn-primary btn-sm btn sm" id="print-calender">Print Calender</button>
</div>
<?php }else{  ?>
 
<div class="d-flex justify-content-between">
    <b>Calender</b> <button class="sm btn btn-success adjust-calender">Adjust Calender</button>
</div>
<div class='table table-reponsive sm card container w-calender p-3'>
Calender not set up 
</div>
<?php } ?>