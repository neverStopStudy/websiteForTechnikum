@extends("layouts.app")

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item"><a href="{{route('subject.index')}}">Всі предмети</a></li>
            <li class="breadcrumb-item active" aria-current="page">Додати предмет</li>
        </ol>
    </div>
@endsection
@section("content")

@if ($errors->any()) 
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
    <form action="{{route('subject.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Назва предмету</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" 
            placeholder="Введіть назву предмету" value="{{old('name') ?? ''}}">
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Додати предмет</button>
        </div>
    </form>
@endsection