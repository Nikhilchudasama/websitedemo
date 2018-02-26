@extends('admin.layouts.master')

@section('title', 'Add New Menu')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add New Menu
                    </h3>
                </div>

                <form method="post" action="{{ route('menus.store') }}">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="menu-name">Menu Name</label>
                            <input type="text" class="form-control" name="menu_name" id="first-name" placeholder="Enter your Menu name" value="{{ old('menu_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0" {{ ! is_null(old('status')) && old('status') == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('menus.index') }}" class="btn btn-md btn-danger">
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
