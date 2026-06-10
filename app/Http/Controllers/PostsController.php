<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
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
    public function delete(Request $request)
    {
        $post = Post::where('id', $request->id())
                    ->where('user_id', Auth::id())
                    ->first();

        if ($post) {
            $post->delete();
        }

        return redirect('/top');
    }

    public function followList()
    {
        return view('follows.followList');
    }

    public function followerList()
    {
        return view('follows.followerList');
    }
}
