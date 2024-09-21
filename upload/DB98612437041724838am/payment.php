 <script type="text/javascript">
function payWithPaystack(e) {

  let handler = PaystackPop.setup({
    key: "pk_test_7bae361c549bcbf336c74333d5de7fa3f372c2c3", // Replace with your public key
    email: "<?= $email ?>",
    amount: 100000 * 100,
    ref: "<?= $random ?>"+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert("Payment cancel.");
    },
    callback: function(response){
      let message = "Payment complete! Reference: " + response.reference;
      message1 = response.reference;
      name = $("#first-name").val().trim();
      basic = $(".basic").val().trim();
      student_id = $(".basicID").val().trim();
      
      $.post("config/parent/child.php",{student_id:student_id,message1:message1,basic:basic,name:name},
        function(data)
        {
            swal = swal("Success",data, "success");
            $(document).on("click", ".swal-button--confirm", function()
            {
                location = "/prt";
            })
        })
      alert(message);
    }
  });

  handler.openIframe();
}
</script>