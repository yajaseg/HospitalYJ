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
                <h1>Doctors</h1>
                <a class="text-right" href="/admin/doctors/create">Create New Doctor</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th scope="col">#</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Speciality</th>
                            <th scope="col">MobileNumber</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doct)
                            <tr>
                                <th class="table-dark" scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $doct["DoctorName"] }}</td>
                                <td>{{ $doct["Speciality"] }}</td>
                                <td>{{ $doct["MobileNumber"]}}</td>
                                <td class="table-dark">
                                    <a href="/admin/doctors/details/{{ $doct['_id'] }}">Details</a> |
                                    <a href="/admin/doctors/edit/{{ $doct->_id }}">Edit</a> |
                                    <a href="/admin/doctors/delete/{{ $doct->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
