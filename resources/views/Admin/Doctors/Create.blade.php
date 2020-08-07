
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Create New Doctor</h1>
             <form action="/admin/doctors/create" method="POST">
                @csrf
            <form>
               <div class="form-group">
                  <label for="DoctorName">Doctor Name</label>
                  <input type="text" class="form-control" id="DoctorName" name="DoctorName">
               </div>
               <div class="form-group">
               <label for="Speciality">Speciality</label>
                  <input type="text" class="form-control" id="Speciality" name="Speciality">
               </div>  
               <div class="row">
                  <div class="form-group col-md-6">
                        <label for="MobileNumber"> Mobile Number</label>
                        <input type="tel" class="form-control" id="MobileNumber" name="MobileNumber">
                  </div>
                  
               </div> 
              
               <a href="/admin/hospitals/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
            </form>
         </div>
      </div>
   </div>  
@endsection