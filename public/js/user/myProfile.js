var
    image = document.getElementById('userPhoto'),
    userPhotoB64 = null,
    photoToServer = null;

objFunctions = {
    cropperFunction: function(){
        cropper = new Cropper(image, {
            viewMode: 1,
            background: false,
            autoCropArea: 1,
            aspectRatio: 1 / 1,
            minContainerWidth: 300,
            minContainerHeight: 300,
            // modal:false,
            dragMode: 'move',
        });
    },
    validatePhotoFile:function(mimetype){
        var arrMimeTypes = ['image/jpeg','image/jpg','image/png','image/gif'];
        return (arrMimeTypes.indexOf(mimetype)>-1);
    },
    validatePassword: function () {
        if ($('#chkPassword').is(':checked')) {
            if ($('#password').val() === null || $('#password').val() === '') {
                lib.toasts('Las contraseñas son requeridas.');
                return false;
            }
            else {
                if ($('#password').val() !== $('#password2').val()) {
                    lib.toasts('Las contraseñas no coinciden.');
                    return false;
                }
            }
        }
        return true;
    },

}


$(document).ready(function(){
    objFunctions.cropperFunction();
});

// On charge user photo file
$(document).on('change','#fileUserPhoto',function(e){
    lib.loader.show();
    var file = $(this)[0].files[0];

    if(objFunctions.validatePhotoFile(file.type)){
        var reader = new FileReader();
        
        reader.onload = ()=>{userPhotoB64 = reader.result;};
        reader.readAsDataURL(file);
        setTimeout(()=>{
            cropper.destroy();
            $('.cropper-canvas img, .cropper-view-box img, #userPhoto').attr('src',userPhotoB64);
            objFunctions.cropperFunction();
            lib.loader.hide();
        },500);
        
    }
    else{
        lib.loader.hide();
        lib.toasts('Este elemento del formulario solo permite cargar archivos de tipo imagen');
        $(this).val('');
    }
});

// On click 'Cambiar' change photo
$(document).on('click','#btnAcceptChangePhoto',function(){
    lib.loader.show();
    var photoToServer = cropper.getCroppedCanvas().toDataURL('image/jpeg',0.8);
    setTimeout(()=>{
        $('#photo').val(photoToServer);
        lib.loader.hide();
    },500);
});

// On click 'Deshacer' change photo
$(document).on('click','#btnUndoChangePhoto',function(){
    var
        origPhotoSrc=$('#userPhoto').data('orig-src');
    $('#fileUserPhoto').val('');
    $('.cropper-canvas img, .cropper-view-box img').attr('src',origPhotoSrc);
    $('#photo').val('');
});

// On change password switch
$(document).on('change', '#chkPassword', function () {
    if ($(this).is(':checked')) {
        $('#passSection').fadeIn();
        $('#password,#password2').attr('required', 'required');
        $('#password').attr('name', 'password');
        $('#password2').attr('name', 'password2');
    }
    else {
        $('#passSection').fadeOut();
        $('#password,#password2').removeAttr('required').removeAttr('name');
    }
});

$(document).on('click', '#btnSubmit', function () {
    if (objFunctions.validatePassword()) {
        $('#submit').trigger('click');
    }
});

