<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/main', [App\Http\Controllers\UserController::class, 'index'])->name('main');
    Route::get('/waitingSign', [App\Http\Controllers\UserController::class, 'waitingforsign'])->name('wait');
    Route::get('/alreadySign', [App\Http\Controllers\UserController::class, 'alreadysign'])->name('signed');
    Route::get('/completeSign', [App\Http\Controllers\UserController::class, 'complete'])->name('complete');
    Route::get('/add', [App\Http\Controllers\UserController::class, 'add'])->name('add');
    Route::get('/review/{id}', [App\Http\Controllers\UserController::class, 'review'])->name('review');
    Route::post('/post-redmine', [App\Http\Controllers\UserController::class, 'post'])->name('post');
    Route::post('/sign/{id}', [App\Http\Controllers\UserController::class, 'simpanSign'])->name('sign');
    Route::get('/logout', [App\Http\Controllers\UserController::class ,'logout'])->name('logout');
});


