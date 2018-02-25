<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Yumsenghub | @yield('title')</title>

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">

    <link href="{{ mix('/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/style.css') }}" rel="stylesheet">

    @if (isset($displaySideCart))
        <style>
        .sticky-cart-button {
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 14;
        }
        .sticky-cart-button {
            font-size: 30px;
            padding: 10px 10px !important;
            border-radius: 30px;
        }
        .sticky-cart-button i {
            margin-right: 0;
        }
        </style>
    @endif

    {{-- Styles from page blade files will be added here --}}
    @yield('styles')
</head>
<body>
    <div class="wraper">
        @include('front.layouts.header')

        @yield('content')

        @include('front.layouts.footer')
    </div>

    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

    @if (isset($displaySideCart))
        @include('front.cart.side_cart.index')
    @endif

    @if (session('message'))
        <script>
            showNotice("{{ session('type') }}", "{{ session('message') }}");
        </script>
    @endif

    @yield('scripts')
</body>
</html>
