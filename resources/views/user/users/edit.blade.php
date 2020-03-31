@extends("layouts.app")
<style>
    .article-imgs img{
        width: 100%;
    }
</style>
@section("side-block")
    <h2>Змінити користувача</h2>
{{--    <div class="article-imgs">--}}
{{--        @forelse($article->images as $image)--}}
{{--            <img src="{{$image->link}}" alt="article_img">--}}
{{--        @empty--}}
{{--            <p>Нет фото у Статьи</p>--}}
{{--        @endforelse--}}
{{--    </div>--}}
@endsection

@section("content")
    <form action="{{route('admin.user.update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="formGroupExampleInput">Имя</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Example input"
        value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label>Загрузить фото</label>
            <input type="file" name="imgs[]" class="form-control-file" multiple >
        </div>
        <div class="form-group">
            <button class="form-control" type="submit" name="submit"> Добавить </button>
        </div>
    </form>


@endsection