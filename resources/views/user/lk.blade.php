@extends('layout.layout')

@section('content')

    @foreach($orders as $order)
        <button class="btn-lk" onclick="view('{{$order -> id}}')">
            <div class="container">
                <div class='lk-order'>
                    <div>
                        <p>Номер заказа</p>
                        <p>{{$order -> id}}</p>
                    </div>
                    <div>
                        <p>
                        <P>Статус заказа</P>
                        <p>{{$order -> status()}}</p>
                        </p>
                    </div>
                    <div>
                        <p>Итогавая стоимость</p>
                        <p>{{$order -> totalprice}}</p>
                    </div>
                    <div>
                        <p>Адрес</p>
                        <p>{{$order -> address}}</p>
                    </div>
                    <div>
                        <p>Стату оплаты</p>
                        <p>{{$order -> payStatus()}}</p>
                    </div>
                    <div><a href="{{route('deleteOrder', $order -> id)}}" class="delete-btn">Отмена заказа</a>
                    </div>
                </div>
        </button>
        <div id="{{$order -> id}}" style="display:none ; transition: 1s easy in out">
            @foreach($carts as $product1)
                @if($order -> id == $product1 -> order_id)
                    <div class="container" style="transition: 1s easy in out;">
                        <div class='lk-dishes'>
                            @foreach($dishes as $product2)
                                @if($product2 -> id == $product1 -> dish_id)
                                    <div>
                                        <img style="width: 300px; height: 200px;"
                                             src="{{asset('/storage/'. $product2 -> photo)}}" alt="image">
                                    </div>
                                    <p>
                                        {{$product2 -> name}}
                                    </p>
                                @endif

                            @endforeach
                            <p>Кол-во: {{$product1 -> count}}</p>

                            @foreach($dishes as $product3)
                                @if($product3 -> id == $product1 -> dish_id)
                                    <div>
                                        <p>Цена за 1шт: {{$product3 -> price}} р.</p>
                                    </div>
                                    <div>
                                        <p>{{$product3 -> price * $product1 -> count}} р.</p>
                                    </div>

                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
@endsection
