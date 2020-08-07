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
                <h1>Drugs</h1>
                <a class="text-right" href="/admin/drugs/create">Create New Drug</a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr class="bg-warning">
                            <th scope="col">#</th>
                            <th scope="col">Trade Name</th>
                            <th scope="col">Price</th>
                           
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($drugs as $drug)
                            <tr>
                                <th class="table-dark" scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $drug["TradeName"] }}</td>
                                <td>{{ $drug["Price"] }}</td>
                               
                                <td class="table-dark">
                                    <a href="/admin/drugs/details/{{ $drug['_id'] }}">Details</a> |
                                    <a href="/admin/drugs/edit/{{ $drug->_id }}">Edit</a> |
                                    <a href="/admin/drugs/delete/{{ $drug->_id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
