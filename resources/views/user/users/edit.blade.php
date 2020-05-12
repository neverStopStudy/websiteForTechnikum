@extends("layouts.app")

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Особистий кабінет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Змінити користувача</li>
        </ol>
    </div>
@endsection
@section("content")
<div class="content__title text-center">
    <h2>Змінити користувача - {{$user->name}}</h2>
</div>
    <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">ФІО</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введіть ФІО"
        value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label>Загрузить фото</label>
            <input type="file" name="imgs[]" class="form-control-file" multiple >
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Добавить </button>
        </div>
    </form>


@endsection