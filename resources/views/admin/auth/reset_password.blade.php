@extends('backend.layouts.bare')

@section('body')
    <body class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-group">
                        <div class="card p-5">
                            <div class="card-body text-left">
                                <h2>Reset Password</h2>

                                {{-- Validation error  --}}
                                @include('common.validation_error')

                                <form method="POST" action="{{ route('admin_password_reset') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <input type="email" class="form-control mb-3" name="email" value="{{ $email }}" placeholder="Email" required autofocus>

                                    <input type="password" class="form-control mb-3" name="password" placeholder="Password" required pattern=".{6,}" title="6 characters minimum">
                                    <input type="password" class="form-control mb-3" name="password_confirmation" placeholder="Confirm Password " required pattern=".{6,}" title="6 characters minimum">

                                    <button type="submit" class="btn btn-primary px-4">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection('body')
