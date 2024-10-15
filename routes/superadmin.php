<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FunctionalControler;
use App\Http\Controllers\RoleControler;
use App\Http\Controllers\subCategorieController;
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

        // SUBSCRIBE
        Route::get('/subscribe', [SubscribeControler::class, 'index'])->name('subscribe');
        Route::post('/subscribe', [SubscribeControler::class, 'store'])->name('subStore');

        // FUNCTION
        Route::resource('/functional', FunctionalControler::class);
        Route::get('/functional/{functional}/delete', [FunctionalControler::class, 'delete']);
        Route::get('/functional/{functional}/add', [FunctionalControler::class, 'addId'])->name('functional.addId');


        // Roles
        Route::resource('/role', RoleControler::class);
        
        Route::get('/role/{role}/delete', [RoleControler::class, 'delete']);

        Route::post('/check-role', [RoleControler::class, 'checkData']);
        // Family

        Route::resource('/family', FamilyController::class);
        Route::get('/family/{family}/delete', [FamilyController::class, 'delete']);
        Route::get('/add/article',[FamilyController::class, 'addIndex'])->name('family.add.index');
        
        Route::get('/add/{admin}/show', [FamilyController::class, 'adminShow'])->name('admin.show.family');
        
        Route::get('/add/{family}', [FamilyController::class, 'addFamily'])->name('admin.add.family');
        Route::post('/add/{family}', [FamilyController::class, 'storeFamily'])->name('admin.store.family');
        Route::get('/add/{family}/{admin}/dettache', [FamilyController::class, 'dettach'])->name('admin.detach.family');
        Route::put('/add/{family}/{admin}/dettache', [FamilyController::class, 'storeDettach'])->name('admin.storeDetach.family');

        // Categorie

        Route::resource('/categorie', CategorieController::class);
        Route::get('/categorie/{categorie}/delete', [CategorieController::class, 'delete']);

        // sous categorie
        Route::resource('/sub-categorie', subCategorieController::class);
        Route::get('/sub-categorie/{subcategorie}/delete');
    });
});

// Route::resource('users', UserController::class)->only([
//     'index', 'show', 'create', 'store'
// ]);

// Route::resource('users', UserController::class)->except([
//     'destroy'
// ]);
