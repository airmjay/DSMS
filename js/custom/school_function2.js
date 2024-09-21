getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()

$(document).on('click', '.add-add-teacher', function()
{
	first = $('.first-add-teacher').val().replace(/\s+/g, ' ')
	other = $('.other-add-teacher').val().replace(/\s+/g, ' ')
	surname = $('.surname-add-teacher').val().replace(/\s+/g, ' ')
	post = $('.post-add-teacher').val().replace(/\s+/g, ' ')
	address = $('.location-add-teacher').val().replace(/\s+/g, ' ')
	cla = $('.class-add-teacher').val().replace(/\s+/g, ' ')
	date = $('.date-add-teacher').val().replace(/\s+/g, ' ')
	email = $('.email-add-teacher').val().replace(/\s+/g, ' ')
	password = $('.password-add-teacher').val().replace(/\s+/g, ' ')
	cpassword = $('.cpassword-add-teacher').val().replace(/\s+/g, ' ')
	save = $('.save-add-teacher').val().replace(/\s+/g, ' ')
	add_teach = $(this).html();
	$.post('config/school/school2.php',{add_teach:add_teach,first:first,other:other,surname:surname,
		post:post,address:address,getdb:getdb
		,cla:cla, date:date, email:email, password:password, cpassword:cpassword},
		function(data)
		{
		$('.message-div-display-2').slideDown(100);
        $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
        scrollDiv()
		}
		)
})
$(document).on('input', '.search-student-attendance-1', function()
{
	val_attend = $(this).val();
		$.post('config/school/school2.php', {val_attend:val_attend,getdb:getdb}, function(data)
	{
		$('.d-display-student-1').html(data)
	})
})

$(document).on('click', '.del-token-print-1', function()
{
	del_token = $(this).val()
	$.post('config/school/school2.php', {del_token:del_token,getdb:getdb},function(data)
	{
	  swal('Success', data, 'success');	
	})
})
$(document).on('click', '.del-token-print-2', function()
{
	del_token1 = $(this).val()
	$.post('config/school/school2.php', {del_token1:del_token1,getdb:getdb},function(data)
	{
	  swal('Success', data, 'success');	
	})
})
$(document).on('input', '.search-student-attendance-2', function()
{
	val_attend1 = $(this).val()
	$.post('config/school/school2.php', {val_attend1:val_attend1,getdb:getdb}, function(data)
	{
		$('.d-display-student-2').html(data)
	})
})

$(document).on('click', '.button-teacher-get-view-2', function()
{
	unique =  $(this).val()
	$.post('config/school/school2.php', {unique:unique,getdb:getdb}, function(data)
	{

	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
    scrollDiv()

	// swal(data)
 //    .then((value) => {
      
 //    });
	})
})
$(document).on('click', '.button-teacher-edit-view-2', function()
{
   uniquex =  $(this).val()
	$.post('config/school/school2.php', {uniquex:uniquex,getdb:getdb}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
 	scrollDiv()

	
	}) 
})
$(document).on('click','#but_upload_teacher',function(e){
      e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload-teacher')[0].files[0];
        id  =  $('.staff_id_teacher').val();
        fd.append('id', id);
        fd.append('file',files);
        fd.append('db', getdb);
        $.ajax({
            url: 'config/school/image-school-teacher.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response){
                    // $("#img").attr("src",response); 
                    // $(".preview img").show(); // Display image element
			                   swal(response)
			    .then((value) => {
			      
			    });
                }
            },
        });
    });
$(document).on('click', '.update-teacher', function()
{
  first = $('.first-teacher-update').val().trim().replace(/\s+/g, ' ');
  last = $('.last-teacher-update').val().trim().replace(/\s+/g, ' ');
  post = $('.post-teacher-update').val().trim().replace(/\s+/g, ' ');
  email = $('.email-teacher-update').val().trim().replace(/\s+/g, ' ')
  other = $('.other-teacher-update').val().trim().replace(/\s+/g, ' ')
  status = $('.Status-teacher-update').val().trim().replace(/\s+/g, ' ');
  address = $('.address-teacher-update').val().trim().replace(/\s+/g, ' ');
  password = $('.Password-teacher-update').val().trim().replace(/\s+/g, ' ');
  single = $('.update-teacher').val().trim().replace(/\s+/g, ' ');
  clas = $('.class-teacher-update').val().trim().replace(/\s+/g, ' '); 
    $.post('config/school/school2.php', {clas:clas,address:address,single:single,password:password,getid:getid,getdb:getdb,first:first
      ,last:last,post:post,email:email,
      other:other,status:status},
      function(data)
      {
       	    swal(data)
		.then((value) => {
			      
			    }); 
		// Diver();
      }
      )
})
$(document).on('click', '.teacher-attendance', function()
{
	attendance = $(this).val();
	$.post('config/school/school2.php',{getdb:getdb,attendance:attendance}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
	scrollDiv()
	})
})
$(document).on('click', '.create-attendance', function()
{

	$('.Attendance-list').each(function()
    {
    	if(this.checked === true)
    	{
    		single = $(this).val()
    		$.post('config/school/school3.php',{getdb:getdb,single:single},
    			function(data)
    			{
    				$('.attend-alert').html(data)
    			})
    	}else
    	{
    				$('.attend-alert').html('no checkbox is check')
    	}
    })

})
$(document).on('click', '.add-event-button', function()
{
	validate = $(this).val();
	$.post('config/school/school3.php',{getdb:getdb,validate:validate}, 
		function(data)
		{
			swal(data)
		.then((value) => {
			      
			    }); 	
		})
})

$(document).on('click', '[name="add-event-save"]', function()
{
	addEvent = $(this).val();
	event_name = $('[name="event-name"]').val().trim().replace(/\s+/g, ' ');
	event_date = $('[name="event-date"]').val().trim().replace(/\s+/g, ' ');
	event_content = $('[name="event-info"]').val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school3.php',{getdb:getdb,addEvent:addEvent,event_name:event_name,event_date:event_date,
		event_content:event_content}, 
		function(data)
		{
			$('.event-message').html(data)
		})
})

$(document).on('click', '.edit-event-1', function()
{
	editEvent = $(this).val();
	$.post('config/school/school3.php',{getdb:getdb,editEvent:editEvent}, 
	function(data)
	{
		$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);	
		scrollDiv()
	})
})
$(document).on('click', '.add-event-save-211', function()
{
	editDelete1 = $(this).val();
	$.post('config/school/school2.php',{getdb:getdb,editDelete1:editDelete1}, 
	function(data)
	{
		$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);	
		scrollDiv()
	})
})
$(document).on('click', '[name="add-event-save-1"]', function()
{
	addEvent1 = $(this).val();
	event_name1 = $('[name="event-name-1"]').val().trim().replace(/\s+/g, ' ');
	event_date1 = $('[name="event-date-1"]').val().trim().replace(/\s+/g, ' ');
	event_content1 = $('[name="event-info-1"]').val().trim().replace(/\s+/g, ' ');
	$.post('config/school/school3.php',{getdb:getdb,addEvent1:addEvent1,event_name1:event_name1,
		event_date1:event_date1,
		event_content1:event_content1}, 
		function(data)
		{
			$('.event-message-1').html(data)
		})
})
function scrollDiv() {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
}