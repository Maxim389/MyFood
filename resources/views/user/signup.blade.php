@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            @error('name') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="name" type="text" name="name" placeholder="name">
                <label for="name" class="label">Фио</label>
            </div>
            @error('email') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="email" type="email" name="email" placeholder="email">
                <label for="email" class="label">Почта</label>
            </div>
            @error('login') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="login" type="text" name="login" placeholder="login">
                <label for="login" class="label">Логин</label>
            </div>
            @error('phone') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="phone" type="text" name="phone" placeholder="phone">
                <label for="phone" class="label">Номер телефона</label>
            </div>
            @error('photo') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="photo" type="file" name="photo" onchange="readURL(this);"
                       placeholder="photo">
                <label for="photo" class="label">Фото</label>
            </div>
            @error('password') <p style="color: red;">{{$message}}</p> @enderror
            <img style="display: none;" id="blah" src="#"/>
            <div class="form-item">
                <input class="input-signup" type="password" id="password" name="password" placeholder="password">
                <label for="password" class="label">Пароль</label>
            </div>
            <div class="form-item">
                <input class="input-signup" type="password" name="password_confirmation" id="password_confirmation"
                       placeholder="Подтверждение пароля">
                <label for="password_confirmation" class="label">Потверждение пароля</label>
            </div>
            @error('success') <p style="color: red;">{{$message}}</p> @enderror
            <label for="">Я согласен на обработку персональных данных</label>
            <input name="success" type="checkbox">
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection
