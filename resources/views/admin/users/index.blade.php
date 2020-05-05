{{--@extends("admin.layouts.layout")--}}
@extends("layouts.app")

@section('breadcrumbs')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Всі користувачі</li>
        </ol>
    </div>
@endsection
@section("content")
    <div class="content__title text-center">
        <h2>Всі користувачі</h2>
    </div>
    <div class="admin-btn text-left py-3">
        <a href="{{route('admin.user.create')}}">
            <button type="button" class="btn btn-primary">Додати користувачя</button>
        </a>
    </div>        
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Роль</th>
            <th>Разрешения</th>
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
                        {{$role->name . ", "}}
                    @empty
                        Нет роли! Добавьте роль!
                    @endforelse
                </th>
                <th>
                    @forelse($user->permissions as $permission)
                        {{$permission->name . ", "}}
                    @empty
                        Нет разрешения! Добавьте разрешение!
                    @endforelse
                </th>
                <th>
                    <div class="btn-group">
                        <div class="article__link">
                            <a href="{{route("admin.user.show", $user->id)}}">
                                <button type="button" class="btn btn-success">Дивитись</button>
                            </a>
                        </div>
                        <div class="article__link">
                            <a href="{{route('admin.user.edit', $user->id)}}">
                                <button type="button" class="btn btn-warning">Змінити</button>
                            </a>
                        </div>
                        <div class="article__link">
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



