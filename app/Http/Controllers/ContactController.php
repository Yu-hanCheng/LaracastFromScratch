<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
   public function home()
   {
        return view('home');
   }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        Mail::raw('It works!', function($message){
            $message->to(request('email'))
            ->subject('Hello Thread');
        });
        return redirect(route('email.set'))->with('message','Email sent!');
    }        
}
