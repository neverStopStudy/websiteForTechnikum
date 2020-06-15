@extends('layouts.app')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url("/")}}">Головна</a></li>
            <li class="breadcrumb-item">Інформація про технікум</li>
            <li class="breadcrumb-item active" aria-current="page">Ліцензії та сертифікати</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Ліцензії та сертифікати')
    
    <div class="page__img" style="padding 10px;">
        <img src="/sert_1.jpg" alt="technikum" style="width: 100%;">
    </div>
    <div class="page__img" style="padding 10px;">
        <img src="/sert_2.jpg" alt="technikum" style="width: 100%;">
    </div>
    <div class="page__img" style="padding 10px;">
        <img src="/sert_3.jpg" alt="technikum" style="width: 100%;">
    </div>
    <div class="page__img" style="padding 10px;">
        <img src="/sert_4.jpg" alt="technikum" style="width: 100%;">
    </div>
    <div class="page__img" style="padding 10px;">
        <img src="/sert_5.jpg" alt="technikum" style="width: 100%;">
    </div>
@endsection    