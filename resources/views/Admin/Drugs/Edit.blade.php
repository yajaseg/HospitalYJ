@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Edit Drug</h1>
            <form action="/admin/drugs/edit" method="POST">
                    @csrf
                    
               <input type="hidden" name="drugid" id="drugid" value="{{ $drugs->_id}}">
               <div class="form-group">
                  <label for="TradeName">Trade Name</label>
                  <input type="text" class="form-control" id="TradeName" name="TradeName" value="{{ $drugs->TradeName }}">
               </div>
               <div class="form-group">
                  <label for="Price">Price</label>
                  <input type="text" class="form-control" id="Price" name="Price" value="{{ $drugs->Price }}" >
               </div>
               
               
               <a href="/admin/drugs/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Edit</button>
            </form>
         </div>
      </div>
   </div>  
@endsection