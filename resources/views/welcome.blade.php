@extends("layouts.app")

@section('breadcrumbs')

@endsection

@section("content")
    
    @admin
    <div class="admin-btn text-center">
        <a href="{{route('admin.article.create')}}">
            <button type="button" class="btn btn-primary">Додати статю</button>
        </a>
    </div>
    @endadmin
    
    {{--  START MAIN     --}}
    <div class="main__title text-center">
        <h2>Останні новини</h2>
    </div>
    @foreach($articles as $article)
    {{-- {{dd($article)}} --}}
        <div class="article">
            <div class="row d-flex ">
                <div class="article__img col-12 col-md-6">
                    @admin
                        <a href="{{route("admin.article.show", $article->id)}}">
                    @else
                        <a href="{{route("user.article.show", $article->id)}}">
                    @endadmin
                        <img src="{{$article->image_link}}" alt="article_main_img">
                    </a>
                </div>
                <div class="article__text col-12 col-md-6">
                    <div class="article__title">
                        <h2>{{$article->title}}</h2>
                    </div>
                    <div class="article__descr">
                        <p>{{$article->text}}</p>
                    </div>
                    <div class="py-3">
                        <div class="article__date ">
                            <p>Переглядів: {{$article->views}}</p>
                        </div>
                        <div class="article__date">
                            <p>Дата публікації: {{$article->created_at}}</p>
                        </div>     
                    </div>               
                    <div class="btn-group btn-group-sm">
                        <div class="article__link">
                            @admin
                                <a href="{{route("admin.article.show", $article->id)}}">
                            @else
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
@endsection

@section('pagination')
    @if($articles->total() > $articles->count())
        <div class="pagination d-flex flex-row justify-content-center">        
            <div class="raw justify-content-center">
                <div class="col-md-4">
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    @endif    
@endsection   
