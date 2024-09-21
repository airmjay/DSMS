
<section class='d-none' id='staff-id'>
<div class="card border-muted shadow">
    <div class="card-body"> 
    <div class='d-flex align-items-center justify-content-between mb-2'>	
    <h1 class='card-title'> <b>ADD STAFF</b></h1>  <button class='staff-add btn-sm btn-primary'>Back</button>
    </div>
   <form action="" id='staff_id_print'class="card-text row">
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffName">First Name</label>
            <input type="text" name='name' class="form-control form-control-sm first-staffy-add"  
            aria-describedby="namehelp" placeholder="Enter First Name" required>
		    <small id="name_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="StaffName">Last Name</label>
            <input type="text" name='name' class="form-control form-control-sm last-staffy-add"  
            aria-describedby="namehelp" placeholder="Enter Last Name" required>
            <small id="name_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffLocation">Staff Location</label>
            <input type="text" name='location' class="form-control form-control-sm location-staffy-add" id="StaffLocation" 
            aria-describedby="namehelp" placeholder="Enter your Staff Location" required>
		    <small id="location_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffDate">Date of birth</label>
            <input type="date" name='date' class="form-control form-control-sm date-staffy-add" id="StaffDate" 
            aria-describedby="namehelp" placeholder="Staff Date of birth" required>
		    <small id="date_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffEmail">Staff Email</label>
            <input type="email" name='Email' class="form-control form-control-sm email-staffy-add" id="StaffEmail" 
            aria-describedby="namehelp" placeholder="Enter Staff Email" required>
		    <small id="email_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="StaffEmail">Staff Post</label>
            <input type="email" name='post' class="form-control form-control-sm post-staffy-add" id="StaffPost" 
            aria-describedby="namehelp" placeholder="Enter Staff Post" required>
            <small id="Post_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="StaffEmail">Staff Tel Number</label>
            <input type="email" name='telephone' class="form-control form-control-sm tel-staffy-add" id="StaffTel" 
            aria-describedby="namehelp" placeholder="Enter  Staff Telephone" required>
            <small id="Tel_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="StaffConfirm">State</label>
            <input type="text" name='staff' class="form-control form-control-sm state-staffy-add" id="StaffConfirm" 
            aria-describedby="namehelp" placeholder="Enter Staff State" required>
            <small id="confirm_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffPassword">Password</label>
            <input type="Password" name='password' class="form-control form-control-sm password-staffy-add" id="StaffPassword" 
            aria-describedby="namehelp" placeholder="Enter Staff Password" required>
		    <small id="password_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="StaffConfirm">Confirm Password</label>
            <input type="password" name='Confirm_password' class="form-control form-control-sm confirm-staffy-add" id="StaffConfirm" 
            aria-describedby="namehelp" placeholder="re-enter password" required>
		    <small id="confirm_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group checkbox-staffy-add col-lg-6 col-xl-6 col-md-6 col-12 d-flex align-items-center">
            <input type="checkbox" id='checkboxStaffPdf' name='checkbox'>
		    <small id="save_error" class="text-muted ml-1">Save as information as pdf</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-12 col-12">
            <input type="button" value='Add Staff +'  id='add_staff_school' name='submit-add-staff' class='add-school-staffy form-control form-control-sm col-3 btn
             btn-success'>
        </div>
   </form>
   <div>  
    <form action="" id="form-control-csv-resert-1" class='card'>  
        <div class="form-group p-2">
		    <label for="StaffConfirm card-title">Upload CSV</label> <br>
            <input type="file" name='Confirm_password' class="StaffConfirmSVC" id="" 
            aria-describedby="namehelp" placeholder="Enter your Staff Name" required>
            <button class='btn btn-primary btn-sm sm staff_csv_upload' type='button'>Upload CSV</button> <br>
		    <small id="csv_error" class="text-muted ml-1"></small>
        </div>   
    </form>
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
    <input type="search" onkeyup="search_staff()" placeholder="Enter Staff name or id" class="form-control search-print-examination" name="">
    <div id="container">
        <div id="inner-container">
            <div id="results"></div>
            <div id="loader"></div>

        </div>
    </div>
    <script type="text/javascript">
    function search_staff() {
        val = $('.search-print-examination').val();
       $.get('config/school/pagination.php',{val:val}, function(data)
       {
        search = $('.search-print-examination').val().trim();
        showRecords(10, 1,search);
       })
    }
    function showRecords(perPageCount, pageNumber, search) {
        $.ajax({
            type: "GET",
            url: "config/school/pagination.php",
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
        showRecords(10, 1, '');
    });
</script>
   </div>
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
// function delete(data)
// {
//     alert(data)
// }
</script>
<script  src="js/custom/jspdf.umd.min.js"></script>