@extends("layouts.app")

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Додому</a></li>
        <li class="breadcrumb-item"><a href="{{route('material.index')}}">Навчальні матеріали</a></li>
            <li class="breadcrumb-item active" aria-current="page">Додати навчальний матеріал</li>
        </ol>
    </div>
@endsection
@section("content")
@if ($errors->any()) 
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
    <form action="{{route('material.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
        <div class="form-group">
            <label for="formGroupExampleInput">Назва матеріалу</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" 
        placeholder="Назва матеріалу" value="{{old('name') ?? ''}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Опис матеріалу</label>
            <textarea name="text" cols="20" rows="5" class="form-control">{{old('text')}}</textarea>
        </div>
        <div class="form-group">
            <label for="select">Оберіть предмет</label>
            <select class="custom-select" name="subject_id" id="select">
                @foreach ($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Загрузити матеріал</label>
            <input type="file" name="link" class="form-control-file" value="{{$request->link ?? ''}}" >
        </div>
        {{-- <div class="form-group">
            <label>Загрузити фото статі</label>
            <input type="file" name="imgs[]" class="form-control-file" multiple value="{{old('imgs[]') ?? ''}}">
        </div> --}}
        <div class="form-group">
            <button class="form-control" type="submit" name="submit">Додати матеріал</button>
        </div>
    </form>
@endsection