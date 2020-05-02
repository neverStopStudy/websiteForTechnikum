@extends("layouts.app")

@section("breadcrumbs")
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item"><a href="{{route('subject.index')}}">Всі предмети</a></li>
            <li class="breadcrumb-item active" aria-current="page">Перегляд предмету</li>
        </ol>
    </div>
@endsection
@section("content")
<div class="btn-group py-3">
    <div class="article__link">
        <a href="{{route('subject.edit', $subject)}}">
            <button type="button" class="btn btn-warning">Змінити</button>
        </a>
    </div>
    <div class="article__link">
        <form action="{{route('subject.destroy', $subject)}}" method="post">
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
            <a class="nav-link active" data-toggle="tab" href="#students">Групи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#subjects">Матеріали</a>
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
                            <th>Назва</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($subject->groups as $group)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th>{{$group->name}}</th>
                            <th>
                                <div class="btn-group">
                                    <div class="article__link">
                                        <a href="{{route('group.show', $group->id)}}">
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
                                <td colspan="2">Немає груп! Додайте групу!</td>
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
                    @forelse($subject->materials as $material)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th>{{$material->name}}</th>
                            <th>
                                {{-- <div class="btn-group">
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
                                    </div> --}}
                                </div>
                            </th>
                        </tr>
                    @empty
                        <tr class="table-warning">
                            <td colspan="3">Немає матеріалів! Додайте матеріал!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{--  END MAIN     --}}
            </div>
        </div>
        
    </div> 
    
@endsection
