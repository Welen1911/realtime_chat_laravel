<?php

use App\Http\Controllers\ConversaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\web\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::get('/chart', [PageController::class, 'chart'])->name('chart');

Route::group(['middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]], function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    Route::get('/all_users', [UserController::class, 'index'])->name('users');

    Route::get('/messages/{userId}', [MessageController::class, 'index'])->name('messages.index');

    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});
