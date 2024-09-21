getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()
unique = $('.me_id').val()
receiver = $('.unique_id_get_message').val();
$(document).on('change','.search-user-chat', function()
{
	search = $(this).val().trim();
	$.post('config/school/message.php', {unique:unique,getdb:getdb,search:search}, function(data)
	{
		$('.message-area').html(data)
	})
})
$(document).on('click', '.setup-message-table', function()
{
	messageDb = $(this).html();
	$.post('config/school/message.php', {unique:unique,getdb:getdb,messageDb:messageDb}, function(data)
	{
		alert(data);
		location = '/auth'
	})	
})
$(document).on('click','.chat-add-staff', function()
{
	add_list1 = $(this).val().trim();
	search = $('.search-user-chat').val().trim();
	$.post('config/school/message.php',{search:search,unique:unique,getdb:getdb
		,add_list1:add_list1}, function(data)
	{
		$('.message-area').html(data)

	})
})
$(document).on('click','.chat-add-teacher', function()
{
	add_list2 = $(this).val().trim();
	search = $('.search-user-chat').val().trim();
	$.post('config/school/message.php',{search:search,unique:unique,getdb:getdb
		,add_list2:add_list2}, function(data)
	{
		$('.message-area').html(data)

	})
})
$(document).on('click','.chat-add-student', function()
{
	add_list4 = $(this).val().trim();
	search = $('.search-user-chat').val().trim();
	$.post('config/school/message.php',{search:search,unique:unique,getdb:getdb
		,add_list4:add_list4}, function(data)
	{
		$('.message-area').html(data)

	})
})
$(document).on('click','.chat-add-parent', function()
{
	add_list3 = $(this).val().trim();
	search = $('.search-user-chat').val().trim();
	$.post('config/school/message.php',{search:search,unique:unique,getdb:getdb
		,add_list3:add_list3}, function(data)
	{
		$('.message-area').html(data)

	})
})
check = 0;
$(document).on('click','.message-sent-query', function()
{
	messageContent = $('.message-content').val().trim();
	status = $('.message-check-status-reg').val().trim();
	if(messageContent == '')
	{
		alert('message is required');
		check = 1;
	}else if(status == '')
	{
		alert('Please select a user');
		check = 1;

	}
	if(check == 0)
	{
		
	}

})
$.post('config/school/message.php',{getdb:getdb,messageContent:messageContent,status:status,unique:unique,
			receive:receive},
			function(data)
			{
			$('.message-area').html(data)	
			$('.message-content').val('')

			})