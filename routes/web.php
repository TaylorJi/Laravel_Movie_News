<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ArticleController;

// namespace App\Http\Controllers\OrgController;
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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('news/store', [NewsController::class, 'store'])->name('news.store');
Route::get('news/show/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/update', [NewsController::class, 'update'])->name('news.update');
Route::get('news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
Route::get('news/delete/{id}', [NewsController::class, 'destroy'])->name('news.delete');
Route::get('news/finalview', [NewsController::class, 'finalview'])->name('news.finalview');

Route::get('articles/show/{newsletter_id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('articles/view/{id}', [ArticleController::class, 'view'])->name('articles.view');
Route::get('articles/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('articles/update', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/articles/create/{newsletter_id}', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/destroy/{id}/{newsletter_id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/', [NewsController::class, 'welcome'])->name('welcome');

Route::resource("/news", NewsController::class )->middleware(['auth']);

require __DIR__.'/auth.php';
