<b class="big">Resources Market Place</b>
<div class="position-relative card p-3">
<div class="justify-content-between align-items-center mb-4"> 
 <button class="btn btn-primary btn-sm sm upload-resources ml-auto mb-2">Upload</button>
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
        showRecordsResources(10, 1, '');
    });
</script>
  <div class="resources-info">
    <div class="bg-light book-author-details p-3">
    <div class="d-flex justify-content-between align-items-center"> 
        <span><b>Upload Resourse</b></span><button class="btn btn-danger sm upload-close">Close</button>
    </div>
        
        <?php
        $conn = mysqli_connect('localhost','root','', $random);
         $select = "SHOW TABLES LIKE 'resources'";
         $row1 = mysqli_num_rows(mysqli_query($conn,$select));
         if($row1)
         {?>
         <form id='form_regis_get_empty'>
         <div class="row mt-2">
        <div class="col-lg-6 col-lx-6 col-12">
        <label>Choose Resource</label>
        <input id='image-upload-resources' type="file" name="" class="d-block">
        </div>
        <div class="col-lg-6 col-lx-6 col-12">
        <label>Book Name</label>
        <input  type="text" name="" class="form-control form-control-sm sm Name-resourse-real">
        </div>
        <div class="col-lg-6 col-lx-6 col-12">
        <label>Course Tutor</label>
        <select class="form-control-sm form-control Teacher-resourse-real">
            <?php 
                        $conn = mysqli_connect('localhost','root','',$random);
                        $select = "SELECT * FROM `teacher`";
                        $row1 = mysqli_query($conn, $select);
                        if(mysqli_num_rows($row1)){
                        while ($row = mysqli_fetch_array($row1)) {
                        ?>
                        <option value="<?= $row['firstName'] .' '. $row['surName'] .' '. $row['id']  ?>"><?= $row['firstName'] .' '. $row['surName'] .' '. $row['id']  ?></option>    
                    <?php  }}else{ 
                        echo "<option>No Teacher</option>";    

           }?>
        </select>
        </div>
        <div class="col-lg-6 col-lx-6 col-12">
        <label>Select Class</label>
        <select class="form-control-sm form-control Class-resourse-real">
        <?php
            $conn = mysqli_connect('localhost','root','',$random);
                        $select = "SELECT * FROM `class`";
                        $row1 = mysqli_query($conn, $select);
                        if(mysqli_num_rows($row1)){
                        while ($row = mysqli_fetch_array($row1)) {
                        ?>
                        <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>    
                    <?php  }}else{ 
                        echo "<option>No Class/option>";    

                        }?>
        </select>
        </div>
        <div class="col-lg-6 col-lx-6 col-12">
        <button class='btn btn-primary sm mt-2' id='Upload-Resources-load'>Upload Resource</button>
            </div>
            </div>
        </form>
        <?php }else{
            ?>
        <button class='btn btn-primary sm mt-2 set-up-resources'>Set up Resources</button>

            <?php
        }
        ?>

    </div>
  </div>
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