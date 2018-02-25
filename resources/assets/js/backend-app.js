// Toggle side bar near Brand logo
var sidebarToggler = document.getElementsByClassName('sidebar-toggler');
var body = document.querySelector('body');

Array.from(sidebarToggler).forEach(function(headerButton) {
    headerButton.onclick = function() {
        body.classList.toggle("sidebar-hidden");
    };
});

// Toggle side bar only show it's icon
var brandMinimizer = document.getElementsByClassName('brand-minimizer');

Array.from(brandMinimizer).forEach(function(sidebarBottomButton) {
    sidebarBottomButton.onclick = function() {
        body.classList.toggle("sidebar-minimized");
    };
});

// Toggle Menu in mobile
var mobileSidebarToggler = document.getElementsByClassName('mobile-sidebar-toggler');

Array.from(mobileSidebarToggler).forEach(function(headerMobileButton) {
    headerMobileButton.onclick = function() {
        body.classList.toggle("sidebar-mobile-show");
    };
});
