<?php

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
});
