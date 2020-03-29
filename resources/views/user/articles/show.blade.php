@extends("layout")

@section("content")
<article>
    <div class="article-title">
        <h2>{{$article->title}}Заголовок</h2>
    </div>
    <div class="article-img">
        <img src="#" alt="img">
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
        {{$article->user_id}}    
    </div>  
</article>
<span>Coments</span>
    @forelse(App\Article::find($article->id)->comments as $comment)
        <div class="card comment">
            <div class="comment-author">
                Aвтор: {{$comment->user->name}}
            </div>
            <div class="comment-text">
                {{$comment->text}}
            </div>
            <div class="comment-date">
                {{$comment->created_at}}
            </div>
        </div>
    @empty
        <div class="alert">Коментариев не обнаружено будьте первым!</div>
    @endforelse
@endsection
