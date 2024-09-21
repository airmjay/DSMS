<?php 
require('config/conn.php');

?>
<section class='d-none' id='staff-id'>
<div id='selectPrintStaff' class="card border-muted shadow">
    <div class="card-body"> 
    <div class='d-flex align-items-center justify-content-between mb-2'>	
    <h1 class='card-title'> <b>ADD STAFF </b></h1>  <button class='staff-add btn-sm btn-primary'>Back</button>
    </div>
   <form id="formRegisterStaff content" action="" class="card-text row">
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffName">Staff Name</label>
            <input type="text" name='name' class="form-control form-control-sm" id="StaffName" 
            aria-describedby="namehelp" placeholder="Enter Staff Name" required>
		    <small id="name_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffLocation">Staff Location</label>
            <input type="text" name='location' class="form-control form-control-sm" id="StaffLocation" 
            aria-describedby="namehelp" placeholder="Enter your Staff Location" required>
		    <small id="location_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="StaffPost">Staff Post</label>
            <input type="text" name='Post' class="form-control form-control-sm" id="StaffPost" 
            aria-describedby="namehelp" placeholder="Enter your Staff Post" required>
            <small id="Post_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="StaffUsername">Staff Username</label>
            <input type="text" name='Username' class="form-control form-control-sm" id="StaffUser" 
            aria-describedby="Userhelp" placeholder="Enter your Staff Username" required>
            <small id="Username_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffDate">Date of birth</label>
            <input type="date" name='date' class="form-control form-control-sm" id="StaffDate" 
            aria-describedby="namehelp" placeholder="Staff Date of birth" required>
		    <small id="date_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffEmail">Staff Email</label>
            <input type="email" name='Email' class="form-control form-control-sm" id="StaffEmail" 
            aria-describedby="namehelp" placeholder="Enter Staff Email" required>
		    <small id="email_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffPassword">Password</label>
            <input type="Password" name='password' class="form-control form-control-sm" id="StaffPassword" 
            aria-describedby="namehelp" placeholder="Enter Staff Password" required>
		    <small id="password_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffConfirm">Confirm Password</label>
            <input type="password" name='Confirm_password' class="form-control form-control-sm" id="StaffConfirm" 
            aria-describedby="namehelp" placeholder="re-enter password" required>
		    <small id="confirm_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12 d-flex align-items-center">
            <input type="checkbox" name='checkbox' id='checkboxStaffPdf'>
		    <small id="save_error" class="text-muted ml-1">Save as information as pdf</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-12 col-12">
            <input type="button" value='Add Staff +' name='submit-add-staff' class='form-control form-control-sm col-3 btn
             btn-success' id='add_staff_admin'>
        </div>
   </form>
   <div>  
   <!--  <form action="" class='card'>  
        <div class="form-group p-2">
		    <label for="StaffConfirm card-title">Upload CSV</label> <br>
            <input type="file" name='Confirm_password' class="" id="StaffConfirm" 
            aria-describedby="namehelp" placeholder="Enter your Staff Name" required>
            <input class='btn btn-primary btn-sm sm'  type='submit'><br>
		    <small id="csv_error" class="text-muted ml-1"></small>
        </div>   
    </form> -->
   </div>
    </div>
</div>
</section>
<section class='' id='staff-list'>
<div class="card border-muted shadow">
<div class="card-body card-list"> 
   <div class='d-flex align-items-center justify-content-between mb-2'>	
    <h1 class='card-title text-muted'> <b>STAFF LIST's</b></h1>  
    <button class='staff-back btn-sm btn-success'>Add+</button>
    </div>
    <input onkeyup="search_staff()" type="search" placeholder="search for activies with phase in the activities" class="form-control form-control-sm search-staff-index-input" name="">
    <div id="container">
        <div id="inner-container">
            <div id="results"></div>
            <div id="loader"></div>
        </div>
    </div>
    <script type="text/javascript">
      function search_staff(){
       val = $('.search-staff-index-input').val();
       $.get('config/pagination.php',{val:val}, function(data)
       {
        search = $('.search-staff-index-input').val().trim();
        showRecordsActive(10, 1,search);
       })
   }
    function showRecordsActive(perPageCount, pageNumber, search) {
        $.ajax({
            type: "GET",
            url: "config/pagination.php",
            data: {"pageNumber" : pageNumber, search:search},
            cache: false,
            beforeSend: function() {
                $('#loader').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');     
            },
            success: function(html) {
                $("#results").html(html);
                $('#loader').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecordsActive(10, 1, '');
    });
</script>
</div>
</section>
<script>
    $(document).ready(function(){
    $('.staff-add').click(function()
    {
        $('#staff-id').addClass('d-none');
        $('#staff-list').removeClass('d-none');        
    })
    
    $('.staff-back').click(function()
    {
        $('#staff-id').removeClass('d-none');
        $('#staff-list').addClass('d-none');  
           
    })
})

</script>
<script  src="js/custom/admin_staff.js"></script>
<script  src="js/custom/jspdf.umd.min.js"></script>

