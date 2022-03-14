@extends('layout.layout')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Document</title>
</head>
<body>
@section('content')
    <input type="checkbox" id="side-checkbox"/>
    <div class="side-panel">
        <label class="side-button-2" for="side-checkbox">+</label>
        <div class="side-title">Выберите фильтры:</div>
        <form action="{{route('welcome')}}" method="get">
            <div class="form-item">
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}"
                       @endif type="text" class="input-signup" id="exampleFormControlInput1" placeholder="Пицца">
                <label for="exampleFormControlInput1" class="label">Поиск</label>
            </div>
            <p>Выберите один из фильтров</p>
            @foreach($tag as $rest)
                <div class="radio-position">
                    <div class="form_radio_btn">
                        <input id="{{$rest->id}}" type="radio" name="tag_id" value="{{$rest->id}}"
                               @if(isset($_GET['tag_id'])) @if($_GET['tag_id'] == $rest->id) checked @endif @endif>
                        <label for="{{$rest->id}}">{{$rest->name}}</label>
                    </div>
                </div>
            @endforeach
            <div class="filter-button-position">
                <button type="submit" class="filter_btn">Применить</button>
                <a href="/" class="filter_btn_close">Сбросить</a>
            </div>
        </form>
    </div>
    <div class="side-button-1-wr">
        <label class="side-button-1" for="side-checkbox">
            <div class="side-b side-open">Открыть фильтрацию</div>
            <div class="side-b side-close">Закрыть фильтрацию</div>
        </label>
    </div>
    <div class="product_container">
        @foreach($products as $rest)
            <a href="{{route('DishList',$rest -> id)}}" style="text-decoration: none; color:black">
                <div class="product">
                    <div class="img-container-catalog">
                        <img style="width: 230px; height: 130px;" src="{{asset('/storage/'. $rest -> photo)}}"
                             alt="image" class="news_img">
                    </div>
                    <div class="product_info">
                        <p>
                            {{$rest -> name}}
                        </p>
                    </div>
                </div>
            </a>
    @endforeach
@endsection
</body>
</html>
