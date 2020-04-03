@extends("layouts.app")

@section("side-block")
    
@endsection
@section("content")
<h2>Изменить роль</h2>
    <form action="{{route('role.update', $role->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="formGroupExampleInput">Назва</label>
        <input type="text" name="name" class="form-control" 
        id="formGroupExampleInput" placeholder="Додайте назву!" value="{{$role->name}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Slug</label>
            <input type="text" name="slug" class="form-control" 
        id="formGroupExampleInput" placeholder="Додайте Slug!" value="{{$role->slug}}">
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Добавить </button>
        </div>
    </form>
@endsection