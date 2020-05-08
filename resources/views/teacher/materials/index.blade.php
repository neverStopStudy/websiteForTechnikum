{{--@extends("admin.layouts.layout")--}}
@extends("layouts.app")
@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Додому</a></li>
            <li class="breadcrumb-item active" aria-current="page">Мої навчальні матеріали</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Мої матеріали')
    
    <div class="admin-btn text-left py-3">
        <a href="{{route('teacher.material.create')}}">
            <button type="button" class="btn btn-primary">Додати матеріал</button>
        </a>
    </div>
    
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Предмет</th>
            <th>Назва</th>
            <th>Предмет</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse($materials as $material)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <th>{{mb_substr($material->subject->name, 0, 20)}}</th>
                <th><a href="{{$material->link}}" >{{mb_substr($material->name, 0, 30)}}</a></th>
                <th>{{$material->subject->name}}</th>
                <th>
                    <div class="btn-group">
                        <div class="article__link">
                            <a href="{{route("teacher.material.show", $material->id)}}">
                                <button type="button" class="btn btn-success">Дивитись</button>
                            </a>
                        </div>
                        <div class="article__link">
                            <a href="{{route('teacher.material.edit', $material->id)}}">
                                <button type="button" class="btn btn-warning">Змінити</button>
                            </a>
                        </div>
                        <div class="article__link">
                            <form action="{{route('teacher.material.destroy', $material->id)}}" method="get" >
                                @csrf
                                @method("DELETE")
                                <button type="button" class="btn btn-danger admin-delete-btn" >
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
    <div class="text-center">
        {{$materials->links()}}
    </div>
        {{--  END MAIN     --}}
@endsection



