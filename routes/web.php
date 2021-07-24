<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/search', [SearchController::class, 'autoComplete'])->name('auto-complete');
Route::post('/search', [SearchController::class, 'search'])->name('search');


Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/{place}/{place:slug}', [PlaceController::class, 'index'])->name('place.show');
Route::get('/', [PlaceController::class, 'index'])->name('home');