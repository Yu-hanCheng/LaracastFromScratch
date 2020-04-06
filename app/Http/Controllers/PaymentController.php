<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PaymentReceived;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        request()->user()->notify(new PaymentReceived(900));
    }
}
