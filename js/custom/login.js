 $('.login-gen').click(function(event) {
     event.preventDefault(); // Prevent default form submission
     email = $('.email-gen').val().trim().replace(/\s+/g, ' ');
     password = $('.password-gen').val().trim().replace(/\s+/g, ' ');
     login = $(this).val().trim().replace(/\s+/g, ' ');
     
     $.post('config/login.php',{email:email,password:password,login:login}, function(data)
     {
        $('#MessageDiv').html(data);
     })

  })