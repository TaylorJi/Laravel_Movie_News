<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\NewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('auth:sanctum')->group(function() {
Route::get('news', [NewsController::class, 'index']);
Route::get('news/{news}', [NewsController::class, 'show']);
Route::post('/news', [NewsController::class, 'store']);
Route::put('news/{news}', [NewsController::class, 'update']);
Route::delete('news/{news}', [NewsController::class, 'destroy']);
// });


// Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
// Route::post('news/store', [NewsController::class, 'store'])->name('news.store');
// Route::get('news/show/{id}', [NewsController::class, 'show'])->name('news.show');
// Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
// Route::put('news/update', [NewsController::class, 'update'])->name('news.update');
// Route::get('news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
// Route::get('news/finalview', [NewsController::class, 'finalview'])->name('news.finalview');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});