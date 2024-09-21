
<h1> <b>PROFILE</b></h1>
<select class="mt-2 form-control-sm form-control mb-2 child-profile-search"> 
<option value="0">Select Child Id</option>
<?php $conn= mysqli_connect('localhost', 'root', '', $random);
    $select = "SELECT * FROM parent WHERE id = '$fetchId'";
    $query = mysqli_query($conn, $select);
    while($row = mysqli_fetch_array($query))
    {
        

    $row = $row['parent_id'];
    $arr = explode(',', $row);
// Convert the array to a comma-separated string
    for($i = 0; $i < count($arr); $i++)
    {
        echo "<option value='$arr[$i]'>".$arr[$i]."</option>";
    }
}
 ?>
<?php
if(empty($email))
    {
        $email = "noemail@gmail.com";
    }
?>
</select>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script type="text/javascript">
 $(document).on('submit', '#paymentForm', function(e){
  e.preventDefault();
const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);


})   
</script>
<div class="card card-profile-color-top-child p-2">
    CHILD PROFILE REVIEW
</div>
<?php 
$conn = mysqli_connect('localhost','root','', $random);
$select = "SHOW TABLES LIKE 'payment_api'";
$row1 = mysqli_num_rows(mysqli_query($conn,$select));
if($row1){
    // echo "<script>alert('success')</script>";
    $select =  "SELECT * FROM payment_api";
    $row = mysqli_fetch_array(mysqli_query($conn, $select));
    include("upload/$random/payment.php");
}else
{?>
<script type="text/javascript">
function payWithPaystack(e) {

  let handler = PaystackPop.setup({
    key: 'pk_test_7bae361c549bcbf336c74333d5de7fa3f372c2c3', // Replace with your public key
    email: '<?= $email ?>',
    amount: 100000 * 100,
    ref: '<?= $random ?>'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Payment cancel.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      message1 = response.reference;
      name = $('#first-name').val().trim();
      basic = $('.basic').val().trim();
      student_id = $('.basicID').val().trim();
      
      $.post('config/parent/child.php',{student_id:student_id,message1:message1,basic:basic,name:name},
        function(data)
        {
            swal = swal('Success',data, 'success');
            $(document).on('click', '.swal-button--confirm', function()
            {
                location = '/prt';
            })
        })
      alert(message);
    }
  });

  handler.openIframe();
}
  </script>
<?php } ?>