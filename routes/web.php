<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentaireController;

Route::middleware('isAdmin')->group(function () {
    Route::post('/AjoutBien', [BienController::class, 'Ajouter']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/biens/liste', [BienController::class, 'index']);
    Route::get('/Ajout', [BienController::class, 'create']);
    Route::post('/AjoutBien', [BienController::class, 'Ajouter']);
    // Route::get('bien/{id}', [BienController::class, 'show']);
    Route::get('modifierbien/{id}', [BienController::class, 'Updatebien']);
    Route::post('/modifierbien/traitement', [BienController::class, 'UpdatebienTraitement']);
    Route::get('/supprimerbien/{id}', [BienController::class, 'DeleteBien']);
    Route::get('/biensCommentaires/{id}/', [BienController::class, 'show']);
    Route::get('/commentaires/supprimer/{commentaireId}', [BienController::class, 'supprimerCommentaire'])->name('commentaires.supprimer');
});
Route::get('/biens/listeUser', [BienController::class, 'listeBien']);
// Route::get('/commentaires/ajoutCommentaire/{bienId}', [CommentaireController::class, 'create']);
Route::get('/commentaires/ajout/{bienId}', [CommentaireController::class, 'creer'])->name('modifieCommentaire');
Route::post('/commentaires/ajoute', [CommentaireController::class, 'store']);

Route::get('/comments/edit/{id}', [CommentaireController::class, 'edit']);
Route::post('/comments/edit/{id}', [CommentaireController::class, 'update'])->name('comments.update');

Route::get('/supprimercomment/{id}', [CommentaireController::class, 'destroy']);


Route::get('/', [Controller::class, 'index']);

Route::get('/biens/ajout', function () {
    return view('biens.ajout');
})->middleware(['auth', 'verified','isAdmin']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/biens','App\Http\Controllers\BienController@index');
Route::get('/biens/create','App\Http\Controllers\BienController@create');
Route::post('/biens', 'App\Http\Controllers\BienController@store');
Route::get('/biens/{bien}', 'App\Http\Controllers\BienController@show');
Route::get('/biens/{bien}/edit', 'App\Http\Controllers\BienController@edit');
Route::patch('biens/{bien}', 'App\Http\Controllers\BienController@update');
Route::delete('biens/{bien}', 'App\Http\Controllers\BienController@destroy');

//ImageChambre
Route::get('/chambre/create', 'App\Http\Controllers\ImageChambreController@create');


require __DIR__ . '/auth.php';
