adminID = $('.verify_id_get').val().trim();

$(document).on('click', '#but_upload_get', function(e)
{
     e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload121')[0].files[0];
        id  =  $('.school_id_change').val();
        fd.append('id', id);
        fd.append('file',files);
        fd.append('admin', adminID);
        $.ajax({
            url: 'config/upload-school-image.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response){
                    // $("#img").attr("src",response); 
                    // $(".preview img").show(); // Display image element
                    $('.message-div-display-2').slideDown(100);
                    $('.message-div-display-2 .display-items-1 .detail-div-1').html(response);
                    scrollDiv()
                }
            },
        });


})