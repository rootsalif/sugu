<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CouleurController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\UsineController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('guest:user','PreventBackHistory')->group(function(){
        Route::get('/accueil', [EnterpriseController::class, 'index'])->name('enterprise.accueil');
        Route::get('/role', [UserControler::class, 'userIndex'])->name('role.enterprise.index');
        Route::get('/login/{role}', [UserControler::class, 'login'])->name('role.enterprise.login');
        Route::post('/login/{role}', [UserControler::class, 'store_'])->name('role.enterprise.store');
        Route::get('/login-{role}', [UserControler::class, 'index'])->name('user.login');
        Route::post('/login-{role}', [UserControler::class, 'store'])->name('user.logfrom');
    });

    Route::middleware(['auth:user,admin'])->group(function(){
        Route::view('/home','back.pages.user.home')->name('home');
        Route::get('/user/accueil', [EnterpriseController::class, 'index'])->name('role.accueil');

        Route::get('/logout', [UserControler::class, 'logout'])->name('logout');

        //Block d'enregistrement des produit

        Route::get('/article/enregistreur/categorie', [CategorieController::class, 'registCategorie'])->name('regist.categorie');
        Route::get('/article/enregistreur/categorie/{categorie}', [CategorieController::class, 'registSub'])->name('regist.sub');
        Route::get('/article/enregistreur/detail', [ArticleController::class, 'registDetail'])->name('regist.detail');
            // Marque
        Route::resource('/marque', MarqueController::class);        
        Route::get('/marque/{marque}/delete', [MarqueController::class, 'delete']);
        // Model
        Route::resource('/modele', ModeleController::class);        
        Route::get('/modele/{modele}/delete', [ModeleController::class, 'delete']);
         // Size
         Route::resource('/size', SizeController::class);        
         Route::get('/size/{size}/delete', [SizeController::class, 'delete']);

          // Number
         Route::resource('/number', NumberController::class);        
         Route::get('/number/{number}/delete', [NumberController::class, 'delete']);
          // Couleur
          Route::resource('/couleur', CouleurController::class);        
          Route::get('/couleur/{couleur}/delete', [CouleurController::class, 'delete']);
          // Component
          Route::resource('/component', ComponentController::class);        
          Route::get('/component/{component}/delete', [ComponentController::class, 'delete']);
          // Usine
          Route::resource('/usine', UsineController::class);        
          Route::get('/usine/{usine}/delete', [UsineController::class, 'delete']);
            // Image
         Route::resource('/image', ImageController::class);        
         Route::get('/image/{image}/delete', [ImageController::class, 'delete']);

            // Article

        Route::get('/article/{subCategorie}-index', [ArticleController::class, 'index'])->name('article.index');
        Route::get('/article/{subCategorie}-create', [ArticleController::class, 'create'])->name('article.create');



    });
});
