<?php

use Illuminate\Support\Facades\Route;

Route::resource('users', 'UserController')
    ->only(['store', 'create', 'edit', 'update']);
Route::resource('images', 'ImageController')
    ->only(['index', 'store', 'create', 'destroy']);
Route::get('/', 'ImageController@index');

Auth::routes();
