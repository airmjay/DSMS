<?php 
$db = $_POST['db'];
function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
$error = [];
$conn = mysqli_connect('localhost', 'root', '', $db);
if(isset($_FILES['file']['name'])){

$name = cleanData($conn, $_POST['name']);
$classname = cleanData($conn, $_POST['classname']);
$teacher = cleanData($conn, $_POST['teacher']);
$target_dir = "upload/".$_FILES['file']['name'];
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
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

if(is_dir("../../upload/".$db."/resources"))
{
   
}else
{
   mkdir("../../upload/".$db."/resources");
}
// Check if file is a valid document or image
// if(isset($_POST["db"])) {
//     $check = getimagesize($_FILES["file"]["tmp_name"]);
//     if($check !== false) {
//         echo "<div class='alert alert-info sm alert-sm mt-2'>
//         File is an image - " . $check["mime"] . ".</div>";
//         $uploadOk = 1;
//     } else {
//         echo "<div class='alert alert-info sm alert-sm mt-2'>File is not an image.</div>";
//         $uploadOk = 0;
//     }
// }

// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>
    Sorry, your file is too large.</div>";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "
    <div class='alert alert-info sm alert-sm mt-2'>
    Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.</div>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>
    Sorry, your file was not uploaded.</div>";
// if everything is ok, try to upload file
} else {
    if(count($error) === 0){
     $date = new DateTime();
     $time =  $date->format('md20y');
     $customname = $time.rand();
    $target_file = "../../upload/$db/resources/".$customname.".".$imageFileType;
    $imageNamedb = $customname.".".$imageFileType;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "<div class='alert alert-info sm alert-sm mt-2'>
        The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.
        </div>";
         $update = "INSERT INTO `resources`(`class_name`, `tutor`, `name`, `course`
        ) VALUES ('$classname','$teacher','$imageNamedb','$name')";
         echo "<script>$('#form_regis_get_empty')[0].reset();</script>";
      mysqli_query($conn,$update);
      

    } else {
        echo "<div class='alert alert-info sm alert-sm mt-2'>
        Sorry, there was an error uploading your file.</div>";
    }
}else {
        echo "<div class='alert alert-info sm alert-sm mt-2'>
        Sorry, there was an error uploading your file.</div>";
    }
} 
}else
{
        echo "<div class='alert alert-info sm alert-sm mt-2'>
        Sorry, there was an error uploading your file.</div>";
    
}
if (isset($error_found)) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>".$error[0]."</div>" ;
}
?>