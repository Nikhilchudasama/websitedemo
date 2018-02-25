@extends('admin.layouts.master')

@section('title', 'Customers')

@section('content-body')
    <div class="row">
        <div class="col-lg-12 p-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Customers
                    </h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Number</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>email</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>

                                        <td>{{ $customer->first_name . ' ' . $customer->last_name }}</td>

                                        <td>{{ $customer->phone }}</td>

                                        <td>{{ $customer->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{ $customers->links('vendor.pagination.bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection