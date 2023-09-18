<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route for Administrator
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::resource('/books', 'BooksController');

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');
    Route::resource('/users', 'UserController');
    Route::get('/allbooks', 'BooksController@allbook')->name('books.allbook');
});
