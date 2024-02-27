<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')
    ->namespace('Pshenichniyinfo\AdminPanel\Http\Controllers')
    ->prefix('admin-panel')
    ->group(function (){
    Route::middleware('guest')->group(function (){
        Route::get('login', 'Auth\AuthController@login')->name('admin.login');
        Route::post('login', 'Auth\AuthController@auth')->name('admin.login.store');
        Route::post('logout', 'Auth\AuthController@logout')->name('admin.logout');
    });

    Route::middleware('auth_admin')->group(function (){
        Route::get('logout', 'Auth\AuthController@logout')->name('admin.logout');

        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

        Route::prefix('users')->group(function (){
            Route::get('/', 'UserController@index')->name('admin.users');
            Route::get('show/{user}', 'UserController@show')->name('admin.show');
            Route::get('create', 'UserController@create')->name('admin.create');
            Route::post('create', 'UserController@store')->name('admin.store');
        });

        if (\Illuminate\Support\Facades\File::exists(app()->basePath() . '/routes/admin-panel-route.php')) {
            require_once app()->basePath() . '/routes/admin-panel-route.php';
        }
    });
});

//Route::get('home', function (){
//    return redirect()->route('admin.dashboard');
//})->name('home');
