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
    
        <div class="text-center">
            <h2>Профиль</h2>
        </div>
        <div class="row text-center">
            <div class="col-sm-4">
                <div class="jumbotron">
                    Cтатей {{ $articles }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron">
                    Материалов {{ $materials }}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="jumbotron">
                Посетителей 0
                </div>
            </div>
        
</div>


       
            
            <div class="card">
                <div class="card-header">
                    Уведомления
                </div>
                <div class="card-body" style="padding: 0">
                    <ul class="list-group list-group-flush">
                        @foreach($notifications as $notification)
                            <li class="list-group-item">
                                @if($notification->data['message'])
                                {{$notification->data['message'] . PHP_EOL . $notification->created_at->diffForHumans()}}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    
@endsection
