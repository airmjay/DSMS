
 // $('.message-div-display-2').slideDown(100);
 // $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
getid = $('.verify_id_get').val()
getdb = $('.verify_id_db').val()
$(document).on('click','.close-my-custom-alert',function()
{
    $('.message-div-display-2').slideUp();


})
$(document).on('click','.add-payment-reciept', function()
{
    parent = $('.parent-name-receipt').val().trim().replace(/\s+/g, ' ')
    id_receipt = $('.parent-id-receipt').val().trim().replace(/\s+/g, ' ')
    student_id  = $('.student-id-receipt').val().trim().replace(/\s+/g, ' ')
    student_class = $('.student-class-receipt').val().trim().replace(/\s+/g, ' ')
    add_payment = $(this).html();
    $.post('config/school/school6.php', {getdb:getdb,add_payment:add_payment,student_class:student_class,
        student_id:student_id,id_receipt:id_receipt,parent:parent}, function(data)
        {
               $('.message-div-display-2').slideDown(100);
            $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
            scrollDiv()
        })
})
$(document).on('input','.paymentbox-search', function()
{
    val_search_receipt = $(this).val().trim();
    $.post('config/school/school6.php', {getdb:getdb,val_search_receipt:val_search_receipt}, function(data)
    { 
        $('.receipt-div-101').html(data)
    })
})
$(document).on('click','.print-receipt-div-1', function()
{
    print_1 = $(this).val().trim();
    $.post('config/school/school6.php',{getdb:getdb,print_1:print_1}, function(data)
    {
        $('.receipt-div-print-click').html(data);
        $('.receipt-div-print-click').printThis();
    })
})
$(document).on('input','.paymentbox-search-1', function()
{
    // alert('ss')
    val_search_receipt_1 = $(this).val().trim().replace(/\s+/g, ' ');
    $.post('config/school/school6.php', {getdb:getdb,val_search_receipt_1:val_search_receipt_1}, function(data)
    {
        $('.receipt-div-1011').html(data)
    })
})
 $(document).ready(function()
 {
   $('.add-school-staffy').click(function()
   {
      first = $('.first-staffy-add').val().trim().replace(/\s+/g, ' ')
      last = $('.last-staffy-add').val().trim().replace(/\s+/g, ' ')
      loca = $('.location-staffy-add').val().trim().replace(/\s+/g, ' ')
      date = $('.date-staffy-add').val().trim().replace(/\s+/g, ' ')
      email = $('.email-staffy-add').val().trim().replace(/\s+/g, ' ')
      post = $('.post-staffy-add').val().trim().replace(/\s+/g, ' ')
      tel =   $('.tel-staffy-add').val().trim().replace(/\s+/g, ' ')
      password = $('.password-staffy-add').val().trim().replace(/\s+/g, ' ')
      confirm =  $('.confirm-staffy-add').val().trim().replace(/\s+/g, ' ')
      checked = $('.checkbox-staffy-add').val().trim().replace(/\s+/g, ' ')
      state = $('.state-staffy-add').val().trim().replace(/\s+/g, ' ')
       validate('checkboxStaffPdf','#staff_id_print');
      $.post('config/school/addStaff.php',{last:last,first:first,state:state,
        getid:getid,getdb:getdb,loca:loca,
        date:date,email:email,
        post:post,tel:tel,password:password,confirm:confirm,checked:checked},
         function(data)
         {
           $('.message-div-display-2').slideDown(100);
            $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
            scrollDiv()
            
         })
   })
 })
$(document).on('click','.checkStaffProfile', function()
{
   displayuser = $(this).val().trim();
   $.post('config/school/school.php',{getdb:getdb,displayuser:displayuser}, function(data)
   {
    $('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    
   })
})
$(document).on('click','.editStaffProfile', function()
{
   Edituser = $(this).val().trim().replace(/\s+/g, ' ');
   $.post('config/school/school.php',{getdb:getdb,Edituser:Edituser}, function(data)
   {
    $('.message-div-display-2').slideDown(100);
    $('.message-div-display-2 .display-items-1 .detail-div-1').html(data)
    scrollDiv()
   })
})
$(document).on('click','#but_upload',function(e){
      e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload')[0].files[0];
        id  =  $('.staff_id_staffy-101000').val();
        fd.append('id', id);
        fd.append('file',files);
        fd.append('db', getdb);
        $.ajax({
            url: 'config/school/image-school-staff.php',
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
    });
$(document).on('click','#but_upload-1',function(e){
      e.preventDefault();
        var fd = new FormData();
        var files = $('#image-upload')[0].files[0];
        id  =  $('.staff_id_staffy').val();
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
                    $('.message-div-display-2').slideDown(100);
                    $('.message-div-display-2 .display-items-1 .detail-div-1').html(response);
                    scrollDiv()
                    
                }
            },
        });
    });
