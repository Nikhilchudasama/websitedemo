@extends('front.layouts.master')

@section('title', 'Login &amp; Register')

@section('content')
    <div class="page-content-wraper">
        @include('front.common.breadcrumbs', ['pages' => ['Login &amp; Register' => '']])

        <section class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-border-box">
                            <form method="POST" id="front-login-form" action="{{ route('front_login') }}">
                                <h2 class="normal">
                                    <span>
                                        Registered Customers
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

                                <div class="form-field-wrapper">
                                    <label>
                                        Enter Your Password
                                        <span class="required">*</span>
                                    </label>

                                    <input class="input-md form-full-width"
                                        type="password"
                                        name="password"
                                        aria-required="true"
                                        pattern=".{6,}"
                                        title="6 characters minimum"
                                        required
                                    >
                                </div>

                                <div class="form-field-wrapper">
                                    <label>
                                        <input type="hidden" name="remember" value="0">
                                        <input type="checkbox"
                                            name="remember"
                                            {{ old('remember') ? 'checked' : '' }}
                                            value="1"
                                        > Remember Me
                                    </label>
                                </div>

                                <div class="form-field-wrapper text-center">
                                    <button type="submit" class="submit btn btn-md btn-black">Sign In</button>
                                    <a class="submit btn btn-md"
                                        href="{{ route('front_forgot_password_page') }}"
                                    >Forgot Your Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-border-box">
                            <h2 class="normal">
                                <span>
                                    New Customers
                                </span>
                            </h2>

                            <div class="form-field-wrapper">
                                <input type="button"
                                    id="create-new-account"
                                    class="submit btn btn-md btn-color"
                                    value="Create An Account"
                                >
                            </div>

                            <form method="POST"
                                id="front-registration-form"
                                action="{{ route('front_register') }}"
                                style="display: none;"
                            >
                                <div class="form-field-wrapper">
                                    <label>
                                        Enter Your First Name
                                        <span class="required">*</span>
                                    </label>

                                    <input type="text"
                                        class="input-md form-full-width"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        required
                                    >
                                </div>

                                <div class="form-field-wrapper">
                                    <label>
                                        Enter Your Last Name
                                        <span class="required">*</span>
                                    </label>

                                    <input type="text"
                                        class="input-md form-full-width"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        required
                                    >
                                </div>

                                <div class="form-field-wrapper">
                                    <label>
                                        Enter Your Phone Number
                                        <span class="required">*</span>
                                    </label>

                                    <input type="text"
                                        class="input-md form-full-width"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        required
                                    >
                                </div>

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

                                <div class="form-field-wrapper">
                                    <label>
                                        Enter Your Password
                                        <span class="required">*</span>
                                    </label>

                                    <input class="input-md form-full-width"
                                        type="password"
                                        name="password"
                                        aria-required="true"
                                        pattern=".{6,}"
                                        title="6 characters minimum"
                                        required
                                    >
                                </div>

                                <div class="form-field-wrapper">
                                    <label>
                                        Enter Your Password
                                        <span class="required">*</span>
                                    </label>

                                    <input class="input-md form-full-width"
                                        type="password"
                                        name="password_confirmation"
                                        aria-required="true"
                                        pattern=".{6,}"
                                        title="6 characters minimum"
                                        required
                                    >
                                </div>

                                <div class="form-field-wrapper">
                                    <label>
                                        How did you come to know about us
                                        <span class="required">*</span>
                                    </label>

                                    <select name="source" class="input-md form-full-width">
                                        @foreach ($sources as $id => $source)
                                            <option value="{{ $id }}">
                                                {{ $source }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-field-wrapper">
                                    <button type="submit" class="submit btn btn-md btn-black">Register</button>
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
        var setSessionIntendedUrl = "{{ session('url.intended', route('front_home')) }}";
    </script>

    <script src="{{ asset('js/front/login-register.js') }}"></script>
@endsection
