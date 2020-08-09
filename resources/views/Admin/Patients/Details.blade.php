@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Details</h1>
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Patient Name:</b>  {{ $patient->Name }}</h5> 
                        <p class="card-text">
                        <li class="list-group-item "><b>Age:</b> {{ $patient->Age }}
                        </p>
                        <p class="card-text">
                        <li class="list-group-item "><b>Address:</b> {{ $patient->Address }}
                        </p>
                    </div>
                   
                    <div class="card-body">
                        <a href="/admin/patients/edit/{{ $patient->_id }}" class="card-link">Edit</a>
                        <a href="/admin/patients/delete/{{ $patient->_id }}" class="card-link">Delete</a>
                        </div>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection