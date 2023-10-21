@extends('layouts.employee')
@section('content')
    <h1>Edit Employee</h1>
    <div class="card-body">
        <div class="table-responsive">
            <form method="post" action="{{ route('employee/update', $employee->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                        autocomplete="on" id="first_name" aria-describedby="" value="{{ $employee->first_name }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                        autocomplete="on" id="last_name" value="{{ $employee->last_name }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        autocomplete="on" id="email" value="{{ $employee->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        autocomplete="on" id="phone" value="{{ $employee->phone }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" class="form-control @error('company_id') is-invalid @enderror"
                        id="company_id">
                        <option value="{{ $employee->company_id }}" disabled selected>{{ $employee->company->name }}
                        </option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection
