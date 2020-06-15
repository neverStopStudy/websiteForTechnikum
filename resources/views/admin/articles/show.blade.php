@extends("layouts.app")
<style>
    .comment {
        margin-bottom: 10px;
    }
</style>

@section("content")
@section('content-title',$article->title)
        <article>
            <div class="article-img text-center">
                <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @forelse($imgs as $img)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    <img src="{{$img->link}}" alt="carosel-item" height="300px">
                                </div>
                            @else
                                <div class="carousel-item ">
                                    <img src="{{$img->link}}" alt="..." height="300px">
                                </div>
                            @endif
                        @empty
                            {{-- <div class="alert">NET FOTOCHEK</div> --}}
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
                <p align="justify">{{$article->text}}</p>
            </div>
            <div class="article-date">
                <span> Дата cтворення:</span> {{$article->created_at}}
            </div>
            <div class="article-author">
               <span> Автор:</span> {{$article->author->name}}
            </div>
        </article>
        <p>Коментарі</p>
        <div class="comment__wrapper">
            @forelse($comments as $comment)
                <div class="card comment">
                    <div class="card-body">
                        <h4 class="comment-author card-title">
                            Aвтор: {{$comment->user->name}}
                        </h4>
                        <div class="comment-text card-text card-subtitle mb-2">
                            {{$comment->text}}
                        </div>
                        <div class="comment-date card-subtitle mb-2">
                            Дата: {{$comment->created_at}}
                        </div>
                        @if($comment->user_id == Auth::user()->id)
                    <div class="btn-group__control">
                        <form action="{{route('comment.delete', $comment->id)}}" method="get">
                            @csrf
                            @method("DELETE")
                            <button type="button" class="btn btn-danger admin-delete-btn" >
                                <input type="submit" value="Видалити коментар" class="btn admin-delete-input" style="color: white">
                            </button>
                        </form>
                    </div>
                    @endif
                    </div>
                    
                </div>
                {{--  #TODO  make views count--}}
            @empty
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
                        <button class="form-control comment__btn" type="submit" name="submit"> Додати</button>
                    </div>
                </form>
        
        @else
            <p>Для додаваня коментарів, потрібно бути зареєстрованим користувачем!</p>
        @endif
    </div>
@endsection
