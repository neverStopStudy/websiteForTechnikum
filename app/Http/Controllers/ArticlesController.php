<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ArticlesController extends Controller
{
    public function show($id)
    {
        $article = Article::find($id);
        $imgs = $article->images()->get();

        return view('admin.articles.show', ['article' => $article, 'imgs' => $imgs]);
    }

    public function welcome()
    {
        $articles = Article::with('images')->paginate(3);
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

    public function store(Request $request)
    {
        if ($request->imgs != NULL) {
            $article = Article::create($request->all());
            $index = 1;
            foreach ($request->imgs as $img) {
                $ext = $img->extension();
                $path = $article->id . "_" . $index . "." . $ext;
                $file = $img->storeAs('public', $path);
                $url = Storage::url($file);

                $image = new Image();
                if ($index == 1) $image->main = true;
                $image->link = $url;
                $image->save();
                $article->images()->attach($image);
                $index++;
            }
        } else {
            echo "Загрузи фото!";
            return redirect()->back();
        }
        return redirect()->route('welcome');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $imgs = $article->images()->get();

        return view('admin.articles.edit', ['article' => $article, 'imgs' => $imgs]);
    }

    public function update(Request $request, $id)
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
