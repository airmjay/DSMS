<b>Parent</b>
<section class='d-none' id='parent-id'>
<div class="card border-muted shadow">
    <div class="card-body"> 
    <div class='d-flex align-items-center justify-content-between mb-2'>	
    <h1 class='card-title'> <b>ADD parent</b></h1>  <button class='parent-add btn-sm btn-primary'>Back</button>
    </div>

   <form action="" class="card-text row" id='Table_id_print_prt'>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="parentfirstName">Parent First Name</label>
            <input type="text" name='name' class="form-control form-control-sm parent-name-check" id="parentfirstName" 
            aria-describedby="namehelp" placeholder="Enter parent First Name" required>
		    <small id="name_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="parentsurName">Parent Surname</label>
            <input type="text" name='name' class="form-control form-control-sm parent-surname-check" id="parentsurName" 
            aria-describedby="namehelp" placeholder="Enter parent Surname" required>
            <small id="surname_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="otherName">Parent Other Name</label>
            <input type="text" name='name' class="form-control form-control-sm parent-other-check" id="otherName" 
            aria-describedby="namehelp" placeholder="Enter parent Other Name" required>
            <small id="other_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
            <label for="relatedName">Enter releted children id</label>
            <input type="name" name='name' class="form-control form-control-sm parent-id-check" id="relatedName" 
            aria-describedby="namehelp" placeholder="Enter parent Other Name" required>
            <small id="related_error" class="form-text text-danger">Example: 1,2,3,4 Please Seperate with comma,</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="parentLocation">Parent Address</label>
            <input type="text" name='location' class="form-control form-control-sm parent-address-check" id="parentLocation" 
            aria-describedby="namehelp" placeholder="Enter your parent Location" required>
		    <small id="location_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="parentEmail">parent Email</label>
            <input type="email" name='Email' class="form-control form-control-sm parent-email-check" id="parentEmail" 
            aria-describedby="namehelp" placeholder="Enter parent Email" required>
		    <small id="email_error" class="form-text text-danger">Optional We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="parentPassword">Password</label>
            <input type="Password" name='password' class="form-control form-control-sm parent-password-check" id="parentPassword" 
            aria-describedby="namehelp" placeholder="Enter parent Password" required>
		    <small id="password_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12">
		    <label for="parentConfirm">Confirm Password</label>
            <input type="password" name='Confirm_password' class="form-control form-control-sm   parent-cpassword-check" id="parentConfirm" 
            aria-describedby="namehelp" placeholder="re-enter password" required>
		    <small id="confirm_error" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-6 col-12 d-flex align-items-center">
            <input type="checkbox" name='checkbox' class="parent_print_pdf">
		    <small id="save_error" class="text-muted ml-1">Save as information as pdf</small>
        </div>
        <div class="form-group col-lg-6 col-xl-6 col-md-12 col-12">
            <input type="button" value='Add parent +' name='submit-add-parent' class='parent-save-check form-control form-control-sm sm col-3 btn
             btn-success'>
        </div>
   </form>
   <div>  
    <form id='form-control-csv-resert-4' action="" class='card'>  
        <div class="form-group p-2">
		    <label for="parentConfirm card-title">Upload CSV</label> <br>
            <input type="file" name='Confirm_password' class="parentConfirmCSV" id="parentConfirm" 
            aria-describedby="namehelp" placeholder="Enter your parent Name" required>
            <button class='btn btn-primary btn-sm sm parent_csv_upload'  type='button'>Upload</button><br>
		    <small id="csv_error" class="text-muted ml-1"></small>
        </div>   
    </form>
   </div>
    </div>
</div>
</section>
<section class='' id='parent-list'>
<div class="card border-muted shadow">
<div class="card-body card-list"> 
   <div class='d-flex align-items-center justify-content-between mb-2'>	
    <h1 class='card-title text-muted'> <b>Parent LIST's</b></h1>  
    <button class='parent-back btn-sm btn-success sm'>Add+</button>
    </div>
    <input type="search" placeholder="Enter parent name or id" onkeyup="search_parent()" class="form-control sm form-control-sm search-parent-input" name="">
      <div id="container5">
        <div id="inner-container5">
            <div id="results5"></div>
            <div id="loader5"></div>

        </div>
    </div>
    <script type="text/javascript">
    function search_parent() {
        val = $('.search-parent-input').val();
       $.get('config/school/pagination5.php',{val:val}, function(data)
       {
        search = $('.search-parent-input').val().trim();
        showRecordsParent(10, 1,search);
       })
    }
    function showRecordsParent(perPageCount, pageNumber, search) {
        $.ajax({
            type: "GET",
            url: "config/school/pagination5.php",
            data: {"pageNumber" : pageNumber, search:search},
            cache: false,
            beforeSend: function() {
                $('#loader5').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');     
            },
            success: function(html) {
                $("#results5").html(html);
                $('#loader5').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecordsParent(10, 1, '');
    });
</script>
   </div>
</section>
<script>
    $(document).ready(function(){
    $('.parent-add').click(function()
    {
        $('#parent-id').addClass('d-none');
        $('#parent-list').removeClass('d-none');        
    })
    
    $('.parent-back').click(function()
    {
        $('#parent-id').removeClass('d-none');
        $('#parent-list').addClass('d-none');  
           
    })
})
loadPage(1)
function loadPage(page) {

  $.ajax({
    url: 'config/school/pagination.php',
    type: 'GET',
    data: { page: page },
    dataType: 'json',
    success: function(data) {
     $('.parent-pagination').html(data)
    }
  });
}

// Assume there's a "next" and "previous" button to navigate pages
$('#nextBtn').click(function() {
  currentPage++;
  loadPage(currentPage);
});

$('#prevBtn').click(function() {
  currentPage--;
  loadPage(currentPage);
});
</script>