@extends('admin.layouts.master')

@section('title', 'Sliders')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">
                        Slidets
                    </h3>

                    <div class="float-right mt-1">
                        <a href="{{ route('sliders.create') }}" class="btn btn-primary">
                            <i class="far fa-plus-square" title="Create New Slider"></i>
                            &nbsp; Add New Slider
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
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('upload/images/slider')}}/{{$slider->image}}" width="80" alt="{{ $slider->title }}">
                                        </td>

                                        <td>{{ $slider->title }}</td>

                                        <td>{{ $slider->content }}</td>

                                        <td>{{ $slider->getStatus() }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('sliders.edit', ['slider' => $slider->id]) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <!-- <a href="{{ route('sliders.destroy', ['slider' => $slider->id]) }}">
                                              <span class="delete-data"><i class="far fa-trash-alt"></i></span>
                                            </a> -->
                                            <form action="{{ route('sliders.destroy', ['slider' => $slider->id]) }}" method="POST" id="delete-form">
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
                            {{ $sliders->links() }}
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
