<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.show',['article' => $article]);
    }

    public function index()
    {
        return view('articles.index', ['articles' => Article::latest()->get()]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        Article::create([
            'title' => request('title'),
            'body' => request('body'),
            'excerpt' => request('excerpt')
        ]);
        return redirect('/articles');
    }

    public function edit(Article $articleObj)
    {
        return view('articles.edit', ['article' => $articleObj]);
    }
    
    public function update(Article $articleObj)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $articleObj->update([
            'title' => request('title'),
            'body' => request('body'),
            'excerpt' => request('excerpt')
        ]);
        return redirect('/articles/' . $articleObj->id);
    }
}
