{{--@extends("admin.layouts.layout")--}}
@extends("layouts.app")
@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Навчальні матеріали</li>
        </ol>
    </div>
@endsection
@section("content")
<div class="admin-btn text-left py-3">
    <a href="{{route('material.create')}}">
        <button type="button" class="btn btn-primary">Додати матеріал</button>
    </a>
</div>
    <div class="col-12 col-sm-9 content">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Предмет</th>
                <th>Назва</th>
                <th>Дата</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($materials as $material)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <th>{{mb_substr($material->subject->name, 0, 20)}}</th>
                    <th><a href="{{$material->link}}" >{{mb_substr($material->name, 0, 30)}}</a></th>
                    <th>{{$material->created_at}}</th>
                    <th>
                        <div class="btn-group">
                            <div class="article__link">
                                <a href="{{route("material.show", $material->id)}}">
                                    <button type="button" class="btn btn-success">Дивитись</button>
                                </a>
                            </div>
                            <div class="article__link">
                                <a href="{{route('material.edit', $material->id)}}">
                                    <button type="button" class="btn btn-warning">Змінити</button>
                                </a>
                            </div>
                            <div class="article__link">
                                <form action="{{route('material.destroy', $material->id)}}" method="post">
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
                    <td colspan="5">Немає матеріалів! Додайте матеріал!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{--  END MAIN     --}}
    </div>
@endsection



