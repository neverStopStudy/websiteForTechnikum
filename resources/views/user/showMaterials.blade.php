@extends('layouts.app')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Особистий кабінет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Перегляд навчального матеріалу</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Перегляд матеріалу')
    {{-- {{dd($material)}} --}}
    <div class="material">
        <div class="material__title">
            <h2>{{$material->name}}</h2>
        </div>
        <div class="material__text">
            <p>Опис матеріалу <br/>{{$material->text}}</p>
        </div>
        <div class="material__date">
            <span>
                Дата додаваня: {{$material->created_at}}
            </span>
        </div>
        <div class="material__link">
            <span>
                {{-- {{response()->download(public_path($material->link))}} --}}
                {{-- {{dd($material->link)}} --}}
                {{-- <a href="{{route('admin.material.index')}}" >Завантажити</a> --}}
                <a href="{{route('download', $material->link)}}">
                    <button type="button" class="btn btn-warning">Завантажити</button>
                </a>
            </span>
        </div>
    </div>
@endsection
