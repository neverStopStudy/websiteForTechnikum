@extends("layouts.app")

@section('breadcrumbs')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Додому</a></li>
        <li class="breadcrumb-item"><a href="{{route('teacher.material.ownmaterial')}}">Навчальні матеріали</a></li>
        <li class="breadcrumb-item active" aria-current="page">Змінення навчального матеріалу</li>
    </ol>
</div>
@endsection
@section("content")
@if ($errors->any()) 
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
    <form action="{{route('teacher.material.update', $material->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="formGroupExampleInput">Назва начального матеріалу</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Введіть назву навчального матеріалу"
        value="{{$material->name}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Опис навчального матеріалу</label>
            <textarea name="text" id="" cols="20" rows="5" class="form-control">{{old('text')}}{{$material->text}}</textarea>
        </div>
        <div class="form-group">
            <label for="select">Оберіть предмет</label>
            <select class="custom-select" name="subject_id" id="select">
                @foreach ($subjects as $subject)
                @if($subject->id === $material->subject_id)
                    <option value="{{$subject->id}}" selected >{{$subject->name}}</option>
                @else
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endif
                    
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Загрузити матеріал</label>
            <input type="file" name="link" class="form-control-file" value="{{$request->link ?? ''}}" >
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Добавить </button>
        </div>
    </form>
@endsection