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
    .profile-img{
        margin-bottom: 10px;
    }
    .settings{
        margin-bottom: 10px;
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
            <div class="profile">
                
                <div class="profile-img text-center">
                    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            @forelse($images as $img)
                                @if($loop->first)
                                    <div class="carousel-item active">
                                        <img src="{{$img->link}}" alt="carosel-item" width="200px" height="200px">
                                    </div>
                                @else
                                    <div class="carousel-item ">
                                        <img src="{{$img->link}}" alt="..." width="200px"  height="200px">
                                    </div>
                                @endif
                            @empty
                                <div class="alert">Немає фото</div>
                            @endforelse
                        </div>
                        <a class="carousel-control-prev bg-secondary" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next bg-secondary" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                
                <div class="profile-text">
                    <p>Имя: {{auth()->user()->name}}</p>
                </div>
                <div class="profile-date">
                    <p>Зарегистрирован: {{auth()->user()->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 content">
        <div class="container">
            <div class="card settings">
                <div class="card-body">
                    <a href="{{route('user.edit', Auth::user()->id)}}">Настройки профиля</a>
                </div>
            </div>
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
