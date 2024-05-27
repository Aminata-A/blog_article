<?php
use App\Http\Controllers\ArticleController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles', ArticleController::class)->except([
    'creer', 'details', 'update', 'delete'
]);

// Route pour afficher les détails d'un article
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.details');

// Route pour créer un nouvel article
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');

// Route pour mettre à jour un article
Route::put('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

// Route pour supprimer un article
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.delete');
