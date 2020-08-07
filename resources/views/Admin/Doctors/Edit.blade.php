@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Delete Doctor</h1>
            <form action="/admin/doctors/delete" method="POST">
                    @csrf
                    @method("DELETE")
               <input type="hidden" name="doctorid" id="{{ $doctors->_id}}">
               <div class="form-group">
                  <label for="DoctorName">Doctor Name</label>
                  <input type="text" class="form-control" id="DoctorName" name="DoctorName" value="{{ $doctors->DoctorName }}" >
               </div>
               <div class="form-group">
                  <label for="Speciality">Speciality</label>
                  <input type="text" class="form-control" id="Speciality" name="Speciality" value="{{ $doctors->Speciality }}" >
               </div>
               <div class="row">
                  <div class="form-group col-md-6">
                        <label for="MobileNumber">Mobile Number</label>
                        <input type="tel" class="form-control" id="MobileNumber" name="MobileNumber" value="{{ $doctors->MobileNumber }}" >
                  </div>
                 
               </div> 
               
               <a href="/admin/doctors/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
            </form>
         </div>
      </div>
   </div>  
@endsection