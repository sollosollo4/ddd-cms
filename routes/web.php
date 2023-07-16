<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
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

Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/refresh', [AuthenticatedSessionController::class, 'refresh']);

Route::middleware('jwtAuth:web')->group(function () {
    Route::get('/check-auth', [AuthenticatedSessionController::class, 'checkAuth'])->name('checkAuth');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::post('/', [ProfileController::class, 'update'])->name('update');
    });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});