@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup" enctype="multipart/form-data">
            @csrf
            @foreach($restaurant as $rest)
                @error('name') <p style="color: red;">{{$message}}</p> @enderror
                <div class="form-item">
                    <input class="input-signup" id="name" value="{{$rest -> name}}" type="text" name="name"
                           placeholder="name">
                    <label for="name" class="label">Фио</label>
                </div>
                @error('photo') <p style="color: red;">{{$message}}</p> @enderror
                <div class="form-item">
                    <input class="input-signup" id="photo" type="file" name="photo" onchange="readURL(this);"
                           placeholder="photo">
                    <label for="photo" class="label">Фото</label>
                </div>
                <img style="display: none;" id="blah" src="#"/>
                @error('tag_id') <p style="color: red;">{{$message}}</p> @enderror
                <select class="form-select" name="tag_id">
                    <option selected value="{{$restaurantTag->id}}">{{$restaurantTag->name}}</option>
                    @foreach($tags as $tag)
                        @if($tag->id !== $restaurantTag->id)
                            <option value="{{$tag -> id}}">{{$tag -> name}}</option>
                        @endif
                    @endforeach
                </select>
                <input class="submit-btn" type="submit" value="Отправить">
            @endforeach
        </form>
    </div>
@endsection
