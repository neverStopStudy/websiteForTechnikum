@extends('admin.layouts.layout')

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Всі користувачі</li>
        </ol>
    </div>
@endsection
@section("content")
@section('content-title','Всі користувачі')

    <div class="admin-btn text-left py-3">
        <a href="{{route('admin.user.create')}}">
            <button type="button" class="btn btn-primary">Додати користувача</button>
        </a>
    </div>        
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>ПІБ</th>
            <th>Роль</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <th>{{$user->name}}</th>
                <th>
                    @forelse($user->roles as $role)
                        {{$role->name}}
                    @empty
                        -
                    @endforelse
                </th>
                <th>
                    <div class="btn-group">
                        <div class="btn-group__control">
                            <a href="{{route("admin.user.show", $user->id)}}">
                                <button type="button" class="btn btn-success">Дивитись</button>
                            </a>
                        </div>
                        <div class="btn-group__control">
                            <a href="{{route('admin.user.edit', $user->id)}}">
                                <button type="button" class="btn btn-warning">Змінити</button>
                            </a>
                        </div>
                        <div class="btn-group__control">
                            <form action="{{route('admin.user.destroy', $user->id)}}" method="get">
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
                <td colspan="5">Немає користувачів! Додайте користувачів!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
        {{$users->links()}}
        {{--  END MAIN     --}}
@endsection



