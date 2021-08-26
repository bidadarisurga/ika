<?php

use App\Http\Controllers\SuratController;
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
        Route::get('/', [SuratController::class, 'index']);
        Route::resource('surat', SuratController::class);
    });


require __DIR__ . '/auth.php';
