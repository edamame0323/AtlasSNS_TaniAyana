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
        ],
        [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => 'ユーザー名は2文字以上で入力してください',
            'username.max' => 'ユーザー名は12文字以内で入力してください',

            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレス形式で入力してください',
            'email.min' => 'メールアドレスは5文字以上で入力してください',
            'email.max' => 'メールアドレスは40文字以内で入力してください',
            'email.unique' => 'このメールアドレスは既に登録されています',

            'password.required' => 'パスワードを入力してください',
            'password.alpha_num' => 'パスワードは英数字のみで入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは20文字以内で入力してください',
            'password.confirmed' => '確認用パスワードが一致しません',
        ]
        );

        // ＊ポイント＊ 第2因数が「日本語メッセージ」
        // validate(
        //     条件,
        //     エラーメッセージ
        // );

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 完了画面にユーザー情報を渡す
        return view('auth.added', ['user' => $user]);
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
            return redirect('/top');   // ログイン成功
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
