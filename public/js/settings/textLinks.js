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


$(document).on('click','#btnSubmitBanner',function(){
    if($('#slogan').val() === ''){
        lib.toasts('El campo Slogan es requerido');
        $('#slogan').focus();
    }
    else{
        var params = {
            _token: $('input[name="_token"]').val(),
            _method: 'PUT',
            slogan: $('#slogan').val()
        };

        $.post('/settings/banner/'+$('#id').val(),params)
        .done(function(resp){
            if(resp.message=='OK'){
                lib.toasts('La información se almacenó de manera exitosa');
            }
            else{
                lib.toasts(resp.message);
            }
        })
        .fail(function(error){
            lib.toasts('Error al intentar comunicarse con el servidor');
        });
    }
});

$(document).on('click','#btnSubmitAboutUs',function(){
    if($('#aboutUs').val() === ''){
        lib.toasts('El campo Acerca de es requerido');
        $('#aboutUs').focus();
    }
    else if($('#mision').val() === ''){
        lib.toasts('El campo Misión es requerido');
        $('#mision').focus();
    }
    else if($('#vision').val() === ''){
        lib.toasts('El campo Visión es requerido');
        $('#vision').focus();
    }
    else{
        var params = {
            _token: $('input[name="_token"]').val(),
            _method: 'PUT',
            aboutUs: $('#aboutUs').val(),
            mision: $('#mision').val(),
            vision: $('#vision').val()
        };

        $.post('/settings/enterpriseIdentity/'+$('#id').val(),params)
        .done(function(resp){
            if(resp.message=='OK'){
                lib.toasts('La información se almacenó de manera exitosa');
            }
            else{
                lib.toasts(resp.message);
            }
        })
        .fail(function(error){
            lib.toasts('Error al intentar comunicarse con el servidor');
        });
    }
});

$(document).on('click','#btnSubmitProducts',function(){
    if($('#productsTechDesc').val() === ''){
        lib.toasts('El campo Cómputo, video y conmutadores de es requerido');
        $('#productsTechDesc').focus();
    }
    else if($('#productsOfficeDesc').val() === ''){
        lib.toasts('El campo Equipo, mobiliario y productos de papelería es requerido');
        $('#productsOfficeDesc').focus();
    }
    else if($('#productsBuildDesc').val() === ''){
        lib.toasts('El campo Materiales para construcción y remodelación es requerido');
        $('#productsBuildDesc').focus();
    }
    else if($('#productsCleanDesc').val() === ''){
        lib.toasts('El campo Abarrotes y productos de limpieza es requerido');
        $('#productsCleanDesc').focus();
    }
    else{
        var params = {
            _token: $('input[name="_token"]').val(),
            _method: 'PUT',
            productsTechDesc: $('#productsTechDesc').val(),
            productsOfficeDesc: $('#productsOfficeDesc').val(),
            productsBuildDesc: $('#productsBuildDesc').val(),
            productsCleanDesc: $('#productsCleanDesc').val()
        };

        $.post('/settings/productInfo/'+$('#id').val(),params)
        .done(function(resp){
            if(resp.message=='OK'){
                lib.toasts('La información se almacenó de manera exitosa');
            }
            else{
                lib.toasts(resp.message);
            }
        })
        .fail(function(error){
            lib.toasts('Error al intentar comunicarse con el servidor');
        });
    }
});

$(document).on('click','#btnSubmitTestimonial',function(){
    if($('#testimonial').val() === ''){
        lib.toasts('El campo Testimonio es requerido');
        $('#testimonial').focus();
    }
    else{
        var params = {
            _token: $('input[name="_token"]').val(),
            _method: 'PUT',
            testimonial: $('#testimonial').val()
        };

        $.post('/settings/testimonial/'+$('#id').val(),params)
        .done(function(resp){
            if(resp.message=='OK'){
                lib.toasts('La información se almacenó de manera exitosa');
            }
            else{
                lib.toasts(resp.message);
            }
        })
        .fail(function(error){
            lib.toasts('Error al intentar comunicarse con el servidor');
        });
    }
});

$(document).on('click','#btnSubmitContact',function(){
    if($('#address').val() === ''){
        lib.toasts('El campo Domicilio es requerido');
        $('#address').focus();
    }
    else{
        $emailDataElement = $('#emailDataRows tbody > tr');
        $emailDataSet = [];
        $.each($emailDataElement,function(val,i){
            $emailDataSet.push({email : $(this).find('td:eq(1)').find('input').val()});
        });

        var params = {
            _token: $('input[name="_token"]').val(),
            _method: 'PUT',
            address: $('#address').val(),
            emailData: JSON.stringify($emailDataSet),
            FacebookLink: $('#FacebookLink').val(),
            TwitterLink: $('#TwitterLink').val(),
            InstagramLink: $('#InstagramLink').val(),
            phonoNumber: $('#phonoNumber').val(),
            whatsappNumber: $('#whatsappNumber').val(),
            telegramNumber: $('#telegramNumber').val(),
        };

        $.post('/settings/contact/'+$('#id').val(),params)
        .done(function(resp){
            if(resp.message=='OK'){
                lib.toasts('La información se almacenó de manera exitosa');
            }
            else{
                lib.toasts(resp.message);
            }
        })
        .fail(function(error){
            lib.toasts('Error al intentar comunicarse con el servidor');
        });
    }
});