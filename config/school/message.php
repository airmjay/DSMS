<script type="text/javascript">
	function sweat(data) {
	swal(data)
    .then((value) => {
      
    });
	}
    </script>

<?php
$getdb = $_POST['getdb'];
$conn = mysqli_connect('localhost','root','', $getdb);
$error = [];
function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}

if(isset($_POST['search']))
{
	$id = cleanData($conn, $_POST['unique']);
	$search = cleanData($conn, $_POST['search']);
	$end1 = strpos($_POST['search'], '=');
	$firstStr = substr($search, 0, $end1);
	if($firstStr === 'staff'){
	$end = $end1+1;
	$second = substr($search, $end);
	$select = "SELECT * FROM staff WHERE id = '$second'";
	if(mysqli_num_rows(mysqli_query($conn, $select)))
	{
		$select = "SELECT * FROM chat_list WHERE list_me_id ='$id' AND list_our_id = '$second' 
		AND status = 1";
		if(mysqli_num_rows(mysqli_query($conn, $select)))
		{

		}else
		{
			?>
			<div class="table-responsive mt-2">
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>Staff</td>
            <td class='sm' scope='row'>Email</td>
            <td class='sm' scope='row'>Action</td>
             
        </thead>
        <tbody>
            <tr>
            <?php 
            $select = "SELECT * FROM staff WHERE id = '$second'";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='sm tab'><?= ucfirst($row['firstname'])." ".ucfirst($row['lastname']) ?></th>
                <td class='sm'><?= ucfirst($row['email'])?></td>
                <td class='sm'><button value="<?= $row['id'] ?>" class='chat-add-staff btn btn-sm btn-primary sm'>ADD STAFF</button></td>
            </tr>
           
         <?php  }?>
            
        </tbody>
    </table>
			<?php
		}
	}else
	{
		echo "<script type='text/javascript'>
		sweat('wrong entry')
		</script>";
	}
	}elseif($firstStr === 'teacher'){
	$end = $end1+1;
	$second = substr($search, $end);
	$select = "SELECT * FROM teacher WHERE id = '$second'";
	if(mysqli_num_rows(mysqli_query($conn, $select)))
	{
		$select = "SELECT * FROM chat_list WHERE list_me_id ='$id' AND list_our_id = '$second' 
		AND status = 2";
		if(mysqli_num_rows(mysqli_query($conn, $select)))
		{

		}else
		{
			?>
			<div class="table-responsive mt-2">
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>Teacher Name</td>
            <td class='sm' scope='row'>Email</td>
            <td class='sm' scope='row'>Action</td>
             
        </thead>
        <tbody>
            <tr>
            <?php 
            $select = "SELECT * FROM teacher WHERE id = '$second'";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='sm tab'><?= ucfirst($row['firstName'])." ".ucfirst($row['surName']) ?></th>
                <td class='sm'><?= ucfirst($row['email'])?></td>
                <td class='sm'><button value="<?= $row['id'] ?>" class='chat-add-teacher btn btn-sm btn-primary sm'>ADD STAFF</button></td>
            </tr>
           
         <?php  }?>
            
        </tbody>
    </table>
			<?php
		}
	}else
	{
		echo "<script type='text/javascript'>
		sweat('wrong entry')
		</script>";
	}
	}elseif($firstStr === 'parent'){
	$end = $end1+1;
	$second = substr($search, $end);
	$select = "SELECT * FROM parent WHERE id = '$second'";
	if(mysqli_num_rows(mysqli_query($conn, $select)))
	{
		$select = "SELECT * FROM chat_list WHERE list_me_id ='$id' AND list_our_id = '$second' 
		AND status = 3";
		if(mysqli_num_rows(mysqli_query($conn, $select)))
		{

		}else
		{
			?>
			<div class="table-responsive mt-2">
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>parent</td>
            <td class='sm' scope='row'>Email</td>
            <td class='sm' scope='row'>Action</td>
             
        </thead>
        <tbody>
            <tr>
            <?php 
            $select = "SELECT * FROM parent WHERE id = '$second'";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='sm tab'><?= ucfirst($row['firstName'])." ".ucfirst($row['surName']) ?></th>
                <td class='sm'><?= ucfirst($row['email'])?></td>
                <td class='sm'><button value="<?= $row['id'] ?>" class='chat-add-parent btn btn-sm btn-primary sm'>ADD STAFF</button></td>
            </tr>
           
         <?php  }?>
            
        </tbody>
    </table>
			<?php
		}
	}else
	{
		echo "<script type='text/javascript'>
		sweat('wrong entry')
		</script>";
	}
	}elseif($firstStr === 'student'){
	$end = $end1+1;
	$second = substr($search, $end);
	$select = "SELECT * FROM student WHERE id = '$second'";
	if(mysqli_num_rows(mysqli_query($conn, $select)))
	{
		$select = "SELECT * FROM chat_list WHERE list_me_id ='$id' AND list_our_id = '$second' 
		AND status = 4";
		if(mysqli_num_rows(mysqli_query($conn, $select)))
		{

		}else
		{
			?>
			<div class="table-responsive mt-2">
      <table class="table table-sm table-striped table-hover">
        <thead class='sm'>
            <td class='sm' scope='row'>Student</td>
            <td class='sm' scope='row'>Gender</td>
            <td class='sm' scope='row'>Action</td>
             
        </thead>
        <tbody>
            <tr>
            <?php 
            $select = "SELECT * FROM student WHERE id = '$second'";
            $fetch = mysqli_query($conn,$select);
            while($row = mysqli_fetch_array($fetch)){
         ?>
                <th class='sm tab'><?= ucfirst($row['firstName'])." ".ucfirst($row['surName']) ?></th>
                <td class='sm'><?= ucfirst($row['email'])?></td>
                <td class='sm'><button value="<?= $row['id'] ?>" class='chat-add-student btn btn-sm btn-primary sm'>ADD STAFF</button></td>
            </tr>
           
         <?php  }?>
            
        </tbody>
    </table>
			<?php
		}
	}else
	{
		echo "<script type='text/javascript'>
		sweat('wrong entry')
		</script>";
	}

	}else{
		 ?>
     <script type="text/javascript">sweat("The Search Work by specifying the staff,teacher,student or parent e.g parent=id is to restricted only school matter thank you!!!!");
    </script>
    <?php
	
	}

	foreach ($_POST as $key => $value) {    
    // if($key != 'other' && $key != 'email'){
    if(empty($_POST[$key]))
    {
            $error[] =  'All input field is required';
     ?>
     <script type="text/javascript">swal("Search Field is required")
    .then((value) => {
      
    });
    </script>
    <?php
    }
    }
    // }
    if(count($error) === 0)
    {

    }

}
if(isset($_POST['add_list1']))
{
	$id = cleanData($conn, $_POST['unique']);
	$search = cleanData($conn, $_POST['search']);
	$end1 = strpos($_POST['search'], '=');
	$firstStr = substr($search, 0, $end1);
	$end = $end1+1;
	$second = substr($search, $end);
	$id = $_POST['unique'];
	$insert= "INSERT INTO `chat_list`(`list_me_id`, `list_our_id`, `status`) VALUES ('$id',
		'$second',1)";
	if(mysqli_query($conn,$insert))
	{
		echo "<script>sweat('New User Add')</script>";
	}
}
if(isset($_POST['add_list2']))
{
	$id = cleanData($conn, $_POST['unique']);
	$search = cleanData($conn, $_POST['search']);
	$end1 = strpos($_POST['search'], '=');
	$firstStr = substr($search, 0, $end1);
	$end = $end1+1;
	$second = substr($search, $end);
	$id = $_POST['unique'];
	$insert= "INSERT INTO `chat_list`(`list_me_id`, `list_our_id`, `status`) VALUES ('$id',
		'$second',2)";
	if(mysqli_query($conn,$insert))
	{
		echo "<script>sweat('New User Add')</script>";
	}
}
if(isset($_POST['add_list3']))
{
	$id = cleanData($conn, $_POST['unique']);
	$search = cleanData($conn, $_POST['search']);
	$end1 = strpos($_POST['search'], '=');
	$firstStr = substr($search, 0, $end1);
	$end = $end1+1;
	$second = substr($search, $end);
	$id = $_POST['unique'];
	$insert= "INSERT INTO `chat_list`(`list_me_id`, `list_our_id`, `status`) VALUES ('$id',
		'$second',3)";
	if(mysqli_query($conn,$insert))
	{
		echo "<script>sweat('New User Add')</script>";
	}
}
if(isset($_POST['add_list4']))
{
	$id = cleanData($conn, $_POST['unique']);
	$search = cleanData($conn, $_POST['search']);
	$end1 = strpos($_POST['search'], '=');
	$firstStr = substr($search, 0, $end1);
	$end = $end1+1;
	$second = substr($search, $end);
	$id = $_POST['unique'];
	$insert= "INSERT INTO `chat_list`(`list_me_id`, `list_our_id`, `status`) VALUES ('$id',
		'$second',4)";
	if(mysqli_query($conn,$insert))
	{
		echo "<script>sweat('New User Add')</script>";
	}
}
if(isset($_POST['messageDb']))
{
	$add[] = "CREATE table chat_list(id int primary key AUTO_INCREMENT,list_me_id varchar(100), list_our_id varchar(100), Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
		$add[] = "CREATE table message_status(id int primary key AUTO_INCREMENT, unique_id varchar(100), sender_name varchar(300), reciever_name varchar(100), sender_id varchar(100), reciever_id varchar(100),Date_of_send DATETIME DEFAULT CURRENT_TIMESTAMP,status smallInt DEFAULT 0)";
		$str = implode(';', array_map(fn($m)=>"$m", $add));
		$okay = [];
		foreach($add as $add)
		{

			if(mysqli_query($conn, $add))
			{
			   echo "WEB CHAT HAVE BEEN SETUP";
			}
		}
}
if(isset($_POST['type']))
{
	$id = $_POST['id'];
	$unique = $_POST['unique'];
	$receive = $_POST['receive'];
	$select = "SELECT m.sender, m.reciever , m.message , m.uniqid_id , m.status , s.unique_id , s.Date_of_send FROM `messagebox` AS M INNER JOIN message_status as s ON m.uniqid_id = s.unique_id AND m.sender = '$unique' AND m.reciever = '$receive' AND m.status = 1 OR m.reciever = '$unique' AND sender = '$receive' AND   m.status = 1  ";
	if(mysqli_num_rows(mysqli_query($conn, $select)))
	{	$fetch = mysqli_query($conn, $select);
		while($row = mysqli_fetch_array($fetch))
		{
		if($row['sender'] === $unique){
		?>

		<div class="messages bg-primary text-white mt-2 p-2">
                <i class='sm text-light'>Sender</i>
                <div>
                	<?= $row['message'] ?>
                </div>
                <i class='sm'><?= $row['Date_of_send']?></i>
            </div>
		<?php
		}else
		{
			?>
			<div class="messages bg-primary text-white mt-2 p-2">
                <i class='sm text-light'>Receiver</i>
                <div>
                	<?= $row['message'] ?>
                </div>
                <i class='sm'><?= $row['Date_of_send']?></i>
            </div>
			<?php
		}
		}
	}else
	{
		echo "<div class='alert alert-success mt-2'>Send your first message!</div>";
	}
}
// messageContent:messageContent,status:status,unique:unique,receive:receives

if(isset($_POST['messageContent']))
{
	$message = cleanData($conn, $_POST['messageContent']);
	$status = cleanData($conn, $_POST['status']);
	$sender = cleanData($conn, $_POST['unique']);
	$receive = cleanData($conn, $_POST['receive']);
	$rand =  rand()."id".rand();
	$insert = "INSERT INTO `messagebox`(`sender`, `reciever`, `message`, `uniqid_id`, `status`) VALUES ('$sender','$receive','$message','$rand',1)";
	if(mysqli_query($conn, $insert))
	{
		$insert = "INSERT INTO `message_status`(`unique_id`) VALUES ('$rand')";
		if(mysqli_query($conn,$insert))
		{
			echo "<script> sweat('message sent');</script>";
		}
	}


}
if (isset($error_found)) {
    echo $error[0];
}
?>
<!-- <script type="text/javascript">
	sweat(data)
</script> -->
<script type="text/javascript">
	function sweat(data) {
	swal(data)
    .then((value) => {
      location = '/auth'
    });
	}
    </script>
