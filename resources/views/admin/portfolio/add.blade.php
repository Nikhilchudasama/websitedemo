@extends('admin.layouts.master')

@section('title', 'Add New Portfolio')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Add New Portfolio
                    </h3>
                </div>

                <form method="post" enctype="multipart/form-data" action="{{ route('portfolio.store') }}">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation</label>
                              <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation" value="{{ old('designation') }}">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : ''}}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('portfolio.index') }}" class="btn btn-md btn-danger">
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
