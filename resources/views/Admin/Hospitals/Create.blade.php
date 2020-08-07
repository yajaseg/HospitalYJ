@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Create New Hospital</h1>
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
                        <label for="Doctor Name">Doctor Name</label>
                        <select name="Doctor Name" id="Doctor Name" class="form-control">
                           <option value="0">Select a doctor...</option>
                           <option value="5f0680bb30496c33b80bae00">Dr.J.Laxman</option>
                        </select>
                  </div>
               </div> 
               
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
         </div>
      </div>
   </div>  
@endsection