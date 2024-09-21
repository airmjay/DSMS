<style type="text/css">
.authorizationT
{
    display: none !important;
}
</style>
<section class='' id='teacher-list'>
<div class="card border-muted shadow">
<div class="card-body card-list"> 
   <div class='d-flex align-items-center justify-content-between mb-2'> 
    <h1 class='card-title text-muted'> <b>teacher LIST's</b></h1>  
    <div class="btn-group">
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