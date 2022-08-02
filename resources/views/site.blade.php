@extends('layout')

@section('content')
    <h2 class="text-center">{{ $site->name }}</h2>
    <br>
    <h2 class="text-center">График кликов</h2>
    <div>
        <canvas id="myChart" width="400" height="400"></canvas>
        
    </div>
    <br>
    <h2 class="text-center">Карта кликов</h2>
    <div>
        <iframe src="{{ $site->url }}" width="100%" height="1000"></iframe>
    </div>
    <input type="hidden" value="{{ $click_hours }}" id="hour_click">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.0/dist/chart.min.js"></script>
    <script src="{{ URL::asset('js/canvas.js') }}" ></script>
@endsection