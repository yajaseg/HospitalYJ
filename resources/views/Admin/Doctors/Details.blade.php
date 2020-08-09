@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Details</h1>
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Doctor Name: {{ $doctor->DoctorName }}</h5> 
                        <li class="list-group-item "><b>Speciality: {{ $doctor->Speciality}}</b></li>
                        <li class="list-group-item "> <b>MobileNumber: {{ $doctor->MobileNumber }} </b>
                    </div>

                   
                    
                    <div class="card-body">
                        <a href="/admin/doctors/edit/{{ $doctor->_id }}" class="card-link">Edit</a>
                        <a href="/admin/doctors/delete/{{ $doctor->_id }}" class="card-link">Delete</a>
                        </div>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection