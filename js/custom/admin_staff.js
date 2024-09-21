var hasError = false; // Flag to track errors
    checkButton = '0';
adminID = $('.verify_id_get').val().trim();
$('.logout-session').click(function()
{
  logout = $(this).val();
  $.post('config/logout.php',{logout:logout},function(data)
  {
    $('.message-div-display').html(data);
  })
  // alert("You have been logout out");
    
})
$(document).ready(function() {
  $('.add_pages_new').click(function(event)
  {
    pageNamePost = $('.page_name_class').val().trim()
    PageDirPost = $('.page_dir_class').val().trim()
    PageAddPost = $(this).val();
    $.post('config/add_pages.php', {adminID:adminID,pageNamePost:pageNamePost,PageDirPost:PageDirPost,
      PageAddPost:PageAddPost},function(data)
    {
    swal('Action Done!', data, 'success'); 

    })
  })
  $('#add_staff_admin').click(function(event) {

     event.preventDefault(); // Prevent default form submission

    hasError = false; // Reset hasError before validation

    // Get input values directly from selectors
    // var Name = $('#name').val().trim();
    // checkEmpty(name, '#school_name_error', 'School name is required please!');

    var name = '#StaffName';
    var location = '#StaffLocation';
    var nameCheckSpecial = $('#StaffName').val().trim().replace(/\s+/g, ' ');
    var post = '#StaffPost';
    var postStaff = $('#StaffPost').val().trim().replace(/\s+/g, ' ');
    var username = '#StaffUser';
    var birth = '#StaffDate';
    var password = $('#StaffPassword').val().trim().replace(/\s+/g, ' ');
    var confirmPassword = $('#StaffConfirm').val().trim().replace(/\s+/g, ' ');
    var email = $('#StaffEmail').val().trim().replace(/\s+/g, ' ');
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
      
        // addError('#password_error', ''); // Clear previous error
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
      addError('#email_error', 'Please check your email');
      hasError = true;
    }
    }
    // Submit form or display success message only if there are no errors
    if (!hasError) {
    // Submit form logic (assuming you have a form)
     var name = '#StaffName';
    var location = '#StaffLocation';
    var locationStaff = $('#StaffLocation').val().trim().replace(/\s+/g, ' ');
    var nameCheckSpecial = $('#StaffName').val().trim().replace(/\s+/g, ' ');
    var post = '#StaffPost';
    var postStaff = $('#StaffPost').val().trim().replace(/\s+/g, ' ');
    var username = '#StaffUser';
    var birth = '#StaffDate';
    var birthStaff = $('#StaffDate').val().trim().replace(/\s+/g, ' ');
    var password = $('#StaffPassword').val().trim().replace(/\s+/g, ' ');
    var confirmPassword = $('#StaffConfirm').val().trim().replace(/\s+/g, ' ');
    var email = $('#StaffEmail').val().trim().replace(/\s+/g, ' ');
    var usernameStaff = $('#StaffUser').val().trim().replace(/\s+/g, ' ');
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
$('.add-schoolly').click(function()
    {
      schoolName = $('.name-schoolly').val().trim().replace(/\s+/g, ' ');
      email = $('.email-schoolly').val().trim().replace(/\s+/g, ' ');
      password = $('.password-schoolly').val().trim().replace(/\s+/g, ' ');
      confirmPassword = $('.password-schoolly').val().trim().replace(/\s+/g, ' ');
      password1 = '.password-schoolly';
      email1 = '.email-schoolly';
      schoolName1 = '.name-schoolly';
    checkEmpty(email1, '#email_school_add_error', 'Email is required please!');
    checkEmpty(password1, '#password_school_add_error', 'Password is required please!');
    checkEmpty(schoolName1, '#name_school_add_error', 'SchoolName is required please!');


    // Password length and confirmation
    if (password.length > 0) { // Only check if password is not empty
      if (password.length < 8) {
        addError('#password_school_add_error', 'Password must be greater than 8');
        hasError = true;
      } else {
      
        addError('#password_school_add_error', ''); // Clear previous error
      }
      
      if (confirmPassword !== password) {
        addError('#confirm_password_error', 'Password must match with confirm password');
        hasError = true;
      } else {
        addError('#confirm_password_error', ''); // Clear previous error
      }
    }

      if (!/[A-Z]/.test(password)) {
        addError('#password_school_add_error', 'Password must contain at least one uppercase letter');
        hasError = true;
      }

      // Check for special character (adjust regex pattern as needed)
      if (!/[!@#$%^&*]/.test(password)) {
        addError('#password_school_add_error', 'Password must contain at least one special character');
        hasError = true;
      }


    // Check for special characters (optional, can be done on server-side)
    if (hasSpecialChars(schoolName)) { // Assuming hasSpecialChars function is defined elsewhere
      addError('#name_school_add_error', 'Special characters are not allowed in school name');
      hasError = true;
    }

    // Email validation (consider server-side validation as well)
    var regex = /^([^\s@]+@[^\s@]+\.[^\s@]+)$/;
    if (!regex.test(email)) {
      addError('#email_school_add_error', 'Please check your email');
      hasError = true;
    }
    
    // Submit form or display success message only if there are no errors
    if (!hasError) {
    // Submit form logic (assuming you have a form)
    $.post('config/register_school.php', {adminID:adminID,schoolName:schoolName,email:email,password:password}, function(data)
    {
      swal(data)
    .then((value) => {
      
    });
    
    }) 
    validate('checkboxSchoolPdf','#selectPrintSchool');
    }
  })
})
  

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
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});       
$(document).on('click','.swal-button',function()
{
 
  // $('#formRegisterStaff')[0].reset(); 
})
$(document).on('click','.button-staff-get-view-1',function()
{
  // $('#formRegisterStaff')[0].reset();
  id = $(this).val();
  $('.message-div-display').slideDown(100);
  $.post('config/add_view.php', {id:id}, function(data)
    {
      scrollDiv()
       $('.message-div-display').html(data);

    }
    ); 
})
$(document).on('click','.button-staff-edit-view-1',function()
{
  // $('#formRegisterStaff')[0].reset();
  idEdit = $(this).val();
  $('.message-div-display').slideDown(100);
  $.post('config/admin_edit.php', {idEdit:idEdit}, function(data)
    {
      scrollDiv()
       $('.message-div-display').html(data);

    }
    ); 
})
$(document).on('click','.button-school-get-view-1',function()
{
  // $('#formRegisterStaff')[0].reset();
  id = $(this).val();
  $('.message-div-display').slideDown(100);

  $.post('config/school_management.php', {id:id}, function(data)
    {
      scrollDiv()
       $('.message-div-display').html(data);

    }
    ); 
})
$(document).on('click','.button-school-edit-view-1',function()
{
  // $('#formRegisterStaff')[0].reset();
  idEdit = $(this).val();
  $('.message-div-display').slideDown(100);
  $.post('config/school_management.php', {idEdit:idEdit}, function(data)
    {
      scrollDiv()
       $('.message-div-display').html(data);

    }
    ); 
})
$(document).on('click','.close-div',function()
{
    $('.message-div-display').slideUp();

})
$(document).on('click', '.update-dswp',function()
{
  name = $('.name-school-dswp').val().trim().replace(/\s+/g, ' ')
  status = $('.Status-school-dswp').val().trim().replace(/\s+/g, ' ')
  update_dswp = $(this).val()
  schoolName = $('.name-school-dswp').val().trim().replace(/\s+/g, ' ')
  email = $('.email-school-dswp').val().trim().replace(/\s+/g, ' ')
  status = $('.Status-school-dswp').val().trim().replace(/\s+/g, ' ');
  statusInt = $('.Status-school-dswp').val().trim().replace(/\s+/g, ' ');
  password = $('.password-school-dswp').val().trim().replace(/\s+/g, ' ');
  passwordReg = $('.password-school-dswp').val().trim().replace(/\s+/g, ' ');

  $('.message-div-display').slideDown(100);
  
  if(status == 0)
  {
    hasError = false;
  }else if(status == 1)
  {
    hasError = false;
  }else if(status == 2)
  {
    hasError = false;
  }else
  {
    swal('Oops', 'Status enter is do not define, field required is 0,1,2.', 'error'); 
        hasError = true;
  }
  passwordCheck = 'Not change';
  if (password.length > 0) { // Only check if password is not empty
        passwordCheck = 'change';
    if (!/[A-Z]/.test(password)) {
               swal('Oops', 'Password must contain at least one uppercase letter', 'error');
        hasError = true;
      }

      // Check for special character (adjust regex pattern as needed)
      if (!/[!@#$%^&*]/.test(password)){
       swal('Oops', 'Password must contain at least one special character', 'error');
        hasError = true;
      }
      if (password.length < 8) {
       swal('Oops', 'password length is too short!', 'error'); 
        hasError = true;
      } else {
      
       
      }
    }

    // Check for special characters (optional, can be done on server-side)
    if (hasSpecialChars(schoolName)) { // Assuming hasSpecialChars function is defined elsewhere
       swal('Oops', 'Special characters are not allowed in school name', 'error');
      hasError = true;
    }

    // Email validation (consider server-side validation as well)
    var regex = /^([^\s@]+@[^\s@]+\.[^\s@]+)$/;
    if (!regex.test(email)) {
       swal('Oops','Please check your email', 'error');
      hasError = true;
    }
    
    // Submit form or display success message only if there are no errors
    if (!hasError) {
    // Submit form logic (assuming you have a form)
    $.post('config/school_management.php', {adminID:adminID,statusInt:statusInt,update_dswp:update_dswp,schoolName:schoolName,
      email:email,password:password,passwordCheck:passwordCheck}, function(data)
    {
    scrollDiv()
    $('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    }) 
    } 

})
$(document).on('click', '.close-my-custom-alert',function()
{
  $('.message-div-display-2').css('display', 'none');
})
$(document).on('click', '.update-staffy',function()
{
  name_staffy = $('.name-staffy').val().trim().replace(/\s+/g, ' ');
  location_staffy = $('.location-staffy').val().trim().replace(/\s+/g, ' ');
  post_staffy = $('.post-staffy').val().trim().replace(/\s+/g, ' ');
  email_staffy = $('.email-staffy').val().trim().replace(/\s+/g, ' ');
  birth_staffy = $('.birth-staffy').val().trim().replace(/\s+/g, ' ');
  DateOfJoin = $('.join-staffy').val().trim().replace(/\s+/g, ' ');
  username_staffy = $('.name-staffy-2').val().trim().replace(/\s+/g, ' ');
  status_staffy = $('.Status-staffy').val().trim().replace(/\s+/g, ' ');
  update_staff = $(this).val().trim().replace(/\s+/g, ' ');
  password = $('.Password-staffy').val().trim().replace(/\s+/g, ' ');
  passwordCheck = 'Not Chage';

  if (password.length > 0) { // Only check if password is not empty
    if (!/[A-Z]/.test(password)) {
        swal('Oops','Password must contain at least one uppercase letter','error');
        hasError = true;
      }else if (!/[!@#$%^&*]/.test(password)) {
       swal('Oops','Password must contain at least one special character','error');
        hasError = true;
      }else if (password.length < 8) {
       swal('Oops', 'password length is too short!', 'error');

        hasError = true;
      } else {
        passwordCheck = 'change';
        hasError = false;

      }
        

    }
    // Check for special characters (optional, can be done on server-side)
    if (hasSpecialChars(name_staffy)) { // Assuming hasSpecialChars function is defined elsewhere
     swal('Oops','Special characters are not allowed in school name', 'error');
      hasError = true;
    }

    // Email validation (consider server-side validation as well)
    var regex = /^([^\s@]+@[^\s@]+\.[^\s@]+)$/;
    if (!regex.test(email_staffy)) {
      swal('Oops', 'Please check your email', 'error');
      hasError = true;
    }
    
    // Submit form or display success message only if there are no errors
    if (!hasError) {
  $.post('config/admin_edit.php', {adminID:adminID,passwordCheck:passwordCheck,password:password,name_staffy:name_staffy,location_staffy:location_staffy, 
  post_staffy:post_staffy,email_staffy:email_staffy,birth_staffy:birth_staffy,  
  DateOfJoin:DateOfJoin,
  username_staffy:username_staffy,status_staffy:status_staffy,update_staff:update_staff}, 
  function(data)
    {
          
    $('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    scrollDiv()
    }
    ); 
}
})

    $(document).on('click','#but_upload',function(e){
      e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload')[0].files[0];
        id  =  $('.staff_id_staffy').val();
        fd.append('id', id);
        fd.append('file',files);
        fd.append('admin', adminID);
        $.ajax({
            url: 'config/upload-staff-image.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response){
                    // $("#img").attr("src",response); 
                    // $(".preview img").show(); // Display image element
                    scrollDiv()
                    $('.message-div-display-2').slideDown(100);
                    $('.message-div-display-2 .display-items-1 .detail-div-1').html(response);
                }
            },
        });
    });
 $(document).on('change','#image-upload', function()
{
  imagePreview('image-upload','img-admin-preview');
})
$(document).on('change','#image-upload121', function()
{
  imagePreview('image-upload121','school-img-preview');
})

function imagePreview(imgInp,img){
id = document.getElementById(imgInp);
src = document.getElementById(img)
  const [file] = id.files
  if (file) {
    src.src = URL.createObjectURL(file)
  }
}
function addError(errorDiv, message) {
    $(errorDiv).html('<span class="text-danger">' + message + '</span>');
  }
  function scrollDiv() {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
}