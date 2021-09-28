<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use FontLib\Table\Type\name;
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

        Route::get('log', [SuperAdminController::class, 'index'])
            ->middleware('superAdmin')
            ->name('log');

        Route::get('/add-admin', [SuperAdminController::class, 'create'])->name('admin.create');
        Route::post('/add-admin', [SuperAdminController::class, 'store'])->name('admin.store');

        Route::get('list', [SuratController::class, 'list'])->name('list');


        Route::get('/', [auth::class, 'index']);


        Route::get('/users', [UserController::class, 'create'])->name('user.create');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');

        Route::get('/ganti-password', [UserController::class, 'viewGantiPass'])->name('change-password.create');
        Route::put('/ganti-password/{id}', [UserController::class, 'gantiPassword'])->name('change-password.store');

        Route::delete('/users/{id}', [UserController::class, 'destroy'])
            ->name('user.delete');


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
