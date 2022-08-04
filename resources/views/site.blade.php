@extends('layout')

@section('content')
    <h2 class="text-center">{{ $site->name }}</h2>
    <br>
    <h2 class="text-center">График кликов</h2>
    <div>
        <canvas id="myChart" max-width="400" max-height="300"></canvas>
        
    </div>
    <br>
    <h2 class="text-center">Карта кликов</h2>
    <div style="position:relative; margin-left: 12%" class="align-items-center" >
        <div style="position:absolute; top:0; left:0; z-index:3">
            <iframe src="{{ $site->url }}" width="1000" height="900"></iframe>
        </div>
        <div style="position:absolute; top:0; left:0; z-index:10; opacity: 0.7;">
            <canvas id="map" width="1000" height="900" style="background-color:black; opacity: 0.5;"></canvas>
        </div>
    </div>

    <input type="hidden" value="{{ $click_hours }}" id="hour_click">
    <input type="hidden" value="{{ $clicks_map }}" id ="map_clicks">
    <input type="hidden" value="{{ $count }}" id ="count">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.0/dist/chart.min.js"></script>
    <script src="{{ URL::asset('js/canvas.js') }}" ></script>
@endsection