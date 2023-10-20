@extends('layouts.employee')
@section('message-employees')
    @if (Session::has('message-employee'))
        <div class="alert alert-danger"> {{ Session::get('message') }}</div>
    @elseif(session('user-created'))
        <div class="alert alert-success"> {{ Session::get('user-created') }}</div>
    @elseif(session('updated-message'))
        <div class="alert alert-success"> {{ Session::get('updated-message') }}</div>
    @endif
@endsection
@section('add-employee')
    <a href="{{ route('employee/create') }}"class="nav-link">Add Employee
    </a>
@endsection
@section('content')
    <div class="card-body">
        {{-- // --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employees->isNotEmpty())
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->company_id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="6" style="text-align:center">
                            No Employee record exist
                        </td>
                    @endif
                </tbody>
            </table>
        </div><!-- /.card-body -->
    @endsection
