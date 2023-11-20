<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/master', function () {
    return view('layout.master');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';


//Commentaire
// Route::get('/create',function(){
//     return view('commentaires.ajout');
// });

//Index
Route::get('/commentaires', 'App\Http\Controllers\CommentaireController@index');
//Strore
Route::post('/commentaires', 'App\Http\Controllers\CommentaireController@store');
//Show
Route::get('commentaires/{commentaire}', 'App\Http\Controllers\CommentaireController@show');
//Create 
// Route::get('commentaires/create', 'App\Http\Controllers\CommentaireController@create');
Route::get('commentaires/create', 'App\Http\Controllers\CommentaireController@create');
Route::post('/commentaires', 'App\Http\Controllers\CommentaireController@store');
Route::get('commentaires/create', 'App\Http\Controllers\CommentaireController@create');

//Delete
Route::delete('commentaires/{commentaire}', 'App\Http\Controllers\CommentaireController@destroy');
