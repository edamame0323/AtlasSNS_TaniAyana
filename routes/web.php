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

Route::get('top', [PostsController::class, 'index']);

Route::get('profile', [ProfileController::class, 'profile']);

Route::get('search', [UsersController::class, 'index']);

Route::get('follow-list', [PostsController::class, 'index']);
Route::get('follower-list', [PostsController::class, 'index']);

// 新規登録画面（表示）
Route::get('/register', [AuthController::class, 'showRegisterForm']);

// 新規登録処理（ボタンを押したとき）
Route::post('/register', [AuthController::class, 'register']);

// ログイン画面（表示）
Route::get('/login', [AuthController::class, 'showLoginForm']);

// ログイン処理（ボタンを押したとき）
Route::post('/login', [AuthController::class, 'login']);

// ログイン画面
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// ログイン後ページ
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

// ログアウト
Route::post('/logout', [AuthController::class, 'logout']);
