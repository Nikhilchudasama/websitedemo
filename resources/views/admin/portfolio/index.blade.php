@extends('admin.layouts.master')

@section('title', 'CMSPage')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">
                        CMSPage
                    </h3>

                    <div class="float-right mt-1">
                        <a href="{{ route('portfolio.create') }}" class="btn btn-primary">
                            <i class="far fa-plus-square" title="Create New Portfolio"></i>
                            &nbsp; Add New CMSPage
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cmspages as $cmspage)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('upload/images/cmspage')}}/{{$cmspage->image}}" width="80" alt="{{ $cmspage->title }}">
                                        </td>

                                        <td>{{ $cmspage->title }}</td>

                                        <td>{{ strip_tags($cmspage->content) }}</td>

                                        <td>{{ $cmspage->getStatus() }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('cmspage.edit', ['cmspage' => $cmspage->id]) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{ route('cmspage.destroy', ['cmspage' => $cmspage->id]) }}" method="POST" id="delete-form">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <span class="delete-data"><i class="far fa-trash-alt"></i></span>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{ $cmspages->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--  Advanced Search  --}}


    <script src="{{ asset('js/backend/backend-common-script.js') }}"></script>
@endpush
