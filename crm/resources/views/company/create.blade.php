@extends('layouts.company')
@section('content')
    <h1>Create</h1>
    <div class="card-body">
        {{-- // --}}
        <div class="table-responsive">
            <form method="post" action="{{ route('company/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby=""
                        placeholder="Company Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Company Email">
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control-file" id="logo">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="website" name="website" class="form-control" id="" placeholder="Company Website">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            @endsection
