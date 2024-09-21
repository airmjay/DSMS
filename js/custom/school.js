$(document).on('click', '.name-activate-button', function()
{
		firstname = $('.name-reg-first-name').val().trim(),
		loca = $('.name-reg-location').val().trim()
		phone = $('.name-reg-phone').val().trim()
		secondName = $('.name-reg-last-name').val().trim()
		state = $('.name-reg-state').val().trim()
		dob = $('.name-reg-birth').val().trim()
		$.post('render/regschool.php', {firstname:firstname,loca:loca,phone:phone,secondName:secondName,
			state:state,dob:dob}, function(data)
		{
			$('.message-div-display-2').slideDown(100);
    		$('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
		})
})

$(document).on('click','.close-my-custom-alert',function()
{
    $('.message-div-display-2').slideUp();

})
 $('.message-div-display-2').slideUp();
 $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
