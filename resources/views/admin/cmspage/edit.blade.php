@extends('admin.layouts.master')

@section('title', 'Edit CMSPage')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit CMSPage
                    </h3>
                </div>
                <?php
                    dd($cMSPage);
                ?>
                <form method="post" enctype="multipart/form-data" action="{{ route('cmspage.update', ['cmspage' => $cMSPage->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $cMSPage->title }}">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content"
                                class="form-control"
                                id="content"
                                rows="4"
                                placeholder="Enter Content"
                            >{{ $cMSPage->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('upload/images/cmsimage')}}/{{$cMSPage->image}}"
                                width="200"
                                alt="{{ $cMSPage->title }}"
                            >
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0" {{ $cMSPage->active == '0' ? 'selected' : ''}}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('cmspage.index') }}" class="btn btn-md btn-danger">
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
@push('scripts')
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'content' );
</script>
@endpush
