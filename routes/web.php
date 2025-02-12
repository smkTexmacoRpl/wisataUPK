<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\KecamatanContoller;




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('dash', [DashboardController::class, 'index'])->name('dash');
Route::get('/tables', function () {
    return view('layouts.partial.table');
});
Route::resource('/informasi', App\Http\Controllers\InfoController::class);



Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'user'])->name('dashboard')->middleware('userAccess:user');
    Route::get('super/dashboard', [App\Http\Controllers\AdminController::class, 'super'])->name('super.dashboard')->middleware('userAccess:super');;
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware(['auth', 'userAccess:admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin.dashboard');
    Route::resources([
        '/kabupatens' => KabupatenController::class,
        '/kecamatans' => KecamatanContoller::class,
        '/kategories' => KategoryController::class,


    ]);
});
