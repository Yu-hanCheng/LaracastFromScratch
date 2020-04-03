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
}
