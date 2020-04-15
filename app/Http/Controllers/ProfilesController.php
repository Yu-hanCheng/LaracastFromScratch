<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.master',compact('user'));
    }

    public function edit(Request $request, User $user)
    {
        if(current_user()->can('editProfile', $user)){
            return view('profiles.edit', compact('user'));
        };
        return "false";        
    }
}
