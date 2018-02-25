let mix = require('laravel-mix');

// Front CSS
mix.styles('resources/assets/css/front-style.css', 'public/css/style.css')
    .styles([
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/alertify.min.css',
    ], 'public/css/vendor.css')
    .styles(
        'resources/assets/css/tiny-slider.css',
        'public/css/front/tiny-slider.css'
    ).styles(
        'resources/assets/css/modal.css',
        'public/css/front/modal.css'
    ).styles(
        'resources/assets/css/nouislider.min.css',
        'public/css/front/nouislider.min.css'
    ).styles(
        'resources/assets/css/pikaday.css',
        'public/css/front/pikaday.css'
    )
;

// Front JS
mix.scripts([
        'resources/assets/js/axios.min.js',
        'resources/assets/js/alertify.min.js',
    ], 'public/js/vendor.js')
    .scripts([
        'resources/assets/js/common-scripts.js',
        'resources/assets/js/front-app.js'
    ], 'public/js/app.js')
    .scripts(
        'resources/assets/js/map.js',
        'public/js/map.js'
    )
    .scripts(
        'resources/assets/js/forgot-password.js',
        'public/js/front/forgot-password.js'
    )
    .scripts(
        'resources/assets/js/login-register.js',
        'public/js/front/login-register.js'
    )
    .scripts(
        'resources/assets/js/cart-common-script.js',
        'public/js/front/cart-common-script.js'
    )
    .scripts(
        'resources/assets/js/cart-scripts.js',
        'public/js/front/cart-scripts.js'
    )
    .scripts(
        'resources/assets/js/side-cart-script.js',
        'public/js/front/side-cart-script.js'
    )
    .scripts(
        'resources/assets/js/address-script.js',
        'public/js/front/address-script.js'
    )
    .scripts(
        'resources/assets/js/home-script.js',
        'public/js/front/home-script.js'
    )
    .scripts(
        'resources/assets/js/profile-page-script.js',
        'public/js/front/profile-page-script.js'
    )
    .scripts(
        'resources/assets/js/shop-products-script.js',
        'public/js/front/shop-products-script.js'
    )
    .scripts(
        'resources/assets/js/checkout-scripts.js',
        'public/js/front/checkout-scripts.js'
    )
    .scripts(
        'resources/assets/js/shop-common-script.js',
        'public/js/front/shop-common-script.js'
    )
    .scripts(
        'resources/assets/js/add-to-cart-script.js',
        'public/js/front/add-to-cart-script.js'
    )
    .scripts(
        'resources/assets/js/jssor.slider.min.js',
        'public/js/front/jssor.slider.min.js'
    )
    .scripts(
        'resources/assets/js/tiny-slider.js',
        'public/js/front/tiny-slider.js'
    )
    .scripts(
        'resources/assets/js/nouislider.min.js',
        'public/js/front/nouislider.min.js'
    )
    .scripts(
        'resources/assets/js/pikaday.js',
        'public/js/front/pikaday.js'
    )
    .scripts(
        'resources/assets/js/modal.js',
        'public/js/front/modal.js'
    )
;

// Backend CSS
mix.styles('resources/assets/css/backend-style.css', 'public/css/backend/style.css')
    .styles([
        'resources/assets/css/modal.css',
        'resources/assets/css/alertify.min.css',
    ], 'public/css/backend/vendor.css')
    .styles(
        'resources/assets/css/modal.css',
        'public/css/backend/modal.css'
    )
;

// Backend JS
mix.scripts([
        'resources/assets/js/axios.min.js',
        'resources/assets/js/alertify.min.js',
    ], 'public/js/backend/vendor.js')
    .scripts([
        'resources/assets/js/common-scripts.js',
        'resources/assets/js/backend-app.js'
    ], 'public/js/backend/app.js')
    .scripts([
        'resources/assets/js/backend-common-script.js',
    ], 'public/js/backend/backend-common-script.js')
    .scripts(
        'resources/assets/js/backend-promo-code.js',
        'public/js/backend/promo-code.js'
    )
;

// Merchant JS
mix.scripts(
        'resources/assets/js/merchant-orders.js',
        'public/js/merchant/orders.js'
    ).scripts(
        'resources/assets/js/modal.js',
        'public/js/backend/modal.js'
    )
;

if (mix.inProduction()) {
    mix.version();
}
