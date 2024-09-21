getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()
$(document).on('click', '.add-student-button-reg', function()
{
	
	first = $('.student-name-check').val().trim()
	surname = $('.student-surname-check').val().trim()
	other = $('.student-other-check').val().trim()
	address = $('.student-address-check').val().trim()
	birth = $('.student-birth-check').val().trim()
	email = $('.student-email-check').val().trim()
	classy = $('.student-class-check').val().trim()
	post = $('.student-post-check').val().trim()
	password = $('.student-password-check').val().trim()
	cpassword = $('.student-cpassword-check').val().trim()
	save = $('.student-save-check').val().trim()
	$.post('config/school/school3.php',{getdb:getdb,first:first,surname:surname,other:other,
	address:address,birth:birth,email:email,password:password,cpassword:cpassword,save:save,
	post:post,classy:classy}, function(data)
	{
    scrollDiv()
    
		$('.message-div-display-2').slideDown(100);
        $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
        if($('.student-save-check').is(':checked'))
        {
        	$('#Table_id_print_std').printThis();
        }
	})
})
$(document).on('click', '.take-attendance-std', function()
{
	attendance = $(this).val();
  emailattend = getid;
	$.post('config/school/school4.php',{emailattend:emailattend,getdb:getdb,attendance:attendance}, function(data)
	{
	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
    scrollDiv()
	})
})
$(document).on('click', '.create-attendance-std', function()
{

	$('.Attendance-list-std').each(function()
    {
    	if(this.checked === true)
    	{
    		single1 = $(this).val()
    		$.post('config/school/school4.php',{getdb:getdb,single1:single1},
    			function(data)
    			{
    				$('.attend-alert-std').html(data)
    			})
    	}else
    	{
    				$('.attend-alert-std').html('no checkbox is check')
    	}
    })

})
$(document).on('click', '.create-attend-std', function()
{
	single = $(this).val();
	$.post('config/school/school4.php', {getdb:getdb,single:single}, function(data)
	{
    	$('.attend-alert-std').html(data)
	})
})


$(document).on('click', '.button-std-get-view-2', function()
{
		unique =  $(this).val().trim();
	$.post('config/school/school4.php', {unique:unique,getdb:getdb}, function(data)
	{

	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
    scrollDiv()

	// swal(data)
 //    .then((value) => {
      
 //    });
	})
})
$(document).on('click', '.button-std-edit-view-2', function()
{
	uniquex =  $(this).val().trim();
	$.post('config/school/school4.php', {uniquex:uniquex,getdb:getdb}, function(data)
	{

	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
    scrollDiv()

	
	})
})
$(document).on('click', '.update-std-profile', function()
{
  first = $('.first-std-update').val().trim();
  last = $('.last-std-update').val().trim();
  post = $('.post-std-update').val().trim();
  email = $('.email-std-update').val().trim()
  other = $('.other-std-update').val().trim()
  birth = $('.birth-std-update').val().trim();
  address = $('.address-std-update').val().trim();
  password = $('.Password-std-update').val().trim();
  singlex = $('.update-std-profile').val().trim();
  clas = $('.class-std-update').val().trim(); 
    $.post('config/school/school4.php', {clas:clas,address:address,singlex:singlex,password:password,
    	getid:getid,getdb:getdb,first:first
      ,last:last,post:post,email:email,
      other:other,birth:birth},
      function(data)
      {
       	    swal(data)
		.then((value) => {
			      
			    }); 
      }
      )
})
$(document).on('click', '.update-prt-profile', function()
{
  first = $('.first-prt-update').val().trim();
  last = $('.last-prt-update').val().trim();
  email = $('.email-prt-update').val().trim()
  other = $('.other-prt-update').val().trim()
  address = $('.address-prt-update').val().trim();
  password = $('.Password-prt-update').val().trim();
  p_id = $('.p_id-prt-update').val().trim();
  singlexprt = $('.update-prt-profile').val().trim();
    $.post('config/school/school4.php', {address:address,singlexprt:singlexprt,password:password,
    	getdb:getdb,first:first
      ,last:last,email:email,
      other:other,p_id:p_id},
      function(data)
      {
       	    swal(data)
		.then((value) => {
			      
			    }); 
      }
      )
})
$(document).on('click', '.parent-save-check', function()
{
  first = $('.parent-name-check').val().trim()
  surname = $('.parent-surname-check').val().trim()
  other = $('.parent-other-check').val().trim()
  address = $('.parent-address-check').val().trim()
  email = $('.parent-email-check').val().trim()
  p_id = $('.parent-id-check').val().trim()
  password = $('.parent-password-check').val().trim()
  cpassword = $('.parent-cpassword-check').val().trim()
  parent = $('.parent-save-check').val().trim()
  $.post('config/school/school4.php', {parent:parent,getdb:getdb,first:first,surname:surname,other:other,address:address,
  	email:email,p_id:p_id,password:password,cpassword:cpassword},
  	function(data)
  	{
  		$('.message-div-display-2').slideDown(100);
        $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
        scrollDiv()
        if($('.parent_print_pdf').is(':checked'))
        {
        	$('#Table_id_print_prt').printThis();
        }
  	})
})


$(document).on('click', '.button-prt-get-view-2', function()
{
	uniqueprt =  $(this).val().trim();
	$.post('config/school/school4.php', {uniqueprt:uniqueprt,getdb:getdb}, function(data)
	{

	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
    scrollDiv()

	// swal(data)
 //    .then((value) => {
      
 //    });
	})	
})
$(document).on('click', '.button-prt-edit-view-2', function()
{
	uniquexstd =  $(this).val().trim();
	$.post('config/school/school4.php', {uniquexstd:uniquexstd,getdb:getdb}, function(data)
	{

	$('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
    scrollDiv()

	
	})	
})
$(document).on('click', '.example', function()
{
	
})
$(document).on('click','#but_upload_std',function(e){
      e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload-std')[0].files[0];
        id  =  $('.staff_id_std').val();
        fd.append('id', id);
        fd.append('file',files);
        fd.append('db', getdb);
        $.ajax({
            url: 'config/school/image-school-student.php',
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
    $(document).on('click','#but_upload_prt',function(e){
      e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload-prt')[0].files[0];
        id  =  $('.staff_id_prt').val();
        fd.append('id', id);
        fd.append('file',files);
        fd.append('db', getdb);
        $.ajax({
            url: 'config/school/image-school-parent.php',
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
  function scrollDiv() {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
}