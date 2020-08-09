
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Create New Hospital</h1>
             <form action="/admin/patients/create" method="POST">
                @csrf
            <form>
               <div class="form-group">
                  <label for="Name">Patient Name</label>
                  <input type="text" class="form-control" id="Name" name="Name">
               </div>
               <div class="form-group">
                     <label for="Age">Age</label>
                     <br>
                     <input type="Age" class="form-control" id="Age" name="Age">
               </div>  
               
               <div class="form-group">
                     <label for="Address">Address</label>
                     <br>
                     <input type="Address" class="form-control" id="Address" name="Address">
               </div>  
               
              
               <a href="/admin/patients/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
            </form>
         </div>
      </div>
   </div>  
@endsection