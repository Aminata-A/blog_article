<?php
use App\Http\Controllers\ArticleController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles', ArticleController::class)->except([
    'create', 'show', 'update', 'delete'
]);

// Route pour afficher les détails d'un article
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Route pour créer un nouvel article
Route::get('article/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');

// Route pour mettre à jour un article
Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::post('articles/update/{id}', [ArticleController::class, 'update'])->name('articles.update');

// Route pour supprimer un article
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');