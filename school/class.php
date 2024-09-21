<div class="position-relative card p-3">
	<div class="d-flex justify-content-between align-items-center">
		<span><b>CLASS SECTION</b></span>   
		<button class="btn btn-success btn-sm create-class sm">Create Class</button>
	</div>
	<input type="search" placeholder="Enter the class name of are finding" class="form-control form-control-sm mb-2 mt-2" name="">
	<div id="container6">
        <div id="inner-container6">
            <div id="results6"></div>
            <div id="loader6"></div>

        </div>
    </div>
    <script type="text/javascript">
    function showRecordsClass(perPageCount, pageNumber) {
        $.ajax({
            type: "GET",
            url: "config/school/pagination7.php",
            data: "pageNumber=" + pageNumber,
            cache: false,
            beforeSend: function() {
                $('#loader6').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');     
            },
            success: function(html) {
                $("#results6").html(html);
                $('#loader6').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecordsClass(10, 1);
    });
</script>
    
    
    <div class="class-info bg-light p-2">
    	<div class="d-flex align-items-center justify-content-between">
    		<span class="font-weight-900"><b>CREATE NEW CLASS</b></span> 
    		<button class="btn btn-danger close-info-class sm">Close</button>
    	</div>	
        <form id='Table-class-add-id'>
 		<div class="class-info-div">
 			<div class="row">
 				<div class="col-lg-6 col-lx-6 col-12">
 					<label>Class Name</label>
 					<input type="text" class="form-control form-control-sm className-class" placeholder='Enter Class Name' name="">
 				</div>
 				<div class="col-lg-6 col-lx-6 col-12">
 					<label>Class Teacher</label>
 					<select class="form-control form-control-sm teacherName-class">
                        <?php 
                        $conn = mysqli_connect('localhost','root','',$random);
                        $select = "SELECT * FROM `teacher`";
                        $row1 = mysqli_query($conn, $select);
                        if(mysqli_num_rows($row1)){
                        while ($row = mysqli_fetch_array($row1)) {
                        ?>
                        <option value="<?=$row['uniqid_id']?>"><?= $row['firstName'] .' '. $row['surName'] .' '. $row['id']  ?></option>    
                    <?php  }}else{ 
                        echo "<option>No Teacher</option>";    

                        }?>


                    </select>
 				</div>
 			 	<div class="col-lg-6 col-lx-6 col-12 mt-2">
 					
 					<button type="button"  class='btn btn-primary btn-sm sm submitName-class' placeholder='Enter Class Name' name="">Add Class</button>
 				</div>
                </form>
 			</div>
 		</div>
    </div>
</div>
 <script type="text/javascript">
	$('.close-info-class').click(function()
	{
		$('.class-info').slideUp(100);
	})

	$('.create-class').click(function()
	{
		$('.class-info').slideDown(100);
	})
</script>