<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function follow($id)
    {
        Follow::create([
            'following_id' => Auth::id(),
            'followed_id' => $id,
        ]);

        return redirect()->back();
    }

    public function unfollow($id)
    {
        Follow::where('following_id', Auth::id())
            ->where('followed_id', $id)
            ->delete();

        return redirect()->back();
    }
}
