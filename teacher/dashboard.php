<b class='pl-2'>Dashboard</b> 
<section>
<div class='p-2'>
    <?php
    $conn = mysqli_connect('localhost','root','', $random);
    $select = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM student"));
    $select1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM teacher"));
    $select3 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM staff"));
    ?>
    <div class='row'>
        <div  class="col-4 p-2">
            <div class='bg-primary card text-center text-white p-2 pt-4 pb-4 big'>
                Number of Student (<?= $select ?>) 
            </div> 
        </div>
        <div  class="col-4 p-2">
        <div class='bg-success card text-center text-white p-2 pt-4 pb-4 big'>
            Number of Teacher (<?= $select1 ?>)
        </div>

        </div>
        <div  class="col-4 p-2">
        <div class='bg-info card text-center text-white p-2 pt-4 pb-4 big'>
            Number of Staffs (<?= $select3?>)
        </div>
        </div>
    </div>

</div>
</section>
<section>
    <div class="list-event pt-3 pl-2">
        <b class='mb-2'>UPCOMING EVENTS</b>
        <div class="row">
            <div class="col-lg-6 col-xl-6 mt-1 col-md-6 col-12 table-responsive">
                <div class='table table-reponsive sm'>
                <table class="table table-sm table-striped table-hover">
                    <thead class='small'>
                        <td class='small'>#</td>
                        <td class='small'>Name of Event</td>
                        <td class='small'>Date of Event</td>
                        <td class='small'>STATUS</td>
                    </thead>
                    <tbody>
                  <?php 
$conn = mysqli_connect('localhost','root','',$random);
    $select = "SHOW TABLES LIKE 'event'";
     $row1 = mysqli_num_rows(mysqli_query($conn,$select));
     if($row1)
    {
    $select = "SELECT * FROM `event` LIMIT 8";
    $row1 = mysqli_query($conn, $select);
    if(mysqli_num_rows($row1)){
        $i = 1;
    ?>
                        <tr>
     <?php while ($row = mysqli_fetch_array($row1)) {
        ?>
                            <th class='small' scope='row'><?= $i++ ?></th>
                            <td class='small'><?= $row['event_title']?></td>
                            <td class='small'><?= $row['event_title']?> </td>
                            <td class='small'>Active</td>
                        </tr>
    <?php } }}else{
?>

    
<?php echo "<div class='mt-2'>No event added yet</div>"; } ?>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="col-md-6 col-lg-6 col-12 mt-2">
                <div class="card Dashboard-card-2 card-1 p-2 border-secondary">
                <div class='card-title font-weight-900'> <b> TEACHERS </b></div>
                <ul class="list-group">
                <?php $select = "SELECT * FROM `teacher` ORDER BY RAND() LIMIT 8";
                $conn1 = mysqli_connect('localhost','root','',$random);
                  $check = mysqli_query($conn1, $select);
             while($row =  mysqli_fetch_assoc($check)){ ?>
            <li class="sm list-group-item d-flex justify-content-between align-items-center p-2"> 
            <span class='mr-lg-2 mr-0'>
                    <?php if($row['picture'] === null){?>
                        <img  class="main-image0111" src="image/images.jpg" width="100%" height="100%">
                        <?php }else
                        {?>
                        <img class="main-image0111" src="upload/<?= $random?>/<?= $row['picture']?>" width="100%" height="100%"> 
                    <?php }?></span> 
            <div class="sm">
            <?= substr($row['firstName'],0, 30) ?> 
            <?= substr($row['surName'],0, 30) ?> 
            <?= substr($row['middleName'],0, 30) ?> </div> 
            <button class="button-teacher-get-view-2 btn btn-sm btn-primary" value="<?= $row['uniqid_id']?>">view more</button> 
            </li>
            <?php }?>
               
                </ul>       
                </div>
            </div>
            
        </div>
    </div>
</section>