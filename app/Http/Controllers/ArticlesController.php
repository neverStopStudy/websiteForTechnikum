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
        $article = Article::where('id', $id)->first();
        $imgs = Image::where("article_id", $article->id)->get();

        return view('admin.articles.show', ['article' => $article, 'imgs' => $imgs]);
    }

    public function welcome()
    {
        $articles = Article::all();
        return view('welcome', ['articles' => $articles]);
    }

    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {

        if ($request->imgs != NULL) {
            $article_id = Article::create($request->all())->id;
            $index = 1;
            foreach ($request->imgs as $img) {


                $ext = $img->extension();
                $path = $article_id . "_" . $index . "." . $ext;
                $file = $img->storeAs('public', $path);
                $url = Storage::url($file);

                $image = new Image();
                if ($index == 1) $image->main = true;

                $image->article_id = $article_id;
                $image->link = $url;
                $image->save();

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
        return view('admin.articles.edit', ['article' => $article]);
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
        Article::destroy($id);
        return redirect()->route('admin.article.index');
    }
}
