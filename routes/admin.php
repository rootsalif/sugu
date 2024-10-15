<?php

use App\Http\Controllers\AdminControler;
use App\Http\Controllers\RoleControler;
use App\Http\Controllers\UserControler;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest:admin','PreventBackHistory')->group(function(){
        Route::get('/login', [AdminControler::class, 'index'])->name('login');
        Route::post('/login', [AdminControler::class, 'store'])->name('logfrom');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function(){
        Route::get('/home',[AdminControler::class, 'home'])->name('home');
        Route::get('/logout', [AdminControler::class, 'logout'])->name('logout');

        // User of the system
        Route::resource('/user', UserControler::class);
        Route::get('/user/{user}/delete', [UserControler::class, 'delete'])->name('delete');

        // Role of User

        Route::get('/role', [RoleControler::class, 'userRole'])->name('user.role');
        Route::get('/role/{user}/show', [RoleControler::class, 'userShow'])->name('user.show.role');
        
        Route::get('/role/{role}', [RoleControler::class, 'addRole'])->name('user.add.role');
        Route::post('/role/{role}', [RoleControler::class, 'storeRole'])->name('user.store.role');
        Route::get('/role/{role}/{user}/dettache', [RoleControler::class, 'dettach'])->name('user.detach.role');
        Route::put('/role/{role}/{user}/dettache', [RoleControler::class, 'storeDettach'])->name('user.storeDetach.role');

        // Route des utilisateur

        Route::get('/connexion/role', [UserControler::class, 'userIndex'])->name('role.admin.index');
        Route::get('/login/{role}', [UserControler::class, 'login'])->name('role.admin.login');
        Route::post('/login/{role}', [UserControler::class, 'store_'])->name('role.admin.store');
        // Route::get('/login-{role}', [UserControler::class, 'index'])->name('admin.login');
        // Route::post('/login-{role}', [UserControler::class, 'store'])->name('admin.logfrom');


    });
});
