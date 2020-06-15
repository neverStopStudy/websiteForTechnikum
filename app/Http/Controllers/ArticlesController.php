<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    public function show($id)
    {
        $article = Article::find($id);
        $article->views++;
        $article->save();
        
        $imgs = $article->images()->get();
        $comments = $article->comments;
        // Article::find($article->id)->comments
        return view('admin.articles.show', compact('article','imgs','comments'));
    }

    public function welcome()
    {
        $articles = Article::with('images')->orderBy('created_at', 'desc')->paginate(5);
        return view('welcome', ['articles' => $articles]);
    }

    public function index()
    {
        $articles = Article::with('comments')->get();
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(ArticleRequest $request)
    {        
        $file = Storage::put('public', $request->image_link);
        $url = Storage::url($file);

        $article =  Article::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'text' =>  $request->text,
            'image_link' =>  $url,
        ]);

        if ($request->imgs != NULL) {
            $index = 1;
            foreach ($request->imgs as $img) {
                $ext = $img->extension();
                $path = $article->id . "_" . $index . "." . $ext;
                $file = $img->storeAs('public', $path);
                $url = Storage::url($file);

                $image = new Image();
                $image->link = $url;
                $image->save();
                $article->images()->attach($image);
                $index++;
            }
        } 

        return redirect()->back();
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $imgs = $article->images()->get();

        return view('admin.articles.edit', ['article' => $article, 'imgs' => $imgs]);
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        return redirect()->route('admin.article.index');
    }

    public function destroy($id)
    {
        Article::find($id)->images()->delete();
        Article::destroy($id);

        return redirect()->route('admin.article.index');
    }
}
