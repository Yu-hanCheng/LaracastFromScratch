<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;

class PageController extends Controller
{
    public function home()
    {
        ddd(resolve('App\Example') ,resolve('App\Example'));
    }
    
}
