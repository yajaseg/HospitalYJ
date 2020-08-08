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
                <h1>Products</h1>
                <a class="text-right" href="/admin/hospitals/create">Create New Hospital</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th scope="col">#</th>
                            <th scope="col">Hospital Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hospitals as $hosp)
                            <tr>
                                <th class="table-dark" scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $hosp["Name"] }}</td>
                                <td>{{ $hosp["Address"] }}</td>
                                <td>{{ $hosp["PhoneNumber"]}}</td>
                                <td class="table-dark">
                                    <a href="/admin/hospitals/details/{{ $hosp['_id'] }}">Details</a> |
                                    <a href="/admin/hospitals/edit/{{ $hosp->_id }}">Edit</a> |
                                    <a href="/admin/hospitals/delete/{{ $hosp->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
