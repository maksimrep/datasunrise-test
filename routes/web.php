<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
//     return view('welcome');
// });

Auth::routes();


Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'HomeController@index')->name('main');

    Route::get('/user', 'HomeController@index')->name('main');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/add-book', 'BookController@index')->name('add.book');

    Route::get('/author/{id}', 'AuthorController@index')->name('author.page');

    Route::get('/book/edit/{id}', array('before' => 'csrf', 'uses' => 'BookController@edit'))->name('book.edit');

    Route::post('/book/create', array('before' => 'csrf', 'uses' => 'BookController@create'))->name('book.create');

    Route::put('/book/update/{id}', array('before' => 'csrf', 'uses' => 'BookController@update'))->name('book.update');

    Route::post('/book/remove/{id}', array('before' => 'csrf', 'uses' => 'BookController@remove'))->name('book.remove');

});