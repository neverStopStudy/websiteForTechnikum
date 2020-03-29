

@extends("layout")


@section("content")
            {{--  START MAIN     --}}
    <div class="main__title text-center">
        <h2>Останні новини</h2>
    </div>
{{--                --}}
    @foreach($articles as $article)
        <div class="article">
            <div class="row d-flex ">
                <div class="article__img col-12 col-md-6">
                    <a href="{{route("article.show", $article->id)}}">
                        <img src="article.jpg" alt="article_img">
                    </a>
                </div>
                <div class="article__text col-12 col-md-6">
                    <div class="article__title">
                        <h2>{{$article->title}}</h2>
                    </div>
                    <div class="article__descr">
                        <p>{{$article->text}}</p>
                    </div>
                    <div class="article__link">
                        <a href="{{route("article.show", $article->id)}}">
                            <button type="button" class="btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


            {{--  END MAIN     --}}
    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#!" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#!" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection



