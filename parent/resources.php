<b class="big">Resources Market Place</b>
<div class="position-relative card p-3">
<div class="justify-content-between align-items-center mb-4"> 
<input type="search" placeholder="search for resources" name="" class="form-control form-control-sm search-resource-input" onkeyup="search_resource()">
</div>
        <div id="container2">
        <div id="inner-container3">
            <div id="results2"></div>
            <div id="loader2"></div>

        </div>
    </div>
    <script type="text/javascript">
     function search_resource() {
        val = $('.search-resource-input').val();
       $.get('config/school/pagination2.php',{val:val}, function(data)
       {
        search = $('.search-resource-input').val().trim();
        showRecordsResources(10, 1,search);
       })
    }
    function showRecordsResources(perPageCount, pageNumber,search) {
        $.ajax({
            type: "GET",
            url: "config/school/pagination2.php",
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
        showRecordsResources(10, 1);
    });
</script>
 </div>
  <script type="text/javascript">
    $('.upload-close').click(function()
    {
        $('.resources-info').slideUp(100);
    })

    $('.upload-resources').click(function()
    {
        $('.resources-info').slideDown(100);
    })
</script>