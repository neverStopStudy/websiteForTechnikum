@extends('layouts.app')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url("/")}}">Головна</a></li>
            <li class="breadcrumb-item">Інформація про технікум</li>
            <li class="breadcrumb-item active" aria-current="page">Педагогичний колектив</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Педагогичний колектив')
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/teacher_1.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p><b>Ступіна Світлана Леонідівна</b></p>
            <p>Викладач Англійської мови</p>
            <p>Вища кваліфікаційна категорія</p>
            <p>Старший викладач</p>
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/teacher_2.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p><b>Гладіліна Алевтина Миколаївна</b></p>
            <p>Викладач економічних дисциплін</p>
            <p>Вища кваліфікаційна категорія</p>
            <p>Старший викладач</p>
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/teacher_3.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p><b>Степанова Лідія Петрівна</b></p>
            <p>Викладач електротехнічних дисциплін</p>
            <p>Вища кваліфікаційна категорія</p>
            <p>Cтарший викладач</p>
        </div>
    </div>
    <div class="row py-1">
        <div class="col-sm-6 col-12">
            <div class="page__img">
                <img src="/teacher_4.jpg" style="width: 100%">
            </div>
        </div>
        <div class="col-sm-6  col-12">
            <p><b>Матушкіна Надія Василівна</b></p>
            <p>викладач інженерно-технічних дисциплін</p>
            <p>І кваліфікаційна категорія</p>
        </div>
    </div>
@endsection
    