@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Details</h1>
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Doctor Name: {{ $doctors->DoctorName }}</h5> 
                        <li class="list-group-item "><b>Speciality: {{ $doctors->Speciality}}</b></li>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <b>MobileNumber: {{ $doctors->MobileNumber }} </b>
                        </li>
                        
                    </ul>
                    <div class="card-body">
                        <a href="/admin/doctors/edit/{{ $doctors->_id }}" class="card-link">Edit</a>
                        <a href="/admin/doctors/delete/{{ $doctors->_id }}" class="card-link">Delete</a>
                        </div>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection