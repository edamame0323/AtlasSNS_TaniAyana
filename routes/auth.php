<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// 新規登録画面（表示）
Route::get('/register', [AuthController::class, 'showRegisterForm']);

// 新規登録処理（ボタンを押したとき）
Route::post('/register', [AuthController::class, 'register']);

// ログイン画面と（表示）
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// ログイン処理（ボタンを押したとき）
Route::post('/login', [AuthController::class, 'login']);

// ログアウト
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
