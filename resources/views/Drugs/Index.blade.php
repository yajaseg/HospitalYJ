@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>DRUGS</h1>

                <div class="row">
                    @foreach($drugs as $drugs)
                        <div class="card col-md-3">
                          
                            <div class="card-body">
                                <h5 class="card-title">Trade Name: {{ $drugs->TradeName }}</h5>
                               
                               
                                <a href="/drugs/{{ $drugs->_id }}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mx-auto" role="group" aria-label="First group">
                                @php
                                    $cpage = request('pg') == 0 ? 1 : request('pg');
                                @endphp
                                <a href="/drugs?pg={{$cpage - 1}}" class="btn btn-secondary {{ $cpage == 1 ? 'disabled' : '' }}">&lt</a>
                                @for ($i = 1; $i <= ceil($drugCount/12); $i++)
                                <a href="/drugs?pg={{$i}}" class="btn btn-secondary {{ $cpage == $i ? 'disabled' : '' }}">{{$i}}</a>
                                @endfor
                                <a href="/drugs?pg={{$cpage + 1}}" class="btn btn-secondary  {{ $cpage == ceil($drugCount/12) ? 'disabled' : '' }}">&gt</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
