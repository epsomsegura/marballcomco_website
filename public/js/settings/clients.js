var
    image = document.getElementById('clientLogo'),
    userPhotoB64 = null,
    photoToServer = null;

objFunctions = {
    cropperFunction: function(){
        cropper = new Cropper(image, {
            viewMode: 1,
            background: false,
            autoCropArea: 1,
            // minContainerWidth: 380,
            minContainerHeight: 160,
            // maxContainerWidth: 380,
            maxContainerHeight: 160,
            // modal:false,
            dragMode: 'move',
            data:{
                height: 160,
            },

        });
    },
    validatePhotoFile:function(mimetype){
        var arrMimeTypes = ['image/jpeg','image/jpg','image/png','image/gif'];
        return (arrMimeTypes.indexOf(mimetype)>-1);
    },
};

$(document).ready(function(){
    objFunctions.cropperFunction();
});

// On charge user photo file
$(document).on('change','#fileLogoClient',function(e){
    lib.loader.show();
    var file = $(this)[0].files[0];

    if(file !== undefined){
        if(objFunctions.validatePhotoFile(file.type)){
            var reader = new FileReader();
            
            reader.onload = ()=>{userPhotoB64 = reader.result;};
            reader.readAsDataURL(file);
            setTimeout(()=>{
                cropper.destroy();
                $('.cropper-canvas img, .cropper-view-box img, #clientLogo').attr('src',userPhotoB64);
                $('#imgCropper').slideDown();
                objFunctions.cropperFunction();
                lib.loader.hide();
            },500);
            
        }
        else{
            lib.loader.hide();
            lib.toasts('Este elemento del formulario solo permite cargar archivos de tipo imagen');
            $(this).val('');
        }
    }
    else{
        lib.loader.hide();
        $('.file-path').val(null);
    }
});

// On click 'Cambiar' change photo
$(document).on('click','#btnAcceptChangePhoto',function(){
    lib.loader.show();
    var photoToServer = cropper.getCroppedCanvas({height:160,minHeight:160,maxHeight:160}).toDataURL('image/jpeg',0.8);
    setTimeout(()=>{
        $('#logo').val(photoToServer);
        $('#imgCropper').hide();
        $('#logoCropped').attr('src',photoToServer).show();
        $('#fileLogoClient').val('');
        lib.loader.hide();
    },500);
});

// On click 'Deshacer' change photo
$(document).on('click','#btnUndoChangePhoto',function(){
    var
        origPhotoSrc=$('#clientLogo').data('orig-src');
    $('#fileLogoClient').val('').trigger('change');
    $('.cropper-canvas img, .cropper-view-box img').attr('src',origPhotoSrc);
    $('#logo').val('');
    $('#imgCropper').slideUp();
});

// On click 'Guardar nuevo cliente"
$(document).on('click','#btnSaveModalClient',function(){
    if($('#clientName').val()===''){
        lib.toasts('El campo Nombre del cliente es requerido');
    }
    else if($('#logo').val()===''){
        lib.toasts('Debe cargar el logotipo del cliente en un formato de imagen');
    }
    else{
        var params = {
            _token: $('input[name="_token"]').val(),
            _method: 'POST',
            clientName: $('#clientName').val(),
            clientLogo: $('#logo').val()
        };

        $.post('/settings/clients',params)
        .done(function(resp){
            if(resp.message=='OK'){
                $('#mdl_new').modal('close');
                lib.toasts('La información se almacenó de manera exitosa');
                setTimeout(()=>{window.location.reload();},300);
            }
            else{lib.toasts(resp.message);}
        })
        .fail(function(error){
            lib.toasts(error.message);
        });
    }
});


$(document).on('click','.btn_edit',function(){
    var id = $(this).data('id');
    
});