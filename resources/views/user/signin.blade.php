@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup">
            @csrf
            @error('error') <p style="color: red;">{{$message}}</p> @enderror
            @error('login') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="login" type="text" name="login" placeholder="32">
                <label for="login" class="label">Логин</label>
            </div>
            @error('password') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="password" type="password" name="password" placeholder="23">
                <label for="password" class="label">Пароль</label>
            </div>
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection
