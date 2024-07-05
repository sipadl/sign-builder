<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\UserController::class, 'index'])->name('main');
Route::get('/add', [App\Http\Controllers\UserController::class, 'add'])->name('add');
Route::get('/review/{id}', [App\Http\Controllers\UserController::class, 'review'])->name('review');
Route::post('/post-redmine', [App\Http\Controllers\UserController::class, 'post'])->name('post');



