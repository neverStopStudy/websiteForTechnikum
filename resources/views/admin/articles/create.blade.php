@extends("layouts.app")

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.article.index')}}">Всі статі</a></li>
            <li class="breadcrumb-item active" aria-current="page">Додати статю</li>
        </ol>
    </div>
@endsection
@section("content")

@if ($errors->any()) 
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
    <form action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
        <input type="text" name="title" class="form-control" id="formGroupExampleInput" 
        placeholder="Заголовок статі" value="{{old('title') ?? ''}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Текст</label>
            <textarea name="text" id="" cols="20" rows="5" class="form-control">{{old('text')}}</textarea>
        </div>
        <div class="form-group">
            <label>Загрузити титульне фото</label>
            <input type="file" name="image_link" class="form-control-file" value="{{$request->image_link ?? ''}}">
        </div>
        <div class="form-group">
            <label>Загрузити фото статі</label>
            <input type="file" name="imgs[]" class="form-control-file" multiple value="{{old('imgs[]') ?? ''}}">
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Додати статю</button>
        </div>
    </form>
@endsection