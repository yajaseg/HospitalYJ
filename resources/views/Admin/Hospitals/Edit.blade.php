@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Edit Hospital</h1>
            <form action="/admin/hospitals/edit" method="POST">
                    @csrf
            
            <input type="hidden" name="hospitalid" id="{{ $hospital->_id}}">
               <div class="form-group">
                  <label for="Name">Hospital Name</label>
                  <input type="text" class="form-control" id="Name" name="Name" value="{{ $hospital->Name }}" >
               </div>
               <div class="form-group">
                     <label for="Address"> Address</label>
                     <br>
                     <textarea class="form-control" name="Address" id="Address" cols="30" rows="10" value="{{ $hospital->Address }}" ></textarea>
               </div>  
               <div class="row">
                  <div class="form-group col-md-6">
                        <label for="PhoneNumber">Phone Number</label>
                        <input type="tel" class="form-control" id="PhoneNumber" name="PhoneNumber" value="{{ $hospital->PhoneNumber }}" >
                  </div>
                  <div class="form-group col-md-6">
                        <label for="DoctorName">Doctor Name</label>
                        <input type="text" class="form-control" id="DoctorName" name="DoctorName" value="{{ $hospital->DoctorName}}">
                  </div>
               </div> 
               
               <a href="/admin/hospitals/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
               <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Edit</button>
            </form>
         </div>
      </div>
   </div>  
@endsection