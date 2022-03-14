@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            @error('name') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="name" value="{{Auth::user() -> name}}" type="text" name="name"
                       placeholder="name">
                <label for="name" class="label">Фио</label>
            </div>
            @error('email') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="email" value="{{Auth::user() -> email}}" type="email" name="email"
                       placeholder="email">
                <label for="email" class="label">Почта</label>
            </div>
            @error('login') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="login" value="{{Auth::user() -> login}}" type="text" name="login"
                       placeholder="login">
                <label for="login" class="label">Логин</label>
            </div>
            @error('phone') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="phone" value="{{Auth::user() -> phone}}" type="text" name="phone"
                       placeholder="phone">
                <label for="phone" class="label">Номер телефона</label>
            </div>
            @error('photo') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="photo" type="file" name="photo" onchange="readURL(this);"
                       placeholder="photo">
                <label for="photo" class="label">Фото</label>
            </div>
            <img style="display: none;" id="blah" src="#"/>
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection
