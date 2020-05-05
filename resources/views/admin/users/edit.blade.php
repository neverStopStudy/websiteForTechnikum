@extends("layouts.app")

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Всі користувачі</a></li>
            <li class="breadcrumb-item active" aria-current="page">Змінити користувача</li>
        </ol>
    </div>
@endsection
@section("content")
<div class="content__title text-center">
    <h2>Змінити користувача - {{$user->name}}</h2>
</div>
    <form action="{{route('admin.user.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="formGroupExampleInput">ФІО</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input"
        value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="select">Роль</label>
            <select id="select" class="form-control" name="role">
                @forelse($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @empty
                    <p>Нет роли! Добавьте роль!</p>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="select">Оберіть группу</label>
            <select class="custom-select" name="group_id" id="select">
                @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
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