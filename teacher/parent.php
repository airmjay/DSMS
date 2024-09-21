<section class='' id='parent-list'>
<div class="card border-muted shadow">
<div class="card-body card-list"> 
   <div class='d-flex align-items-center justify-content-between mb-2'> 
    <h1 class='card-title text-muted'> <b>Parent LIST's</b></h1>  
    <div class='text-danger sm'>Report any misinformations</div>
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

</script>