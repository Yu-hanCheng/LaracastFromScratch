<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function home()
    {
        Cache::remember('kk',60,fn()=>'foobar');
    }
    
}
