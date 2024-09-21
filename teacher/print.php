<!-- <a href='school/fpdf.php' target="_blank">Print</a> -->
<div class="position-relative card p-3">
    <div class="d-flex justify-content-between align-items-center">
        <span><b>PRINT TEST/EXAMINATION-PAPER</b></span>  
        <button class="btn btn-success btn-sm create-test sm">Create Test/Exam</button>
    </div>
    
    <input type="search" placeholder="Enter Topic Name to Search" class="form-control form-control-sm mb-2 mt-2 search-print-examination" onkeyup="search_print()" name="">
        <div id="container3">
        <div id="inner-container3">
            <div id="results3"></div>
            <div id="loader3"></div>

        </div>
    </div>
    <script type="text/javascript">
    function search_print() {
        val = $('.search-print-examination').val();
       $.get('config/school/pagination3.php',{val:val}, function(data)
       {
        search = $('.search-print-examination').val().trim();
        showRecordsPrint(10, 1,search);
       })
    }
    function showRecordsPrint(perPageCount, pageNumber,search) {
        $.ajax({
            type: "GET",
            url: "config/school/pagination3.php",
            data: {pageNumber : pageNumber, search:search},
            cache: false,
            beforeSend: function() {
                $('#loader3').html('<img src="img/loader.png" alt="reload" width="20" height="20" style="margin-top:10px;">');     
            },
            success: function(html) {
                $("#results3").html(html);
                $('#loader3').html(''); 
            }
        });
    }
    
    $(document).ready(function() {
        showRecordsPrint(10, 1,'');
    });
</script>        
    <div class="print-info bg-light p-2">
        <div class="d-flex align-items-center justify-content-between">
            <button value="" class="btn-primary btn-sm sm get-rand">Get token/and Setup</button> 
            <button class="btn btn-danger close-info-print sm">Close</button>
        </div>  
        <input class="form-control form-control-sm mt-2 input-basic-question-email" type="text" value='<?= $email ?>'  
        placeholder="" readonly>
        <div class="print-info-div bg-light p-3">
            <div class="d-flex align-items-center justify-content-between mt-2">
                <span>Token:</span> 
                <input type="text" value='' placeholder="Dont forget to copy your random for next entry/Enter your Token to set Question" name="" 
                class="form-control form-control-sm ml-2 input-get-random">
            </div>
            <div class="align-items-center justify-content-between mt-2">
                <span>Class: example = Enter class with date,year,course Basic1/6-13-2024/course. </span> 
                <input type="text" value='' placeholder="Enter class with date and year Basic3/6-13-2024." name="" 
                class="form-control form-control-sm input-basic-question-class">
            </div>

            <form id='form_question_1_get_empty'>
            <label class="mt-2">Question Section A:</label>
            <textarea class="form-control-sm form-control input-basic-question-question" placeholder="enter your Question">
            </textarea>
            <label class="mt-2"><i>If picture Exist Select:</i></label>
            <input type="file" class='input-basic-question-picture'name="">
            <div class="row">
                <div class="col-12">
                    <i class="itatic">Options:</i>
                </div>
                <div class="col-lg-6 col-lx-6 col-12 d-flex align-items-center mb-2">
                    <span>A:</span>
                    <input type="text" class="form-control input-basic-question-a form-control-sm ml-2" name="">
                </div>
                <div class="col-lg-6 col-lx-6 col-12 d-flex  align-items-center mb-2">
                    <span>B:</span>
                    <input type="text" class="form-control input-basic-question-b form-control-sm ml-2" name="">
                </div>
                <div class="col-lg-6 col-lx-6 col-12 d-flex align-items-center mb-2">
                    <span>C:</span>
                    <input type="text" class="form-control input-basic-question-c form-control-sm ml-2" name="">
                </div>
                <div class="col-lg-6 col-lx-6 col-12 d-flex align-items-center mb-2">
                    <span>D:</span>
                    <input type="text" class="form-control input-basic-question-d form-control-sm ml-2" name="">
                </div>
                <div class="col-lg-6 col-lx-6 col-12 d-flex align-items-center mb-2">
                     <button type="button" class="make_question_reg bnt btn-sm btn-primary sm" value="section_a" name="">Upload Question</button>
                </div>
            </div>
            </form>
            <hr>
            <form id='form_question_2_get_empty'>
            <label class="mt-2">Question Section B: 
                <span class="text-danger"> Note: Enter One question per input</span>
            </label><br>
            <label class="mt-2"><i>If picture Exist Select:</i></label>
            <input type="file" class="input-basic-question-picture-1"  name="">
            <textarea class="form-control-sm form-control input-basic-question-question-1">
            </textarea>
            <button class="btn btn-primary sm mt-2 make_question_reg_1" value="section_b">Upload Question Section B</button>
            <hr>
            <label class="mt-2">Upload CSV</label>
            <div class="d-flex">
                <input type="file" name=""><button class="btn btn-primary sm">Upload CSV</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="print-sample-div d-none d-print-block"></div>
 <script type="text/javascript">
    $('.close-info-print').click(function()
    {
        $('.print-info').slideUp(100);
    })

    $('.create-test').click(function()
    {
        $('.print-info').slideDown(100);
    })
</script>