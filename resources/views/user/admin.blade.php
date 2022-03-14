@extends('layout.layout')

@section('content')

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'orders')" id="defaultOpen">Список заказов</button>
        <button class="tablinks" onclick="openCity(event, 'restaurnat')">Список ресторанов</button>
        <button class="tablinks" onclick="openCity(event, 'dishes')">Список блюд</button>
    </div>

    <div id="orders" class="tabcontent">
        @foreach($orders as $order)
            <button class="btn-lk" onclick="view('{{$order -> id}}')">
                <div class="container">
                    <div class='admin-order'>
                        <div>
                            <p>Номер заказа</p>
                            <p>{{$order -> id}}</p>
                        </div>
                        <div>
                            <p>Покупатель</p>
                            <p>{{$order -> user()}}</p>
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
                        <div><a href="{{route('updateOrder', $order -> id)}}" style="background-color: #188bc2;"
                                class="delete-btn">изменить заказ</a>
                            <div><a href="{{route('deleteOrder', $order -> id)}}" class="delete-btn">удалить заказ</a>
                            </div>
                        </div>
            </button>
            <div id="{{$order -> id}}" style="display:none">
                @foreach($carts as $product1)
                    @if($order -> id == $product1 -> order_id)
                        <div class="container">
                            <div class='order-dish'>
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
    </div>

    <div id="restaurnat" class="tabcontent">
        <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
        <div class="container">
            @foreach($restaurant as $rest)
                <div class='admin-restaurant'>
                    <div>
                        <p>Фото ресторана</p>
                        <img style="width: 300px; height: 200px;" src="{{asset('/storage/'. $rest -> photo)}}"
                             alt="image">
                    </div>
                    <div>
                        <p>Название ресторана</p>
                        <p>{{$rest -> name}}</p>
                    </div>
                    <div>
                        <p>
                        <P>Тег ресторана</P>
                        <p>{{$rest -> tag()}}</p>
                        </p>
                    </div>
                    <div><a href="{{route('updateRestaurant', $rest -> id)}}" style="background-color: #188bc2;"
                            class="delete-btn">изменить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="dishes" class="tabcontent">
        <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
        <div class="container">
            @foreach($dishes as $dish)
                <div class='admin-dishes'>
                    <div>
                        <p>Фото блюда</p>
                        <img style="width: 300px; height: 200px;" src="{{asset('/storage/'. $dish -> photo)}}"
                             alt="image">
                    </div>
                    <div>
                        <p>Название блюда</p>
                        <p>{{$dish -> name}}</p>
                    </div>
                    <div>
                        <p>
                        <P>цена блюда</P>
                        <p>{{$dish -> price}}</p>
                        </p>
                    </div>
                    <div>
                        <p>
                        <P>цена блюда</P>
                        <p>{{$dish -> weight}}</p>
                        </p>
                    </div>
                    <div>
                        <p>
                        <P>Ресторан</P>
                        <p>{{$dish -> restaurant()}}</p>
                        </p>
                    </div>
                    <div><a href="{{route('updateDish', $dish -> id)}}" style="background-color: #188bc2;"
                            class="delete-btn">изменить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
