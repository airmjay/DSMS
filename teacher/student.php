<section class='d-none' id='student-id'>
<div class="card border-muted shadow">
    <div class="card-body"> 
    <div class='d-flex align-items-center justify-content-between mb-2'>    
    <h1 class='card-title'> 
        <b>ADD student</b>
    </h1>  
    <button class='student-back btn-sm btn-primary'>Back</button>
    </div>
   <form action="" class="card-text row" id='Table_id_print_std'>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="firststudentName">student First Name</label>
            <input type="text" name='firstname' class="form-control form-control-sm student-name-check" id="firststudentName" 
            aria-describedby="namehelp" placeholder="Enter student Name" required>
            <small id="name_error" class="form-text text-danger"></small>
        </div>
         <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="secondstudentName">student Surname Name</label>
            <input type="text" name='surname' class="form-control form-control-sm student-surname-check" id="secondstudentName" 
            aria-describedby="namehelp" placeholder="Enter student surame" required>
            <small id="name_error" class="form-text text-danger"></small>
        </div>
         <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="otherstudentName">student Other Name</label>
            <input type="text" name='othername' class="form-control form-control-sm student-other-check" id="otherstudentName" 
            aria-describedby="namehelp" placeholder="Enter student othername" required>
            <small id="name_error" class="form-text text-danger">Optional</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="studentLocation">student student address</label>
            <input type="text" name='location' class="form-control form-control-sm student-address-check" id="studentLocation" 
            aria-describedby="namehelp" placeholder="Enter your student address" required>
            <small id="location_error" class="form-text text-danger"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="studentDate">Date of birth</label>
            <input type="date" name='date' class="form-control form-control-sm student-birth-check" id="studentDate" 
            aria-describedby="namehelp" placeholder="student Date of birth" required>
            <small id="date_error" class="form-text text-danger"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="studentEmail">Select Gender</label>
            <select class="form-control-sm form-control student-email-check">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <small id="email_error" class="form-text text-danger"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="studentClass">student Class</label>
            <input type="text" name='class' class="form-control form-control-sm student-class-check" id="studentEmail" 
            aria-describedby="namehelp" placeholder="Enter student Class" required>
            <small id="class_error" class="form-text text-danger"></small>
        </div>
         <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="PostClass">student Post</label>
            <input type="text" name='post' class="form-control form-control-sm student-post-check" id="studentEmail" 
            aria-describedby="namehelp" placeholder="Enter student Post" required>
            <small id="post_error" class="form-text text-danger">Enter NA if no post</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="studentPassword">Password</label>
            <input type="Password" name='password' class="form-control form-control-sm student-password-check" id="studentPassword" 
            aria-describedby="namehelp" placeholder="Enter student Password" required>
            <small id="password_error" class="form-text text-danger"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="studentConfirm">Confirm Password</label>
            <input type="password" name='Confirm_password' class="form-control form-control-sm student-cpassword-check" id="studentConfirm" 
            aria-describedby="namehelp" placeholder="re-enter password" required>
            <small id="confirm_error" class="form-text text-danger"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12 d-flex align-items-center ">
            <input class="student-save-check" type="checkbox" name='checkbox'>
            <small id="save_error_search" class="text-muted ml-1 ">Save as information as pdf</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-12 col-12">
            <input type="button" value='Add student +' name='submit-add-student' class='form-control form-control-sm col-3 btn add-student-button-reg
             btn-success'>
        </div>
   </form>
   <div>  
    <form action="" id="form-control-csv-resert-3" class='card'>  
        <div class="form-group p-2">
            <label for="studentConfirm card-title">Upload CSV</label> <br>
            <input type="file" name='Confirm_password' class="studentConfirmCSV" id="studentConfirm" 
            aria-describedby="namehelp" placeholder="Enter your student Name" required>
            <button class='btn btn-primary btn-sm sm student_csv_upload'  type='button'>Upload CSV</button><br>
            <small id="csv_error" class="text-danger ml-1"></small>
        </div>   
    </form>
   </div>
    </div>
</div>
</section>
<section class='' id='student-list'>
<div class="card border-muted shadow">
<div class="card-body card-list"> 
   <div class='d-flex align-items-center justify-content-between mb-2'> 
    <h1 class='card-title text-muted'> <b>Student LIST's</b></h1>  
   <div class="btn-group">
    <button class='btn-group-item  btn-sm btn-success boder sm student-add d-none'>Add+</button>
    <button class='btn-group-item  btn-sm btn-primary boder sm take-attendance-std'>Take Attendance</button>
    </div>
    </div>
    <input type="search" placeholder="Enter student name or id" class="form-control form-control-sm sm" name="">
    <div id="container4">
        <div id="inner-container4">
            <div id="results4"></div>
            <div id="loader4"></div>

        </div>
    </div>
    <script type="text/javascript">
    function showRecordsStudent(perPageCount, pageNumber) {
        $.ajax({
            type: "GET",
            url: "config/school/pagination4.php",
            data: "pageNumber=" + pageNumber,
            cache: false,
            beforeSend: function() {
                $('#loader4').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');     
            },
            success: function(html) {
                $("#results4").html(html);
                $('#loader4').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecordsStudent(10, 1,'');
    });
</script>
</div>
</section>
<script>
    $(document).ready(function(){
    $('.student-add').click(function()
    {
        $('#student-id').removeClass('d-none');
        $('#student-list').addClass('d-none');        
    })
    
    $('.student-back').click(function()
    {
        $('#student-id').addClass('d-none');
        $('#student-list').removeClass('d-none');  
           
    })
})
</script>