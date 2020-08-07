@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Create New Hospital</h1>
            <form>
               <div class="form-group">
                  <label for="Name">Hospital Name</label>
                  <input type="text" class="Name" id="Name" name="Name">
               </div>
               <div class="form-group">
                  <label for="Address">Address</label>
                  <input type="text" class="form-control" id="Address" name="Address">
               </div>
               <div class="form-group">
                  <label for="Phone Number"></label>
                  <input type="tel" class="Phone" id="Phone Number" name="Phone Number">
               </div>
            </form>
         </div>
      </div>
   </div>  
@endsection