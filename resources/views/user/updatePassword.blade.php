@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            @error('password') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" type="password" id="password" name="password" placeholder="password">
                <label for="password" class="label">Пароль</label>
            </div>
            <div class="form-item">
                <input class="input-signup" type="password" name="password_confirmation" id="password_confirmation"
                       placeholder="Подтверждение пароля">
                <label for="password_confirmation" class="label">Потверждение пароля</label>
            </div>
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection
