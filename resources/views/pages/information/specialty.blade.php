@extends('layouts.app')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url("/")}}">Головна</a></li>
            <li class="breadcrumb-item">Інформація про технікум</li>
            <li class="breadcrumb-item active" aria-current="page">Cпеціальності</li>
        </ol>
    </div>
@endsection
@section("content")
    @section("content-title",'Cпеціальності')
    <div class="row">
        <div class="col-6">
            <h3>Денне відділення:</h3>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>1. Економіка підприємства   5.03050401</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст – молодший спеціаліст з економіки підприємства.</p>
                <p>Термін навчання:	</br> база 9 кл. - 2р.10міс., 11 кл. - 1 р.10міс.</p>
            </div>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>2. Обслуговування комп'ютерних систем і мереж  5.05010201</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст - технік з обчислювальної техніки</p>
                <p>Термін навчання:	</br> база 9 кл. - 3р.10міс., 11 кл. - 2 р.10міс.</p>
            </div>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>3.  Монтаж і експлуатація теплоенргетичного устаткування теплових електростанцій 5.05060101</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст - технік - теплотехнік</p>
                <p>Термін навчання:	</br> база 9 кл. - 3р.10міс., 11 кл. - 2 р.10міс.</p>
            </div>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>4. Будівництво та експлуатація будівель і споруд  5.06010101</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст - технік - будівельник</p>
                <p>Термін навчання:	</br> база 9 кл. - 3р.10міс., 11 кл. - 2 р.10міс.</p>
            </div>
        </div>
        <div class="col-6">
            <h3>Заочне відділення:</h3>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>1. Економіка підприємства   5.03050401</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст – молодший спеціаліст з економіки підприємства.</p>
                <p>Термін навчання:	</br> база 11 кл. - 1 р.10міс.</p>
            </div>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>2. Обслуговування комп'ютерних систем і мереж  5.05010201</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст - технік з обчислювальної техніки</p>
                <p>Термін навчання:	</br> база 11 кл. - 2 р.10міс.</p>
            </div>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>3.  Монтаж і експлуатація теплоенргетичного устаткування теплових електростанцій 5.05060101</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст - технік - теплотехнік</p>
                <p>Термін навчання:	</br> база 11 кл. - 2 р.10міс.</p>
            </div>
            <div class="specialty" style="margin-bottom: 10px">
                <strong>4. Будівництво та експлуатація будівель і споруд  5.06010101</strong>
                <p>Кваліфікація: </br>	молодший спеціаліст - технік - будівельник</p>
                <p>Термін навчання:	</br> база 11 кл. - 2 р.10міс.</p>
        </div>
    </div>
@endsection    