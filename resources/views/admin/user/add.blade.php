@extends('admin.layouts.master')

@section('title', 'Add New User')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add New User
                    </h3>
                </div>

                <form method="post" action="{{ route('users.store') }}">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first-name" placeholder="Enter your First name" value="{{ old('first_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Enter your Last name" value="{{ old('last_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="{{ old('username') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email Address" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number" value="{{ old('mobile') }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0" {{ ! is_null(old('active')) && old('active') == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('users.index') }}" class="btn btn-md btn-danger">
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

@push('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/3.0.3/choices.min.js"></script>

    <script>
        window.addEventListener('load', function() {
            new Choices(document.getElementById('select-module'), {
                removeItemButton: true,
                placeholder: true
            });
        });
    </script>
@endpush
