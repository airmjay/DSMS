getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()

$(document).on('click', '.change_school_name', function()
{
	name_school = $(this).html();
	name_text = $('.change_school_name_text').val().trim().replace(/\s+/g, ' ');;
	$.post('config/school/setting/update.php',{name_school:name_school,getid:getid,getdb:getdb,name_text:name_text},
		function(data)
	{
		
		$('.message-div-display-2').slideDown(100);
        $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);	

	})
	scrollDiv()
})
$(document).on('click', '.school_image_home_rec', function()
{
	setting = $(this).val().replace(/\s+/g, ' ');;
	$.post('config/school/school_setting.php',{setting:setting,getdb:getdb}, function(data)
	{
		$('.message-div-display-2').slideDown(100);
        $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
        scrollDiv()
	})
})
$(document).on('click', '.home-screen-1-upload', function()
{
	val = $(this).val().replace(/\s+/g, ' ');;
	file = $('.home-screen-1');
	home_image_upload(val,file);

})
$(document).on('click', '.home-screen-2-upload', function()
{
	val = $(this).val().replace(/\s+/g, ' ');;
	file = $('.home-screen-2');
	home_image_upload(val,file);

})
$(document).on('click', '.home-screen-3-upload', function()
{
	val = $(this).val().replace(/\s+/g, ' ');;
	file = $('.home-screen-3');
	home_image_upload(val,file);

})
// 
$(document).on('click', '.home-feature-1-upload', function()
{
	val = $(this).val().replace(/\s+/g, ' ');;
	capture = $('.home-feature-'+val).val().trim();
	content_card(val,capture);

})
$(document).on('click','.home-about-2-upload', function()
{
	val = $(this).val().replace(/\s+/g, ' ');;
	file = $('.home-about-2');
	about_video_upload(val,file);
})
$(document).on('click','.home-about-1-upload', function()
{
	text_about = $(this).val().replace(/\s+/g, ' ');;
	content = $('.home-about-1').val().trim().replace(/\s+/g, ' ');;
	$.post('config/school/setting/update.php',{text_about,text_about,content:content,getdb:getdb},
		function(data)
		{
		$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
		scrollDiv()	
		}	
		)
})

$(document).on('click','.home-course-del-1-upload', function()
{
	delete1 = $(this).val().replace(/\s+/g, ' ');;
	value = $('.home-course-del-1').val().trim().replace(/\s+/g, ' ');;
	$.post('config/school/setting/update.php', {delete1:delete1,value:value,getdb:getdb}, function(data)
	{
		$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
		scrollDiv()
	})
})
$(document).on('click','.home-course-1-upload', function()
{
	content = $('.home-course-1').val().trim().replace(/\s+/g, ' ');;
	make = $(this).val();
	$.post('config/school/setting/update.php',{getdb:getdb,make:make,content:content}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
	$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
	scrollDiv()
	})
})
$(document).on('click','.home-teacher-1-upload',function()
{
 	val = $(this).val().replace(/\s+/g, ' ');;
	input_teacher = $('.home-text-teacher-'+val).val().trim().replace(/\s+/g, ' ');;
	teacher_id = $('.home-id-teacher-'+val).val().trim().replace(/\s+/g, ' ');;
	content_display(val,input_teacher,teacher_id);	
})
$(document).on('click','.home-blog-1-upload',function()
{
	val = $(this).val();
	caption = $('.home-blog-caption-'+val).val().trim().replace(/\s+/g, ' ');;
	inform = $('.home-blog-information-'+val).val().trim().replace(/\s+/g, ' ');;
	content = $('.home-blog-content-'+val).val().trim().replace(/\s+/g, ' ');;
	comment = $('.home-blog-comment-'+val).val().trim().replace(/\s+/g, ' ');;
	content_display_blog(caption,inform,content,comment,val);

})
$(document).on('click', '#but_upload_school_img', function()
{
  file = $('#upload-preview-school');
  val = getdb;
  school_image(val,file);
})
function school_image(val,file)
{
	    var fd = new FormData();
        var files = file[0].files[0];
        fd.append('file',files);
        fd.append('db', getdb);
        fd.append('id', val);
        $.ajax({
            url: 'config/school/setting/school-image.php',
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
function home_image_upload(val,file)
{
	    var fd = new FormData();
        var files = file[0].files[0];
        fd.append('file',files);
        fd.append('db', getdb);
        fd.append('id', val);
        $.ajax({
            url: 'config/school/setting/home-image.php',
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
function about_video_upload(val,file)
{
	    var fd = new FormData();
        var files = file[0].files[0];
        fd.append('file',files);
        fd.append('db', getdb);
        fd.append('id', val);
        $.ajax({
            url: 'config/school/setting/video.php',
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
function content_card(val,text)
{

	val = val;
	$.post('config/school/setting/update.php',{getdb,getdb,val:val,text:text},function
		(data)
		{
		$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
		scrollDiv()
		})
}
function content_display(val1,text1,T)
{
//field id input teacher

	$.post('config/school/setting/update.php',{getdb,getdb,val1:val1,text1:text1,T:T},function
		(data)
		{
		$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
		scrollDiv()
		})
}
function content_display_blog(blog1,blog2,blog3,blog4,idget)
{
//field id input teacher

	$.post('config/school/setting/update.php',{getdb,getdb,blog1:blog1,blog2:blog2,blog3:blog3,blog4:blog4
		,idget:idget},function
		(data)
		{
		$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
		scrollDiv()
		})
}

$(document).on('click','.Authentification_update',function()
{
	status = $('.hold-status-code').val().replace(/\s+/g, ' ');;
	authenticate = $(this).val().replace(/\s+/g, ' ');
	authenID = $('.authenticate_code').val().replace(/\s+/g, ' ');;
	if($('.hold-status-code').val() === ''){

		alert('select as level please');
	}else{
	$.post('config/school/setting/update.php',{getdb:getdb,authenticate:authenticate,status:status,authenID:authenID},function(data)
	{
		$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
		scrollDiv()
	})
}
})
$(document).on('change','.add-status', function()
{

	$('.hold-status-code').val($(this).val());
	
})
$(document).on('click','.student-del-button-1-upload', function()
{
	student_del = $('.student-del-1').val().trim().replace(/\s+/g, ' ');;
	$.post('config/school/setting/update.php',{getdb:getdb,student_del:student_del}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
		scrollDiv()	
	})	
})
$(document).on('click','.parent-del-button-1-upload', function()
{
	parent_del = $('.parent-del-1').val().trim().replace(/\s+/g, ' ');;
	$.post('config/school/setting/update.php',{getdb:getdb,parent_del:parent_del}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
		scrollDiv()		
	})	
})
$(document).on('click','.teacher-del-button-1-upload', function()
{
    teacher_del = $('.teacher-del-1').val().trim().replace(/\s+/g, ' ');;
	$.post('config/school/setting/update.php',{getdb:getdb,teacher_del:teacher_del}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
		scrollDiv()	
	})
})
$(document).on('click','.staff-del-button-1-upload', function()
{
staff_del = $('.staff-del-1').val().trim().replace(/\s+/g, ' ');;
$.post('config/school/setting/update.php',{getdb:getdb,staff_del:staff_del}, function(data)
{
$('.message-div-display-2').slideDown(100);
	$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
	scrollDiv()		
})
})
function scrollDiv() {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
}