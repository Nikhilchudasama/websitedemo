@extends('front.layouts.master')

@section('title', 'Forgot Password')

@section('content')
    <div class="page-content-wraper">
        @include('front.common.breadcrumbs', ['pages' => ['Forgot Password' => '']])

        <section class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-border-box">
                            <form method="POST" id="front-forgot-password-form" action="{{ route('front_forgot_password') }}">
                                <h2 class="normal">
                                    <span>
                                        Forgot Password
                                    </span>
                                </h2>

                                <div class="form-field-wrapper">
                                    <label>
                                        Enter Your Email
                                        <span class="required">*</span>
                                    </label>

                                    <input type="email"
                                        class="input-md form-full-width"
                                        name="email"
                                        aria-required="true"
                                        value="{{ old('email') }}"
                                        autofocus
                                        required
                                    >
                                </div>

                                <div class="form-field-wrapper text-center">
                                    <button type="submit" class="submit btn btn-md btn-black">Reset Password</button>
                                    <a class="submit btn btn-md"
                                        href="{{ route('front_login_page') }}"
                                    >Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        var homeUrl = "{{ route('front_home') }}";
    </script>

    <script src="{{ asset('js/front/forgot-password.js') }}"></script>
@endsection
