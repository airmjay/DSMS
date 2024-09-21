<?php
    $conn= mysqli_connect('localhost', 'root', '', $random);
    $sql = "SELECT * FROM calender as c inner join calender_status as cs on c.term ='First term' AND cs.status = 2";
    $fetch= mysqli_query($conn, $sql);
    if(mysqli_num_rows($fetch) > 0){
     $sql = "SELECT * FROM calender WHERE term ='First term'";
     $fetch= mysqli_query($conn, $sql);
 ?>
 <div class="d-flex justify-content-between">
    <b>Calender</b> <i class="sm text-danger">report error if any in calender</i>
</div>
<div class='table table-reponsive sm card container w-calender p-3' id='print-div-calender'>
    <h1>(logo) Mountain School 2024</h1>
    <i class="under text-uppercase center sm">ACADEMIC CALENDER</i>
    <div><b class="under text-uppercase center sm mt-0"> First Term</b></div>
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
    <button class="btn-primary btn-sm btn sm d-print-none" id="print-calender">Print Calender</button>
</div>
<?php }else{  ?>
 
<div class="d-flex justify-content-between">
    <b>Calender</b> <button class="sm btn btn-success adjust-calender">Adjust Calender</button>
</div>
<div class='table table-reponsive sm card container w-calender p-3'>
	<h1>(logo) Mountain School 2024</h1>
	<i class="under text-uppercase center sm">ACADEMIC CALENDER</i>
	<div><b class="under text-uppercase center sm mt-0"> First Semester</b></div>
    <table class="table table-sm table-striped table-hover mb-0 bg-light text-black">
        <thead class='sm'>
            <td class='sm'>#</td>
            <td class='sm'>ACTIVITIES</td>
        </thead>
        <tbody>
            <tr>
                <td class='sm'>Manager </td>
                <td class='sm'>Completed 1</td>
            </tr>
            <tr>
                <td class='sm'>Secretary </td>
                <td class='sm'>Completed 1: Time: 12:11am</td>
            </tr>
        </tbody>
    </table>
    <b class="text-decoration-dark under sm">SUMMARY</b>
    <ul class="sm">
    	<li class="sm"> 2 weeks for registration </li>
    	<li class="sm"> 15 weeks for lectures </li>
    	<li class="sm"> 2 weeks for Test </li>
    	<li class="sm"> 4 weeks for Examination </li>
    	<li class="sm"> 24 weeks in Totals </li>

    </ul>
    <hr class="mb-3">
    <b class="under text-uppercase center sm">Second Semester</b>
    <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm'>#</td>
            <td class='sm'>ACTIVITIES</td>
        </thead>
        <tbody>
            <tr>
                <td class='sm'>Manager </td>
                <td class='sm'>Completed 1</td>
            </tr>
            <tr>
                <td class='sm'>Secretary </td>
                <td class='sm'>Completed 1: Time: 12:11am</td>
            </tr>
        </tbody>
    </table>
    <b class="text-decoration-dark under sm">SUMMARY</b>
    <ul class="sm">
    	<li class="sm"> 2 weeks for registration </li>
    	<li class="sm"> 15 weeks for lectures </li>
    	<li class="sm"> 2 weeks for Test </li>
    	<li class="sm"> 4 weeks for Examination </li>
    	<li class="sm"> 24 weeks in Totals </li>

    </ul>
    <hr class="mb-3">
    <button class="btn-primary btn-sm btn sm">Print Calender</button>
</div>
<?php } ?>