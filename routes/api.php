<?php

use App\Http\Controllers\API\PhoneBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::resource('phone_book',PhoneBookController::class);
    Route::patch('phone_book/{phone_book}/set_favorite', [PhoneBookController::class, 'addToFavorites'])->name('phone_book.set_favorite');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
