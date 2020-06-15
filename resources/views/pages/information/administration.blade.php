@extends('layouts.app')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url("/")}}">Головна</a></li>
            <li class="breadcrumb-item">Інформація про технікум</li>
            <li class="breadcrumb-item active" aria-current="page">Адміністрація</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Адміністрація')
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/adm_1.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p>Завідувач філії ПЕБТу</p>
            <p><b>Олійник Наталя Григорівна</b></p>
            <p>Tелефон: (06278) 3-22-07</p>
            <p>E-mail: natalia-oleynik@yandex.ru</p>
            <p>каб. №18</p>
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/adm_2.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p>Методист</p>
            <p><b>Косенко Валентина Михайлівна</b></p>
            <p>Tелефон: (06278) 3-22-07</p>
            <p>E-mail: metodist-pebt@ukr.net</p>
            <p>каб. №19</p>
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/adm_3.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p>Бухгалтер</p>
            <p><b>Савовська Лідія Володимирівна</b></p>
            <p>Tелефон: (06278) 3-22-07</p>
            <p>каб. №22</p>
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/adm_4.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p>Секретар</p>
            <p><b>Дьошина Тетяна Миколаївна</b></p>
            <p>Tелефон: (06278) 3-22-07</p>
            <p>каб. №17</p>
        </div>
    </div>
@endsection
    