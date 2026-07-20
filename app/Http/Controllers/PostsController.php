<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //トップ画面
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'post' => 'required|min:1|max:150',
        ], [
            'post.required' => '投稿内容を入力してください。',
            'post.max' => '投稿内容は150文字以内で入力してください。',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'post' => $request->post,
        ]);

        return redirect('/top');
    }

    // 更新処理
    public function update(Request $request)
    {
        $request->validate([
            'post' => 'required|max:150',
        ], [
            'post.required' => '投稿内容を入力してください。',
            'post.max' => '投稿内容は150文字以内で入力してください。',
        ]);

        $post = Post::where('id' , $request->id)
                    ->where('user_id', Auth::id())
                    ->first();

        if ($post) {
            $post->post = $request->post;
            $post->save();
        }

        return redirect('/top');
    }

    // 削除機能
    public function delete($id)
    {
        $post = Post::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->first();

        if ($post) {
            $post->delete();
        }

        return redirect('/top');
    }

    // フォロー
    public function followList()
    {
        // フォローしているユーザーを取得
        $followUsers = Auth::user()->follows;

        // フォローしているユーザーのIDだけ取り出す
        $followUserIds = $followUsers->pluck('id');

        // フォローしているユーザーの投稿を取得
        $posts = Post::with('user')
            ->whereIn('user_id', $followUserIds)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('follows.followList', compact('followUsers', 'posts'));
    }

    // フォロワー
    public function followerList()
    {
        $followerUsers = Auth::user()->followers;

        return view('follows.followerList', compact('followerUsers'));
    }
}
