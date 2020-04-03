<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        return view('articles.show',['article' => Article::find($id)]);
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
        Article::create([
            'title' => request('title'),
            'body' => request('body'),
            'excerpt' => request('excerpt')
        ]);
        return redirect('/articles');
    }
}
