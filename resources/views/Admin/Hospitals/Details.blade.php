@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Details</h1>
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hospital Name: {{ $hospital->Name }}</h5> 
                        <p class="card-text">
                            <b>Address:</b> {{ $hospital->Address }}
                           
                            <br>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <b>Phone Number: {{ $hospital->Phone_Number }} </b>
                        </li>
                        <li class="list-group-item "><b>Doctor: {{ $hospital->DoctorName}}</b></li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/hospitals/edit/{{ $hospital->_id }}" class="card-link">Edit</a>
                        <a href="/admin/hospitals/delete/{{ $hospital->_id }}" class="card-link">Delete</a>
                        </div>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection