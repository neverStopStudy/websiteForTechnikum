{{--@extends("admin.layouts.layout")--}}
@extends("layouts.app")
@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Всі групи</li>
        </ol>
    </div>
@endsection
@section("content")

    <div class="content__title text-center">
        <h2>Всі групи</h2>
    </div>
    <div class="admin-btn text-left py-3">
        <a href="{{route('group.create')}}">
            <button type="button" class="btn btn-primary">Додати групу</button>
        </a>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Назва групи</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody> 
        @forelse($groups as $group)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <th>{{$group->name}}</th>
                <th>
                    <div class="btn-group">
                        <div class="article__link">
                            <a href="{{route("group.show", $group->id)}}">
                                <button type="button" class="btn btn-success">Дивитись</button>
                            </a>
                        </div>
                        <div class="article__link">
                            <a href="{{route('group.edit', $group->id)}}">
                                <button type="button" class="btn btn-warning">Змінити</button>
                            </a>
                        </div>
                        <div class="article__link">
                            <form action="{{route('group.destroy', $group->id)}}" method="post">
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
                <td colspan="3">Немає груп! Додайте групу!</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection



