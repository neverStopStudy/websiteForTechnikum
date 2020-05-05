@extends("layouts.app")
@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Всі користувачі</a></li>
            <li class="breadcrumb-item active" aria-current="page">Перегляд користувача</li>
        </ol>
    </div>
@endsection
@section("content")
<div class="content__title text-center">
    <h2>Перегляд користувача - {{$user->name}}</h2>
</div>
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
