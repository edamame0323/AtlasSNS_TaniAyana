<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;


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
        ]);

        dd('usernameのバリデーションを通過しました');
    }
}
