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
                    <input type="text" name="first_name" class="form-control" autocomplete="on" id="first_name"
                        aria-describedby="" value="{{ $employee->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" autocomplete="on" id="last_name"
                        value="{{ $employee->last_name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="on" id="email"
                        value="{{ $employee->email }}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="numeric" name="phone" class="form-control" autocomplete="on" id="phone"
                        value="{{ $employee->phone }}">
                </div>
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" class="form-control" id="company_id">
                        <option value="{{ $employee->company_id }}" disabled selected>{{ $employee->company->name }}
                        </option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
