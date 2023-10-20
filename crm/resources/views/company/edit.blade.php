@extends('layouts.company')
@section('content')
    <h1>Edit Company</h1>
    <div class="card-body">
        <div class="table-responsive">
            <form method="post" action="{{ route('company/update', $companies->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby=""
                        value="{{ $companies->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email"
                        value="{{ $companies->email }}">
                </div>
                <div class="form-group">
                    <div><img src="{{ $companies->logo }}" alt="" width="auto" height="150"></div>
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control-file" id="logo">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="website" name="website" class="form-control" id=""
                        value="{{ $companies->website }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
