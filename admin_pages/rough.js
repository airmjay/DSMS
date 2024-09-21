$('#add_staff_admin').click(function(event) {

     event.preventDefault(); // Prevent default form submission

    hasError = false; // Reset hasError before validation

    // Get input values directly from selectors
    // var Name = $('#name').val().trim();
    // checkEmpty(name, '#school_name_error', 'School name is required please!');

    var name = '#StaffName';
    var location = '#StaffLocation';
    var nameCheckSpecial = $('#StaffName').val().trim();
    var post = '#StaffPost';
    var postStaff = $('#StaffPost').val().trim();
    var username = '#StaffUser';
    var birth = '#StaffDate';
    var password = $('#StaffPassword').val().trim();
    var confirmPassword = $('#StaffConfirm').val().trim();
    var email = $('#StaffEmail').val().trim();
    var Email1 = '#StaffEmail';
    var Password1 = '#StaffPassword';
    var button = $(this).val();
    // Check empty fields
    checkEmpty(name, '#name_error', 'Staff name is required please!');
    checkEmpty(location, '#location_error', 'Staff location is required please!');
    checkEmpty(post, '#Post_error', 'Staff post is required please!');
    checkEmpty(username, '#Username_error', 'Staff username is required please!');
    checkEmpty(birth, '#date_error', 'Staff day of birth is required please!');
    checkEmpty(Email1, '#email_error', 'Email is required please!');
    checkEmpty(Password1, '#password_error', 'Password is required please!');
    // Password length and confirmation
    if (password.length > 0) { // Only check if password is not empty
    
      if (confirmPassword !== password) {
        addError('#confirm_error', 'Password must match with confirm password');
        hasError = true;
      } else {
        addError('#confirm_error', ''); // Clear previous error
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
      if (password.length < 8) {
        addError('#password_error', 'Password must be greater than 8');
        hasError = true;
      } else {
      
        addError('#password_error', ''); // Clear previous error
      }
    }
   

    // Check for special characters (optional, can be done on server-side)
    if (hasSpecialChars(nameCheckSpecial)) { // Assuming hasSpecialChars function is defined elsewhere
      addError('#name_error', 'Special characters are not allowed in school name');
      hasError = true;
    }
    emailChecking(email,'#email_error');
    function emailChecking(email,errordiv){
    // Email validation (consider server-side validation as well)
    var regex = /^([^\s@]+@[^\s@]+\.[^\s@]+)$/;
    if (!regex.test(email)) {
      addError(errordiv, 'Please check your email');
      hasError = true;
    }
    }
    // Submit form or display success message only if there are no errors
    if (!hasError) {
    // Submit form logic (assuming you have a form)
     var name = '#StaffName';
    var location = '#StaffLocation';
    var locationStaff = $('#StaffLocation').val().trim();
    var nameCheckSpecial = $('#StaffName').val().trim();
    var post = '#StaffPost';
    var postStaff = $('#StaffPost').val().trim();
    var username = '#StaffUser';
    var birth = '#StaffDate';
    var birthStaff = $('#StaffDate').val().trim();
    var password = $('#StaffPassword').val().trim();
    var confirmPassword = $('#StaffConfirm').val().trim();
    var email = $('#StaffEmail').val().trim();
    var usernameStaff = $('#StaffUser').val().trim();
    var Email1 = '#StaffEmail';
    var Password1 = '#StaffPassword';
    $.post('config/add_staff.php', {adminID:adminID,postStaff:postStaff,usernameStaff:usernameStaff,locationStaff:locationStaff,nameCheckSpecial:nameCheckSpecial,
      password:password,birthStaff:birthStaff,email:email}, function(data)
    {
      swal(data)
    .then((value) => {
      
    });
    
    })    
    validate('checkboxStaffPdf','#selectPrintStaff');

    }

    
  }
)
  function checkEmpty(inputSelector, errorDiv, message) {
    var inputValue = $(inputSelector).val().trim();
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



function validate(check,div)
{
  if(document.getElementById(check).checked)
      {
        $(div).printThis();
        checkButton = 1;
      }else
      {
        checkButton = 0;

      }

}
function addError(errorDiv, message) {
    $(errorDiv).html('<span class="text-danger">' + message + '</span>');
  }
