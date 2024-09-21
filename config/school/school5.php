<style type="text/css">
.print-div-style
{
    width: 100px;
    height: 100px;
}
.Display-upload-result
{
    max-height: 200px;
    overflow-y: scroll;
}
</style>

<?php 
$getdb = $_POST['getdb'];
$conn = mysqli_connect('localhost','root','', $getdb);
$error = [];

function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
if(isset($_POST['T_name']))
{
	$t = cleanData($conn, $_POST['T_name']);
	$c = cleanData($conn, $_POST['className']);
    if(preg_match('/^[a-zA-Z0-9\s]+$/', $c))
   {
   }else
   {
      $error[] = 'Special character not accept and empty input in class'.PHP_EOL;
      $error_found = true;

   }
	foreach ($_POST as $key => $value) {   
    if ($key != 'T_name') { 
    if(empty($_POST[$key]))
    {

            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    if(count($error) === 0)
    {
    	$insert = "INSERT INTO `class`(`name`,`uniqid_id`) VALUES ('$c','$t')";
        if(mysqli_query($conn,$insert))
        {
            echo "<div class='alert alert-success sm alert-sm mt-2'>New Class have been added <script>$('#Table-class-add-id')[0].reset()</script></div>";   
        }
    }
}
if(isset($_POST['T_name1']))
{
    $t = cleanData($conn, $_POST['T_name1']);
    $c = cleanData($conn, $_POST['className1']);
    $id = cleanData($conn, $_POST['id']);
     if(preg_match('/^[a-zA-Z0-9\s]+$/', $c))
   {
   }else
   {
      $error[] = 'Special character not accept and empty input in class'.PHP_EOL;
      $error_found = true;

   }
    foreach ($_POST as $key => $value) {   
    if ($key != 'T_name1' && $key != 'id') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found1 = true;
        break;
    }
    }
    }
    if(count($error) === 0)
    {
        $insert = "UPDATE `class` SET `name`='$c',`uniqid_id`='$t' WHERE id = '$id' ";
        if(mysqli_query($conn,$insert))
        {
            echo "Class have been Updated";   
        }
    }
}
if(isset($_POST['classedit']))
{
$id = $_POST['classedit'];
 $select = "SELECT * FROM `class` WHERE id ='$id'";
 $row1 = mysqli_query($conn, $select);
 $rowClass = mysqli_fetch_array($row1);
                        
    ?>

    <div class="class-info-div">
            <div class="row">
                <div class="col-lg-6 col-lx-6 col-12">
                    <label>Class Name</label>
                    <input type="text" value="<?= $rowClass['name']?>" class="form-control form-control-sm className-class1" placeholder='Enter Class Name' name="">
                </div>
                <div class="col-lg-6 col-lx-6 col-12">
                    <label>Class Teacher</label>
                    <select class="form-control form-control-sm teacherName-class1">
                        <?php 
                        $conn = mysqli_connect('localhost','root','',$getdb);
                        $select = "SELECT * FROM `teacher`";
                        $row1 = mysqli_query($conn, $select);
                        if(mysqli_num_rows($row1)){
                        while ($row = mysqli_fetch_array($row1)) {
                        ?>
                        <option value="<?=$row['uniqid_id']?>"><?= $row['firstName'] .' '. $row['surName'] .' '. $row['id']  ?></option>    
                    <?php  }}else{ 
                        echo "<option>No Teacher</option>";    

                        }?>


                    </select>
                </div>
                <div class="col-lg-6 col-lx-6 col-12 mt-2">
                    
                    <button type="button"  value="<?= $rowClass['id']?>" class='btn btn-primary btn-sm sm submitName-class1' placeholder='Enter Class Name' name="">Update Class</button>
                    <button type="button"  value="<?= $rowClass['id']?>" class='btn btn-danger btn-sm sm del-token-print-2' placeholder='Enter Class Name' name="">Delete</button>
                </div>
                </form>
            </div>
            <div class="mt-2 message-SAWES alert-info alert alert-sm">Status: message</div>
        </div>
    <?php
}

if(isset($_POST['update_profile_staff']))
{   $first = cleanData($conn, $_POST['first']);
    $last = cleanData($conn, $_POST['last']);
    $email = cleanData($conn, $_POST['email']);
    $state = cleanData($conn, $_POST['state']);
    $phone = cleanData($conn, $_POST['phone']);
    $password = cleanData($conn, $_POST['password']);
    $id = cleanData($conn, $_POST['update_profile_staff']);
    $select = "SELECT * FROM staff WHERE id = '$id'";
    $StaffId = mysqli_query($conn, $select);
    $singleId =  mysqli_fetch_assoc($StaffId);
    $password = cleanData($conn, $_POST['password']);
    $unique_email = $singleId['email'];
    foreach ($_POST as $key => $value) {
    if ($key != 'email' && $key != 'password' && $key != 'getdb' && $key != 'update_profile_staff') {

        if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $_POST[$key]))
        {

        $error[] =  'Special character except in password field';
        $error_found = true;
        break;  
         
        }
    }
    }
    foreach ($_POST as $key => $value) {   
    if ($key != 'password') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    } else {
    $error[] =  "Email is not valid";
            $error_found = true;

    }
    
    $select = "SELECT  `email` FROM staff WHERE id = '$id'";
    $CheckStaff = mysqli_query($conn, $select);
    $emailCheckStaff =  mysqli_fetch_assoc($CheckStaff);
    if($emailCheckStaff['email'] === $unique_email){
    
    }else
    {
    if($emailCheckStaff)
    {
        if($emailCheckStaff['email'] === $email)
        {
            $error[] = "Email already exist";
            $error_found = true;

        }
    }
    }
    

    if(count($error) === 0)
    {
    $id = cleanData($conn, $_POST['update_profile_staff']);
    $update ="UPDATE `staff` SET `firstname`='$first',`lastname`='$last',`phone`='$phone',`state`= '$state',`email`='$email' WHERE `id`='$id'";
    if(mysqli_query($conn,$update))
    {
    
    echo "<div class='alert alert-success alert-sm mt-2 p-1'> Staff data have been Successfully Updated </div>";
    if(!empty($password))
    {
    $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
      $update ="UPDATE `staff` SET `password`='$password' WHERE `unique_id`='$id'";
    if(mysqli_query($conn,$update))
    {
     echo "<div class='alert alert-success alert-sm mt-2 p-1'> along with user Password</div>";   
    }
    }

}
}
}
if(isset($_POST['resoursesKing']))
{
    $create = "CREATE TABLE resources(id int primary key AUTO_INCREMENT, class_name varchar(100), tutor varchar(100) ,name varchar(100),course varchar(300), Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
    if(mysqli_query($conn,$create))
    {
        echo "resourse is on run now you can start uploading";
    }
}
if(isset($_POST['value_resources']))
{ 
    $id = $_POST['value_resources'];
    $select = "SELECT * FROM resources WHERE id = '$id'";
    $fetch = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($fetch);
    ?>
<div class="col-lg-10 col-md-10 col-12 mt-2 mb-5">
     <label>Book Name</label>
     <input class="sm p-3 form-control-sm form-control resources-up-update-1" value="<?= $row['course']?>">
     <label>Course Tutor</label>
        <select class="form-control-sm form-control Teacher-resourse-real-1">
            <?php 
                        $select = "SELECT * FROM `teacher`";
                        $row1 = mysqli_query($conn, $select);
                        if(mysqli_num_rows($row1)){
                        while ($row = mysqli_fetch_array($row1)) {
                        ?>
                        <option value="<?= $row['firstName'] .' '. $row['surName'] .' '. $row['id']  ?>"><?= $row['firstName'] .' '. $row['surName'] .' '. $row['id']  ?></option>    
                    <?php  }}else{ 
                        echo "<option>No Teacher</option>";    

           }?>
        </select>
        <label>Select Class</label>
        <select class="form-control-sm form-control Class-resourse-real-1">
        <?php
                        $select = "SELECT * FROM `class`";
                        $row1 = mysqli_query($conn, $select);
                        if(mysqli_num_rows($row1)){
                        while ($row = mysqli_fetch_array($row1)) {
                        ?>
                        <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>    
                    <?php  }}else{ 
                        echo "<option>No Class/option>";    

                        }?>
        </select>
        <button class="update-resourse-10101 btn btn-success btn-sm sm mt-2" value="<?= $id ?>"> UPDATE BOOK</button>
    </div>
    </div>

    <?php
}
if(isset($_POST['value_resources_update']))
{
    $id = cleanData($conn, $_POST['value_resources_update']);
    $name = cleanData($conn, $_POST['name']);  
    $teacher = cleanData($conn, $_POST['teacher']);
    $classy = cleanData($conn, $_POST['classy']);
    foreach ($_POST as $key => $value) {   
    // if ($key != 'password' && $key != 'other' && $key != 'status') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    // }
    if(count($error) === 0)
    {
        $update = "UPDATE `resources` SET `class_name`='$classy',`tutor`='$teacher',`course`='$name' WHERE id = '$id'";
        if(mysqli_query($conn,$update))
        {
            echo "<div class='alert alert-success alert-sm mt-2'>Book have been update</div>";
        }
    }
}
if(isset($_POST['create_question']))
{
 $create = "CREATE TABLE question(id int primary key AUTO_INCREMENT, section varchar(100), picture varchar(100) , unique_id  varchar(100),question1 varchar(300), question2 varchar(300), question3 varchar(300) ,question4 varchar(300) , tutor varchar(300) , class varchar(100) ,token varchar(300) , Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
    if(mysqli_query($conn,$create))
    {
        echo "question is on run now you can start uploading";
    }   
}

if(isset($_POST['idprint']))
{
    $id = $_POST['idprint'];
    $num = 1;
    ?>
<div class="card shadow p-5 mt-2">
    <label><b>Section A</b></label>
   <?php 
   $date = new DateTime();
     $time =  $date->format('m/d/20y');
   $select = "SELECT DISTINCT * FROM question WHERE token='$id' GROUP BY token";
    $row1 = mysqli_query($conn, $select);
    if(mysqli_num_rows($row1)){
    while ($row = mysqli_fetch_array($row1)){
    echo "<div class='bg-dark text-white p-2'>".$row['class']. "</div>";
    echo "<div>Time: 2Hour.</div>";
    echo "<div class='mb-2'>Date: $time.</div> <hr>";
    }
    }
    ?>
   <?php 
   $select = "SHOW TABLES LIKE 'question'";
    $row12 = mysqli_num_rows(mysqli_query($conn,$select));
     if($row12){
        $select = "SELECT * FROM question WHERE token='$id' AND section='section_a'";
         $row1 = mysqli_query($conn, $select);
        if(mysqli_num_rows($row1)){
        while ($row = mysqli_fetch_array($row1)){
        if($row['picture'] === NULL)
        {

        }else
        {
         ?>
         <div class="print-div-style">
             <img width='100%' height='100%' src="upload/<?= $getdb ?>/question/<?= $row['picture']?>">
         </div>
         <?php             
        }
     ?> <?php echo $num++.') '.$row['unique_id']; ?>
        <?php echo "<div class='ml-4'> (a) ". $row['question1'] . "</div>"; ?>  
        <?php echo "<div class='ml-4'> (b) ". $row['question2'] . "</div>"; ?>  
        <?php echo "<div class='ml-4'> (c) ". $row['question3'] . "</div>"; ?>  
        <?php echo "<div class='ml-4'> (d) ". $row['question4'] . "</div>"; ?>  
    <?php
}
}
?>
<label class="d-block mt-2"><b>Section B</b></label>
    <?php 
   $select = "SHOW TABLES LIKE 'question'";
    $row12 = mysqli_num_rows(mysqli_query($conn,$select));
     if($row12){
        $select = "SELECT * FROM question WHERE token='$id' AND section='section_b'";
         $row1 = mysqli_query($conn, $select);
        if(mysqli_num_rows($row1)){
        while ($row = mysqli_fetch_array($row1)){
        if($row['picture'] === NULL)
        {

        }else
        {
         ?>
         <div class="print-div-style">
             <img width='100%' height='100%' src="upload/<?= $getdb ?>/question/<?= $row['picture']?>">
         </div>
         <?php             
        }
     ?> <?php echo $num++.') '.$row['unique_id']."<br>"; ?>
        
    <?php
}
echo "</div>";
}
}
}
}
if(isset($_POST['idStudent']))
{
    $id = cleanData($conn, $_POST['idStudent']);
    $term = cleanData($conn, $_POST['result']);
    $subject = cleanData($conn, $_POST['subject']);
    (int) $Tscore = cleanData($conn, $_POST['Tscore']);
    (int) $Escore = cleanData($conn, $_POST['Escore']);
    // $comment = cleanData($conn, $_POST['comment']);
    foreach ($_POST as $key => $value) {   
    // if ($key != 'password' && $key != 'other' && $key != 'status') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    if(count($error) === 0){
     $Total = $Escore + $Tscore;
    $select = "SELECT * FROM student WHERE id = '$id'";
    if(mysqli_num_rows(mysqli_query($conn,$select)))
    {
        $row = mysqli_fetch_array(mysqli_query($conn, $select));
        $algorithm_search = $row['id']."/".$row['S_id']."/".$term;
        $insert = "INSERT INTO `result`(`Subject_name`, `grade`, `test`, `exam`, `student_id`, `msg`,`parent_id`) VALUES ('$subject','$Total','$Tscore','$Escore','$id','$algorithm_search','$term')";
        if(mysqli_query($conn,$insert))
        {
            echo "<div class='alert alert-sucess alert-sm mt-2'>$subject Uploaded</div>";
            ?>
            <script type="text/javascript">
                $data = "<tr class=''>";
                $data += "<td><?= $subject?> </td>";
                $data += "<td><?= $Tscore?></td>";
                $data += "<td><?= $Escore?></td>";
                $data += "<td><?= $term ?></td>";
                $data += "</tr>"
                $('.Exam_uploaded_div').append($data);
                $('#form_upload_subject_result')[0].reset();
            </script>

            <?php
        }
    }else
    {
        echo "<div class='alert alert-danger alert-sm mt-2'>No Student with the following id</div>";
    }
    }
}
if(isset($_POST['search_result']))
{
    $msg = cleanData($conn, $_POST['search_result']);
    if(!empty($msg)){
    $select = "SELECT * FROM result WHERE msg = '$msg'";
    if(mysqli_num_rows(mysqli_query($conn,$select)))
    {
        $query = mysqli_query($conn, $select);
        if($query)
        {
            echo "<div class='alert alert-success alert-sm mt-2'>information Found!</div>";
        }
        while($row = mysqli_fetch_array($query)){
            $subject = $row['Subject_name'];
            $test = $row['test'];
            $exam = $row['exam'];
            $term = $row['parent_id'];
            $id = $row['id'];

            ?>
            <script type="text/javascript">
        $data = "<tr class=''>";
        $data += "<td><input type='text' class='form-control php-edit-script-subject<?= $id ?> form-control-sm sm' value='<?= $subject ?>'> </td>";
        $data += "<td><input type='number' class='form-control php-edit-script-test<?= $id ?> form-control-sm sm' value='<?= $test ?>'></td>";
        $data += "<td><input type='number' class='form-control php-edit-script-exam<?= $id ?> form-control-sm sm' value='<?= $exam ?>'></td>";
        $data += "<td><input type='number' class='form-control php-edit-script-term<?= $id ?> form-control-sm sm' value='<?= $term ?>' > </td>";
        $data += "<td><button class='btn btn-success btn-sm sm php-edit-script' value='<?= $id ?>'>Update</button></td>";
        $data += "</tr>"
        $('#form_upload_subject_result-1').append($data);
            </script>

            <?php
        }
        
        ?>
        <script> 
            $('#form_upload_subject_result-1').append("<button class='d-print-none print_id_result mt-2'> Print</button>"); </script>
        <?php 
    }else
    {
        echo "<div class='alert alert-danger alert-sm mt-2'>
        No Student result with the following information </div>";
    }
}else
{
  echo "<div class='alert alert-danger alert-sm mt-2'>Search Field is required! </div>";    
}
}
if(isset($_POST['idX']))
{
    $term = cleanData($conn, $_POST['term']);
    $subject = cleanData($conn, $_POST['subject']);
    $exam = cleanData($conn, $_POST['exam']);
    $test = cleanData($conn, $_POST['test']);
    $id = cleanData($conn, $_POST['idX']);

    foreach ($_POST as $key => $value) {   
    // if ($key != 'password' && $key != 'other' && $key != 'status') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    if(count($error) === 0)
    {
    $total = $exam + $test;
     $update = "UPDATE `result` SET `Subject_name`='$subject',`grade`='$total',`test`='$test',`exam`='$exam',`parent_id`='$term' WHERE id = '$id'";
     if(mysqli_query($conn, $update))
     {
        echo "<div class='alert alert-success sm alert-sm mt-2'>Grade Updated!</div>";
     }
    }   
}   
if(isset($_POST['update_profile_staff_1']))
{   $first = cleanData($conn, $_POST['first']);
    $last = cleanData($conn, $_POST['last']);
    $email = cleanData($conn, $_POST['email']);
    $state = cleanData($conn, $_POST['state']);
    $phone = cleanData($conn, $_POST['phone']);
    $password = cleanData($conn, $_POST['password']);
    $id = cleanData($conn, $_POST['update_profile_staff_1']);
    $select = "SELECT * FROM teacher WHERE id = '$id'";
    $StaffId = mysqli_query($conn, $select);
    $singleId =  mysqli_fetch_assoc($StaffId);
    $password = cleanData($conn, $_POST['password']);
    $unique_email = $singleId['email'];
    if(preg_match('/^[a-zA-Z\s]+$/', $first))
   {
   }else{
      $error[] = 'Special character and number not allow and empty field in first name field'.PHP_EOL;
      $error_found1 = true;
   }
   if(preg_match('/^$|^[a-zA-Z\s]+$/', $last))
   {
   }else{
        // echo "Special character and number not allow in other name field or empty field";
      $error[] = 'Special character and number not allow and empty field in other name field'.PHP_EOL;
      $error_found1 = true;

   }
   if(preg_match('/^[a-zA-Z0-9\s.]+$/', $state))
   {
   }else
   {
      $error[] = 'Address is invalid'.PHP_EOL;
      $error_found1 = true;

   }
    foreach ($_POST as $key => $value) {
    if ($key != 'email' && $key != 'password' && $key != 'getdb' && $key != 'update_profile_staff_1') {

        if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $_POST[$key]))
        {

        $error[] =  'Special character except in password field';
        $error_found = true;
        break;  
         
        }
    }
    }
    if(preg_match('/^(090|070|081|091)\d{8}$/', $phone))
   {
   }else{
      $error[] = 'phone number format not accepted'.PHP_EOL;
      $error_found = true;
   }
    foreach ($_POST as $key => $value) {   
    if ($key != 'password') { 
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
    } else {
    $error[] =  "Email is not valid";
            $error_found = true;

    }
    if(isset($_POST['phone']))
    {
        $select = "SELECT *  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$getdb' 
        AND TABLE_NAME = 'teacher' AND COLUMN_NAME = 'phone'";
        if(mysqli_num_rows(mysqli_query($conn, $select)) > 0){
        
        }else
        {
        $select = "ALTER TABLE `teacher` ADD `phone` varchar(100) NOT NULL AFTER `email`";
        mysqli_query($conn, $select);
        }
        
    }
    $select = "SELECT  `email` FROM teacher WHERE id = '$id'";
    $CheckStaff = mysqli_query($conn, $select);
    $emailCheckStaff =  mysqli_fetch_assoc($CheckStaff);
    if($emailCheckStaff['email'] === $unique_email){
    
    }else
    {
    if($emailCheckStaff)
    {
        if($emailCheckStaff['email'] === $email)
        {
            $error[] = "Email already exist";
            $error_found = true;

        }
    }
    }
    
    $id = cleanData($conn, $_POST['update_profile_staff_1']);
    if(count($error) === 0)
    {
    $update ="UPDATE `teacher` SET `phone`='$phone',`firstName`='$first',`surName`='$last',`address`= '$state',`email`='$email' WHERE `id`='$id'";
    if(mysqli_query($conn,$update))
    {
    
    echo "<div class='alert alert-success alert-sm mt-2 p-1'> Staff data have been Successfully Updated </div>";
    if(!empty($password))
    {
    $password = password_hash(cleanData($conn, $_POST['password']), PASSWORD_DEFAULT);
      $update ="UPDATE `staff` SET `password`='$password' WHERE `unique_id`='$id'";
    if(mysqli_query($conn,$update))
    {
     echo "<div class='alert alert-success alert-sm mt-2 p-1'> along with user Password</div>";   
    }
    }

}
}
}
if (isset($error_found)) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>".$error[0]."</div>" ;
}
if (isset($error_found1)) {
    echo $error[0];
}
















?>