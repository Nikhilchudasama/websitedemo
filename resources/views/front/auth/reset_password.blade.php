@extends('front.layouts.master')

@section('title', 'Reset Password')

@section('content')
    <div class="page-content-wraper">
        @include('front.common.breadcrumbs', ['pages' => ['Reset Password' => '']])

        <section class="content-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-border-box">
                            <form method="POST" action="{{ route('front_password_reset') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{ $token }}">

                                <h2 class="normal">
                                    <span>
                                        Reset Password
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
                                        value="{{ $email or old('email') }}"
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
                                    <button type="submit" class="submit btn btn-md btn-black">Set new Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
