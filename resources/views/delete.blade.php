@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form method="post" action="" class="form-signup">
            @csrf
            <a class="more-links" href="{{route('cart')}}">Отмена</a>
            <input class="submit-btn" type="submit" style="background-color: red;" value="Удалить">
        </form>
    </div>
@endsection
