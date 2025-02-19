@extends('admin.layouts.layout')

@section("breadcrumbs")
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item"><a href="{{route('group.index')}}">Всі групи</a></li>
            <li class="breadcrumb-item active" aria-current="page">Перегляд групи</li>
        </ol>
    </div>
@endsection
@section("content")
@section('content-title','Перегляд групи ' . $group->name)

<div class="btn-group py-3">
    <div class="btn-group__control">
        <a href="{{route('group.edit', $group)}}">
            <button type="button" class="btn btn-warning">Змінити групу</button>
        </a>
    </div>
    <div class="btn-group__control">
        <form action="{{route('group.destroy', $group)}}" method="post">
            @csrf
            @method("DELETE")
            <button type="button" class="btn btn-danger admin-delete-btn">
                <input type="submit" value="Видалити групу" class="btn admin-delete-input">
            </button>
        </form>
    </div>
</div>
<div class="tabs">
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#students">Студенти</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#subjects">Предмети</a>
        </li>
    </ul>
</div>
    <div class="tab-content">
        <!-- Students -->  
        <div class="tab-pane fade show active" id="students">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>ФІО</th>
                            <th>Е-mail</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($group->students as $student)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th>{{$student->name}}</th>
                            <th>{{$student->email}}</th>
                            <th>
                                <div class="btn-group">
                                    <div class="btn-group__control">
                                        <a href="{{route("admin.user.show", $student->id)}}">
                                            <button type="button" class="btn btn-success">Дивитись</button>
                                        </a>
                                    </div>
                                    <div class="btn-group__control">
                                        <form action="{{route('group.delete.user', ['group' => $group ,'user' => $student])}}" method="get">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="btn btn-danger admin-delete-btn">
                                                <input type="submit" value="Видалити з групи" class="btn admin-delete-input">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        @empty
                            <tr class="table-warning">
                                <td colspan="3">Немає cтудентів! Додайте студентів!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        {{--  END Students     --}}
        </div>
        <!-- Subjects -->  
        <div class="tab-pane fade" id="subjects">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Назва</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($group->subjects as $subject)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th>{{$subject->name}}</th>
                            <th>
                                <div class="btn-group">
                                    <div class="btn-group__control">
                                        <a href="{{route('subject.show', $subject->id)}}">
                                            <button type="button" class="btn btn-success">Дивитись</button>
                                        </a>
                                    </div>
                                    <div class="btn-group__control">
                                        <form action="{{route('group.delete.subject', ['group' => $group ,'subject' => $subject])}}" method="get">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="btn btn-danger admin-delete-btn">
                                                <input type="submit" value="Видалити з групи" class="btn admin-delete-input">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @empty
                        <tr class="table-warning">
                            <td colspan="3">Немає предметів! Додайте предмет!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
        {{--  END subjects     --}}
        </div>
        
    </div> 
    
@endsection
