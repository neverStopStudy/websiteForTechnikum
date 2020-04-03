@extends("layouts.app")

@section("side-block")
    <h2>Добавить роль</h2>
@endsection
@section("content")
    <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Назва</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Додайте назву!">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Slug</label>
            <input type="text" name="slug" class="form-control" id="formGroupExampleInput" placeholder="Додайте Slug!">
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Добавить </button>
        </div>
    </form>
@endsection