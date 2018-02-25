@extends('backend.layouts.bare')

@section('body')
    <body class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group">
                        <div class="card p-5">
                            <div class="card-body text-left">
                                <h2>Forgot Password</h2>

                                {{-- Validation error  --}}
                                @include('common.validation_error')

                                <form method="POST" id="admin-forgot-password-form" action="{{ route('admin_forgot_password') }}">
                                    {{ csrf_field() }}
                                    <input type="email" class="form-control mb-3" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" required autofocus>

                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection('body')
