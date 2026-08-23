<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    // 自分のプロフィール
    public function profile()
    {
        $user = Auth::user();

        return view('profiles.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|min:2|max:12',

            'email' => [
                'required',
                'email',
                'min:5',
                'max:40',
                Rule::unique('users', 'email')->ignore(Auth::id()),
            ],

            'password' => 'required|alpha_num|min:8|max:20',

            'password_confirmation' => 'required|alpha_num|min:8|max:20|same:password',

            'bio' => 'nullable|max:150',

            'icon' => 'nullable|image|mimes:jpg,png,bmp,gif,svg',
        ]);

        $user = Auth::user();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->bio = $request->bio;

         if ($request->hasFile('icon')) {
            $file = $request->file('icon');

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images'), $filename);

            $user->icon_image = $filename;
        }

        $user->save();

        return redirect()->route('profile');
    }
}
