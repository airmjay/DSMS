getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()
$(document).on('click', '.submitName-class', function()
{
	className = $('.className-class').val().trim().replace(/\s+/g, ' ');
	T_name = $('.teacherName-class').val().trim().replace(/\s+/g, ' ');

	$.post('config/school/school5.php', {getdb:getdb,className:className,T_name:T_name}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    scrollDiv()
	})
})
$(document).on('click', '.submitName-class1', function()
{
	className1 = $('.className-class1').val().trim().replace(/\s+/g, ' ');
	T_name1 = $('.teacherName-class1').val().trim().replace(/\s+/g, ' ');
	id = $(this).val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school5.php', {getdb:getdb,className1:className1,T_name1:T_name1,id:id}, function(data)
	{
		$('.message-SAWES').html(data)
    scrollDiv()
	})
})

$(document).on('click', '.class-edit-101', function()
{
	classedit = $(this).val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school5.php', {getdb:getdb,classedit:classedit}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    scrollDiv()
	})
})

$(document).on('click', '.update_staff_profile_last', function()
{
	first = $('.first-profile-name').val().trim().replace(/\s+/g, ' ');
	last = $('.last-profile-name').val().trim().replace(/\s+/g, ' ')
	email = $('.email-profile-name').val().trim().replace(/\s+/g, ' ')
	phone = $('.phone-profile-name').val().trim().replace(/\s+/g, ' ')
	state  = $('.state-profile-name').val().trim().replace(/\s+/g, ' ')
	update_profile_staff = $(this).val().trim().replace(/\s+/g, ' ');
	password = $('.password-profile-name').val().trim().replace(/\s+/g, ' ')
	$.post('config/school/school5.php', {getdb:getdb,first:first,last:last,email:email,phone:phone,state:state,
		update_profile_staff:update_profile_staff,password:password}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    scrollDiv()
	})
})
$(document).on('click', '.update_staff_profile_last-1', function()
{
	first = $('.first-profile-name').val().trim().replace(/\s+/g, ' ');
	last = $('.last-profile-name').val().trim().replace(/\s+/g, ' ')
	email = $('.email-profile-name').val().trim().replace(/\s+/g, ' ')
	phone = $('.phone-profile-name').val().trim().replace(/\s+/g, ' ')
	state  = $('.state-profile-name').val().trim().replace(/\s+/g, ' ')
	update_profile_staff_1 = $(this).val().trim().replace(/\s+/g, ' ');
	password = $('.password-profile-name').val().trim().replace(/\s+/g, ' ')
	$.post('config/school/school5.php', {getdb:getdb,first:first,last:last,email:email,phone:phone,state:state,
		update_profile_staff_1:update_profile_staff_1,password:password}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    scrollDiv()
	})
})
$(document).on('click', '.set-up-resources', function()
{
  resoursesKing = $(this).val().trim().replace(/\s+/g, ' ');
  $.post('config/school/school5.php',{resoursesKing:resoursesKing,getdb:getdb}, function(data)
  {
  	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    scrollDiv()
  	location = '/auth';
  })
})
$(document).on('click','#Upload-Resources-load',function(e){
      e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload-resources')[0].files[0];
        name  =  $('.Name-resourse-real').val();
        classname  =  $('.Class-resourse-real').val();
        teacher  =  $('.Teacher-resourse-real').val();
        fd.append('name', name);
        fd.append('classname', classname);
        fd.append('teacher', teacher);
        fd.append('file',files);
        fd.append('db', getdb);
        $.ajax({
            url: 'config/school/image-school-resources.php',
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
    });
$(document).on('click', '.resources-edit-101', function()
{
	value_resources = $(this).val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school5.php',{getdb:getdb,value_resources:value_resources}, function(data)
	{
		$('.message-div-display-2').slideDown(100);
    	$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    	scrollDiv()
	})
})
$(document).on('click', '.update-resourse-10101', function()
{
	name = $('.resources-up-update-1').val().trim().replace(/\s+/g, ' ')
	teacher = $('.Teacher-resourse-real-1').val().trim().replace(/\s+/g, ' ')
	classy = $('.Class-resourse-real-1').val().trim().replace(/\s+/g, ' ')
	value_resources_update = $(this).val().trim().replace(/\s+/g, ' ');
	// alert(value_resources_update);
	$.post('config/school/school5.php',{getdb:getdb,value_resources_update:value_resources_update,
		name:name,teacher:teacher,classy:classy
	},
	function(data)
	{
		$('.message-div-display-2').slideDown(100);
    	$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    	scrollDiv()
	})
})
$(document).on('click','.create-question-11', function()
{
	create_question = $(this).html();
	$.post('config/school/school5.php',{getdb:getdb,create_question:create_question}, function(data)
	{
		$('.message-div-display-2').slideDown(100);
    	$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    	scrollDiv()
		location = '/auth';
	})
})
token = 1;
$(document).on('click','.get-rand', function()
{
	if(token == 1){
	rand = 'Q'+ Math.random();
	input = $('.input-get-random').val();
	if(input === ""){
	$('.input-get-random').val(rand);
	$(this).val(rand);
	token = 2;
	}else
	{
		$(this).val(input);
	}
	}else
	{
		alert('Token already generated error(501)');
	}
})

$(document).on('click','.make_question_reg',function(e){
      e.preventDefault();
        var fd = new FormData();
        // alert('working');
        class_name = $('.input-basic-question-class').val().trim().replace(/\s+/g, ' ');
		q1 = $('.input-basic-question-question').val().trim().replace(/\s+/g, ' ');
		a1 = $('.input-basic-question-a').val().trim().replace(/\s+/g, ' ');
		a2 =$('.input-basic-question-b').val().trim().replace(/\s+/g, ' ');
		a3 =$('.input-basic-question-c').val().trim().replace(/\s+/g, ' ');
		a4 =$('.input-basic-question-d').val().trim().replace(/\s+/g, ' ');
		section1 = $(this).val().trim().replace(/\s+/g, ' ');
		email = $('.input-basic-question-email').val().trim().replace(/\s+/g, ' ');
		v1 = $('.get-rand').val(); 
		v2 = $('.input-get-random').val();
		if(v1 === v2)
		{
		    var files = $('.input-basic-question-picture')[0].files[0];
	        fd.append('classname', class_name);
	        fd.append('q1', q1);
	        fd.append('a1', a1);
	        fd.append('a2',a2);
	        fd.append('a3',a3);
	        fd.append('a4',a4);
	        fd.append('section',section1);
	        fd.append('email',email);
	        fd.append('v1', v1);
	        fd.append('db', getdb);
	        fd.append('file', files);
	        $.ajax({
	            url: 'config/school/upload-question-db.php',
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
		}else
		{
			alert('Token is incorrect');
		}
	    
    });
$(document).on('click','.make_question_reg_1',function(e){
      e.preventDefault();
        var fd = new FormData();
        // alert('working');
        class_name = $('.input-basic-question-class').val().trim().replace(/\s+/g, ' ');
		q1 = $('.input-basic-question-question-1').val().trim().replace(/\s+/g, ' ');
		section2 = $(this).val().trim().replace(/\s+/g, ' ');
		email = $('.input-basic-question-email').val().trim().replace(/\s+/g, ' ');
		v1 = $('.get-rand').val(); 
		v2 = $('.input-get-random').val();
		if(v1 === v2)
		{
		    var files = $('.input-basic-question-picture-1')[0].files[0];
	        fd.append('classname', class_name);
	        fd.append('q1', q1);
	        fd.append('section',section2);
	        fd.append('email',email);
	        fd.append('v1', v1);
	        fd.append('db', getdb);
	        fd.append('file', files);
	        $.ajax({
	            url: 'config/school/upload-question-db1.php',
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
		}else
		{
			alert('Token is incorrect');
		}
	    
    });
$(document).on('click','.token-get-copy', function()
{
	text = $(this).val();
	tempInput = $("<input>");
	$("body").append(tempInput);
	tempInput.val(text).select();
	document.execCommand("copy");
	tempInput.remove();
	alert("Text copied:" + text);
})
$(document).on('click', '.print-question-get', function()
{
	idprint = $(this).val();
	$.post('config/school/school5.php', {idprint:idprint,getdb:getdb}, function(data)
	{
		$('.print-sample-div').html(data);
		$('.print-sample-div').printThis();
	})
})

$(document).on('click', '.students_id_result', function()
{
	idStudent = $('[name="student-adm"]').val().trim().replace(/\s+/g, ' ');
	result = $('.term-get-id-result').val().trim().replace(/\s+/g, ' ');
	subject = $('.term-get-subject').val().trim().replace(/\s+/g, ' ');
	Tscore = $('.term-get-test-score').val().trim().replace(/\s+/g, ' ');
	Escore = $('.term-get-exam-score').val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school5.php', {result:result,idStudent:idStudent,getdb:getdb,subject:subject,
		Tscore:Tscore,Escore:Escore}, function(data)
	{
		$('.message-div-display-2').slideDown(100);
	    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
	    scrollDiv()
	})
})
count = 0;
$(document).on('click','[name="search-result-button"]', function()
{
	$('#form_upload_subject_result-1').html('')	
	search_result = $('.search_algorithm').val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school5.php',{search_result:search_result,getdb,getdb}, function(data)
	{
		$('.message-div-display-2').slideDown(100);
	    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
	    scrollDiv()
	})
})
$(document).on('click', '.print_id_result', function()
{
	$('.Printer_1').printThis();
})
$(document).on('click', '.php-edit-script', function()
{

	idX = $(this).val().trim().replace(/\s+/g, ' '); 
	term = $(".php-edit-script-term"+idX).val().trim().replace(/\s+/g, ' ');
	subject = $(".php-edit-script-subject"+idX).val().trim().replace(/\s+/g, ' ');
	exam = $(".php-edit-script-exam"+idX).val().trim().replace(/\s+/g, ' ');
	test = $(".php-edit-script-test"+idX).val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school5.php',{getdb:getdb,term:term,subject:subject,exam:exam,test:test,idX:idX},
		function(data)
		{
		$('.message-div-display-2').slideDown(100);
	    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)	
	    scrollDiv()
		})
})

