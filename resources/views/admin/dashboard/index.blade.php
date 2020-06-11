@extends('admin.layouts.layout')
<style>
    .dropdown-side-block > button {
        border: 0;
        text-align: left;
        background-color: #fff;
        padding: 0;
    }

    .card-header {
        font-size: 18px;
    }

    .card-body {
        padding: 0;
    }
    .profile-img{
        margin-bottom: 10px;
    }
    .settings{
        margin-bottom: 10px;
    }
</style>
@section('content')
<div class="container">
    @section('content-title','Адміністраторська панель')
        <div class="row text-center">
            <div class="col-sm-4">
                <div class="jumbotron">
                    Cтатей: {{ $articles }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron">
                    Коментарів: {{ $comments }}
                </div>
            </div> 
            <div class="col-sm-4">
                <div class="jumbotron">
                    Користувачів: {{ $materials }}
                </div>
            </div> 
        </div>
        <div class="row text-center">
            <div class="col-sm-4">
                <div class="jumbotron">
                    Груп: {{ $groups }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron">
                    Предметів: {{ $subjects }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron">
                    Матеріалів: {{ $materials }}
                </div>
            </div>
        </div>

       
        
        </div>
    
@endsection
