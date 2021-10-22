<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('guest.home');
});

Auth::routes(['register' => false]);

// Dati per accesso:
//     leoloca98@yahoo.it
//     Classica

//* ROTTE ADMIN
Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::get('/{any}', function () {
        abort(404);
    });
});

//* ROTTE PUBBLICHE
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');                 //Prendi qualunque tipo di carattere e in qualunque quantità (.*)
