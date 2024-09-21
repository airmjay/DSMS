<?php 
$db = $_POST['getdb'];
$conn = mysqli_connect('localhost', 'root', '', $db);
function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
$error = [];
if(isset($_POST['location1']))
{

	$student = cleanData($conn, $_POST['student']);
	$student_id = cleanData($conn, $_POST['student_id']);
	$select_text = cleanData($conn, $_POST['school_text']);
	$school_select = cleanData($conn, $_POST['school_select']);
	$reason = cleanData($conn, $_POST['reason']);
	$location = cleanData($conn, $_POST['location1']);
	$email = cleanData($conn, $_POST['email']);
	$select = "SELECT * FROM student WHERE id ='$student_id'";
	$row1 = mysqli_num_rows(mysqli_query($conn,$select));
     if($row1){

     }else
     {
     	    $error[] =  'Wrong student id';
            $error_found = true;
     }
    foreach ($_POST as $key => $value) {    
    // if($key != 'getid' && $key != 'name_school'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
            $error_found = true;
        break;
    }
    }
		$conn = mysqli_connect('localhost', 'root', '', 'school');
       $select = "SHOW TABLES LIKE 'transcript'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
         }else{ 
        	$query = "CREATE table transcript(id int primary key AUTO_INCREMENT, student_name varchar(200), student_studnet_id varchar(100), school_name varchar(100), unique_id varchar(100), email varchar(300), address varchar(300), reason varchar(100),Date_of_join DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";  
        	if(mysqli_query($conn,$query))
        	{
        		echo "<div class='alert alert-info sm alert-sm mt-2'> Sorry this might take little long for the first time.</div>";
        	}   
     	}
    if(count($error) === 0)
    {
    $student = cleanData($conn, $_POST['student']);
	$student_id = cleanData($conn, $_POST['student_id']);
	$select_text = cleanData($conn, $_POST['school_text']);
	$school_select = cleanData($conn, $_POST['school_select']);
	$reason = cleanData($conn, $_POST['reason']);
	$location = cleanData($conn, $_POST['location1']);
	$email = cleanData($conn, $_POST['email']);

    	$insert = "INSERT INTO `transcript`(`student_name`, `student_studnet_id`, `school_name`, `unique_id`, `email`, `address`, `reason`) VALUES ('$student','$student_id','$select_text','$school_select','$email','$location','$reason')";
    	if(mysqli_query($conn,$insert))
    	{
    		echo "<div class='alert alert-info sm alert-sm mt-2'> Transcript have been sent</div>
    		<script> $('#Transcript_form')[0].reset()</script>
    		";
    	}
    }
 
}
if(isset($_POST['email2']))
{
		$email = cleanData($conn, $_POST['email']);
        
        $email2 = cleanData($conn, $_POST['email2']);

?>
        	<div class="table-responsive mt-2">
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>School Email</td>
            <td class='sm' scope='row'>Student ID</td>
            <td class='sm' scope='row'>Reason</td>
            <td class='sm' scope='row'>Email</td>
            <td class='sm' scope='row'>Date</td>
            <td class='sm' scope='row'>Action</td>

        </thead>
        <tbody>
            <tr>
            <?php 
      $conn = mysqli_connect('localhost','root','', 'school');
       $select = "SHOW TABLES LIKE 'transcript'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1){
            $select = "SELECT * FROM transcript WHERE student_name = '$email' AND email = '$email2'";
            $fetch = mysqli_query($conn,$select);
            if(mysqli_num_rows($fetch)){
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='email-form-transcript sm tab'><?= ucfirst($row['student_name'])?></th>
                <td class='id-form-transcript sm'><?= ucfirst($row['student_studnet_id'])?></td>
                <td class='sm'><?= ucfirst($row['reason'])?></td>
                <td class='sm email-to-transcript'><?= ucfirst($row['email'])?></td>
                <td class='sm'><?= ucfirst($row['Date_of_join'])?></td>
                <td class='sm' scope='row'>
                <button class='accept-transcript-form btn btn-success btn-sm sm'>Accept</button>
                <button class='reject-transcript-form btn btn-danger btn-sm sm'>Reject</button>

                </td>

            </tr>
           <?php } }else
           {
           	echo "No Transcript Found";
           } }else{ 
            echo "No Transcript Found";
           }?>
            
        </tbody>
    </table>
    </div>  
         <?php	
} 
if(isset($_POST['email_form']))
{
    $conn = mysqli_connect('localhost', 'root', '', 'school');
    $email_form = cleanData($conn, $_POST['email_to']);
    $email_to = cleanData($conn, $_POST['email_form']);
    $student_id = cleanData($conn, $_POST['student_id']);
    $select = "SELECT * FROM dswp WHERE email ='$email_form'";
    $row1 = mysqli_num_rows(mysqli_query($conn,$select));
     if($row1){
        $row = mysqli_fetch_array(mysqli_query($conn,$select));
        $school_name_form = $row['unique_id'];
        $conn = mysqli_connect('localhost', 'root', '', $school_name_form);
        $select = "SELECT * FROM student WHERE id ='$student_id'";
        $row1 = mysqli_num_rows(mysqli_query($conn,$select));
        if($row1)
        {
        $row = mysqli_fetch_array(mysqli_query($conn,$select));
        $first = $row['firstName'];
        $surname = $row['surName'];
        $middle = $row['middleName'];
        $class = $row['class_id'];
        $post = $row['post'];
        $unique = $row['uniqid_id'];
        $email = $row['email'];
        $address = $row['address'];
        $S_id = $row['S_id'];
        $password = $row['password']; 
        $date = $row['date_of_birth']; 
        $conn = mysqli_connect('localhost', 'root', '', 'school'); 
        $select = "SELECT * FROM dswp WHERE email ='$email_to'";
        $row = mysqli_fetch_array(mysqli_query($conn,$select));
        $school_name_to = $row['unique_id'];
        $conn = mysqli_connect('localhost', 'root', '', $school_name_form);
        $select = "SELECT * FROM student WHERE id ='$student_id'";
        $row1 = mysqli_num_rows(mysqli_query($conn,$select));
        if($row1)
        { 
        $conn = mysqli_connect('localhost', 'root', '', $school_name_to);
         $update =  "INSERT INTO `student`(`firstName`, `surName`, `middleName`, `class_id`, `post`, `uniqid_id`, `email`, `address`, `S_id`,`password`, `date_of_birth`) VALUES ('$first','$surname','$middle','$class','$post','$unique','$email','$address','$S_id','$password','$date')";
         if(mysqli_query($conn, $update))
         {
            $conn = mysqli_connect('localhost', 'root', '', $school_name_form);
            $DELETE = "DELETE FROM `student` WHERE id = '$student_id'";
            $DELETE1 = "DELETE FROM `transcript` WHERE student_studnet_id = '$student_id' AND student_name 
            = '$email_form'";
            if(mysqli_query($conn,$DELETE))
            {
               $conn = mysqli_connect('localhost', 'root', '', 'school');
                mysqli_query($conn, $DELETE1);
              ?>
              <script type="text/javascript"> $('#transcript-identity-form-reset')[0].reset()</script>
              <?php  
            }
            echo "DATA HAVE BEEN TRANSPORTED";
         }else
         {
            echo "DATA HAVE BEEN NOT TRANSPORTED ERROR";

         }

        }else
        {
        $error[] = 'Error in Transcript Send 1';
        $error_found = true;  
        }
        }else
        {
        $error[] = 'Error in Transcript Send';
        $error_found = true;       
        }

    }else
    {
        $error[] = 'Error in Transcript Send';
        $error_found = true;
    }

}
if (isset($error_found)) {
    echo "<div class='alert alert-info sm alert-sm mt-2'>".$error[0]."</div>" ;
}


?>