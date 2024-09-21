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
$valid_extensions = array("mp4","mkv");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   echo "<div class='alert alert-info alert-sm'> File type is not accept! </div>";
   $uploadOk = 0;
}
if(file_exists("../../../upload/$db/".$id.".mp4"))
{
unlink("../../../upload/$db/".$id.".mp4");

}elseif(file_exists("../../../upload/$db/".$id.".mkv"))
{
unlink("../../../upload/$db/".$id.".mkv");

}
if($_FILES['file']['size'] > 10000000)
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
if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
    $select = "SELECT * FROM `about_us` WHERE type='video'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
      $update = "UPDATE `about_us` SET `content`= '$db' WHERE type='video'";
      if(mysqli_query($conn,$update))
      {
      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";

      ?>
      <script type="text/javascript">$("#home-about-id-form-1")[0].reset()</script>
      <?php 
      }
      
      }else
   {
     $update = "INSERT INTO `about_us`(`content`,`type`) VALUES ('$db','video')";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Content Successfully Created</div>";
         ?>
      <script type="text/javascript">$("#home-about-id-form-1")[0].reset()</script>
      <?php
      
      }
     }   
   }else{
      echo "<div class='alert alert-info alert-sm mt-2'> File Fail to Upload</div>";
   }

}
}else{
   echo "<div class='alert alert-info alert-sm mt-2'> Please Select Image to upload</div>";
}
?>