<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.master',compact('user'));
    }

    public function edit(Request $request, User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => ['required', 'file'],
        ]);
        $attributes['avatar'] = request('avatar')->store('avatar');
        $user->update($attributes);
        return redirect($user->path());
    }
}
