<?php 
$conn = mysqli_connect('localhost','root','');
$conn1 = mysqli_connect('localhost','root','', 'school');
function cleanData($conn, $data)
{
$clean = mysqli_real_escape_string($conn,trim(htmlspecialchars($data)));
return $clean;
}
function checkspecial($string)
{
	if(preg_match('/[\'£$%&*()}{@#~?><>,|=+¬-]/', $string))
	{
		$error[] = 'special character not allow';
	}else
	{
		$error[] = 'special';

	}
}

		