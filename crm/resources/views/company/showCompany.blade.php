@extends('layouts.company')
@section('add-company')
    <a href="{{ route('company/create') }}"class="nav-link">Add Company
    </a>
@endsection
@section('content')
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header">
            <h5 class="card-title">{{ $company->name }}</h5>
        </div>
        <div class="card-body text-center">
            <img src="{{ asset('storage/public/company-logos/' . $company->logo) }}" alt="Company Logo" width="auto"
                height="150">
            <p>Email: {{ $company->email }}</p>
            <p>Website: <a href="{{ $company->website }}" target="_blank"
                    rel="noopener noreferrer">{{ $company->website }}</a></p>
        </div>
    </div>
@endsection
