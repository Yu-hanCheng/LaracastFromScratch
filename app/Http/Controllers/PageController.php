<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;

class PageController extends Controller
{
    public function home()
    {
        app('cache')->remember('kk',60,fn()=>'foobar');
        ddd(app('cache')->get('kk'));
    }
    
}
