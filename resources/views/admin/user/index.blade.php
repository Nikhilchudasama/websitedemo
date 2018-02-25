@extends('admin.layouts.master')

@section('title', 'Users')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">
                        Users
                    </h3>

                    <div class="float-right mt-1">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="far fa-plus-square" title="Create New User"></i>
                            &nbsp; Add New User
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>

                                        <td>{{ $user->getName() }}</td>

                                        <td>{{ $user->mobile }}</td>

                                        <td>{{ $user->email }}</td>

                                        <td>{{ $user->getStatus() }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{ $users->links('vendor.pagination.bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
