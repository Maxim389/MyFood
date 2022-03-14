@extends('layout.layout')

@section('content')

    <div class="profile-container">
        <div id="ProfilePage">
            <div id="LeftCol">
                <div id="Photo">
                    <img src="{{asset('/storage/'. Auth::user()->photo)}}" alt="" style="width: 200px; height:200px">
                </div>
            </div>

            <div id="Info">
                <p>
                    <strong class="title-profile">Name:</strong>
                    <span>{{ Auth::user()->name}}</span>
                </p>
                <p>
                    <strong class="title-profile">email:</strong>
                    <span> {{Auth::user()->email}}</span>
                </p>
                <p>
                    <strong class="title-profile">login:</strong>
                    <span> {{Auth::user()->login}}</span>
                </p>
                <p>
                    <strong class="title-profile">phone:</strong>
                    <span> {{Auth::user()->phone}}</span>
                </p>
            </div>
        </div>
    </div>
    <div style="display: flex; justify-content:center">
        <a href="{{route('update', Auth::id())}}" class="more-link" style="margin-top: 30px;">Изменить данные</a>
        <a href="{{route('updatePassword', Auth::id())}}" class="more-link" style="margin-top: 30px;">Изменить
            пароль</a>
    </div>
@endsection
