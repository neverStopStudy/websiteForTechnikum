@extends('admin.layouts.layout')
@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Статті </li>
        </ol>
    </div>
@endsection
@section("content")
    @section('content-title','Всі статті')
    <div class="admin-btn text-left py-3">
        <a href="{{route('admin.article.create')}}">
            <button type="button" class="btn btn-primary">Додати статтю</button>
        </a>
    </div>  
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Титул</th>
                <th>Текст</th>
                <th>Перегляди</th>
                <th>Комментарi</th>
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
                    <th>{{$article->created_at}}</th>
                    <th>
                        <div class="btn-group-vertical">
                            <div class="btn-group__control">
                                <a href="{{route("admin.article.show", $article->id)}}">
                                    <button type="button" class="btn btn-success">Дивитись</button>
                                </a>
                            </div>
                            <div class="btn-group__control">
                                <a href="{{route('admin.article.edit', $article->id)}}">
                                    <button type="button" class="btn btn-warning">Змінити</button>
                                </a>
                            </div>
                            <div class="btn-group__control">
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
@endsection



