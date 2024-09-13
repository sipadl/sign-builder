<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shared-sign/{redmine}/{id}/{base64}',[App\Http\Controllers\HomeController::class,'shared_sign'])->name('requestor.sign');
Route::post('/sign-share/{id}', [App\Http\Controllers\HomeController::class, 'simpanSign'])->name('signed.share');


Route::middleware(['auth'])->group(function () {
    Route::get('/main', [App\Http\Controllers\UserController::class, 'index'])->name('main');
    Route::get('/waitingSign', [App\Http\Controllers\UserController::class, 'waitingforsign'])->name('wait');
    Route::get('/alreadySign', [App\Http\Controllers\UserController::class, 'alreadysign'])->name('signed');
    Route::get('/completeSign', [App\Http\Controllers\UserController::class, 'complete'])->name('complete');
    Route::get('/add', [App\Http\Controllers\UserController::class, 'add'])->name('add');
    Route::get('/setting', [App\Http\Controllers\UserController::class, 'setting'])->name('setting');
    Route::get('/review/{id}', [App\Http\Controllers\UserController::class, 'review'])->name('review');
    Route::post('/post-redmine', [App\Http\Controllers\UserController::class, 'post'])->name('post');
    Route::post('/cari', [App\Http\Controllers\UserController::class, 'cari'])->name('cari');
    Route::post('/sign/{id}', [App\Http\Controllers\UserController::class, 'simpanSign'])->name('sign');
    Route::get('/logout', [App\Http\Controllers\UserController::class ,'logout'])->name('logout');
    Route::post('/changePasswords', [App\Http\Controllers\UserController::class, 'changePassword'])->name('password.update');
    Route::get('/changePassword', [App\Http\Controllers\UserController::class ,'showChangePasswordForm'])->name('password.change');
    Route::get('/userCreate', [App\Http\Controllers\UserController::class ,'createUser'])->name('setting.user');
    Route::post('/postUpdateUser/{id}', [App\Http\Controllers\UserController::class ,'postUpdateUser'])->name('setting.user.update');
    Route::get('/updateUser/{id}', [App\Http\Controllers\UserController::class ,'updateUser'])->name('setting.user.edit');
    Route::post('/submitReason/{id}', [App\Http\Controllers\UserController::class ,'submitReason'])->name('submitReason');
    Route::post('/userCreates', [App\Http\Controllers\UserController::class ,'postCreateUser'])->name('buatUser');
    Route::get('/manage-user', [App\Http\Controllers\UserController::class, 'managementUser'])->name('manage.user');
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/divisi', [App\Http\Controllers\UserController::class, 'divisi'])->name('divisi');
    Route::delete('/deleteUser/{id}', [App\Http\Controllers\UserController::class ,'deleteUser'])->name('setting.user.delete');

    Route::get('/export-pdf/{id}', [App\Http\Controllers\UserController::class ,'exportPdf'])->name('exportPdf');

    Route::get('display-pdf', function() {
        return view('export.pdf');
    });

});


