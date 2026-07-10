<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        return view('users.search', compact('users', 'keyword'));
    }
}
