<?php

use App\Http\Controllers\BienController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/biens/liste', [BienController::class,'index']);
Route::get('/Ajout', [BienController::class,'create']);
Route::post('/AjoutBien', [BienController::class,'Ajouter']);

Route::get('bien/{id}', [BienController::class,'show']);// pour la voir plus

Route::get('modifierbien/{id}', [BienController::class,'Updatebien']);
Route::post('/modifierbien/traitement', [BienController::class,'UpdatebienTraitement']);
Route::get('/supprimerbien/{id}', [BienController::class,'DeleteBien']);







Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('biens.ajout');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

