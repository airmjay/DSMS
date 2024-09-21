   <?php 
    $select = "SELECT * FROM `staff` WHERE staffId = '$id'";
    $row1 = mysqli_query($conn1, $select);
    $row = mysqli_fetch_array($row1) 
    ?>
<h1> <b>PROFILE</b></h1>
<div class="card card-profile-color-top p-2">
<div class='row '>
<div class="col-lg-4 col-sm-12 col-xs-12 card-profile-color-body">
<!-- div col -->
<div class="card-profile-begin">
   <!-- card begin -->
   <div class='card shadow border-muted'>
   <div  class="card-img-top picture-div ml-2">
    <?php if($row['picture'] === ''){?>
    <img  class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img class="main-image0111" src="upload/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>
   </div>
   <!-- card body -->
   <div class="card-body p-0">
   <div class="card-text p-0">
    <hr class='p-0 bg-dark'>
    <div class='card-details p-2 text-muted'>
        <span class='text-success h1'>Work</span>
        <div>POST: <?=$row['staff_post'] ?> </div>
        <!-- <div>DEPARTMENT: </div> -->
        <div>DATE 0F JOIN: <?= $row['dateOfJoin'] ?> </div>

    </div>
    <hr class='p-0 bg-dark'>
    <div class='card-details p-2 text-muted'>
        <span class='text-primary h1'>Personal Datails</span>
        <div>Date of birth: <?= $row['dateOfBirth'] ?> </div>
        <div>Username: <?= $row['staff_username'] ?> </div>
        <div>Status: <?= $row['status'] ?> </div>
        
    </div>
   </div>
   <!-- end of card title -->
   </div>
   <!-- card body end  -->
   </div>
   <!-- card end -->
   </div>

</div>
<div class="col-lg-8 col-sm-12 col-xs-12">
<div class='row'>
<div class="col-12  mb-2"> 
<div class="card p-4 sm side-design">
    <span class='h1 d-block'><b class='mr-2'><?= $row['staff_name'] ?></b> 
    <span class="side-design"><i class="fa fa-location-arrow text-danger ml-3"></i> Kaduna.</span>
    </span>
    <i class='text-success'>
    <span class='h1 side-design d-block'> <?= $row['staff_post']?></span>
    <span class='h1 d-block side-design'>Staff_id: <?= $row['staffId'] ?></span>
    <span class='h1 d-block side-design'>Username: <?= $row['staff_username'] ?></span>
    <span class='h1 d-block side-design'>Rating: 3/10</span>

    </i>
</div>
</div>
<div class="col-lg-12 col-sm-12 col-xs-12"> 
<div class="card">
<span class='pl-2 pt-2'><i class="fa fa-user"></i> <b>About</b></span>
<hr class='p-0'>
<i class='text-dark p-2'>
    <span class='h1 side-design d-block text-muted'> <b>CONTACT INFORMATION -------------------</b></span>
    <span class='h1 d-block side-design'>PHONE: 0912323723.</span>
    <span class='h1 d-block side-design'>Address: <?= $row['staff_location'] ?> </span>
    <span class='h1 d-block side-design'>Email: <?= $row['staff_email'] ?></span>
    <span class='h1 side-design d-block text-muted'><b> BASIC INFORMATION ---------------------</b></span>
    <span class='h1 d-block side-design'>Gender: Male</span>
    <span class='h1 d-block side-design'>Birthday: <?= $row['dateOfBirth'] ?>.</span>
    </i>
</div>
</div>
</div>
</div>
</div>
</div>