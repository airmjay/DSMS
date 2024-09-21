getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()
name = $('.verify_id_name').val()
$(document).on('change', '.child-profile-search', function()
{
	search_val = $(this).val().trim();

	$.post('config/parent/child.php', {getid:getid,getdb:getdb,name:name,getdb:getdb,search_val:search_val}, function(data)
	{

	$('.card-profile-color-top-child').html(data);
	})

})
$(document).on('click', '.class-print-result', function()
{
	$('.result-printer').printThis();
})
$(document).on('click', '.parent-result-search', function()
{
	id = $('.child_id_get').val();
	class1 = $('.class_id_get').val();
	term = $('.term_id').val();
	test = 1;
	if(term == '')
	{
		test = 0;
	swal('Term is required')
	.then((value) => {
	  
	});
	}
	if(id == '')
	{
		test = 0;
	swal('Id is required')
	.then((value) => {
	  
	});
	}
	if(test == 1){
		$.post('config/parent/child.php', {name:name,getdb,getdb,id:id,class1:class1,term:term}, function(data)
		{	
		$('.result_table_algo').html(data)
	})
	}
})