@extends("layouts.app")
<style>
    .article-imgs img{
        width: 100%;
    }
</style>
@section("side-block")
    <h2>Змінити користувача</h2>
@endsection

@section("content")
    <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Имя</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Введите имя"
        value="{{$user->name ?? ''}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">E-mail</label>
            <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Введите email"
        value="{{$user->email ?? ''}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Пароль</label>
            <input type="password" name="password" class="form-control" id="formGroupExampleInput" placeholder="Введите пароль"
        value="{{$user->password ?? ''}}">
        </div>
        <div class="form-group">
            <label for="select">Роль</label>
            <select id="select" class="form-control" name="role">
                {{-- {{dd($user->roles->toArray())}} --}}
                @forelse($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                @empty
                    <p>Нет роли! Добавьте роль!</p>
                @endforelse
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