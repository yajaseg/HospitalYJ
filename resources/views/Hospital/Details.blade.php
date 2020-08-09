@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h5 class="card-title">Hospital Name: {{ $hospitals->Name }}</h5>
                    <h5 class="card-title">Address: {{ $hospitals->Address }}</h5>
                    <h5 class="card-title">Phone Number: {{ $hospitals->PhoneNumber }}</h5>
                </div>
           </div>
        </div>
    </div>
   
@endsection