@extends("layouts.app")

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
<div class="btn-group py-3">
    <div class="article__link">
        <a href="{{route('group.edit', $group)}}">
            <button type="button" class="btn btn-warning">Змінити</button>
        </a>
    </div>
    <div class="article__link">
        <form action="{{route('group.destroy', $group)}}" method="post">
            @csrf
            @method("DELETE")
            <button type="button" class="btn btn-danger admin-delete-btn">
                <input type="submit" value="Видалити" class="btn admin-delete-input">
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
            <div class="col-12 col-sm-9 content py-3">
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
                                    <div class="article__link">
                                        <a href="{{route("admin.user.show", $student->id)}}">
                                            <button type="button" class="btn btn-success">Дивитись</button>
                                        </a>
                                    </div>
                                    <div class="article__link">
                                        <form action="{{route('group.destroy', $group->id)}}" method="get">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="btn btn-danger admin-delete-btn">
                                                <input type="submit" value="Видалити" class="btn admin-delete-input">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        @empty
                            <tr class="table-warning">
                                <td colspan="2">Немає cтудентів! Додайте студентів!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{--  END MAIN     --}}
            </div>
        </div>
        <!-- Subjects -->  
        <div class="tab-pane fade" id="subjects">
            <div class="col-12 col-sm-9 content py-3">
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
                                    <div class="article__link">
                                        <a href="{{route("group.show", $group->id)}}">
                                            <button type="button" class="btn btn-success">Дивитись</button>
                                        </a>
                                    </div>
                                    <div class="article__link">
                                        <a href="{{route('group.edit', $group->id)}}">
                                            <button type="button" class="btn btn-warning">Змінити</button>
                                        </a>
                                    </div>
                                    <div class="article__link">
                                        <form action="{{route('group.destroy', $group->id)}}" method="get">
                                            @csrf
                                            @method("DELETE")
                                            <button type="button" class="btn btn-danger admin-delete-btn">
                                                <input type="submit" value="Видалити" class="btn admin-delete-input">
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
                {{--  END MAIN     --}}
            </div>
        </div>
        
    </div> 
    
@endsection
