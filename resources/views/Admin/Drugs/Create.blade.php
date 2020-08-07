
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Create New Doctor</h1>
             <form action="/admin/drugs/create" method="POST">
                @csrf
            <form>
               <div class="form-group">
                  <label for="TradeName">Trade Name</label>
                  <input type="text" class="form-control" id="TradeName" name="TradeName">
               </div>
               <div class="form-group">
               <label for="Price">Price</label>
                  <input type="text" class="form-control" id="Price" name="Price">
               </div>  
              
              
               <a href="/admin/drugs/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
            </form>
         </div>
      </div>
   </div>  
@endsection