{{--@extends("admin.layouts.layout")--}}
@extends("layouts.app")
<style>
    .article__link {
        margin-right: 5px;
    }
</style>

@section("content")
{{-- {{dd($users)}} --}}

    <div class="col-12 col-sm-9 content">
        
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
                    <td colspan="5">Нет статей! Добавьте статью!</td>
                </tr>

            @endforelse
            </tbody>
        </table>
        
        {{--  END MAIN     --}}
    </div>
@endsection



