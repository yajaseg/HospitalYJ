@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Delete Hospital</h1>
            <form action="/admin/hospitals/delete" method="POST">
                    @csrf
                    @method("DELETE")
               <input type="hidden" name="hospitalid" id="{{ $hospital->_id}}">
               <div class="form-group">
                  <label for="Name">Hospital Name</label>
                  <input type="text" class="form-control" id="Name" name="Name" value="{{ $hospital->Name }}" disabled>
               </div>
               <div class="form-group">
                     <label for="Address"> Address</label>
                     <br>
                     <textarea class="form-control" name="Address" id="Address" cols="30" rows="10" value="{{ $hospital->Address }}" disabled></textarea>
               </div>  
               <div class="row">
                  <div class="form-group col-md-6">
                        <label for="Phone_Number">Phone Number</label>
                        <input type="tel" class="form-control" id="Phone_Number" name="Phone_Number" value="{{ $hospital->Phone_Number }}" disabled>
                  </div>
                  <div class="form-group col-md-6">
                        <label for="DoctorName">Doctor Name</label>
                        <input type="text" class="form-control" id="DoctorName" name="DoctorName" value="{{ $hospital->DoctorName}}" disabled>
                  </div>
               </div> 
               
               <a href="/admin/hospitals/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
            </form>
         </div>
      </div>
   </div>  
@endsection