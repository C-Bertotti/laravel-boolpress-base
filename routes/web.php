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

//lato GUEST
//rotta per l'homepage 
Route::get('/', 'BlogController@index')->name('guest.posts.index');

//rotta per lo show
Route::get('/posts/{slug}', 'BlogController@show')->name('guest.posts.show');

//rotta per lo show
Route::post('/posts/{post}/add-comment', 'BlogController@addComment')->name('guest.posts.add-comment');


//rotte raggruppate per il lato ADMIN
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::resource('post', 'PostController');
});

