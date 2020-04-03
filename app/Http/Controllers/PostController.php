<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostController extends Controller
{
    public function show(Post $slug)
    {
        return view('post', ['post' => $slug]);
        }
}
