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

//rotta per l'home page lato GUEST
Route::get('/', 'BlogController@index');


//rotte raggruppate per il lato ADMIN
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::resource('post', 'PostController');
});

