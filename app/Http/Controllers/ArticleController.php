<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.show',['article' => $article->where('id',$article->id)->with('replies')->first()]);
    }

    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name',request('tag'))->firstorFail()->articles;
        } else {
            $articles =  Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create', ['tags'=>Tag::all()]);
    }

    public function store()
    {
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = auth()->id();
        $article->save();

        $article->tags()->attach(request('tags'));
        

        return redirect('/articles');
    }

    public function edit(Article $articleObj)
    {
        return view('articles.edit', ['article' => $articleObj]);
    }
    
    public function update(Article $articleObj)
    {
        ;
        $articleObj->update($this->validateArticle());
        return redirect($articleObj->path());
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }

    public function bestReply(Article $articleObj)
    {
        $articleObj->update(['best_reply_id'=>request('reply_id')]);
        dd($articleObj);
    }
}
