@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-75">
            <div class="container">
                <div class="col-25">
                    <div class="container">
                        <h4>Корзина <span class="price" style="color:black"><i
                                    class="fa fa-shopping-cart"></i> <b>{{$cartCount}}</b></span></h4>
                        @foreach($carts as $product1)
                            @foreach($dishes as $product3)
                                @if($product3 -> id == $product1 -> dish_id)
                                    <p>{{$product3 ->name}}<span
                                            class="price">{{$product3 -> price}} x {{$product1 -> count}}</span></p>
                                @endif
                            @endforeach
                        @endforeach
                        <hr>
                        <p>Доставка<span class="price">199</span></p>
                        <p>Итого <span class="price" style="color:black"><b>{{Session::get('1') + 199}}</b></span></p>
                    </div>
                </div>
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-50">
                            <h3>Куда доставить заказ?</h3>
                            <div class="form-item">
                                <input class="input-order" type="text" id="city" name="city" value="Челябинск" placeholder="Челябинск" disabled required> 
                                <label for="city" class="label">Город</label>
                            </div>
                            <div class="form-item">
                                <input class="input-order" type="text" id="street" name="street"
                                       placeholder="Витебская" required>
                                <label for="street" class="label">Улица</label>
                            </div>
                            <div class="row">
                                <div class="col-50 form-item">
                                    <input class="input-order" type="text" id="house" name="house" placeholder="22" required>
                                    <label style="margin-left: 15px;" for="house" class="label">Дом</label>
                                </div>
                                <div class="col-50 form-item">
                                    <input class="input-order" type="text" id="apartment" name="apartment"
                                           placeholder="11" required>
                                    <label style="margin-left: 15px;" for="apartment" class="label">Квартира</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3>Способ олаты</h3>
                        <select class="select-style" name="pay" id="pay">
                            <option value="1">Наличные</option>
                            <option value="2">Картой</option>
                        </select>
                    </div>
                    <input type="submit" value="Оформить заказ" class="btn-order">
                </form>
            </div>
        </div>
    </div>
@endsection
