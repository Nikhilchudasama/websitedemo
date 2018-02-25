var forgotPasswordForm = document.querySelector('#front-forgot-password-form');

forgotPasswordForm.addEventListener("submit", function (evt) {
    evt.preventDefault();

    ajaxSubmit(forgotPasswordForm, function (response) {
        if (response.data.hasOwnProperty('success') && response.data.success == true) {
            window.location = homeUrl;
        } else {
            showNotice('error', response.data.message);
        }
    }, '');
});