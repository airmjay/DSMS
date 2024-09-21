<?php 
$getdb = $_POST['getdb'];
$conn = mysqli_connect('localhost','root','', $getdb);
$error = [];
function cleanData($conn, $data)
{
    $clean = mysqli_real_escape_string($conn,htmlspecialchars($data));
    return $clean;
}
if(isset($_POST['setting']))
{
		$add[] = "CREATE table image_div(id int primary key AUTO_INCREMENT, image_div1 varchar(100), image_div2 varchar(100), image_div3 varchar(100),Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
		$add[] = "CREATE table learning_div(id int primary key AUTO_INCREMENT, content1 varchar(200) ,content2 varchar(200) ,content3 varchar(200) ,Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP,status smallInt DEFAULT 0)";
		$add[] = "CREATE table about_us(id int primary key AUTO_INCREMENT, content varchar(200), type varchar(100), Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)"; 
		$add[] = "CREATE table course(id int primary key AUTO_INCREMENT, content varchar(200), Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)";
		$add[] = "CREATE table feature(id int primary key AUTO_INCREMENT,content varchar(200),Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP, status smallInt DEFAULT 0)"; 
		$add[] = "CREATE table teacher_comment(id int primary key AUTO_INCREMENT, comment varchar(200) ,
			teacher_id varchar(100),Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP ,status smallInt DEFAULT 0)";
		$add[] = "CREATE table blog(id int(10) primary key AUTO_INCREMENT, image varchar(100), caption varchar(200), number_comment varchar(200), content varchar(200),Date_of_add DATETIME DEFAULT CURRENT_TIMESTAMP,  status smallInt DEFAULT 0)";
		$conn = mysqli_connect('localhost','root','', $getdb);
		$str = implode(';', array_map(fn($m)=>"$m", $add));
		$okay = [];
		foreach($add as $add)
		{

			if(mysqli_query($conn, $add))
			{
			   $okay[] = $add;	
			}
		}
		if(count($okay) > 0){
					echo "everything is now setup".PHP_EOL;
				?>
				<script>window.location = '/auth'</script>
				?>		 
			<?php
			}else
			{
				echo "some setup unable to run try again later Thank you".PHP_EOL;
			}
}



?>