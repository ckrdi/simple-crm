<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('upload', [UploadController::class, 'create'])->name('upload.create');
        Route::post('upload', [UploadController::class, 'store'])->name('upload.store');

        Route::get('users/active', [UserController::class, 'active'])->name('users.active');
        Route::get('users/nonactive', [UserController::class, 'nonactive'])->name('users.nonactive');

        Route::get('clients/active', [ClientController::class, 'active'])->name('clients.active');
        Route::get('clients/nonactive', [ClientController::class, 'nonactive'])->name('clients.nonactive');

        Route::resource('users', UserController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('tasks', TaskController::class);
    });
});

require __DIR__.'/auth.php';
