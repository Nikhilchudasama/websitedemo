<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Yumsenghub">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>{{ config('app.name') }} Admin - @yield('title')</title>

    <link href="{{ asset('/css/backend/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/backend/style.css') }}" rel="stylesheet">

    {{-- Styles from page blade files will be added here --}}
    @stack('styles')
</head>
    @yield('body')
</html>
