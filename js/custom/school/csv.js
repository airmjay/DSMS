getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()
$(document).on('click','.staff_csv_upload', function()
{
    val = $(this).val();
    file = $('.StaffConfirmSVC');
    dir = 'staff_csv.php';

    csv(val,file,dir);
})
$(document).on('click','.teacher_csv_upload', function()
{
    val = $(this).val();
    file = $('.teacherConfirmCSV');
    dir = 'teacher_csv.php';

    csv(val,file,dir);
})

$(document).on('click','.upload_csv_result', function()
{
    val = $(this).val()
    file = $('.UploadCSVresult');
    dir = 'result_csv.php';
    csv(val,file,dir);
})
$(document).on('click','.student_csv_upload', function()
{
    val = $(this).val();
    file = $('.studentConfirmCSV');
    dir = 'student_csv.php';

    csv(val,file,dir);
})
$(document).on('click','.parent_csv_upload', function()
{
    val = $(this).val();
    file = $('.parentConfirmCSV');
    dir = 'parent_csv.php';

    csv(val,file,dir);
})
function csv(val,file,dir)
{
	    var fd = new FormData();
        var files = file[0].files[0];
        fd.append('file',files);
        fd.append('db', getdb);
        fd.append('id', val);
        $.ajax({
            url: 'config/school/'+dir,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response){
                    // $("#img").attr("src",response); 
                    // $(".preview img").show(); // Display image element
					$('.message-div-display-2').slideDown(100);
    				$('.message-div-display-2 .display-items-1 .detail-div-1').html(response)	
                    scrollDiv()	                
                }
            },
        });
    

}
function scrollDiv() {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
}