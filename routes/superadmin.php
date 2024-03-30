<?php

use App\Http\Controllers\SubscribeControler;
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
        Route::get('/add', [SuperControler::class, 'add'])->name('add');
        Route::get('/add/create', [SuperControler::class, 'adminCreate'])->name('adminCreate');
        Route::post('/add/create', [SuperControler::class, 'adminStore'])->name('store');
        Route::get('/add/{admin}/edit',[SuperControler::class, 'adminEdit'])->name('adminEdit');
        Route::put('/add/{admin}/edit', [SuperControler::class, 'adminUpdate'])->name('adminUpdate');
        Route::get('/add/{admin}/delete',[SuperControler::class, 'adminDelete'])->name('adminDelete');
        Route::post('/add/{admin}/destroy',[SuperControler::class, 'adminDestroy'])->name('adminDestroy');
        Route::get('/subscribe', [SubscribeControler::class, 'index'])->name('subscribe');
        Route::post('/subscribe', [SubscribeControler::class, 'store'])->name('subStore');
    });
});
