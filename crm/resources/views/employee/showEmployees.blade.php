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
                        <th>Company Name</th>
                        <th>Company Website</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($employees->isNotEmpty())
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td><a
                                        href="{{ route('company/showCompany', $employee->company->id) }}">{{ $employee->company->website }}</a>
                                </td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <a href="{{ route('employee/edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('employee/destroy', $employee->id) }}"
                                        enctype="multipart/form-data"
                                        onsubmit="return confirm('Are you sure you want to delete this company?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
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
        <div class="d-flex justify-content-center">
            @if ($employees->lastPage() > 1)
                <ul class="pagination">
                    @for ($i = 1; $i <= $employees->lastPage(); $i++)
                        <li class="page-item {{ $employees->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $employees->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            @endif
        </div>
    </div>
@endsection
