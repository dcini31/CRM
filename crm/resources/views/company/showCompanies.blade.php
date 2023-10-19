@extends('layouts.company')
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
                        <th>logo</th>
                        <th>website</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($companies->isNotEmpty())
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><img src="{{ asset('storage/public/company-logos/' . $company->logo) }}"
                                        alt="{{ $company->name }} Logo" width="auto" height="150"></td>
                                <td>{{ $company->website }}</td>
                                <td></td>
                                <td></td>
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
