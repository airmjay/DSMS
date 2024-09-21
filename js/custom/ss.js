$.post('config/admin_edit.php', {update_staff:update_staff}, function(data)
    {
       $('.message-div-display').html(data);

    }
    ); 
$idEdit = $_POST['idEdit'];
$select = "SELECT * FROM staff WHERE staffId = '$idEdit'";
$row1 = mysqli_query($conn1,$select);
$row = mysqli_fetch_array($row1);
<?php if($row['picture'] === ''){?>
    <img id="img" class="main-image0111" src="image/images.jpg" width="100%" height="100%">
    <?php }else
    {?>
    <img id="img" class="main-image0111" src="upload/<?= $row['picture']?>" width="100%" height="100%"> 
   <?php }?>