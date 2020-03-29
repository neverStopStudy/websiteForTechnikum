@extends("layouts.app")
<style>
    .comment {
        margin-bottom: 10px;
    }
</style>
@section("side-block")
    <div class="col-sm-3 col-12 side-block">
        <div class="side-menu">
            <h3>Меню сайта</h3>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">Главная</li>
            <li class="list-group-item"><a href="#">Інформація про технікум</a></li>
            <li class="list-group-item"><a href="#">Виховання</a></li>
            <li class="list-group-item"><a href="#">Абітуріенту</a></li>
            <li class="list-group-item"><a href="#">Контакти</a></li>
            <li class="list-group-item"><a href="#">Інформація</a></li>
        </ul>
    </div>
@endsection
@section("content")
    <div class="col-12 col-sm-9 content">
        <div class="user">
            <div class="user-name">
                <h2>{{$user->name}}</h2>
            </div>
            {{--<div class="article-img text-center">
                <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($imgs as $img)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{$img->link}}" alt="carosel-item" height="200px">
                                </div>
                            @else
                                <div class="carousel-item ">
                                    <img src="{{$img->link}}" alt="..." height="200px">
                                </div>
                            @endif
                        @empty
                            <div class="alert">NET FOTOCHEK</div>
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
            </div>--}}
            <div class="user-role">
                @isset($user->roles)
                    <p>Роль:</p>
                @endisset
                @forelse($user->roles as $role)
                    <p>{{$role->name . ", "}}</p>
                @empty
                    <p>Нет роли! Добавьте роль!</p>
                @endforelse
            </div>
            <div class="user-permission">
                @isset($user->permissions)
                <p>Может делать:</p>
                @endisset
                @forelse($user->permissions as $permission)
                    {{$permission->name . ", "}}
                @empty
                    Нет разрешения! Добавьте разрешение!
                @endforelse
            </div>
            <div class="article-date">
                <span>
                   <p>Email {{$user->email}}</p>
                </span>
            </div>
            <div class="article-date">
                <span>
                   <p>Дата регистрации {{$user->created_at}}</p>
                </span>
            </div>
        </div>
@endsection
