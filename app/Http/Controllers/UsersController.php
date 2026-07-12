<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $users = User::where('id', '!=', auth()->id())
                        ->where('username', 'LIKE', '%' . $keyword . '%')
                        ->get();
        } else {
            $users = User::where('id', '!=', auth()->id())->get();
        }

        $followingIds = Auth::user()
            ->follows()  // ユーザーがフォローしている人たちを取得
            ->pluck('users.id')  // フォローしている人のIDだけを取り出す
            ->toArray();  // 配列に変換する

        return view('users.search', compact('users', 'keyword', 'followingIds'));
    }
}
