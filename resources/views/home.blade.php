@extends('layout')

@section('content')
<div>
    <h2 class="text-center">Добавить новый сайт</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-inline" method="POST" action="/check">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" placeholder="Введите название" id="site_name" name="site_name">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" placeholder="Введите URL" id="site_url" name="site_url">
        </div>
        <button type="submit" class="btn btn-primary mb-2" id="add-btn">Добавить</button>
    </form>
</div>
<br>
<div>
    <h2 class="text-center">Подключенные сайты</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">URL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
            <tr>
                <td><a href="/site/{{ $site->id }}">{{ $site->name }}</a></td>
                <td><a href="{{ $site->url }}">{{ $site->url }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection