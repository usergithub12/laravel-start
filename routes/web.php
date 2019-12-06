<?php

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
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/delete/{id}', 'PostController@destroy')->name('post.destroy');
Route::patch('post/update/{id}', 'PostController@update')->name('post.update');
Route::post('post/store', 'PostController@store')->name('post.store');
// Route::get('post/delete/{id}', ['as' => 'post.id'],'PostController@delete')->name('post.destroy');
Route::get('post/create', 'PostController@create')->name('post.create');
Route::get('post/show', 'PostController@showAll')->name('post.showAll');

Route::get('/', function () {
    return view('welcome');

});
Route::resource('posts', 'PostController'); 