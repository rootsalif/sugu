<?php

use App\Http\Controllers\AdminControler;
use Illuminate\Support\Facades\Route;




Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest:admin','PreventBackHistory')->group(function(){
        Route::get('/login', [AdminControler::class, 'index'])->name('login');
        Route::post('/login', [AdminControler::class, 'store'])->name('logfrom');
    });

    Route::middleware(['auth:adminadmin', 'PreventBackHistory'])->group(function(){
        Route::view('/home','back.pages.admin.home')->name('home');
        Route::get('/logout', [AdminControler::class, 'logout'])->name('logout');

    });
});