$(document).on('click', '.update-staffy', function()
{
  first = $('.first-staffy-update').val().trim().replace(/\s+/g, ' ');
  last = $('.last-staffy-update').val().trim().replace(/\s+/g, ' ');
  post = $('.post-staffy-update').val().trim().replace(/\s+/g, ' ');
  email = $('.email-staffy-update').val().trim().replace(/\s+/g, ' ')
  birth = $('.birth-staffy-update').val().trim().replace(/\s+/g, ' ')
  status = $('.Status-staffy-update').val().trim().replace(/\s+/g, ' ');
  password = $('.Password-staffy-update').val().trim().replace(/\s+/g, ' ');
  single = $('.update-staffy').val().trim().replace(/\s+/g, ' ');
  phone = $('.Phone-staffy-update').val().trim().replace(/\s+/g, ' ');
    $.post('config/school/school.php', {phone:phone,single:single,password:password,getid:getid,getdb:getdb,first:first,last:last,post:post,email:email,
      birth:birth,status:status},
      function(data)
      {
        scrollDiv()
        
       $('.sticky-message').html(data);
        // Diver()
      }
      )
})
$(document).on('click', '.adjust-calender', function()
{
  calender = $(this).val();
  $.post('config/school/calender.php', {calender:calender,getid:getid,getdb:getdb},
  function(data)
  {
     $('.message-div-display-2').slideDown(100);
        $('.message-div-display-2 .display-items-1 .detail-div-1').html(data);
        
  })
})

$(document).on('click', '.term-click', function()
{
  get = $(this).val().trim()
  $('.term-selected').val(get);
 
})
$(document).on('click', '.final', function()
{
      checked = $(this).val();
     $data =  "<button type='type' class='btn-sm sm btn-success btn calender-done'>Finish</button>";
     $('.third-check').html($data);

})

$(document).on('click', '.calender-done', function()
{
  verify = $(this).val().trim()
  $.post('config/school/calender.php',{getdb:getdb,verify:verify}, 
  function(data)
  {
    alert(data);
    
  })
})
$(document).on('click', '.more-calender', function()
{
      calenderCreate = $(this).val();
      month = $('.Calender-month').val().replace(/\s+/g, ' ');
      active = $('.Calender-activities').val().replace(/\s+/g, ' ');
      term = $(".term-selected").val().replace(/\s+/g, ' ');
      summary = $('.calender-summary').val().replace(/\s+/g, ' ');
      $.post('config/school/calender.php',{summary:summary,term:term,active:active,month:month,
        getdb:getdb,calenderCreate:calenderCreate},
        function(data)
        {
        $('.Calender_info').html(data);
        
        })

})
$(document).on('click', '.init', function()
{
      checked = $(this).val();
     $data =  'Note: Before clicking on Third to Setup <span>';
     $data += " *please enter all term to avoid errors</span>";
     $('.third-check').html($data);

})
$(document).on('click','.drop-calender',function(data)
{
  drop = $(this).html();
  $.post('config/school/calender.php', {getdb:getdb,drop:drop}, function(data)
  {
    alert(data);
    
  })
})
$(document).on('click', '#print-calender', function()
{
        $('#print-div-calender').printThis();
})
function validate(check,div)
{
  if(document.getElementById(check).checked)
      {
        $(div).printThis();
        checkButton = 1;
      }else
      {

      }

}
function scrollDiv() {
    $('html, body').animate({
      scrollTop: $('body').offset().top
    }, 1000);
}
function Diver()
{
    window.setTimeout( function()
    {
        window.location.reload();
    }, 800)
}