<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create']);
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added']);

});

// 新規登録画面（表示）
Route::get('/register', [AuthController::class, 'showRegisterForm']);

// 新規登録処理（ボタンを押したとき）
Route::post('/register', [AuthController::class, 'register']);

// ログイン画面と（表示）
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// ログイン処理（ボタンを押したとき）
Route::post('/login', [AuthController::class, 'login']);

// ログアウト
Route::post('/logout', [AuthController::class, 'logout']);
