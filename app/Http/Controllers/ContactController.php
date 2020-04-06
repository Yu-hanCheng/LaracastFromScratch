<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;

class ContactController extends Controller
{
   public function home()
   {
        return view('home');
   }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        Mail::to(request('email'))->send(new ContactMe('shirts'));
        return redirect(route('email.set'))->with('message','Email sent!');
    }        
}
