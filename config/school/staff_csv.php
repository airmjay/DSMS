<?php 
$error = [];
$db = $_POST['db'];
$conn = mysqli_connect('localhost', 'root', '', $db);
$uploadOk = 1;
function cleanData($conn, $data)
{
$clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
return $clean;
}
if (!empty($_FILES)) {
    // Database connectio
    // Check if the file is a CSV file
    $file = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    echo $imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
$valid_extensions = array("csv");

/* Check file extension */
        if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
           echo "<div class='mt-2 alert-danger alert-sm p-2'> File type is not accept!</div>";
           $uploadOk = 0;
        }
    if($uploadOk == 1){
        $handle = fopen($file, "r");

    $firstRow = true;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if (!$firstRow) {
            $password = password_hash(cleanData($conn, $data[6]), PASSWORD_DEFAULT);
            $random = $data[0].$data[1].rand();
            $sql = "INSERT INTO staff ( `firstname`, `lastname`, `phone`, `state`, `dateOfBirth`,`post`, `password`,`unique_id`) VALUES ('" . $data[0] . "', '" . $data[1] . "', '" . $data[2] . "', '" . $data[3] . "','" . $data[4] . "','" . $data[5] . "','" . $password . "','" . $random . "')";
            if(mysqli_query($conn, $sql))
            {
           echo "<div class='mt-2 alert-success alert-sm p-2'> File upload into the database!
           <script>$('#form-control-csv-resert-1')[0].reset()</script>
           </div>";

            }
        } else {
            $firstRow = false;
        }
    }
    fclose($handle);

    // Close the database connection
 }   
}else
{
    echo "<div class='mt-2 alert-danger alert-sm p-2s'> File is required </div>";
}
?>