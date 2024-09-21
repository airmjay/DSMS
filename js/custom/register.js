var hasError = false; // Flag to track errors

$(document).ready(function() {
 
  $('#register_button').click(function(event) {

     event.preventDefault(); // Prevent default form submission

    hasError = false; // Reset hasError before validation

    // Get input values directly from selectors
    var schoolName = $('#School_name').val().trim().replace(/\s+/g, ' ');
    var email = $('#Email').val().trim().replace(/\s+/g, ' ');
    var password = $('#Password').val().trim().replace(/\s+/g, ' ');
    var confirmPassword = $('#Confirm_password').val().trim().replace(/\s+/g, ' ');
    var Email1 = '#Email';
    var Password1 = '#Password';
    var button = $(this).val();
    // Check empty fields
    checkEmpty(School_name, '#school_name_error', 'School name is required please!');
    checkEmpty(Email1, '#email_error', 'Email is required please!');
    checkEmpty(Password1, '#password_error', 'Password is required please!');

    // Password length and confirmation
    if (password.length > 0) { // Only check if password is not empty
      if (password.length < 8) {
        addError('#password_error', 'Password must be greater than 8');
        hasError = true;
      } else {
      
        addError('#password_error', ''); // Clear previous error
      }
      if (!$('input[type="checkbox"]:checked').length) {
      addError('#condition_error', 'Please select at least one checkbox');
      hasError = true;
      } else {
      addError('#condition_error', ''); // Clear previous error
      }
      if (confirmPassword !== password) {
        addError('#confirm_password_error', 'Password must match with confirm password');
        hasError = true;
      } else {
        addError('#confirm_password_error', ''); // Clear previous error
      }
    }

      if (!/[A-Z]/.test(password)) {
        addError('#password_error', 'Password must contain at least one uppercase letter');
        hasError = true;
      }

      // Check for special character (adjust regex pattern as needed)
      if (!/[!@#$%^&*]/.test(password)) {
        addError('#password_error', 'Password must contain at least one special character');
        hasError = true;
      }


    // Check for special characters (optional, can be done on server-side)
    if (hasSpecialChars(schoolName)) { // Assuming hasSpecialChars function is defined elsewhere
      addError('#school_name_error', 'Special characters are not allowed in school name');
      hasError = true;
    }

    // Email validation (consider server-side validation as well)
    var regex = /^([^\s@]+@[^\s@]+\.[^\s@]+)$/;
    if (!regex.test(email)) {
      addError('#email_error', 'Please check your email');
      hasError = true;
    }
    
    // Submit form or display success message only if there are no errors
    if (!hasError) {
    // Submit form logic (assuming you have a form)
    $.post('config/register_school.php', {schoolName:schoolName,email:email,password:password}, function(data)
    {
      swal(data)
    .then((value) => {
      
    });
    
    })
    }
  });

  function addError(errorDiv, message) {
    $(errorDiv).html('<span class="text-danger">' + message + '</span>');
  }

  function checkEmpty(inputSelector, errorDiv, message) {
    var inputValue = $(inputSelector).val().trim().replace(/\s+/g, ' ');
    if (inputValue.length === 0) {
      addError(errorDiv, message);
      hasError = true;
    } else {
        hasError = false;
      addError(errorDiv, ''); // Clear previous error
    }
  }

  // Function to check for special characters (if needed)
    function hasSpecialChars(str) {
  // Regex to match most common special characters
  const regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g;
  return regex.test(str);
}


});
$(document).on('click','.swal-button',function()
{
  $('#formRegister')[0].reset(); 
})