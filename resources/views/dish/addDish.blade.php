@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            @error('name') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" type="text" name="name" id="name" placeholder="Пицца">
                <label for="name" class="label">Название блюда</label>
            </div>
            @error('price') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" type="text" name="price" id="price" placeholder="432"
                       onkeypress='validate(event)'>
                <label for="price" class="label">Цена блюда</label>
            </div>
            @error('weight') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" type="text" name="weight" id="weight" placeholder="500"
                       onkeypress='validate(event)'>
                <label for="weight" class="label">Вес блюда</label>
            </div>
            @error('restaurant_id') <p style="color: red;">{{$message}}</p> @enderror
            <label for="">ресторан</label>
            <select class="select-style" name="restaurant_id" id="">
                @foreach($restaurants as $rest)
                    <option value="{{$rest -> id}}">{{$rest -> name}}</option>
                @endforeach
            </select>
            @error('photo') <p style="color: red;">{{$message}}</p> @enderror
            <label for="">Фото блюда</label>
            <input class="input-signup" id="photo" type="file" name="photo" onchange="readURL(this);">
            <img style="display: none;" id="blah" src="#"/>
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection
