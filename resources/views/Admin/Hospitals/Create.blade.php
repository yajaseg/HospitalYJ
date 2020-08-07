
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Create New Hospital</h1>
             <form action="/admin/hospitals/create" method="POST">
                @csrf
            <form>
               <div class="form-group">
                  <label for="Name">Hospital Name</label>
                  <input type="text" class="form-control" id="Name" name="Name">
               </div>
               <div class="form-group">
                     <label for="Address">Address</label>
                     <br>
                     <textarea class="form-control" name="Address" id="Address" cols="30" rows="10"></textarea>
               </div>  
               <div class="row">
                  <div class="form-group col-md-6">
                        <label for="Phone Number">Phone Number</label>
                        <input type="tel" class="form-control" id="Phone Number name="Phone Number">
                  </div>
                  <div class="form-group col-md-6">
                        <label for="DoctorName">Doctor Name</label>
                        <input type="text" class="form-control" id="DoctorName" name="DoctorName">
                        </select>
                  </div>
               </div> 
              
               <a href="/admin/hospitals/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
            </form>
         </div>
      </div>
   </div>  
@endsection