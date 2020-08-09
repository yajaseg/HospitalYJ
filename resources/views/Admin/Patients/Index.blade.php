@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('mssg') !== null)
            <div class="alert alert-{{ session('alerttype')}} alert-dismissible fade show" role="alert">
                {{ session('mssg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h1>Patients</h1>
                <a class="text-right" href="/admin/patients/create">Create New Patient</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th scope="col">#</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Address</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patients)
                            <tr>
                                <th class="table-dark" scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $patients["Name"] }}</td>
                                <td>{{ $patients["Age"] }}</td>
                                <td>{{ $patients["Address"]}}</td>
                                <td class="table-dark">
                                    <a href="/admin/patients/details/{{ $patients['_id'] }}">Details</a> |
                                    <a href="/admin/patients/edit/{{ $patients->_id }}">Edit</a> |
                                    <a href="/admin/patients/delete/{{ $patients->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
