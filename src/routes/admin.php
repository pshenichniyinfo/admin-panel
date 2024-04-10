<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')
    ->prefix('admin-panel')
    ->group(function (){
        Route::middleware('guest')->namespace('Pshenichniyinfo\AdminPanel\Http\Controllers')->group(function (){
            Route::get('login', 'Auth\AuthController@login')->name('admin.login');
            Route::post('login', 'Auth\AuthController@auth')->name('admin.login.store');
        });

        Route::middleware('auth_admin')->group(function (){
            Route::namespace('Pshenichniyinfo\AdminPanel\Http\Controllers')->group(function () {
                Route::get('logout', 'Auth\AuthController@logout')->name('admin.logout');

                Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

                Route::prefix('users')->group(function (){
                    Route::get('/', 'UserController@index')->name('admin.users')->can('show user');
                    Route::get('edit/{user}', 'UserController@edit')->name('admin.users.edit')->can('edit user');
                    Route::post('edit/{user}', 'UserController@update')->name('admin.users.update')->can('edit user');
                    Route::get('create', 'UserController@create')->name('admin.create')->can('add create');
                    Route::post('create', 'UserController@store')->name('admin.store')->can('add create');
                    Route::delete('delete/{user}', 'UserController@delete')->name('admin.delete')->can('delete user');
                });

                Route::prefix('roles')->group(function (){
                    Route::get('/', 'RoleController@index')->name('admin.roles')->can('show role');
                    Route::get('create', 'RoleController@create')->name('admin.roles.create')->can('add role');
                    Route::post('create', 'RoleController@store')->name('admin.roles.store')->can('add role');
                    Route::get('edit/{role}', 'RoleController@edit')->name('admin.roles.edit')->can('edit role');
                    Route::put('update/{role}', 'RoleController@update')->name('admin.roles.update')->can('edit role');
                    Route::put('delete/{role}', 'RoleController@delete')->name('admin.roles.delete')->can('delete role');
                });
            });

            if (\Illuminate\Support\Facades\File::exists(app()->basePath() . '/routes/admin-panel-route.php')) {
                require_once app()->basePath() . '/routes/admin-panel-route.php';
            }
        });
    });

//Route::get('home', function (){
//    return redirect()->route('admin.dashboard');
//})->name('home');
