objFunctions = {
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
    }
}

var
    userPhoto = $('#userPhoto')[0],
    cropper = new Cropper(userPhoto, {
        viewMode: 1,
        background: false,
        autoCropArea: 1,
        aspectRatio: 1 / 1,
        minContainerWidth: 200,
        minContainerHeight: 200,
        crop(e) {
            console.log(e.detail.x);
            console.log(e.detail.y);
            console.log(e.detail.width);
            console.log(e.detail.height);
            console.log(e.detail.rotate);
            console.log(e.detail.scaleX);
            console.log(e.detail.scaleY);
        },
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
        $('#frmMyProfile').submit();
    }
});