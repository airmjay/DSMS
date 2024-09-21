<?php
/* Getting file name */
$db = $_POST['db'];
$conn = mysqli_connect('localhost', 'root', '', 'school');
if(isset($_FILES['file']['name'])){
$filename = $_FILES['file']['name'];

/* Location */
if(is_dir("../../../upload_school/".$db))
{
   
}else
{
   mkdir("../../../upload_school/".$db);
}
$location = "upload_school/".$db.$_FILES['file']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   echo "<div class='alert alert-info alert-sm'> File type is not accept! </div>";
   $uploadOk = 0;
}
if(file_exists("../../../upload_school/".$db.".jpg"))
{
unlink("../../../upload_school/".$db.".jpg");

}elseif(file_exists("../../../upload_school/".$db.".jpeg"))
{
unlink("../../../upload_school/".$db.".jpeg");

}elseif(file_exists("../../../upload_school/".$db.".png"))
{
unlink("../../../upload_school/".$db.".png");
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
$location = "../../../upload_school/".$db.".".$imageFileType;
$name = $db.".".$imageFileType;
if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      $select = "SELECT * FROM `dswp` WHERE unique_id =  '$db'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
      $update = "UPDATE `dswp` SET `picture`= '$name' WHERE unique_id = '$db'";
      if(mysqli_query($conn,$update))
      {
      echo "<div class='alert alert-info alert-sm mt-2'> Image Successfully Updated </div>";
   
      }
  
}
}else
{
   echo "<div class='alert alert-info alert-sm mt-2'>error uploading Image</div>";
}
}}else
{
   echo "<div class='alert alert-info alert-sm mt-2'> Please Select Image to upload</div>";
}
?>