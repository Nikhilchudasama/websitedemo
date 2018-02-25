@extends('backend.layouts.master')

@section('content')
    @include('admin.includes.sidebar')

    <main class="main">
        <div class="container-fluid">
            {{-- Validation error  --}}
            @include('common.validation_error')

            @yield('content-body')
        </div>
    </main>

    {{-- Scripts from page blade files will be added here --}}
    @stack('scripts')
@endsection
