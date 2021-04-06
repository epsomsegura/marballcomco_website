// Al cargar
$(function(){
    $('textarea').characterCounter();
});


// Al hacer click en el botón addEmailRow
$(document).on('click','.addEmailRow',function(){
    var newRow = $(this).parent().parent().clone();
    $('#emailDataRows tbody').append(newRow);
    $('#emailDataRows tbody tr:last').find('td:eq(1)>div>input[type="email"]').val('');

    $.each($('#emailDataRows tbody tr'),function(i,val){
        $(this).find('td:eq(0)').text(i+1);
        $('#emailDataRows tbody tr:last').find('td:eq(1)>div>input[type="email"]').attr('id','email_'+(i+1));
    });
    return false;
});

$(document).on('click','.deleteEmailRow',function(){
    $(this).parent().parent().remove();
    $.each($('#emailDataRows tbody tr'),function(i,val){
        $(this).find('td:eq(0)').text(i+1);
        $('#emailDataRows tbody tr:last').find('td:eq(1)>div>input[type="email"]').attr('id','email_'+(i+1));
    });
    return false;
});
