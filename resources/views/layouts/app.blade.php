<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Курахівська філія ПЄСТ
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
                                <p class="text-center">Курахівська філія ПЄСТ
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
                                    <button type="button" class="btn btn-success">{{ __('Логін') }}</button>
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <button type="button" class="btn btn-primary btn-reg">{{ __('Реєстрація') }}</button>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @admin
                                    <a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">
                                        {{ __('Адмін панель') }}
                                    </a>
                                    @endadmin
                                    @teacher
                                    <a class="dropdown-item" href="{{ route('material.ownmaterial') }}">
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
                    <div class="side-menu">
                        <h3>Меню сайта</h3>
                    </div>                
                    <ul class="list-group">
                        <li class="list-group-item {{ Request::is('/') ? 'active' : null }}">
                            <a href="{{route('user.article.index')}}">Главная</a> 
                        </li>
                        <li class="list-group-item {{ Request::is('/1') ? 'active' : null }}">
                            <a href="#">Інформація про технікум</a>
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
                    </ul>
                </div>
                {{--  END SIDE-MENU     --}}
                <div class="col-12 col-md-9 col-sm-8 content">
                    <div class="content__title text-center">
                        <h2>@yield('content-title')</h2>
                    </div>
                    @yield('content')
                    
                </div>
            </div>
            @yield('pagination')
        </div>
    </main>
    <footer>
        <div class="navbar-fixed-bottom row-fluid">
            <div class="navbar-inner">
                <div class="container">
                    <p class="text-center">Made by Roman Winogradow 2020 year</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
