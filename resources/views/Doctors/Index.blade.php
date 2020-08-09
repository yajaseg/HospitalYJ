@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>DOCTORS</h1>

                <div class="row">
                    @foreach($doctors as $doctors)
                        <div class="card col-md-3">
                          
                            <div class="card-body">
                                <h5 class="card-title">{{ $doctors->DoctorName }}</h5>
                                <h5 class="card-title">{{ $doctors->Speciality }}</h5>
                                <h5 class="card-title">{{ $doctors->MobileNumber }}</h5>
                                <a href="/doctors/{{ $doctors->_id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mx-auto" role="group" aria-label="First group">
                                @php
                                    $cpage = request('pg') == 0 ? 1 : request('pg');
                                @endphp
                                <a href="/doctors?pg={{$cpage - 1}}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                @for ($i = 1; $i <= ceil($doctorCount/12); $i++)
                                <a href="/doctors?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : '' }}">{{$i}}</a>
                                @endfor
                                <a href="/doctors?pg={{$cpage + 1}}" class="btn btn-secondary  {{ $cpage == ceil($doctorCount/12) ? 'disabled' : '' }}">&gt</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
