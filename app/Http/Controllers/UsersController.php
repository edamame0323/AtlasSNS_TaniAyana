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

        $following_ids = Auth::user()
            ->follows()  // ユーザーがフォローしている人たちを取得
            ->pluck('users.id')  // フォローしている人のIDだけを取り出す
            ->toArray();  // 配列に変換する

        return view('users.search', compact('users', 'keyword', 'following_ids'));
    }

        public function profile($user_id)
    {
        // 相手ユーザーを取得
        $user = User::findOrFail($user_id);

        // ログインユーザーがフォローしている人のID一覧を取得
        $following_ids = Auth::user()
            ->follows()
            ->pluck('users.id')
            ->toArray();

        // 相手のIDがその配列にあるか調べる
        $is_following = in_array($user->id, $following_ids);

        // 相手ユーザーの投稿を新しい順で取得
        $posts = $user->posts()->latest()->get();

        return view('users.profile', [
            'user' => $user,
            'is_following' => $is_following,
            'posts' => $posts,
        ]);
    }
}
