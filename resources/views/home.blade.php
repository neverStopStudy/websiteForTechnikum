@extends('layouts.app')
<style>
    .dropdown-side-block > button {
        border: 0;
        text-align: left;
        background-color: #fff;
        padding: 0;
    }

    .card-header {
        font-size: 18px;
    }

    .card-body {
        padding: 0;
    }
</style>
@section("side-block")
    <div class="col-sm-3 col-12 side-block">
        <div class="side-menu">
            <h3>Меню сайта</h3>
        </div>
        @admin
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

            <li class="list-group-item"><a href="#">Предметы</a></li>
            <li class="list-group-item"><a href="#">Контакти</a></li>
            <li class="list-group-item"><a href="#">Інформація</a></li>
        </ul>
        @else
            <ul class="list-group">
                <li class="list-group-item active">Главная</li>
                <li class="list-group-item"><a href="#">Інформація про технікум</a></li>
                <li class="list-group-item"><a href="#">Виховання</a></li>
                <li class="list-group-item"><a href="#">Абітуріенту</a></li>
                <li class="list-group-item"><a href="#">Контакти</a></li>
                <li class="list-group-item"><a href="#">Інформація</a></li>
            </ul>
            @endadmin
    </div>
@endsection
@section('content')
    <div class="col-12 col-sm-5 content">
        <div class="container">
            <div class="text-center">
                <h2>Профиль</h2>
            </div>
            <div class="row ">
                {{--                    @if (session('status'))--}}
                {{--                        <div class="alert alert-success" role="alert">--}}
                {{--                            {{ session('status') }}--}}
                {{--                        </div>--}}
                {{--                    @endif--}}
            <div class="profile">
                <div class="profile-img">
                    <img src="" alt="">
                </div>
                <div class="profile-text">

                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Уведомления
                </div>
                <div class="card-body" style="padding: 0">
                    <ul class="list-group list-group-flush">
                        @foreach($notifications as $notification)
                            <li class="list-group-item">
                                @if($notification->data['message'])
                                {{$notification->data['message'] . PHP_EOL . $notification->created_at->diffForHumans()}}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
