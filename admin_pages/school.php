<section class='d-none' id='School-id'>
<div id='selectPrintSchool' class="card border-muted shadow">
    <div class="card-body"> 
    <div class='d-flex align-items-center justify-content-between mb-2'>  
    <h1 class='card-title'> <b>ADD SCHOOL</b></h1>  <button class='school-add btn-sm sm btn-primary'>Back</button>
    </div>
   <form action="" class="card-text row">
        <div class="form-group col-xl-6 col-md-6 col-lg-6 col-12">
        <label for="SchoolName">SCHOOL Name</label>
            <input type="text" name='chool' class="form-control form-control-sm name-schoolly" id="SchoolName" 
            aria-describedby="namehelp" placeholder="Enter School Name" required>
        <small id="name_school_add_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12">
        <label for="SchoolLocation">SCHOOL EMAIL</label>
            <input type="text" name='locachool' class="form-control form-control-sm email-schoolly" id="SchoolLocation" 
            aria-describedby="namehelp" placeholder="Enter School Email" required> 
        <small id="email_school_add_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-xl-6 col-md-6 col-lg-6 col-12">
        <label for="SchoolPassword">Password</label>
            <input type="Password" name='password' class="form-control form-control-sm password-schoolly" id="SchoolPassword" 
            aria-describedby="namehelp" placeholder="Enter School Password" required>
        <small id="password_school_add_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-xl-6 col-md-6 col-lg-6 col-12">
        <label for="SchoolConfirm">Confirm Password</label>
            <input type="password" name='Confirm_password' class="form-control form-control-sm Cpassword-schoolly" id="SchoolConfirm" 
            aria-describedby="namehelp" placeholder="re-enter password" required>
        <small id="confirm_school_add_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-xl-6 col-md-6 col-lg-6 col-12 d-flex align-items-center">
            <input type="checkbox" id='checkboxSchoolPdf' name='checkbox'>
        <small id="save_school_add_error" class="text-muted ml-1">Save as information as pdf</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-12 col-12">
            <input type="button" value='Add School +' name='submit-add-School' class='form-control form-control-sm col-3 btn add-schoolly
             btn-success'>
        </div>
   </form>
   <div>  
    <!-- <form action="" class='card'>  
        <div class="form-group p-2">
        <label for="SchoolConfirm card-title">Upload CSV</label> <br>
            <input type="file" name='Confirm_password' class="" id="SchoolConfirm" 
            aria-describedby="namehelp" placeholder="Enter your School Name" required>
            <input class='btn btn-primary btn-sm sm'  type='submit'><br>
        <small id="csv_error" class="text-muted ml-1"></small>
        </div>   
    </form> -->
   </div>
    </div>
</div>
</section>
<section class='' id='School-list'>
<div class="card border-muted shadow">
<div class="card-body card-list"> 

   <div class='d-flex align-items-center justify-content-between mb-2'> 
    <h1 class='card-title text-muted'> <b>SCHOOL LIST's</b></h1>  
    <button class='school-back btn-sm btn-success sm'>Add+</button>
    </div>
    <input onkeyup="search_schools()" type="search" placeholder="search with email or name or school id" class="form-control form-control-sm search-school-index-input" name="">
    <div id="container2">
        <div id="inner-container2">
            <div id="results2"></div>
            <div id="loader2"></div>
        </div>
    </div>
    <script type="text/javascript">
      function search_schools(){
       val = $('.search-school-index-input').val();
       $.get('config/pagination2.php',{val:val}, function(data)
       {
        search = $('.search-school-index-input').val().trim();
        showRecordsSchools(10, 1,search);
       })
   }
    function showRecordsSchools(perPageCount, pageNumber, search) {
        $.ajax({
            type: "GET",
            url: "config/pagination2.php",
            data: {"pageNumber" : pageNumber, search:search},
            cache: false,
            beforeSend: function() {
                $('#loader2').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');     
            },
            success: function(html) {
                $("#results2").html(html);
                $('#loader2').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecordsSchools(10, 1, '');
    });
</script>
   <div class="row">
   <!-- div col -->
   
   
   <!-- div col begin -->
   </div>
   </div>
</div>
</section>
 
<script>
    $(document).ready(function(){
    $('.school-add').click(function()
    {
        $('#School-id').addClass('d-none');
        $('#School-list').removeClass('d-none');        
    })
    
    $('.school-back').click(function()
    {
        $('#School-id').removeClass('d-none');
        $('#School-list').addClass('d-none');  
           
    })
})
</script>

