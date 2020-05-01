@extends("layouts.app")

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item"><a href="{{route('group.index')}}">Всі групи</a></li>
            <li class="breadcrumb-item active" aria-current="page">Додати групу</li>
        </ol>
    </div>
@endsection
@section("content")

@if ($errors->any()) 
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
    <form action="{{route('group.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Назва групи</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" 
            placeholder="Введіть назву групи" value="{{old('name') ?? ''}}">
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Додати групу</button>
        </div>
    </form>
@endsection