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
    <form action="{{route('admin.user.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input"
        value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="select">Роль</label>
            <select id="select" class="form-control" name="role">
                {{-- {{dd($user->roles->toArray())}} --}}
                @forelse($roles as $role)

{{--                    @if($user->roles == $role->id)--}}
{{--                        <option value="{{$role->id}}" selected>{{$role->name}}</option>--}}
{{--                    @else--}}
                        <option value="{{$role->id}}">{{$role->name}}</option>
{{--                    @endif--}}
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