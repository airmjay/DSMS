<?php 
$db = $_POST['db'];
function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
$error = [];
$conn = mysqli_connect('localhost', 'root', '', $db);
$classname = cleanData($conn, $_POST['classname']);
$q1 = cleanData($conn, $_POST['q1']);
$section = cleanData($conn, $_POST['section']);
$email = cleanData($conn, $_POST['email']);
$v1 = cleanData($conn, $_POST['v1']);
$db = cleanData($conn, $_POST['db']);
$uploadOk = 1;
if(empty($v1))
{
            $error[] = 'Token input field is required';
            $error_found = true;
           
}
    foreach ($_POST as $key => $value) {   
    // if ($key != 'T_name') { 
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
            break;
    }
    // }
    }

if(is_dir("../../upload/".$db."/question"))
{
   
}else
{
   mkdir("../../upload/".$db."/question");
}

if(count($error) === 0){
if(!empty($_FILES['file']['name'])){
if ($uploadOk == 0) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>
    Sorry, your file was not uploaded.</div>";
// if everything is ok, try to upload file
}else{
    $target_dir = "upload/".$_FILES['file']['name'];


$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

   $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "<div class='alert alert-info sm alert-sm mt-2'>
        File is an image - " . $check["mime"] . ".</div>";
        $uploadOk = 1;
    } else {
        echo "<div class='alert alert-info sm alert-sm mt-2'>File is not an image.</div>";
        $uploadOk = 0;
    }
    if ($_FILES["file"]["size"] > 5000000) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>
    Sorry, your file is too large.</div>";
    $uploadOk = 0;
}
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "
    <div class='alert alert-info sm alert-sm mt-2'>JPG, JPEG, PNG & GIF files are allowed.</div>";
    $uploadOk = 0;
}
     $date = new DateTime();
     $time =  $date->format('md20y');
     $customname = $time.rand();
    $target_file = "../../upload/$db/question/".$customname.".".$imageFileType;
    $imageNamedb = $customname.".".$imageFileType;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "<div class='alert alert-info sm alert-sm mt-2'>
        The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded
         with question</div>";
         $update = "INSERT INTO `question`(`section`, `picture`, `unique_id`,`tutor`, `class`, `token`) VALUES ('$section','$imageNamedb','$q1','$email','$classname','$v1')";
         echo "<script>$('#form_question_2_get_empty')[0].reset();</script>";
      mysqli_query($conn,$update);
      

    } else {
        echo "<div class='alert alert-info sm alert-sm mt-2'>
        Sorry, there was an error uploading your file.</div>";
    }
}
}else {
    $update = "INSERT INTO `question`(`section`,`unique_id`, `tutor`, `class`, `token`) VALUES ('$section','$q1','$email','$classname','$v1')";
         echo "<script>$('#form_question_2_get_empty')[0].reset();</script>";
      if(mysqli_query($conn,$update))
      {
        echo "<div class='alert alert-info sm alert-sm mt-2'>Question has been uploaded</div>";
      }
    }
}



if (isset($error_found)) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>".$error[0]."</div>" ;
}
?>