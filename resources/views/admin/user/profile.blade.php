@extends('admin.layouts.master')

@section('title', 'Profile')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Profile
                    </h3>
                </div>

                <form method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first-name" placeholder="Enter your First name" value="{{ Auth::user()->first_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Enter your Last name" value="{{ Auth::user()->last_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ Auth::user()->username }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email Address" value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number" value="{{ Auth::user()->mobile }}" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('admin_home') }}" class="btn btn-md btn-danger">
                            <i class="far fa-times-circle"></i>
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-md btn-success">
                            <i class="far fa-check-circle"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection