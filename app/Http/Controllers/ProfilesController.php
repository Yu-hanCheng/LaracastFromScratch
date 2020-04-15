<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        $all = User::where('id', '!=', current_user()->id)->paginate(3);
        return view('profiles.master',compact('user','all'));
    }

    public function edit(Request $request, User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'password' => ['required', 'string', 'confirmed']
        ]);
        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatar');
        }
        $user->update($attributes);
        return redirect($user->path());
    }
}
