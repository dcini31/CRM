@extends('layouts.company')
@section('message')
    @if (Session::has('message'))
        <div class="alert alert-danger"> {{ Session::get('message') }}</div>
    @elseif(session('success-message'))
        <div class="alert alert-success"> {{ Session::get('success-message') }}</div>
    @elseif(session('updated-message'))
        <div class="alert alert-success"> {{ Session::get('updated-message') }}</div>
    @endif
@endsection
@section('add-company')
    <a href="{{ route('company/create') }}"class="nav-link">Add Company
    </a>
@endsection
@section('content')
    <div class="card-body">
        {{-- // --}}
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($companies->isNotEmpty())
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td><a href="{{ route('company/showCompany', $company->id) }}">{{ $company->name }}</a></td>
                                <td>{{ $company->email }}</td>
                                <td> <img src="{{ asset('storage/public/company-logos/' . $company->logo) }}" alt=""
                                        width="auto" height="150"></td>
                                <td>{{ $company->website }}</td>
                                <td> <a href="{{ route('company/edit', $company->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('company/destroy', $company->id) }}"
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
                            No Company record exist
                        </td>
                    @endif
                </tbody>
            </table>
        </div><!-- /.card-body -->
        <div class="d-flex justify-content-center">
            @if ($companies->lastPage() > 1)
                <ul class="pagination">
                    @for ($i = 1; $i <= $companies->lastPage(); $i++)
                        <li class="page-item {{ $companies->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $companies->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            @endif
        </div>
    </div>
@endsection