$('.logout-session-1').click(function()
{
  logout1 = $(this).val();
  $.post('config/logout.php',{logout1:logout1},function(data)
  {
  	$('.message-div-display').html(data)

  })
  // alert("You have successfully login")
    
})
$('.logout-session-2').click(function()
{
  logout2 = $(this).val();
  $.post('config/logout.php',{logout2:logout2},function(data)
  {
  	$('.message-div-display').html(data)
  })
  // alert("You have successfully login")
    
})
// transcript-identity
$(document).on('click','.transcript-search', function()
{
	email = $('.transcript-identity').val().trim().replace(/\s+/g, ' ');
	email2= $('.transcript-identity-1').val().trim().replace(/\s+/g, ' ');
	$.post('config/school/transcript.php',{getdb:getdb,email2:email2,email:email}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
	 $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
	 scrollDiv()	
	})
})

$(document).on('click','.accept-transcript-form', function()
{

	email_form = $('.email-form-transcript').html();
	email_to = $('.email-to-transcript').html();
	student_id = $('.id-form-transcript').html();

	$.post('config/school/transcript.php',{getdb:getdb,email_form:email_form,email_to:email_to,student_id:student_id},
		function(data)
		{
			$('.message-div-display-2').slideDown(100);
	 $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)		
	 scrollDiv()
		})

})
$(document).on('click','.School-transcript-run', function()
{
	student = $('.student-name-transcript').val().trim().replace(/\s+/g, ' ');
	student_id = $('.student-id-name-transcript').val().trim().replace(/\s+/g, ' ');
	school_text = $('.school-text-name-transcript').val().trim().replace(/\s+/g, ' ');
	school_select = $('.student-select-name-transcript').val().trim().replace(/\s+/g, ' ');
	reason = $('.student-reason-name-transcript').val().trim().replace(/\s+/g, ' ');
	location1 = $('.student-location-name-transcript').val().trim().replace(/\s+/g, ' ');
	email = $('.student-email-name-transcript').val().trim().replace(/\s+/g, ' ');
	$.post('config/school/transcript.php',{getdb:getdb,student:student,student_id:student_id,school_text:school_text,
		school_select:school_select,reason:reason,location1:location1,email:email}, function(data)
		{
			$('.message-div-display-2').slideDown(100);
	    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
	    scrollDiv()
		})
})
$(document).on('click', '.api-del-button-1-upload', function()
{
  api_payment = $('.api-del-1').val();
  payemnt_api = 'payment';
  if(api_payment == '')
  {
  		swal('Invalid', 'payment api field require', 'error');

  }else{
  $.post('config/school/setting/update.php', {getdb:getdb,api_payment:api_payment,payemnt_api:payemnt_api},
  	function(data)
  	{
  		swal('Success', data, 'success');
  	})
}
})
$(document).on('click', '.api-del-button-2-upload', function()
{

  api_chat = $('.api-del-2').val();
  chat_api = 'chat';
  if(api_chat == '')
  {
  		swal('Invalid', 'chat api field require', 'error');

  }else{
  $.post('config/school/setting/update.php', {getdb:getdb,api_chat:api_chat,chat_api:chat_api},
  	function(data)
  	{
  		swal('Success', data, 'success');
  	})
}
})
$(document).on('click', '.api-del-button-2-upload', function()
{
	
})
$(document).on('change','#upload-preview-school', function()
{
	imagePreview('upload-preview-school','img-to-preview-school');
})
$(document).on('change','#image-upload', function()
{
	imagePreview('image-upload','img-to-preview-profile');
})
$(document).on('change','#image-upload-teacher', function()
{
	imagePreview('image-upload-teacher','image-preview-teacher');
})
 
$(document).on('change','#image-upload', function()
{
	imagePreview('image-upload','image-preview');
})
$(document).on('change','#image-upload-std', function()
{
	imagePreview('image-upload-std','image-preview-std');
})
$(document).on('change','#image-upload-prt', function()
{
	imagePreview('image-upload-prt','image-preview-prt');
})


function imagePreview(imgInp,img){
id = document.getElementById(imgInp);
src = document.getElementById(img)
  const [file] = id.files
  if (file) {
    src.src = URL.createObjectURL(file)
  }
}
function scrollDiv() {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
}