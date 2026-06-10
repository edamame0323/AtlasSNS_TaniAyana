<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('top', [PostsController::class, 'index'])->name('top');

    Route::post('/create', [PostsController::class, 'create']);

    Route::post('/post/update', [PostsController::class, 'update'])->name('post.update');

    Route::post('/post/delete', [PostsController::class, 'delete'])->name('post.delete');

    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');

    Route::get('search', [UsersController::class, 'search']);

    Route::get('follow-list', [PostsController::class, 'followList']);
    Route::get('follower-list', [PostsController::class, 'followerList']);

});

// ①～④、⑥はroute/auth.phpに記載

// ①新規登録画面（表示）
// Route::get('/register', [AuthController::class, 'showRegisterForm']);

// ②新規登録処理（ボタンを押したとき）
// Route::post('/register', [AuthController::class, 'register']);

// ③ログイン画面と（表示）
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// ④ログイン処理（ボタンを押したとき）
// Route::post('/login', [AuthController::class, 'login']);

// ⑤ログイン後ページ
// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');

// ⑥ログアウト
// Route::post('/logout', [AuthController::class, 'logout']);
