@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            @error('name') <p style="color: red;">{{$message}}</p> @enderror
            <div class="form-item">
                <input class="input-signup" id="name" type="text" name="name" placeholder="Папа джонс">
                <label for="name" class="label">Название ресторана</label>
            </div>
            @error('tag_id') <p style="color: red;">{{$message}}</p> @enderror
            <label for="">Что готовят</label>
            <select class="select-style" name="tag_id" id="">
                @foreach($tags as $tag)
                    <option value="{{$tag -> id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            @error('photo') <p style="color: red;">{{$message}}</p> @enderror
            <label for="">Фото ресторана</label>
            <input class="input-signup" id="photo" type="file" name="photo" onchange="readURL(this);">
            <img style="display: none;" id="blah" src="#"/>
            <input class="submit-btn" type="submit" value="Отправить">
        </form>
    </div>
@endsection
