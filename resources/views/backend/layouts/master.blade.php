@extends('backend.layouts.bare')

@section('body')
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

        {{-- Header --}}
        @include('backend.common.header')

        <div class="app-body">
            @yield('content')
        </div>

        <script src="{{ asset('/js/backend/vendor.js') }}"></script>
        <script src="{{ asset('/js/backend/app.js') }}"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

        {{-- Scripts from page blade files will be added here --}}
        @yield('scripts')

        @if (session('message'))
            <script>
                showNotice("{{ session('type') }}", "{{ session('message') }}");
            </script>
        @endif
    </body>
@endsection
