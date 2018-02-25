var profileForm = document.querySelector('#front-profile-form');

profileForm.addEventListener("submit", function(evt) {
    evt.preventDefault();
    ajaxSubmit(profileForm, function (response) {
        if (response.data.hasOwnProperty('success') && response.data.success == true) {
            showNotice('success', 'Profile details updated successfully');
            return;
        }

        showNotice('error', 'Error occurred. Please try again.');
    }, '');
});

var passwordForm = document.querySelector('#front-password-form');
passwordForm.addEventListener("submit", function(evt) {
    evt.preventDefault();
    ajaxSubmit(passwordForm, function (response) {
        if (response.data.hasOwnProperty('success') && response.data.success == true) {
            showNotice('success', 'Password details updated successfully');
            return;
        }

        showNotice('error', response.data.message);
    }, '');
});