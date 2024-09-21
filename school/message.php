Click on <span class="text-danger"> we are here! </span> below we are always available to respond to you as quick as possible thanks.
<!--Start of Tawk.to Script-->
<?php 
$conn = mysqli_connect('localhost','root','', $random);
$select = "SHOW TABLES LIKE 'chat_api'";
$row1 = mysqli_num_rows(mysqli_query($conn,$select));
if($row1){
	$select =  "SELECT * FROM payment_api";
	$row = mysqli_fetch_array(mysqli_query($conn, $select));
	include("upload/$random/chat.php");
}else
{?>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6686f8f99d7f358570d72963/1i1vjp3ob';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php } ?>