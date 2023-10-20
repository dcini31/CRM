@extends('layouts.employee')
@section('content')
    <h1>Create</h1>
    <div class="card-body">
        {{-- // --}}
        <div class="table-responsive">
            <form method="post" action="{{ route('employee/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" autocomplete="on" id="first_name"
                        aria-describedby="" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" autocomplete="on" id="last_name"
                        placeholder="Surname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="on" id="email"
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="numeric" name="phone" class="form-control" autocomplete="on" id="phone"
                        placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" class="form-control" id="company_id">
                        <option value="" disabled selected>Select a company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            @endsection
