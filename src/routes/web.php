<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ThanksController;

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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/mypage', [AuthController::class, 'login']);
});
Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
Route::patch('/reservation/update', [ReservationController::class, 'update']);
Route::delete('/reservation/delete', [ReservationController::class, 'destroy']);

Route::get('/', [DetailController::class, 'index']);
Route::get('/detail/{restaurant_id}', [DetailController::class, 'show'])->name('restaurant.show');
Route::get('/search', [DetailController::class, 'search']);
Route::middleware('auth')->group(function () {
    Route::prefix('favorite')->group(function () {
        Route::post('/store', [FavoriteController::class, 'store'])->name('favorite.store');
        Route::delete('/destroy', [FavoriteController::class, 'delete'])->name('favorite.destroy');
    });
});
Route::middleware('auth')->group(function () {
    Route::post('/reservation', [ReservationController::class, 'store']);
});

Route::get('/thanks', [ThanksController::class, 'index']);
Route::get('/usermenu', [MenuController::class, 'menu']);
Route::get('/guestmenu', [MenuController::class, 'menu']);
Route::post('/back', [MenuController::class, 'back']);