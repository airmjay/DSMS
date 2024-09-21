<div class='table table-reponsive sm p-3 card'>
<input onkeyup="search_active()" type="search" placeholder="search for activies with phase in the activities" class="form-control form-control-sm search-activities-index-input" name="">
        <div id="container1">
        <div id="inner-container1">
            <div id="results1"></div>
            <div id="loader1"></div>
        </div>
    </div>
    <script type="text/javascript">
    
      function search_active(){
       val = $('.search-activities-index-input').val();
       $.get('config/pagination1.php',{val:val}, function(data)
       {
        search = $('.search-activities-index-input').val().trim();
        showRecordsActives(10, 1,search);
       })
   }
    function showRecordsActives(perPageCount, pageNumber, search) {
        $.ajax({
            type: "GET",
            url: "config/pagination1.php",
            data: {"pageNumber" : pageNumber, search:search},
            cache: false,
            beforeSend: function() {
                $('#loader').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');     
            },
            success: function(html) {
                $("#results1").html(html);
                $('#loader1').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        search = $('.search-activities-index-input').val().trim();
        showRecordsActives(10, 1, search);
    });
</script>   
</div>
