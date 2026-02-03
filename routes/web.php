<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControler;

Route::get('/', function () {
    return view('welcome')->name('home');
});

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth')->name('admin');

Route::get('/login', [App\Http\Controllers\AuthControler::class, 'login'])->name('login');
Route::Post('/auth', [App\Http\Controllers\AuthControler::class, 'authenticate'])->name('auth.post');

Route::get('/register', [App\Http\Controllers\AuthControler::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthControler::class, 'create'])->name('register.post');

Route::post('/logout', [App\Http\Controllers\AuthControler::class, 'logout'])->name('logout');