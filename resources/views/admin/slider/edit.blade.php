@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Product
                    </h3>
                </div>

                <form method="post" enctype="multipart/form-data" action="{{ route('sliders.update', ['slider' => $slider->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $slider->title }}">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content"
                                class="form-control"
                                id="content"
                                rows="4"
                                placeholder="Enter Content"
                            >{{ $slider->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('upload/images/slider')}}/{{$slider->image}}"
                                width="200"
                                alt="{{ $slider->title }}"
                            >
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0" {{ $slider->active == '0' ? 'selected' : ''}}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('sliders.index') }}" class="btn btn-md btn-danger">
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
