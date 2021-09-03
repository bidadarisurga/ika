<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuratController;
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

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {

        Route::get('log', [SuperAdminController::class, 'index'])->name('log');
        Route::get('list', [SuratController::class, 'list']);


        Route::get('/', [auth::class, 'index']);
        Route::get('/user', [UserController::class, 'index'])
            ->middleware('admin')
            ->name('user');

        Route::get('/user/{id}', [UserController::class, 'edit'])
            ->name('user.edit');

        Route::put('/user/{id}', [UserController::class, 'update'])
            ->name('user.update');

        Route::get('/view', [SuratController::class, 'generatePDF']);
        Route::resource('surat', SuratController::class);
    });


require __DIR__ . '/auth.php';
