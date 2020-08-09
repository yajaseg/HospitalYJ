@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-12">
                <div class="card-body">
                    <h5 class="card-title">Patient Name: {{ $patients->Name }}</h5>
                    <h5 class="card-title">Age: {{ $patients->Age }} years old. </h5>
                                <h5 class="card-title">Address: {{ $patients->Address }}</h5>
                </div>
           </div>
        </div>
    </div>
   
@endsection