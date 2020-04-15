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

    public function edit(User $user)
    {
        $this->authorize('editProfile', $user);
        return view('profiles.edit', compact('user'));
    }
}
