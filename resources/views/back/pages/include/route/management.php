

<?php

 // FUNCTION


 function createController($controllerName) {
    $controllerClass = "use App\\Http\\Controllers\\$controllerName";

    if (class_exists($controllerClass)) {
        return new $controllerClass();
    } else {
        throw new Exception("Le contrôleur $controllerClass n'existe pas.");
    }
}

createController($MyController);

use Illuminate\Support\Facades\Route;

 Route::get('/'.$line, [$MyController::class, 'index'])->name($name.'Index');
 Route::get('/'.$line.'/create', [$MyController::class, 'create'])->name($name.'Create');
 Route::post('/'.$line.'/store', [$MyController::class, 'store'])->name($name.'Store');
 Route::get('/'.$line.'/{'.$name.'}/edit', [$MyController::class, 'edit'])->name($name.'Edite');
 Route::put('/'.$line.'/{'.$name.'}/update', [$MyController::class, 'update'])->name($name.'Update');
 Route::get('/'.$line.'/{'.$name.'}/delete', [$MyController::class, 'delete'])->name($name.'Delete');
 Route::post('/'.$line.'/{'.$name.'}/destroy', [$MyController::class, 'destroy'])->name($name.'Destroy');


