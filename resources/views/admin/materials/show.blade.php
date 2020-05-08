@extends('admin.layouts.layout')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Адмінка</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.material.index')}}">Навчальні матеріали</a></li>
            <li class="breadcrumb-item active" aria-current="page">Перегляд навчального матеріалу</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Перегляд матеріалу')
    <div class="material">
        <div class="material__title">
            <h2> {{$material->name}}</h2>
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
                <a href="{{route('download', $material->link)}}" download>Завантажити</a>
            </span>
        </div>
    </div>
@endsection
