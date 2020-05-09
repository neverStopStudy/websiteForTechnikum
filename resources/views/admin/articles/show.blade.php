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
        <article>
            <div class="article-title">
                <h2>{{$article->title}}Заголовок</h2>
            </div>
            <div class="article-img text-center">
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
            </div>
            <div class="article-text">
                <p>{{$article->text}}</p>
            </div>
            <div class="article-date">
        <span>
            Дата {{$article->created_at}}
        </span>
            </div>
            <div class="article-author">
                {{$article->author->name}}
            </div>
        </article>
        <p>Коментарі</p>
        @forelse($comments as $comment)
            <div class="card comment">
                <div class="card-body">
                    <h4 class="comment-author card-title">
                        Aвтор: {{$comment->user->name}}
                    </h4>
                    <div class="comment-text card-text">
                        {{$comment->text}}
                    </div>
                    <div class="comment-date card-subtitle mb-2 text-mute">
                        {{$comment->created_at}}
                    </div>
                </div>
            </div>
            {{--  #TODO  make views count--}}
        @empty
            <div class="alert">Коментариев не обнаружено будьте первым!</div>
        @endforelse
        @if(auth()->check())
            <form action="{{route('comment.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput2">Додати коментар</label>
                    <textarea name="text" id="" cols="20" rows="5" class="form-control">{{old('text')}}</textarea>
                </div>
                <input name="user_id" type="hidden" value="{{auth()->id()}}">
                <input name="article_id" type="hidden" value="{{$article->id}}">
                <div class="form-group">
                    <button class="form-control" type="submit" name="submit"> Добавить</button>
                </div>
            </form>
    </div>
    @else
        <p>Для добавления коментариев, нужно быть зарегистрированым пользователем!</p>
    @endif
@endsection
