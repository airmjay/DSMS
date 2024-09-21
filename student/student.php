<b> Profile </b>
<div class="card p-2 shadow">
<div class="row">
    <?php
    $conn = mysqli_connect('localhost','root','', $random);
    $select = "SELECT * FROM student WHERE id = '$fetchId'";
    $row = mysqli_fetch_array(mysqli_query($conn,$select)); 
    ?>
    <div class="col-lg-3 col-xl-3 col-md-4 col-12">
        <div class="d-flex flex-column justify-items-center align-items-center border-dark">
            <span class="d-block mt-1 sm">Date of Join: <?= $row['Date_of_join'] ?></span>
            <span class="d-block mt-1 sm">Name: <?= $row['firstName']. " ". $row['surName']. " ". 
    $row['middleName']; ?></span>

            <span class="d-block mt-1 sm">Address: <?= $row['address'] ?></span>
            <span class="d-block mt-1 sm">Phone: NA</span>
            <span class="d-block mt-1 sm">GENDER: <?= $row['email'] ?></span>
        
        <div class="picture-div mt-2">
             <?php if($row['picture'] === NULL){?>
    <img  class="main-image" alt="student" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img  class="main-image" src="upload/<?= $random ?>/<?= $row['picture']?>" width="100%" height="100%">
<?php }?>

        </div>
         </div>
    </div>
    <div class="col-lg-9 col-xl-9 col-md-8 col-12">
        <div class="bold">
            Update Information
        </div>
    <div class="card shadow mt-2 p-3 border-dark">
        <form>
            <label>first name</label>
            <input type="text" name="" value="<?= $row['firstName'] ?>" placeholder="enter your first name" class="outline-none form-control form-control-sm" readonly>
            <label>Surname</label>
            <input type="text" name="" value="<?= $row['surName'] ?>" placeholder="enter your last name" class="form-control form-control-sm" readonly>
            <label>Other name</label>
            <input type="text" name="" value="<?= $row['middleName'] ?>" placeholder="enter your last name" class="form-control form-control-sm" readonly>
            <label>GENDER</label>
            <input type="text" name="" value="<?= $row['email'] ?>"  placeholder="enter your Location" class="form-control form-control-sm" readonly>
            <label>Your Address</label>
            <input type="text" name="" value="<?= $row['address'] ?>" placeholder="enter your Address" class="form-control form-control-sm" readonly>
            <label> Your ID</label>
            <input type="text" name="" value="<?= $row['id'] ?>" placeholder="enter your Email" class="form-control form-control-sm" readonly>
            
        </form>
    </div>
    </div>
    
    
</div>
</div>