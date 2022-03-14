<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">


    <title>Document</title>
</head>
<body>
@yield('header')
<header class="header flex jcsb aic">
    <div class="container flex jcsb aic">
        <div>
            <a href="/"><img src="/img/logo.png" alt="" style="width: 150px; height:100px"></a>
        </div>
        <div class="header-btn-container">
            @guest
                <a href="{{route('signup')}}" class="header-btn">Регистрация</a>
                <a href="{{route('signin')}}" class="header-btn">Авторизация</a>
            @endguest
            @auth
                <a href="{{route('cart')}}" class="cart-btn">
                    @if(Session::get('1') != null)
                        {{Session::get('1')}} руб.
                    @else
                        Корзина
                    @endif

                </a>
                <button class="header-hamburger hamburger">Открыть меню</button>
                <nav class="header-list">
                    @if(Auth::user() -> isAdmin)
                        <a class="header-links" href="{{route('admin')}}">Администраторский раздел</a>
                        <a class="header-links" href="{{route('addRestaurant')}}">Добавить ресторан</a>
                        <a class="header-links" href="{{route('addDish')}}">Добавить блюдо</a>
                        <a class="header-links" href="{{route('addTag')}}">Добавить тэг</a>
                    @endif
                    <a class="header-links" href="{{route('lk')}}">Личный кабинет</a>
                    <a class="header-links" href="{{route('cart')}}">Корзина</a>
                    <a class="header-links" href="{{route('profile')}}">Профиль</a>
                    <a class="header-links" href="{{route('logout')}}">Выйти</a>
                </nav>

                <div class="dropdown">
                    <img onclick="myFunction()" class="dropbtn img" src="{{asset('/storage/'. Auth::user()->photo)}}"
                         alt="Картинка">
                    <div id="myDropdown" class="dropdown-content">
                        @if(Auth::user() -> isAdmin)
                            <a href="{{route('admin')}}">Администраторский раздел</a>
                            <a href="{{route('addRestaurant')}}">Добавить ресторан</a>
                            <a href="{{route('addDish')}}">Добавить блюдо</a>
                            <a href="{{route('addTag')}}">Добавить тэг</a>
                        @endif
                        <a href="{{route('lk')}}">Личный кабинет</a>
                        <a href="{{route('profile')}}">Профиль</a>
                        <a href="{{route('logout')}}">Выйти</a>
                    </div>
                </div>
            @endauth
        </div>


    </div>

</header>
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"
        type="text/javascript"></script>
<script src="/assets/js/js.js"></script>
<script src="/assets/js/validate.js"></script>
</body>
</html>
