<?php

use App\Http\Controllers\SuperControler;
use Illuminate\Support\Facades\Route;


Route::prefix('super')->name('super.')->group(function(){
    Route::middleware('guest:superadmin','PreventBackHistory')->group(function(){
        Route::get('/login', [SuperControler::class, 'index'])->name('login');
        Route::post('/login', [SuperControler::class, 'store'])->name('logfrom');
    });

    Route::middleware(['auth:superadmin', 'PreventBackHistory'])->group(function(){
        Route::view('/home','back.pages.super.home')->name('home');
        Route::get('/logout', [SuperControler::class, 'logout'])->name('logout');

    });
});
