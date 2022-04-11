<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Test;
use Illuminate\Support\Facades\Route;

Route::get('/register', [ UserController::class, 'show_register_page' ])
    ->name('users.register.page');
Route::post('/register', [ UserController::class, 'register' ])
    ->name('users.register');

Route::get('/login', [ UserController::class, 'show_login_page' ])
    ->name('users.login.page');
Route::post('/login', [ UserController::class, 'login' ])
    ->name('users.login');

Route::middleware('auth')->group(function() {
    Route::get('/', function() {
        return view('pages.home', [ 'tests' => Test::all() ]);
    })->name('home.page');

    Route::get('/account', [ UserController::class, 'show_account_page' ])
        ->name('users.account.page');
    
    Route::get('/account/update', [ UserController::class, 'show_update_page' ])
        ->name('users.account.update.page');

    Route::post('/account/update', [ UserController::class, 'update' ])
        ->name('users.account.update');

    Route::get('/logout', [ UserController::class, 'logout' ])
        ->name('users.logout');

    Route::prefix('/tests')->group(function() {
        Route::get('/{id}/start', [ TestController::class, 'start_session' ])
            ->name('tests.sessions.start');
    
        Route::get('/sessions/{id}', [ TestController::class, 'show_session_page' ])
            ->name('tests.sessions.page');
    
        Route::post('/sessions/{id}', [ TestController::class, 'finish_session' ])
            ->name('tests.sessions.finish');
    
        Route::get('/sessions/{id}/result', [ TestController::class, 'show_session_result_page' ])
            ->name('tests.sessions.result.page');
    });
});