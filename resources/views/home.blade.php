@extends('layouts.app')

@section('content')

@isset($group)
   
@endisset
@section('content-title','Профіль')
        <div class="container">
            
            <div class="profile py-3">
                @empty($images)         
                    <div class="profile-img text-center">
                        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                @forelse($images as $img)
                                    @if($loop->first)
                                        <div class="carousel-item active">
                                            <img src="{{$img->link}}" alt="carosel-item" width="200px" height="200px">
                                        </div>
                                    @else
                                        <div class="carousel-item ">
                                            <img src="{{$img->link}}" alt="..." width="200px"  height="200px">
                                        </div>
                                    @endif
                                @empty
                                    <div class="alert">Немає фото</div>
                                @endforelse
                            </div>
                            <a class="carousel-control-prev bg-secondary" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg-secondary" href="#carouselExampleControls" role="button"
                            data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                @endempty
            <div class="profile-text">
                <p><span class="color-black">ПІБ: </span> {{auth()->user()->name}}</p>
            </div>
            <div class="profile-text">
                <p><span class="color-black">E-mail: </span> {{auth()->user()->email}}</p>
            </div>
            @isset($group)
                <div class="profile-text">
                    <p><span class="color-black">Студент групи: </span>{{$group->name}}</p>
                </div>
            @endisset
            <div class="profile-date">
                <p><span class="color-black">Зареєстрований: </span>{{auth()->user()->created_at}}</p>
            </div>
        </div>  
        <div class="container-fluid d-flex">
            
            @isset($group)
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Предмети групи {{$group->name }}
                    </div>
                
                    <div class="card-body" style="padding: 0">
                        <ul class="list-group list-group-flush">
                            @foreach($subjects as $subject)
                                <li class="list-group-item">
                                <a href="{{route('subject.materials', $subject->id)}}">{{$subject->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                 
            </div> 
            @endisset    
        </div> 
    </div>
@endsection
