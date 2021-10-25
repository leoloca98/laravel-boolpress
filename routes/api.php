<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//# API ROUTE
Route::namespace('Api')->group(function () {
    Route::resource('posts', 'PostController');     //Potrebbero anche esistere solo le rotte api(no resource perchè mette anche edit e create che non verranno mai usate)(controllare su documentazione)
});
