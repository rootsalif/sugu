<?php

use App\Http\Controllers\UserControler;
use Illuminate\Support\Facades\Route;



Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('guest:user','PreventBackHistory')->group(function(){
        Route::get('/login', [UserControler::class, 'index'])->name('login');
        Route::post('/login', [UserControler::class, 'store'])->name('logfrom');
    });

    Route::middleware(['auth:useradmin', 'PreventBackHistory'])->group(function(){
        Route::view('/home','back.pages.user.home')->name('home');
        Route::get('/logout', [UserControler::class, 'logout'])->name('logout');

    });
});
