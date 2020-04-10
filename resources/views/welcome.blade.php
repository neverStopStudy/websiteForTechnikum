{{--@extends("admin.layouts.layout")--}}
@extends("layouts.app")

@section("side-block")
{{-- {{$article = \App\Article::first()}}
{{dd($article->images()->first())}} --}}
{{-- // @foreach ($article->images()->first() as $image)
//     {{ $image->link }}
// @endforeach --}}

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
        @admin
        <div class="admin-btn text-center">
            <a href="{{route('admin.article.create')}}">
                <button type="button" class="btn btn-primary">Добавить статью</button>
            </a>
        </div>
        @endadmin
        {{--  START MAIN     --}}
        <div class="main__title text-center">
            <h2>Останні новини</h2>
        </div>
        @foreach($articles as $article)
     
            <div class="article">
                <div class="row d-flex ">
                    <div class="article__img col-12 col-md-6">
{{--                        {{dd(auth()->check() && auth()->user()->hasRole('admin'))}}--}}
{{--                        @if(auth()->check() && auth()->user()->hasRole('admin'))--}}
                        @admin
                        Admin
                        <a href="{{route("admin.article.show", $article->id)}}">
                        @else
                        user
                        <a href="{{route("user.article.show", $article->id)}}">
                        @endadmin
                            <img src="{{$article->mainImageLink()}}" alt="article_main_img">
                        </a>
                    </div>
                    <div class="article__text col-12 col-md-6">
                        <div class="article__title">
                            <h2>{{$article->title}}</h2>
                        </div>
                        <div class="article__descr">
                            <p>{{$article->text}}</p>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <div class="article__link">
                                @admin
                                Админ
                                    <a href="{{route("admin.article.show", $article->id)}}">
                                @else
                                Юзер
                                    <a href="{{route("user.article.show", $article->id)}}">
                                @endadmin
                                    <button type="button" class="btn btn-success">Читать</button>
                                </a>
                            </div>
                            @admin
                            <a href="{{route('admin.article.edit', $article->id)}}">
                                <button type="button" class="btn btn-warning">Изменить</button>
                            </a>
                            <form action="{{route('admin.article.destroy', $article->id)}}" method="get">
                                @csrf
                                @method("DELETE")
                                <button type="button" class="btn btn-danger admin-delete-btn">
                                    <input type="submit" value="Удалить" class="btn admin-delete-input">
                                </button>
                            </form>
                            @endadmin
                        </div>
                    </div>
                </div>               
            </div>
        @endforeach
        
        {{--  END MAIN     --}}
    </div>
@endsection



