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
    <style>
        html, body {
            /* background-color: #fff; */
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        
        body{
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .app-content{
            flex: 1;
        }
        p{
            margin-bottom: 0;
        }
        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        footer{
            background-color: darkgrey;
        }
        nav{
            display: none;
        }
        /*    */
        .header__title > p{
            font-size: 20px;
        }
        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        > .col,
        > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }
        /* .container{
            margin-right: 0;
            margin-left: 0;
        }
        .row{
            margin-right: 0;
            margin-left: 0;
        } */
        .side-block .active > a{
            color:white;
        }
        .btn-reg{
            margin-left: 5px;
        }
        .header{
            padding: 10px 0px 10px 0px;
        }
        .logo img{
            width: 150px;
        }
        .article__img  img{
            width: 100%;
        }
        .article{
            margin: 15px 0px;
        }

        .slider{
            margin: 0 auto;
        }

        #main-nav{
            display: none;
        }
        /*navbar end*/
        .admin-delete-input{
            padding:0px;
        }
        .admin-delete-btn{
            padding: 5px 10px;
        }
        .nav-links{
            display:none;
        }
        .navbar-toggler{
            margin-top: 10px;
        }
        @media (max-width: 575px) {
            .nav-links{
                display:block;
            }
            header > .container > .row {
                flex-direction: column;
                margin-top: 60px;
            }
            .col-center{
                text-align: center;
                margin: 0 auto;
            }
            .header__title > p {
                margin-top: 5px;
                font-size: 16px;
            }
            .article .d-flex{
                flex-direction: column;
            }
            .side-block{
                display:none;
            }
            #main-nav{
                display: flex;
            }

        }
    </style>
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
                                    <button type="button" class="btn btn-success">{{ __('Логин') }}</button>
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <button type="button" class="btn btn-primary btn-reg">{{ __('Регистрация') }}</button>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Личный кабинет') }}
                                    </a>
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
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
                <div class="row justify-content-center">
                {{--  END SIDE-MENU     --}}
                <div class="col-md-8 content">
                
                    @include('layouts.partials.flash')
                    @yield('content')
                </div>
                </div>
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
