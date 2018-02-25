// Login
var loginForm = document.querySelector('#front-login-form');

loginForm.addEventListener("submit", function (evt) {
    evt.preventDefault();

    ajaxSubmit(loginForm, function (response) {
        if (response.data.hasOwnProperty('success') && response.data.success == true) {
            window.location = setSessionIntendedUrl;
        } else {
            showNotice('error', response.data.message);
        }
    }, '');
});

// Create New Account buttons
var createNewAccount = document.getElementById('create-new-account');

createNewAccount.onclick = function () {
    document.getElementById('front-registration-form').style.display = "block";
    this.style.display = "none";
};

// Register
var registrationForm = document.querySelector('#front-registration-form');

registrationForm.addEventListener("submit", function (evt) {
    evt.preventDefault();

    ajaxSubmit(registrationForm, function (response) {
        if (response.data.hasOwnProperty('success') && response.data.success == true) {
            window.location = homeUrl;
            return;
        }

        showNotice('error', 'Error occurred. Please try again.');
    }, '');
});