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
                            <li class="list-group-item active">Главная</li>
                            <li class="list-group-item dropdown-side-block">
                                <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Cтатьи
                                </button>
                                <div class="dropdown-menu" x-placement="right-start"
                                    style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{route("admin.article.index")}}">Все статьи</a>
                                    <a class="dropdown-item" href="{{route('admin.article.create')}}">Добавить статью</a>
                                    <a class="dropdown-item" href="{{route('home')}}">Статистика</a>
                                </div>
                            </li>
                            <li class="list-group-item dropdown-side-block">
                                <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Користувачі
                                </button>
                                <div class="dropdown-menu" x-placement="right-start"
                                    style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{route("admin.users.index")}}">Всі користувачі</a>
                                    <a class="dropdown-item" href="{{route('admin.user.create')}}">Додати користувача</a>
                                    <a class="dropdown-item" href="{{route('home')}}">Статистика</a>
                                </div>
                            </li>
                            <li class="list-group-item dropdown-side-block">
                                <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Роли
                                </button>
                                <div class="dropdown-menu" x-placement="right-start"
                                    style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{route("role.index")}}">Всі роли</a>
                                    <a class="dropdown-item" href="{{route('role.create')}}">Додати роль</a>
                                </div>
                            </li>
                            <li class="list-group-item dropdown-side-block">
                                <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Групи
                                </button>
                                <div class="dropdown-menu" x-placement="right-start"
                                    style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{route("group.index")}}">Всі групи</a>
                                    <a class="dropdown-item" href="{{route("group.create")}}">Додати групу</a>
                                </div>
                            </li>
                            <li class="list-group-item dropdown-side-block">
                                <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Предмети
                                </button>
                                <div class="dropdown-menu" x-placement="right-start"
                                    style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{route("subject.index")}}">Всі предмети</a>
                                    <a class="dropdown-item" href="{{route("subject.create")}}">Додати предмет</a>
                                </div>
                            </li>
                             <li class="list-group-item dropdown-side-block">
                                <button type="button" class="btn dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Матеріали
                                </button>
                                <div class="dropdown-menu" x-placement="right-start"
                                    style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{route("admin.material.index")}}">Всі матеріали</a>
                                    <a class="dropdown-item" href="{{route("admin.material.create")}}">Додати матеріал</a>
                                </div>
                            </li>
                        </ul>
                        <div class="card settings">
                            <div class="card-body">
                                <a href="{{route('user.edit', Auth::user()->id)}}">Настройки профиля</a>
                            </div>
                        </div>
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
