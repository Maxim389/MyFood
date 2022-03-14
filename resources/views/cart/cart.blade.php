@extends('layout.layout')

@section('content')

    <?php

    use Illuminate\Support\Facades\Session as FacadesSession;

    $lubaya = 0;
    ?>

    @foreach($carts as $product1)
        <div class="container">
            <div class='cart-container'>
                @foreach($dishes as $product2)
                    @if($product2 -> id == $product1 -> dish_id)
                        <div>
                            <img style="width: 300px; height: 200px;" src="{{asset('/storage/'. $product2 -> photo)}}"
                                 alt="image">
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
                            <?php
                            $lubaya += $product3->price * $product1->count;
                            ?>
                            <p>{{$product3 -> price * $product1 -> count}} р.</p>
                        </div>

                    @endif
                @endforeach
                <div><a href="{{route('delete', $product1 -> id)}}" style="text-decoration: none; outline:none">❌</a>
                </div>
            </div>
        </div>

    @endforeach
    <div class="flex aic container" style="justify-content: space-between;">
        <?php echo "Итоговая стоимость:" . $lubaya;
        FacadesSession::put('1', $lubaya);
        ?>

        <a href="{{route('order')}}" class="more-link">Оформить заказ</a>
    </div>

@endsection
