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

// Route::get('/', function () {
//     return view('pages/pocetna');
// });
Route::get('/', 'PagesController@pocetnastr');

// Route::get('/hello', function () {
//     return "hello";
// });


Route::group(['middleware' => ['web', 'auth']], function () {
    // Route::resource('posts', 'PostsController');
    Route::resource('posts', 'PostsController', [
        'except' => ['show']
    ]);
    Route::resource('kategorije', 'KategorijeController');
    Route::resource('korisnici', 'UserController');
});

Route::get('posts/{id}', 'PostsController@show');


Auth::routes();

Route::get('/onama', 'PagesController@about');

Route::get('/pocetna', 'PagesController@pocetnastr');

Route::get('/servisi', 'PagesController@service');

Route::get('/search', 'PagesController@search');

Route::get('/home', 'PagesController@pocetnastr')->name('pocetna');
