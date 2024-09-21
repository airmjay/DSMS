<?php
require('conn.php');
/* Getting file name */
$id = $_POST['id'];
$admin = $_POST['admin'];
if(isset($_FILES['file']['name'])){
$filename = $_FILES['file']['name'];

/* Location */

$location = "upload/".$_FILES['file']['name'];
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   echo "<div class='alert-sm alert-danger alert sm mt-2'>File type is not accept!</div>";
   $uploadOk = 0;
}
if(file_exists("../upload/".$id.".jpg"))
{
unlink("../upload/".$id.".jpg");

}elseif(file_exists("../upload/".$id.".jpeg"))
{
unlink("../upload/".$id.".jpeg");

}elseif(file_exists("../upload/".$id.".png"))
{
unlink("../".$id.".png");
}
if($_FILES['file']['size'] > 50000)
{
   echo "<div class='alert-sm alert-danger alert sm mt-2'>File size is too large!</div>";
   $uploadOk = 0;
}
if($uploadOk == 0){
   echo "<div class='alert-sm alert-danger alert sm mt-2'>File Fail to Upload</div>";

}else{
   /* Upload file */
$location = "../upload_school/".$id.".".$imageFileType;
$db = $id.".".$imageFileType;
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo "<div class='alert alert-success alert-sm sm mt-2'>Image Successfully Updated</div>";
      $update = "UPDATE `dswp` SET `picture`='$db' WHERE unique_id = '$id'";
      if(mysqli_query($conn1,$update))
      {

            $date = new DateTime();
            $rand =  $date->format('mdygia');
            $rand = rand().$rand."activitiesUpateSchool";
         $smart = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES
                ('$rand','school profile image edited by $admin with id $id:')";
                mysqli_query($conn1,$smart);
                ?> 
                <script>
                   $(document).click(function()
                   {
                     location.reload(true);
                   })
                </script>

   <?php 
      }

   }else{
      echo "<div class='alert-sm alert-danger alert sm mt-2'>File Fail to Upload</div>";
   }
}
}else
{
   echo "<div class='alert-sm alert-danger alert sm mt-2'>Please Select File to upload</div>";
}