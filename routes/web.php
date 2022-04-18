<?php

use App\Http\Controllers\Register\CityController;
use App\Http\Controllers\Register\UfController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('register')->group(function () {

        Route::name('ufs.')->group(function () {
            Route::prefix('ufs')->group(function () {
                Route::controller(UfController::class)->group(function () {
                    Route::get('optionsForSelect', 'optionsForSelect')->name('select');
                });
            });
        });

        Route::name('cities.')->group(function () {
            Route::prefix('cities')->group(function () {
                Route::controller(CityController::class)->group(function () {
                    Route::get('optionsForSelect', 'optionsForSelect')->name('select');
                });
            });
        });

    });

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
