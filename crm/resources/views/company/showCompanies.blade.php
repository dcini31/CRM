@extends('layouts.company')

@section('content')
    <div class="card-body">
        <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="company-chart" style="position: relative; height: 300px;">
                <canvas id="company-chart-canvas" height="300" style="height: 300px;">
                </canvas>
            </div>
        </div>
        {{-- // --}}
        <div class="table-responsive">
            <table class="table">
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
                            <td>{{ $company->$id }}</td>
                            <td>{{ $company->$name }}</td>
                            <td>{{ $company->$email }}</td>
                            <td>{{ $company->$logo }}</td>
                            <td>{{ $company->$website }}</td>
                        @endforeach
                    @else
                        <td colspan="6" style="text-align:center">
                            No Company record exist
                        </td>
                    @endif
                </tbody>
            </table>
        </div><!-- /.card-body -->
    @endsection
