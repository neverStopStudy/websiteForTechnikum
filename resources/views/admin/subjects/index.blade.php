@extends('admin.layouts.layout')
@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Всі предмети</li>
        </ol>
    </div>
@endsection
@section("content")
@section('content-title','Всі навчальні предмети')
<div class="admin-btn text-left py-3">
    <a href="{{route('subject.create')}}">
        <button type="button" class="btn btn-primary">Додати предмет</button>
    </a>
</div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Назва предмету</th>
                    <th>Дії</th>
                </tr>
            </thead>
            <tbody>
            @forelse($subjects as $subject)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <th>{{$subject->name}}</th>
                    <th>
                        <div class="btn-group">
                            <div class="btn-group__control">
                                <a href="{{route("subject.show", $subject->id)}}">
                                    <button type="button" class="btn btn-success">Дивитись</button>
                                </a>
                            </div>
                            <div class="btn-group__control">
                                <a href="{{route('subject.edit', $subject->id)}}">
                                    <button type="button" class="btn btn-warning">Змінити</button>
                                </a>
                            </div>
                            <div class="btn-group__control">
                                <form action="{{route('subject.destroy', $subject->id)}}" method="post">
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
                    <td colspan="3">Немає Предметів! Додайте предмет!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{--  END MAIN     --}}

@endsection



