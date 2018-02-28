@extends('admin.layouts.master')

@section('title', 'Menus')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">
                        Users
                    </h3>

                    <div class="float-right mt-1">
                        <a href="{{ route('menus.create') }}" class="btn btn-primary">
                            <i class="far fa-plus-square" title="Create New User"></i>
                            &nbsp; Add New Menu
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Number</th>
                                    <th>Menu Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->id }}</td>

                                        <td>{{ $menu->menu_name }}</td>

                                        <td>{{ $menu->getStatus() }}</td>

                                        <td class="text-center" style="font-size:22px;">
                                            <a href="{{ route('menus.edit', ['menu' => $menu->id]) }}">
                                                &#9997;
                                            </a>
                                            <form action="{{ route('menus.destroy', ['menu' => $menu->id]) }}" method="POST" id="delete-form">
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

                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{--  Advanced Search  --}}


    <script src="{{ asset('js/backend/backend-common-script.js') }}"></script>
@endpush
