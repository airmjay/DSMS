<section class='d-none' id='teacher-id'>
<div class="card border-muted shadow">
    <div class="card-body"> 
    <div class='d-flex align-items-center justify-content-between mb-2'>	
    <h1 class='card-title'> <b>ADD teacher</b></h1>  <button class='teacher-add btn-sm btn-primary small'>Back</button>
    </div>
   <form action="" class="card-text row" id='Table_id_print'>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="firstName">First Name</label>
            <input type="text" name='name' class="form-control form-control-sm first-add-teacher" id="firstName" 
            aria-describedby="namehelp" placeholder="Enter teacher First Name" required>
		    <small  class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="OtherName">Other Name</label>
            <input type="text" name='name' class="form-control form-control-sm other-add-teacher" id="OtherName" 
            aria-describedby="namehelp" placeholder="Enter teacher Other Name" required>
            <small  class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="teacherSurnameName">Surname Name</label>
            <input type="text" name='name' class="form-control form-control-sm surname-add-teacher" id="teacherSurnameName" 
            aria-describedby="namehelp" placeholder="Enter teacher Surname Name" required>
            <small  class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="teacherPost">Enter Teacher Post</label>
            <input type="text" name='name' class="form-control form-control-sm post-add-teacher" id="teacherPost" 
            aria-describedby="namehelp" placeholder="Enter teacher Post" required>
            <small  class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="teacherLocation">teacher Address</label>
            <input type="text" name='location' class="form-control form-control-sm location-add-teacher" id="teacherLocation" 
            aria-describedby="namehelp" placeholder="Enter your teacher Location" required>
		    <small id="location_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="EnterClass">Enter Class</label>
            <select name='class' class="form-control form-control-sm class-add-teacher"
             id="EnterClass">
                        <?php 
                        $conn = mysqli_connect('localhost','root','',$random);
                        $select = "SELECT * FROM `class`";
                        $row1 = mysqli_query($conn, $select);
                        if(mysqli_num_rows($row1)){
                        while ($row = mysqli_fetch_array($row1)) {
                        ?>
                        <option value="<?=$row['name']?>"><?= $row['name']  ?></option>    
                    <?php  }}else{ 
                        echo "<option>No Class Added</option>";    

                        }?>
            </select>
            <small id="class_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="teacherDate">Date of birth</label>
            <input type="date" name='date' class="form-control form-control-sm date-add-teacher" id="teacherDate" 
            aria-describedby="namehelp" placeholder="teacher Date of birth" required>
		    <small id="date_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="teacherEmail">teacher Email</label>
            <input type="email" name='Email' class="form-control form-control-sm email-add-teacher" id="teacherEmail" 
            aria-describedby="namehelp" placeholder="Enter teacher Email" required>
		    <small id="email_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="teacherPassword">Password</label>
            <input type="Password" name='password' class="form-control form-control-sm password-add-teacher" id="teacherPassword" 
            aria-describedby="namehelp" placeholder="Enter teacher Password" required>
		    <small id="password_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="teacherConfirm">Confirm Password</label>
            <input type="password" name='Confirm_password' class="form-control form-control-sm cpassword-add-teacher" id="teacherConfirm" 
            aria-describedby="namehelp" placeholder="re-enter password" required>
		    <small id="confirm_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12 d-flex align-items-center">
            <input type="checkbox" name='checkbox'>
		    <small id="save_error" class="text-muted ml-1 save-add-teacher">Save as information as pdf</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-12 col-12">
            <button type="button" name='submit-add-teacher' class='sm btn-sm form-control form-control-sm col-3 btn
             btn-success add-add-teacher'> Add teacher + </button>
        </div>
   </form>
   <div>  
    <form action="" id='form-control-csv-resert-2' class='card'>  
        <div class="form-group p-2">
		    <label for="teacherConfirm card-title">Upload CSV</label> <br>
            <input type="file" name='Confirm_password' class="teacherConfirmCSV"
            aria-describedby="namehelp" placeholder="Enter your teacher Name" required>
            <button class='btn btn-primary small teacher_csv_upload'  type='button'>Upload CSV</button><br>
		    <small id="csv_error" class="text-muted ml-1"></small>
        </div>   
    </form>
   </div>
    </div>
</div>
</section>
<section class='' id='teacher-list'>
<div class="card border-muted shadow">
<div class="card-body card-list"> 
   <div class='d-flex align-items-center justify-content-between mb-2'>	
    <h1 class='card-title text-muted'> <b>teacher LIST's</b></h1>  
    <div class="btn-group">
    <button class='btn-group-item boder teacher-back btn-sm btn-success sm'>Add+</button>
    <button class='btn-group-item boder teacher-attendance btn-sm btn-primary sm'>Take Attendance</button>
    </div>
    </div>
    <input type="search" placeholder="Enter teacher name or id" onkeyup="search_print_teacher()" class="teacher-print-examination form-control " name="">
     <div id="inner-container1">
            <div id="results1"></div>
            <div id="loader1"></div>

        </div>   
    </div>
</div>

    <script type="text/javascript">
    function search_print_teacher() {
        val = $('.search-print-examination').val();
       $.get('config/school/pagination1.php',{val:val}, function(data)
       {
        search = $('.teacher-print-examination').val().trim();
        showRecordsTeacher(10, 1,search);
       })
    }
    function showRecordsTeacher(perPageCount, pageNumber, search) {
        $.ajax({
            type: "GET",
            url: "config/school/pagination1.php",
            data: {'pageNumber' : pageNumber, search : search },
            cache: false,
            beforeSend: function() {
                $('#loader1').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');
                
            },
            success: function(html) {
                $("#results1").html(html);
                $('#loader1').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecordsTeacher(10, 1, '');
    });
</script>
 

</section>
<script>
    $(document).ready(function(){
    $('.teacher-add').click(function()
    {
        $('#teacher-id').addClass('d-none');
        $('#teacher-list').removeClass('d-none');        
    })
    
    $('.teacher-back').click(function()
    {
        $('#teacher-id').removeClass('d-none');
        $('#teacher-list').addClass('d-none');  
           
    })
})
</script> 