@extends("layouts.app")

@section("side-block")
    <h2>Добавить статью</h2>
@endsection
@section("content")
    <form action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Example input">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Another label</label>
            <textarea name="text" id="" cols="20" rows="5" class="form-control">{{old('description')}}</textarea>
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