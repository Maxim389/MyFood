@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            @error('name') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="name" type="text" name="name" placeholder="Пиццерия">
                <label for="name" class="label">Название тега</label>
            </div>
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection
