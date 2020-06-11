{{--@extends("admin.layouts.layout")--}}
@extends('admin.layouts.layout')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Всі ролі</li>
        </ol>
    </div>
@endsection
@section("side-block")
    <div class="col-sm-3 col-12 side-block">
        <div class="side-menu">
            <h3>Меню сайта</h3>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">Главная</li>
            <li class="list-group-item"><a href="#">Інформація про технікум</a></li>
            <li class="list-group-item"><a href="#">Виховання</a></li>
            <li class="list-group-item"><a href="#">Абітуріенту</a></li>
            <li class="list-group-item"><a href="#">Контакти</a></li>
            <li class="list-group-item"><a href="#">Інформація</a></li>
        </ul>
    </div>
@endsection
@section("content")
@section('content-title','Всі ролі')
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Назва</th>
                <th>Slug</th>
                <th>Кількість користувачів</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @forelse($roles as $role)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <th>{{$role->name}}</th>
                    <th>{{$role->slug}}</th>
                    <th>{{$role->users->count()}}</th>
                    <th>
                        <div class="btn-group">
                            <div class="btn-group__control">
                                <a href="{{route('role.edit', $role->id)}}">
                                    <button type="button" class="btn btn-warning">Змінити</button>
                                </a>
                            </div>
                            <div class="btn-group__control">
                                <form action="{{route('role.destroy', $role->id)}}" method="get">
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
                    <td colspan="4">Немає ролей! Додайте роль!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{--  END MAIN     --}}
 
@endsection



