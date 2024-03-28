<?php

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

Auth::routes(['register' => false]);

Route::middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'BlogController@index');
    Route::any('blogs/{blog}/update', 'BlogController@update1')->name('blogs.update1');
    Route::any('blogs/{blog}/destroy', 'BlogController@destroy1')->name('blogs.destroy1');
    Route::resource('blogs', 'BlogController');
});
