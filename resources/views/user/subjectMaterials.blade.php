@extends('layouts.app')
@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Особистий кабінет</a></li>
            <li class="breadcrumb-item " aria-current="page">{{$subjname}}</li>
            <li class="breadcrumb-item active" aria-current="page">Навчальні матеріали</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Матеріали предмету - ' . $subjname)
    
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Назва матеріалу</th>
            <th>Опис</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse($materials as $material)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <th>{{mb_substr($material->name, 0, 30)}}</th>
                <th>{{mb_substr($material->text, 0 ,20)}}</th>
                <th>
                    <div class="btn-group">
                        <div class="btn-group__control">
                            <a href="{{route('user.material.show', $material->id)}}">
                                <button type="button" class="btn btn-success">Дивитись</button>
                            </a>
                        </div>
                        <div class="btn-group__control">
                        <a href="{{route('download', $material->link)}}">
                            <button type="button" class="btn btn-warning">Завантажити</button>
                        </a>
                        </div>
                    </div>
                </th>
            </tr>
        @empty
            <tr class="table-warning">
                <td colspan="5">Немає матеріалів! Додайте матеріал!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection



