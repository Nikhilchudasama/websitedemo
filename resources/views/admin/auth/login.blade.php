@extends('backend.layouts.bare')

@section('body')
    <body class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group">
                        <div class="card p-5">
                            <div class="card-body text-center">
                                <h1>Login</h1>

                                <p class="text-muted">Sign In to your account</p>

                                {{-- Validation error  --}}
                                @include('common.validation_error')

                                <form class="form" method="post">
                                    {{ csrf_field() }}

                                    <input type="text" class="form-control mb-3" name="username" placeholder="Username" autofocus>

                                    <input type="password" class="form-control mb-4" name="password" placeholder="Password">

                                    <div class="form-group">
                                        <label class="checkbox-inline" for="remember">
                                            <input name="remember" type="hidden" value="0">
                                            <input type="checkbox" id="remember" name="remember" value="1" checked>
                                            Remember Me
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary px-4">Login</button>
                                        </div>

                                        <div class="col-6 text-right">
                                            <a href="{{ route('admin_forgot_password_page') }}" class="btn btn-link px-0">Forgot password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection('body')
