<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;  // (認証処理)(ログアウト)

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // (usersテーブルに登録するデータ　パスワードは暗号化)
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:2|max:12',
            'email' => 'required|email|min:5|max:40|unique:users',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 完了画面にユーザー情報を渡す
        return view('auth.register_complete', ['user' => $user]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // (認証処理)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('/home');   // ログイン成功
        }

        return back()->withErrors([
            'login_error' => 'メールかパスワードが違います',
        ]);
    }

    // (ログアウト)
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
