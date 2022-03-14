@extends('layout.layout')

@section('content')
    <div class="form-container">
        <form action="{{route('accessOrder')}}" class="form-signup">
            @csrf
            <div class="form-item">
                <input class="input-signup" id="number" type="text" name="number" placeholder="2220 2220"
                       onkeypress='validate(event)' required>
                <label for="number" class="label">Номер карты</label>
            </div>
            <div class="form-item">
                <input class="input-signup" id="name" type="text" name="name" placeholder="2220 2220" required>
                <label for="name" class="label">Имя владельца</label>
            </div>
            <div class="form-item">
                <input class="input-signup" id="month" type="month" name="month" placeholder="2220 2220"
                       onkeypress='validate(event)' required>
                <label for="month" class="label">Срок действия</label>
            </div>
            <div class="form-item">
                <input class="input-signup" id="cvv" type="text" name="cvv" placeholder="2220 2220"
                       onkeypress='validate(event)' maxlength="3" required>
                <label for="cvv" class="label">Код беpопасности</label>
            </div>
            <input class="submit-btn" type="submit" value="Оплатить">
        </form>
    </div>
@endsection
