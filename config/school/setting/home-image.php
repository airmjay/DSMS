<?php
/* Getting file name */
$db = $_POST['db'];
$conn = mysqli_connect('localhost', 'root', '', $db);
$id = $_POST['id'];
if(isset($_FILES['file']['name'])){
$filename = $_FILES['file']['name'];

/* Location */
if(is_dir("../../../upload/".$db))
{
   
}else
{
   mkdir("../../../upload/".$db);
}
$location = "upload/".$db.$_FILES['file']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   echo "<div class='alert alert-info alert-sm'> File type is not accept! </div>";
   $uploadOk = 0;
}
if(file_exists("../../../upload/$db/".$id.".jpg"))
{
unlink("../../../upload/$db/".$id.".jpg");

}elseif(file_exists("../../../upload/$db/".$id.".jpeg"))
{
unlink("../../../upload/$db/".$id.".jpeg");

}elseif(file_exists("../../../upload/$db/".$id.".png"))
{
unlink("../../../upload/$db/".$id.".png");
}
if($_FILES['file']['size'] > 500000)
{
   echo "<div class='alert alert-info alert-sm mt-2'> File size is too large! </div>";
   $uploadOk = 0;
}
if($uploadOk == 0){
   echo "<div class='alert alert-info alert-sm mt-2'> File Fail to Upload </div>";

}else{
   /* Upload file */
$location = "../../../upload/$db/".$id.".".$imageFileType;
$db = $id.".".$imageFileType;
$field = "image_div".$id;
$form = '#form_home_image'.$id;
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      $select = "SELECT * FROM `image_div`";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
      $update = "UPDATE `image_div` SET `$field`= '$db'";
      if(mysqli_query($conn,$update))
      {
      echo "<div class='alert alert-info alert-sm mt-2'> Image Successfully Updated </div>";
      ?>
      <script type="text/javascript">$("<?=$form ?>")[0].reset()</script>
      <?php
      }
  	}else
  	{
  	  $update = "INSERT INTO `image_div`(`$field`) VALUES ('$db')";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Image Successfully Updated</div>";
         ?>
      <script type="text/javascript">$("<?= $form ?>")[0].reset()</script>
      <?php
      
      }
  	}
   }else{
      echo "<div class='alert alert-info alert-sm mt-2'> File Fail to Upload</div>";
   }
}
}else
{
   echo "<div class='alert alert-info alert-sm mt-2'> Please Select Image to upload</div>";
}
?>