<?php 
$error = [];
require('conn.php');
if(isset($_POST['adminID']))
{
   $admin = $_POST['adminID'];
}
if(isset($_POST['PageAddPost']))
{
	$Dir = cleanData($conn,$_POST['PageDirPost']);
	$Name = cleanData($conn,$_POST['pageNamePost']);
	$_POST['PageAddPost'] =  'awesome';
	if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $Dir))
	{
		$error[] = 'Special character not allow in school name'.PHP_EOL;
	}
	if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $Name))
	{
		$error[] = 'Special character not allow in school name'.PHP_EOL;
	}
	$select = "SELECT  `Array_key` FROM pages WHERE Array_key = '$Name'";
	$check = mysqli_query($conn1, $select);
	$emailCheck =  mysqli_fetch_assoc($check);
	if($emailCheck)
	{   if($emailCheck['Array_key'] === '')
		{
			$error[] = "Page Name Not Allow to be blank, ";

		}else if($emailCheck['Array_key'] === $Name)
		{
			$error[] = "Page Name already exists, ";
		}
	}
	foreach ($_POST as $key => $value) {
		
		if(empty($_POST[$key]))
		{
			echo  $value;
			$error[] = 'All input field is required, '.PHP_EOL;
			break;
		}
	}

	if(count($error) === 0){

		$post = "INSERT INTO `pages`(`Array_key`, `Array_value`) VALUES ('$Dir','$Name')";
		$post1 =  mysqli_query($conn1,$post);
		if($post1)
		{
			echo "Page Successfully Added";
			$date = new DateTime();
			$rand =  $date->format('mdygia');
			$rand = rand().$rand."activitiespageadd".$Name;
			$smart = "INSERT INTO `smart picker`(`smart_id`, `activities`) VALUES
					 ('$rand','New Page $Name have just be added by $admin')";
					 mysqli_query($conn1,$smart);
		}else
		{
			echo "Page fail to be added";
		}
	
	}	
	foreach($error as $error)
	{
		echo $error;
	}
}

?>