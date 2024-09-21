<?php
$db = $_POST['getdb'];
$conn = mysqli_connect('localhost', 'root', '', $db);
function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
$error = [];
if(isset($_POST['name_school']))
{
    $conn = mysqli_connect('localhost', 'root', '', 'school');
    $id = $_POST['getdb'];
    $name = cleanData($conn, $_POST['name_text']);
    $newName = cleanData($conn, $_POST['getid']);

    foreach ($_POST as $key => $value) {    
    if($key != 'getid' && $key != 'name_school'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    if(count($error) === 0)
    {
        $update = "UPDATE `dswp` SET `school_name`='$name' WHERE unique_id ='$id'";
        if(mysqli_query($conn,$update))
        {
            echo "<div class='mt-2 alert-success alert alert-sm'>School Name Updated</div>";
      ?>
      <script type="text/javascript">$("#school_name_form")[0].reset()</script>
      <?php 
        }else
        {
            echo "<div class='mt-2 alert-danger alert-sm mt-2 alert'> Error in School changing school Name</div>";
        }

    }

}
if(isset($_POST['val'])){
$id = cleanData($conn, $_POST['val']);
$text = cleanData($conn, $_POST['text']);
foreach ($_POST as $key => $value) {    
    // if($key != 'other' && $key != 'email'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
        break;
    }
    }
    // }
$form = '#home-feature-1-upload-form'.$id;
    if(count($error) === 0)
    {
    	$select = "SELECT * FROM `feature`";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
      $update = "SELECT * FROM `feature` WHERE status = '$id'";
      if(mysqli_num_rows(mysqli_query($conn,$update)))
      {
      $update = "UPDATE `feature` SET `content`= '$text' WHERE status = '$id'";
      if(mysqli_query($conn,$update)){

      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";
 	 	}
      ?>
      <script type="text/javascript">$("<?=$form ?>")[0].reset()</script>
      <?php
      }else
      {
      	$update = "INSERT INTO `feature`(`content`,`status`) VALUES ('$text','$id')";
      	if(mysqli_query($conn,$update))
      	{
      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";
      ?>
      <script type="text/javascript">$("<?=$form ?>")[0].reset()</script>
      <?php
      	}
      }
  	}else
  	{
  	  $update = "INSERT INTO `feature`(`content`,`status`) VALUES ('$text','$id')";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Content Successfully Created</div>";
         ?>
      <script type="text/javascript">$("<?= $form ?>")[0].reset()</script>
      <?php
      
      }
  	}
    }

}
if(isset($_POST['text_about']))
{
	$type = 'text';
	$content = cleanData($conn,$_POST['content']);
	foreach ($_POST as $key => $value) {    
    // if($key != 'other' && $key != 'email'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
        break;
    }
    }
    // }
    if(count($error) === 0)
    {
      $select = "SELECT * FROM `about_us` WHERE type ='text'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
      $update = "UPDATE `about_us` SET `content`= '$content' WHERE type ='text'";
      if(mysqli_query($conn,$update))
      {
      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";

      ?>
      <script type="text/javascript">$("#home-about-id-form")[0].reset()</script>
      <?php	
      }
      
      }else
  	{
  	  $update = "INSERT INTO `about_us`(`content`,`type`) VALUES ('$content','$type')";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Content Successfully Created</div>";
         ?>
      <script type="text/javascript">$("#home-about-id-form")[0].reset()</script>
      <?php
      
      }
     }	
}
}
if(isset($_POST['make']))
{
	$content = cleanData($conn, $_POST['content']);
	foreach ($_POST as $key => $value) {    
    if($key != 'make' && $key != 'getdb'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    if(count($error) === 0)
    {
    $update = "INSERT INTO `course`(`content`) VALUES ('$content')";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Subject Successfully Created</div>";
         ?>
      <script type="text/javascript">$("#form-course-reset")[0].reset()</script>
      <?php
      
      }	
    }
}
if(isset($_POST['delete1']))
{
	$val = cleanData($conn, $_POST['value']);
	foreach ($_POST as $key => $value) {    
    if($key != 'delete1' && $key != 'getdb'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    if(count($error)  === 0)
    {
    	$select = "SELECT * FROM course WHERE `content` = '$val'";
    	if(mysqli_num_rows(mysqli_query($conn,$select))){
    	$update = "DELETE FROM `course` WHERE `content` = '$val'";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Subject Deleted Successfully</div>";
         ?>
      <script type="text/javascript">$("#delete-course-reg-1")[0].reset()</script>
      <?php
      
      }else
      {
     echo "<div class='alert alert-info alert-sm mt-2'>Error in Subject Deleting or Subject not exist</div>";

      }	
    }else
    {
    echo "<div class='alert alert-info alert-sm mt-2'>Error in Subject Deleting or Subject not exist</div>";	
    }
}
}
if(isset($_POST['val1']))
{
    $id = cleanData($conn, $_POST['T']);
    $text = cleanData($conn, $_POST['text1']);
    $val = cleanData($conn, $_POST['val1']);
    foreach ($_POST as $key => $value) {    
    if($key != 'val1' && $key != 'getdb'){
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    $form = '#Quote-form'.$val;
    if(count($error) === 0)
    {
        $select = "SELECT * FROM `teacher_comment`";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
      $update = "SELECT * FROM `teacher_comment` WHERE status = '$val'";
      if(mysqli_num_rows(mysqli_query($conn,$update)))
      {
      $update = "UPDATE `teacher_comment` SET `comment`='$text',`teacher_id`='$id' 
      WHERE status = '$val'";
      if(mysqli_query($conn,$update)){

      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";
        }
      ?>
      <script type="text/javascript">$("<?=$form ?>")[0].reset()</script>
      <?php
      }else
      {
        $update = "INSERT INTO `teacher_comment`(`comment`,`teacher_id`,`status`) VALUES ('$text','$id','$val')";
        if(mysqli_query($conn,$update))
        {
      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";
      ?>
      <script type="text/javascript">$("<?=$form ?>")[0].reset()</script>
      <?php
        }
      }
    }else
    {
      $update = "INSERT INTO `teacher_comment`(`comment`,`teacher_id`,`status`) VALUES ('$text','$id','$val')";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Content Successfully Created</div>";
         ?>
      <script type="text/javascript">$("<?= $form ?>")[0].reset()</script>
      <?php
      
      }
    }
    }

}

if(isset($_POST['idget']))
{
    $blog1 = cleanData($conn, $_POST['blog1']);
    $blog2 = cleanData($conn, $_POST['blog2']);
    $blog3 = cleanData($conn, $_POST['blog3']);
    $blog4 = cleanData($conn, $_POST['blog4']);
    $val = cleanData($conn, $_POST['idget']);
    foreach ($_POST as $key => $value) {    
    if($key != 'val1' && $key != 'getdb'){
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    $form = '#Home-post-id-content-'.$val;
    if(count($error) === 0)
    {
        $select = "SELECT * FROM `blog`";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
      $update = "SELECT * FROM `blog` WHERE status = '$val'";
      if(mysqli_num_rows(mysqli_query($conn,$update)))
      {
      $update = "UPDATE `blog` SET `image`='$blog1',`caption`='$blog2',`number_comment`='$blog3',`content`='$blog4' WHERE status = '$val'";
      if(mysqli_query($conn,$update)){

      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";
        }
      ?>
      <script type="text/javascript">$("<?=$form ?>")[0].reset()</script>
      <?php
      }else
      {
        $update = "INSERT INTO `blog`(`image`, `caption`, `number_comment`, `content`,`status`) VALUES ('$blog1','$blog2','$blog3','$blog4','$val')";
        if(mysqli_query($conn,$update))
        {
      echo "<div class='alert alert-info alert-sm mt-2'>Content Successfully Updated </div>";
      ?>
      <script type="text/javascript">$("<?=$form ?>")[0].reset()</script>
      <?php
        }
      }
    }else
    {
      $update = "INSERT INTO `blog`(`image`, `caption`, `number_comment`, `content`,`status`) VALUES ('$blog1','$blog2','$blog3','$blog4','$val')";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Content Successfully Created</div>";
         ?>
      <script type="text/javascript">$("<?= $form ?>")[0].reset()</script>
      <?php
      
      }
    }
    }    
}
if(isset($_POST['authenID']))
{
    $status = $_POST['status'];
    $id = $_POST['authenID'];
  foreach ($_POST as $key => $value) {    
    if($key != 'authenticate' && $key != 'getdb'){
    if(empty($_POST[$key]))
    {
            $error[] = $key .'All input field is required';
            $error_found = true;
        break;
    }
    }
    }
    if(count($error) === 0){
     $select = "SELECT * FROM `staff` WHERE unique_id = '$id'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
    $update = "UPDATE `staff` SET `status`='$status' WHERE unique_id = '$id'";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Content Successfully Created</div>";
         ?>
      <script type="text/javascript">$("#reset-form-status-code")[0].reset()</script>
      <?php
      
      }else
      {
        echo "<div class='alert alert-info alert-sm mt-2'>Some error occur</div>";
      }
  }else
  {
    echo "<div class='alert alert-info alert-sm mt-2'>Invalid ID</div>";
  }
}
}
if(isset($_POST['staff_del']))
{
    $id = cleanData($conn, $_POST['staff_del']);
    foreach ($_POST as $key => $value) {    
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    if(count($error) === 0){
     $select = "SELECT * FROM `staff` WHERE unique_id = '$id'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
    $update = "DELETE FROM `staff` WHERE unique_id = '$id'";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Staff Have been Deleted</div>";
         ?>
      <script type="text/javascript">$("#form-del-staff-reset")[0].reset()</script>
      <?php
      
      }else
      {
        echo "<div class='alert alert-info alert-sm mt-2'>Some error occur</div>";
      }
  }else
  {
    echo "<div class='alert alert-info alert-sm mt-2'>Invalid ID</div>";
  }
}   
}
if(isset($_POST['teacher_del']))
{
    $id = cleanData($conn, $_POST['teacher_del']);
    foreach ($_POST as $key => $value) {    
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    if(count($error) === 0){
     $select = "SELECT * FROM `teacher` WHERE uniqid_id = '$id'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
    $update = "DELETE FROM `teacher` WHERE uniqid_id = '$id'";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Teacher Have been Deleted</div>";
         ?>
      <script type="text/javascript">$("#form-del-teacher-reset")[0].reset()</script>
      <?php
      
      }else
      {
        echo "<div class='alert alert-info alert-sm mt-2'>Some error occur</div>";
      }
  }else
  {
    echo "<div class='alert alert-info alert-sm mt-2'>Invalid ID</div>";
  }
}   
}
if(isset($_POST['parent_del']))
{
    $id = cleanData($conn, $_POST['parent_del']);
    foreach ($_POST as $key => $value) {    
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    if(count($error) === 0){
     $select = "SELECT * FROM `parent` WHERE id = '$id'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
    $update = "DELETE FROM `parent` WHERE id = '$id'";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Parent Have been Deleted</div>";
         ?>
      <script type="text/javascript">$("#form-del-parent-reset")[0].reset()</script>
      <?php
      
      }else
      {
        echo "<div class='alert alert-info alert-sm mt-2'>Some error occur</div>";
      }
  }else
  {
    echo "<div class='alert alert-info alert-sm mt-2'>Invalid ID</div>";
  }
}   
}
if(isset($_POST['student_del']))
{
    $id = cleanData($conn, $_POST['student_del']);
    foreach ($_POST as $key => $value) {    
    if(empty($_POST[$key]))
    {
            $error[] = 'All input field is required';
            $error_found = true;
        break;
    }
    }
    if(count($error) === 0){
     $select = "SELECT * FROM `student` WHERE id = '$id'";
      if(mysqli_num_rows(mysqli_query($conn,$select))){
    $update = "DELETE FROM `student` WHERE id = '$id'";
      if(mysqli_query($conn,$update))
      {
     echo "<div class='alert alert-info alert-sm mt-2'> Student Have been Deleted</div>";
         ?>
      <script type="text/javascript">$("#form-del-student-reset")[0].reset()</script>
      <?php
      
      }else
      {
        echo "<div class='alert alert-info alert-sm mt-2'>Some error occur</div>";
      }
  }else
  {
    echo "<div class='alert alert-info alert-sm mt-2'>Invalid ID</div>";
  }
}   
}
if(isset($_POST['payemnt_api']))
{
$value = cleanData($conn, $_POST['api_payment']);
    $content = $_POST['api_payment'];
    $content = "$content";
    $fp = fopen("../../../upload/$db/payment.php", "w");
    if(file_exists("../../../upload/$db/payment.php"))
   {
    fwrite($fp, $content);
    fclose($fp);
   }else
   {
    $fp = fopen("../../../upload/$db/payment.php", "wb");
    fwrite($fp, $content);
    fclose($fp);
   }
$select = "SHOW TABLES LIKE 'payment_api'";
$row1 = mysqli_num_rows(mysqli_query($conn,$select));
if($row1){
}else
{
    $update = "CREATE table payment_api(id int primary key AUTO_INCREMENT, Api varchar(300), Date_of_join DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
    mysqli_query($conn, $update);
    $insert = "INSERT INTO payment_api(`api`)VALUES ('example')";
    mysqli_query($conn, $insert);

}
$update = "UPDATE payment_api SET api = '$value'";
if(mysqli_query($conn,$update))
{
    echo "Payment Api Have been Updated";
}
}
if(isset($_POST['chat_api']))
{
    $value = cleanData($conn, $_POST['api_chat']);

    $content = $_POST['api_chat'];
    $fp = fopen("../../../upload/$db/chat.php", "w");
   if(file_exists("../../../upload/$db/chat.php"))
   {
    fwrite($fp, $content);
    fclose($fp);
   }else
   {
    $fp = fopen("../../../upload/$db/chat.php", "wb");
    fwrite($fp, $content);
    fclose($fp);
   }
    $select = "SHOW TABLES LIKE 'chat_api'";
$row1 = mysqli_num_rows(mysqli_query($conn,$select));
if($row1){

}else
{
    $update = "CREATE table chat_api(id int primary key AUTO_INCREMENT, Api varchar(300), Date_of_join DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
    mysqli_query($conn, $update);
    $insert = "INSERT INTO chat_api(`api`)VALUES ('example')";
    mysqli_query($conn, $insert);

}
$update = "UPDATE chat_api SET api = '$value'";
if(mysqli_query($conn,$update))
{
    echo "Chat Api Have been Updated";
}

}
if (isset($error_found)) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>".$error[0]."</div>" ;
}




?>