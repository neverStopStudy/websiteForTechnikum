{{--@extends("admin.layouts.layout")--}}
@extends("layouts.app")
<style>
    .article__link {
        margin-right: 5px;
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
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Титул</th>
                <th>Текст</th>
                <th>Перегляди</th>
                <th>Комментарi</th>
                <th>Статус</th>
                <th>Дата</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($articles as $article)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <th>{{mb_substr($article->title, 0, 20) . "..."}}</th>
                    <th>{{mb_substr($article->text, 0, 30) . "..."}}</th>
                    <th>{{$article->views}}</th>
                    <th>{{$article->comments->count()}}</th>
                    <th>
                        @if($article->status) Вкл
                        @else Выкл
                        @endif
                    </th>
                    <th>{{$article->created_at}}</th>
                    <th>
                        <div class="btn-group-vertical">
                            <div class="article__link">
                                <a href="{{route("admin.article.show", $article->id)}}">
                                    <button type="button" class="btn btn-success">Дивитись</button>
                                </a>
                            </div>
                            <div class="article__link">
                                <a href="{{route('admin.article.edit', $article->id)}}">
                                    <button type="button" class="btn btn-warning">Змінити</button>
                                </a>
                            </div>
                            <div class="article__link">
                                <form action="{{route('admin.article.destroy', $article->id)}}" method="get">
                                    @csrf
                                    @method("DELETE")
                                    <button type="button" class="btn btn-danger admin-delete-btn">
                                        <input type="submit" value="Видалити" class="btn admin-delete-input">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </th>
                </tr>
            @empty
                <tr class="table-warning">
                    <td colspan="5">Нет статей! Добавьте статью!</td>
                </tr>

            @endforelse
            </tbody>
        </table>
        {{--  END MAIN     --}}
    </div>
    </div>
@endsection



