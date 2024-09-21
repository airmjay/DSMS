<?php
/* Getting file name */
$id = $_POST['id'];
$db = $_POST['db'];
$conn = mysqli_connect('localhost', 'root', '', $db);
if(isset($_FILES['file']['name'])){
$filename = $_FILES['file']['name'];

/* Location */
if(is_dir("../../upload/".$db))
{
   
}else
{
   mkdir("../../upload/".$db);
}
$location = "upload/".$db.$_FILES['file']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   echo "File type is not accept!";
   $uploadOk = 0;
}
if(file_exists("../../upload/$db/".$id.".jpg"))
{
unlink("../../upload/$db/".$id.".jpg");

}elseif(file_exists("../../upload/$db/".$id.".jpeg"))
{
unlink("../../upload/$db/".$id.".jpeg");

}elseif(file_exists("../../upload/$db/".$id.".png"))
{
unlink("../../upload/$db/".$id.".png");
}
if($_FILES['file']['size'] > 100000)
{
   echo "File size is too large!";
   $uploadOk = 0;
}
if($uploadOk == 0){
   echo "File Fail to Upload";

}else{
   /* Upload file */
$location = "../../upload/$db/".$id.".".$imageFileType;
$db = $id.".".$imageFileType;
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo "Image Successfully Updated";
      $update = "UPDATE `parent` SET `picture`='$db' WHERE uniqid_id = '$id'";
      if(mysqli_query($conn,$update))
      {

      }

   }else{
      echo "File Fail to Upload";
   }
}
}else
{
   echo "Please Select File to upload";
}
?>