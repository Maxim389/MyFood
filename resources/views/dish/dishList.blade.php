@extends('layout.layout')
@section('content')
    <div class="dishList_container">
        @foreach($dishes as $dish)
            <div class="dish_container">
                <div class="dish">
                    <div class="img-container-catalog">
                        <img style="width: 330px; height: 180px;" src="{{asset('/storage/'. $dish -> photo)}}"
                             alt="image" class="news_img">
                    </div>
                    <div class="dish_info">
                        <p>
                            {{$dish -> name}} ({{$dish -> weight}} г.)
                        </p>
                        <h4>{{$dish -> price}} р.</h4>
                        <a href="#" class="js-open-modal modal-btn" data-modal="{{$dish -> id}}">Купить</a>
                    </div>
                </div>
            </div>

            <div class="modal" data-modal="{{$dish -> id}}">
                <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/>
                </svg>
                <img style="width: 230; height: 180px" src="{{asset('/storage/'. $dish -> photo)}}" alt="">
                <p class="modal__title">{{$dish -> name}}</p>
                <form action="" method="post">
                    @csrf
                    <div class="number">
                        <span class="minus">-</span>
                        <input type="text" name="count" value="1" size="5"/>
                        <span class="plus">+</span>
                    </div>
                    <input type="hidden" value="{{$dish->id}}" name="data-name"/>
                    <button class="more-link" type="submit" href="#" style="margin-top: 10px;">Купить</button>
                </form>
            </div>

            <div class="overlay js-overlay-modal"></div>
        @endforeach
    </div>
@endsection
