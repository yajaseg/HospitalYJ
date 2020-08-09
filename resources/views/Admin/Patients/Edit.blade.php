@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Edit Hospital</h1>
            <form action="/admin/patients/edit" method="POST">
                    @csrf
                    <input type="hidden" name="patientid" id="patientid" value="{{ $patient->_id}}">
               <div class="form-group">
                  <label for="Name">Patient Name</label>
                  <input type="text" class="form-control" id="Name" name="Name" value="{{ $patient->Name }}" >
               </div>
               <div class="form-group">
                  <label for="Age">Age</label>
                  <input type="text" class="form-control" id="Age" name="Age" value="{{ $patient->Age }}" >
               </div>
               <div class="form-group">
                     <label for="Address"> Address</label>
                     <br>
                     <input type="text" class="form-control" id="Address" name="Address" value="{{ $patient->Address }}" >
               
               </div>  
           
               
               <a href="/admin/patients/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
               <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Edit</button>
            </form>
         </div>
      </div>
   </div>  
@endsection