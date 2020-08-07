@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1>Details</h1>
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Trade Name: {{ $drugs->TradeName }}</h5> 
                        <li class="list-group-item "><b>Price: {{ $drugs->Price}}</b></li>
                    </div>
                    
                    <div class="card-body">
                        <a href="/admin/drugs/edit/{{ $drugs->_id }}" class="card-link">Edit</a>
                        <a href="/admin/drugs/delete/{{ $drugs->_id }}" class="card-link">Delete</a>
                        </div>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection