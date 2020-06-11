<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Курахівська філія
        Дніпровського державного технікуму енергетичних та інформаційних технологій </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    
</head>
<body id="app">
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-center col-md-3">
                        <div class="logo">
                            <a href="{{url("/")}}">
                                <img src="/logo.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-8 d-flex justify-content-center flex-column col-center">
                        <div class="row">
                            <div class="header__title">
                                <p class="text-center">Курахівська філія
                                    Дніпровського державного технікуму енергетичних та інформаційних технологій</p>
                            </div>
                        </div>

                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <button type="button" class="btn btn-success">{{ __('Увійти') }}</button>
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <button type="button" class="btn btn-primary btn-reg">{{ __('Зареєструватися') }}</button>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{mb_substr(Auth::user()->name, 0, 20) . "..."}} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @admin
                                    <a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">
                                        {{ __('Адмін панель') }}
                                    </a>
                                    @endadmin
                                    @teacher
                                    <a class="dropdown-item" href="{{ route('teacher.material.ownmaterial') }}">
                                        {{ __('Мої матеріали') }}
                                    </a>
                                    @endteacher
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Особистий кабінет') }}
                                    </a>
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Виход') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                            <div class="nav-links">
                                <li class="nav-item"><a class="nav-link" href="#">Інформація про технікум</a></li>
                                <li class="nav-item dropdown"><a class="nav-link" href="#">Виховання</a></li>
                                <li class="nav-item dropdown"><a class="nav-link" href="#">Абітуріенту</a></li>
                                <li class="nav-item dropdown"><a class="nav-link" href="#">Контакти</a></li>
                                <li class="nav-item dropdown"><a class="nav-link" href="#">Інформація</a></li>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="app-content py-3">
        <div class="container">
                @yield('breadcrumbs')
            <div class="d-flex row">
                {{--  START SIDE-MENU     --}}
            <div class="col-12 col-md-3 col-sm-4 side-block">
            <div class="side-menu text-center color-black">
                <h3>Меню сайта</h3>
            </div>
            <div class="content-wrap">
                <!--START WRAPPER1-->
                <div class="block-content">
                    <div class="content-main">
                        <ul class="content-menu">
                            <li class="first-element"><a href="#" >Головна сторінка</a></li>
                            <li class="drop-down-list">
                                <a href="#" >Інформація про технікум</a>
                                <ul class="drop-list">
                                    <li><a href="#" >Icторiя</a></li>
                                    <li><a href="#" >Лiцензiя та сертифiкати</a></li>
                                    <li><a href="#" >Cпецiальностi</a></li>
                                    <li><a href="#" >Адмiнicтрацiя</a></li>
                                    <li><a href="#" >Педагогичний колектив</a></li>
                                </ul>
                            </li>
                            <li class="drop-down-list">
                                <a href="#">Навчання</a>
                            <ul class="drop-list">
                                <li >
                                    <a href="#" class="markup">Навчально-методичнi...</a>
                                    <ul class="drop-list2">
                                        <li><a href="#" >Компьютернi системи та мережi</a></li>
                                        <li><a href="#" >Монтаж i експлатацiя теплового устаткування ГРЭС</a></li>
                                        <li><a href="#" >Будiвництво та эксплуатацiя будiвель та споруд</a></li>
                                        <li><a href="#" >Економiка пiдприемства</a></li>
                                    </ul>	
                                </li>
                                <li>
                                    <a href="#" class="markup1">Розклад занять</a>
                                    <ul class="drop-list3">
                                        <li><a href="#" >I курс</a></li>
                                        <li><a href="#" >II курс</a></li>
                                        <li><a href="#" >III курс</a></li>
                                        <li><a href="#" >IV курс</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" >Конкурсы</a></li>
                                <li><a href="#" >Наша гордiсть</a></li>
                            </ul>
                            </li>
                            <li class="drop-down-list">
                                <a href="#">Виховання</a>
                                <ul class="drop-list">
                                    <li><a href="#" >Методична робота</a></li>
                                    <li><a href="#" >Вiдпочiнок</a></li>
                                    <li><a href="#" >Вiдкритi заходи</a></li>
                                    <li><a href="#" >Досягненя студентiв</a></li>
                                </ul>
                            </li>
                            <li class="drop-down-list">
                                <a href="#">Абітурієнту</a>
                                <ul class="drop-list">
                                    <li><a href="#" >Правила прийому</a></li>
                                    <li><a href="#" >План прийому</a></li>
                                    <li><a href="#" >Тарифи та навчання</a></li>
                                    <li><a href="#" >Вступнi icпити</a></li>
                                </ul>
                            </li>
                                <li class="list"><a href="#">Контакти</a></li>
                                <li class="list"><a href="#">Законодавчі документи</a></li>
                            </ul>
                        </ul>
                        </div>
                    </div>
                    {{-- <div class="card settings">
                            <div class="card-body">
                                <a href="{{route('user.edit', Auth::user()->id)}}">Настройки профиля</a>
                            </div>
                        </div> --}}
                </div>                        <!--END WRAPPER-->	
            </div>
                                    
                            
                    {{-- <ul class="list-group">
                        <li class="list-group-item {{ Request::is('/') ? 'active' : null }}">
                            <a href="{{route('user.article.index')}}">Главная</a> 
                        </li>
                        <li class="list-group-item {{ Request::is('/1') ? 'active' : null }}">
                            <a href="#">Інформація про технікум</a>
                                <li class="list-group-item dropdown-side-block">
                                    <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Предмети
                                    </button>
                                    <div class="dropdown-menu" x-placement="right-start"
                                        style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="{{route("subject.index")}}">Всі предмети</a>
                                        <a class="dropdown-item" href="{{route("subject.create")}}">Додати предмет</a>
                                        <ul class="list-group">
                                            <li class="list-group-item {{ Request::is('/') ? 'active' : null }}">
                                                <a href="{{route('user.article.index')}}">Главная</a> 
                                            </li>
                                    </div>
                                </li>
                        </li>
                        <li class="list-group-item {{ Request::is('/2') ? 'active' : null }}">
                            <a href="#">Виховання</a>
                        </li>
                        <li class="list-group-item {{ Request::is('/3') ? 'active' : null }}">
                            <a href="#">Абітуріенту</a>
                        </li>
                        <li class="list-group-item {{ Request::is('/4') ? 'active' : null }}">
                            <a href="#">Контакти</a>
                        </li>
                        <li class="list-group-item {{ Request::is('/5') ? 'active' : null }}">
                            <a href="#">Інформація</a>
                        </li>
                        @if (Request::is('home') )
                            <li class="list-group-item active">
                                <a href="{{route('user.edit', Auth::user()->id)}}">Настройки профиля</a>
                            </li>
                        @endif
                    </ul> --}}
                
                {{--  END SIDE-MENU     --}}
                <div class="col-12 col-md-9 col-sm-8 content">
                    <div class="content__title text-center">
                        <h2>@yield('content-title')</h2>
                    </div>
                    <div class="main-wrapper">
                        @yield('content')
                    </div>
                    
                </div>
            </div>
            @yield('pagination')
        </div>
    </main>
    <footer>
        <div class="navbar-fixed-bottom row-fluid">
            <div class="navbar-inner">
                <div class="container py-2">
                    
                    <div class="row d-flex justify-content-center">
                        <div class="col-4">
                            <p class="text-center">
                                <span class="footer__title">Aдреса:</span> Донецька обл., Мар'їнський р-н, м.Курахове, пр-т Соборний, буд.14  
                            </p>
                        </div>
                        <div class="col-4">
                            <p class="text-center">
                                <span class="footer__title">E-mail:</span> kpest@ukr.net  
                            </p>
                        </div>
                        <div class="col-4">
                            <p class="text-center">
                                <span class="footer__title">Тел.:</span> (06278) 3-22-07 
                            </p>
                        </div>
                    </div>
                    <p class="text-center">Курахівській філія ПЄСТ Дніпровського державного технікуму  
                            енергетичних та інформаційних технологій &copy; 2020 рік
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
