<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsiteController;
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
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('authenticate');

Route::get('/check-online/{key}', [CheckerController::class, 'checkOnline'])->name('check.online');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('websites', [WebsiteController::class, 'index'])->name('websites');
    Route::get('websites/create', [WebsiteController::class, 'create'])->name('websites.create');
    Route::post('websites/create', [WebsiteController::class, 'store'])->name('websites.store');
    Route::get('websites/{website}/edit', [WebsiteController::class, 'edit'])->name('websites.edit');
    Route::post('websites/{website}/edit', [WebsiteController::class, 'update'])->name('websites.update');
    Route::delete('/websites/{website}/delete', [WebsiteController::class, 'delete'])->name('websites.delete');

    Route::get('/websites/{website}', [WebsiteController::class, 'show'])->name('websites.show');
});
